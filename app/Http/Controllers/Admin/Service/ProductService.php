<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\View_ProductService;
use App\Http\Controllers\Admin\Service\View_CategoryService;
use App\Http\Controllers\Admin\Service\View_SubCategoryService;
use App\Http\Controllers\Admin\Service\View_ManufacturerService;
use App\Http\Controllers\Admin\Service\UnitService;

use App\Http\Controllers\Admin\Service\LanguageService;
use App\Http\Controllers\Admin\Service\UploadService;
use App\Http\Controllers\Admin\Service\ProductDescriptionService;

use function GuzzleHttp\json_encode;

class ProductService extends BaseApiService{
    private $View_ProductService;
    private $LanguageService;
    private $UploadService;
    private $ProductService;


    function __construct(){
        $this->setTable('product');
        $this->companyAuth = true;
        $this->LanguageService = new LanguageService();
        $this->UploadService = new UploadService();
        $this->ProductDescriptionService = new ProductDescriptionService();
        $this->View_CategoryService = new View_CategoryService();
        $this->View_SubCategoryService = new View_SubCategoryService();
        $this->View_ManufacturerService = new View_ManufacturerService();
        $this->View_ProductService = new View_ProductService();
        $this->UnitService = new UnitService();


    }

    function getProduct($product_id){
        $product_array = $this->View_ProductService->findByColumn_Value("product_id",$product_id);
        $product = !empty($product_array) && sizeof($product_array) > 0 ? $product_array[0] : array();
        $product->language_array = array();
        Log::info('[product_array] -- getProduct : ' .json_encode($product_array));
        foreach ($product_array as $obj) {
            $language_id = $obj->language_id;
            $name = $obj->name;
            $description = $obj->description;
            $product->language_array[$language_id] = array();
            $product->language_array[$language_id]['name'] = $name;
            $product->language_array[$language_id]['description'] = $description;
        }
        Log::info('[product] -- getProduct : ' .json_encode($product));
        return $product;
    }
    
    function redirect_view($result,$title){
        $result['languages'] = $this->LanguageService->findAll();
        $result['view_sub_categories'] = $this->View_SubCategoryService->getListing();
        $result['view_manufacturers'] = $this->View_ManufacturerService->getListing();
        $result['units'] = $this->UnitService->getUnit();
        $result['label'] = "Product";
        switch($result['operation']){
            case 'listing':
                $result['products'] = $this->View_ProductService->getListing();
                Log::info('[listing] --  : ' . \json_encode($result));
                return view("admin.product.listingProduct", $title)->with('result', $result);
            break;
            case 'view_add':
                Log::info('[view_add] --  : ' . \json_encode($result));
                return view("admin.product.viewProduct", $title)->with('result', $result);
            break;
            case 'view_edit':
                // Log::info('[view_edit] --  : '. \json_encode($result));
                $result['product'] = $this->getProduct($result['product_id']);
                return view("admin.product.viewProduct", $title)->with('result', $result);
            break;
            case 'add':
                // Log::info('[add] --  : ' . \json_encode($result));
                try{
                    DB::beginTransaction();
                    if($image = $this->UploadService->upload_image($result['request'],'image','resources/assets/images/product_images/'))$result['image'] = $image;
                    if(empty($result['special_status']) || $result['special_status'] == 'cancel'){
                        $result['special_price'] = 0.00;
                        $result['expiry_date'] = NULL;
                    }
                    $add_product_result = $this->add($result);
                    if(empty($add_product_result['status']) || $add_product_result['status'] == 'fail')throw new Exception("Error To Add Product");
                    $result['product_id'] = $add_product_result['response_id'];
                    foreach ($result['language_array'] as $language_id => $obj) {
                        $name = $obj['name'];
                        $description = $obj['description'];
                        $param = array();
                        $param['language_id'] = $language_id;
                        $param['product_id'] = $result['product_id'];
                        $param['name'] = $name;
                        $param['description'] = $description;
                        $add_product_description_result = $this->ProductDescriptionService->add($param);
                        if(empty($add_product_description_result['status']) || $add_product_description_result['status'] == 'fail')throw new Exception("Error To Add Product Description");
                    }
                    $result = $this->response($result,"Successful","view_edit");
                    $result['product'] = $this->getProduct($result['product_id']);
                    Log::info('[add] --  : ' . \json_encode($result));
                    DB::commit();
                    return view("admin.product.viewProduct", $title)->with('result', $result);
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                    return view("admin.product.viewProduct", $title)->with('result', $result);
                }
            break;
            case 'edit':
                Log::info('[edit] --  : ' . \json_encode($result));
                try{
                    DB::beginTransaction();
                    
                    if(empty($result['special_status']) || $result['special_status'] == 'cancel'){
                        $result['special_price'] = 0.00;
                        $result['expiry_date'] = NULL;
                    }
                    $update_product_result = $this->update("product_id",$result);
                    if(empty($update_product_result['status']) || $update_product_result['status'] == 'fail')throw new Exception("Error To update Product");
                    foreach ($result['language_array'] as $language_id => $obj) {
                        $name = $obj['name'];
                        $description = $obj['description'];
                        $param = array();
                        $param['name'] = $name;
                        $param['description'] = $description;
                        $param['product_id'] = $result['product_id'];
                        $param['language_id'] = $language_id;
                        $isExisting = $this->ProductDescriptionService->isExistingByMultipleKey_Value($param,array("product_id","language_id"),array($result['product_id'],$language_id));
                        if($isExisting){
                            $update_product_description_result = $this->ProductDescriptionService->updateByMultipleKey_Value($param,array("product_id","language_id"),array($result['product_id'],$language_id));
                            if(empty($update_product_description_result['status']) || $update_product_description_result['status'] == 'fail')throw new Exception("Error To Update Product");
                        }else {
                            $add_category_description_result = $this->ProductDescriptionService->add($param);
                            if(empty($add_category_description_result['status']) || $add_category_description_result['status'] == 'fail')throw new Exception("Error To Add Product Description");

                        }
                    }
                    $result = $this->response($result,"Successful","view_edit");
                    $result['product'] = $this->getProduct($result['product_id']);
                    Log::info('[EDIT] --  : ' . \json_encode($result));

                    DB::commit();
                    return view("admin.product.viewProduct", $title)->with('result', $result);
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                    return view("admin.product.viewProduct", $title)->with('result', $result);
                }		
            break;
            case 'delete': 
                try{
                    $delete_product_result = $this->deleteByKey_Value("product_id",$result['product_id']);
                    if(empty($delete_product_result['status']) || $delete_product_result['status'] == 'fail')throw new Exception("Error To Delete Product");
                    $delete_product_result = $this->ProductDescriptionService->deleteByKey_Value("product_id",$result['product_id']);
                    if(empty($delete_product_result['status']) || $delete_product_result['status'] == 'fail')throw new Exception("Error To Delete Product");
                    $result['products'] = $this->View_ProductService->getListing();
                    $result = $this->response($result,"Success To Delete Product","listing");
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }	
                
                return view("admin.product.listingProduct", $title)->with('result', $result);
            break;
        }
    }
}

?>