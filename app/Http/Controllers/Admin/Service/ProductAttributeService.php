<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\UploadService;
use App\Http\Controllers\Admin\Service\LanguageService;
use App\Http\Controllers\Admin\Service\View_ProductService;
use App\Http\Controllers\Admin\Service\View_ProductAttributeService;
use App\Http\Controllers\Admin\Service\ProductAttributeDescriptionService;

class ProductAttributeService extends BaseApiService{
    private $UploadService;
    private $LanguageService;
    private $ProductAttributeDescriptionService;
    private $View_ProductAttributeService;
    private $View_ProductService;

    function __construct(){
        $this->setTable('product_attribute');
        $this->UploadService = new UploadService();
        $this->LanguageService = new LanguageService();
        $this->ProductAttributeDescriptionService = new ProductAttributeDescriptionService();
        $this->View_ProductAttributeService = new View_ProductAttributeService();
        $this->View_ProductService = new View_ProductService();

    }

    function redirect_view($result,$title){
        $result['languages'] = $this->LanguageService->findAll();
        $result['label'] = "ProductAttribute";
        switch($result['operation']){
            case 'listing':
                $result["product_attributes"] = $this->View_ProductAttributeService->getListing($result['product_id']);
                // Log::info('[listing] --  : ' . \json_encode($result));
                return view("admin.product_attribute.listingProductAttribute", $title)->with('result', $result);
            break;
            case 'view_add':
                $result['product'] = $this->View_ProductService->getProduct($result['product_id']);
                // Log::info('[view_add] --  : ' . \json_encode($result));
                return view("admin.product_attribute.productAttributeDialog", $title)->with('result', $result);
            break;
            case 'view_edit':
                $result['product'] = $this->View_ProductService->getProduct($result['product_id']);
                $result['product_attribute'] = $this->View_ProductAttributeService->getProductAttribute($result['product_attribute_id']);
                // Log::info('[view_edit] --  : ' . \json_encode($result));
                return view("admin.product_attribute.productAttributeDialog", $title)->with('result', $result);
            break;
            case 'add':
                 Log::info('[add] --  : '. \json_encode($result));
                try{
                    DB::beginTransaction();
                    if($image = $this->UploadService->upload_image($result['request'],'image','resources/assets/images/product_attribute/'))$result['image'] = $image;
                    $add_product_attribute_result = $this->add($result);
                    if(empty($add_product_attribute_result['status']) || $add_product_attribute_result['status'] == 'fail')throw new Exception("Error To Add Product Attribute");
                    $result['product_attribute_id'] = $add_product_attribute_result['response_id'];
                    foreach ($result['language_array'] as $language_id => $obj) {
                        $name = $obj['name'];
                        $param = array();
                        $param['language_id'] = $language_id;
                        $param['product_id'] = $result['product_id'];
                        $param['product_attribute_id'] = $result['product_attribute_id'];
                        $param['name'] = $name;
                        $add_product_attribute_description_result = $this->ProductAttributeDescriptionService->add($param);
                        if(empty($add_product_attribute_description_result['status']) || $add_product_attribute_description_result['status'] == 'fail')throw new Exception("Error To Add Product Attribute Description");
                    }
                    $result = $this->response($result,"Successful","listing");
                    $result["product_attributes"] = $this->View_ProductAttributeService->getListing($result['product_id']);
                    DB::commit();
                    return view("admin.product_attribute.listingProductAttribute", $title)->with('result', $result);
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                    return view("admin.product_attribute.listingProductAttribute", $title)->with('result', $result);
                }
            break;
            case 'edit':
                Log::info('[edit] --  : ' . \json_encode($result));
                try{
                    DB::beginTransaction();
                    if($image = $this->UploadService->upload_image($result['request'],'image','resources/assets/images/product_attribute/'))$result['image'] = $image;
                    $update_product_attribute_result = $this->update("product_attribute_id",$result);
                    if(empty($update_product_attribute_result['status']) || $update_product_attribute_result['status'] == 'fail')throw new Exception("Error To Update Product Attribute");
                   
                    foreach ($result['language_array'] as $language_id => $obj) {
                        $name = $obj['name'];
                        $param = array();
                        $param['name'] = $name;
                        $param['product_attribute_id'] = $result['product_attribute_id'];
                        $param['language_id'] = $language_id;
                        $isExisting = $this->ProductAttributeDescriptionService->isExistingByMultipleKey_Value($param,array("product_attribute_id","language_id"),array($result['product_attribute_id'],$language_id));
                        if($isExisting){
                            $update_product_attribute_description_result = $this->ProductAttributeDescriptionService->updateByMultipleKey_Value($param,array("product_attribute_id","language_id"),array($result['product_attribute_id'],$language_id));
                            if(empty($update_product_attribute_description_result['status']) || $update_product_attribute_description_result['status'] == 'fail')throw new Exception("Error To Update Product Attribute Description");
                        }else {
                            $add_product_attribute_description_result = $this->ProductAttributeDescriptionService->add($param);
                            if(empty($add_product_attribute_description_result['status']) || $add_product_attribute_description_result['status'] == 'fail')throw new Exception("Error To Add Product Attribute Description");

                        }
                    }     
                    $result = $this->response($result,"Successful","listing");
                    $result["product_attributes"] = $this->View_ProductAttributeService->getListing($result['product_id']);
                    DB::commit();
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }		
                $result["product_attributes"] = $this->View_ProductAttributeService->getListing($result['product_id']);
                return view("admin.product_attribute.listingProductAttribute", $title)->with('result', $result);
            break;
            case 'delete': 
                $result["product_id"] = $result['delete_product_id'];
                $result["product_attribute_id"] = $result['delete_product_attribute_id'];
                try{
                    DB::beginTransaction();
                    $delete_product_attribute_result = $this->deleteByKey_Value("product_attribute_id",$result['product_attribute_id']);
                    if(empty($delete_product_attribute_result['status']) || $delete_product_attribute_result['status'] == 'fail')throw new Exception("Error To Delete Product Attribute");
                    $delete_product_attribute_description_result = $this->ProductAttributeDescriptionService->deleteByKey_Value("product_attribute_id",$result['product_attribute_id']);
                    if(empty($delete_product_attribute_description_result['status']) || $delete_product_attribute_description_result['status'] == 'fail')throw new Exception("Error To Delete Product Attribute Description");
                    $result = $this->response($result,"Success To Delete Product Attribute","listing");
                    DB::commit();
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }	
                $result["product_attributes"] = $this->View_ProductAttributeService->getListing($result["product_id"]);
                return view("admin.product_attribute.listingProductAttribute", $title)->with('result', $result);
            break;
        }
    }
}

?>