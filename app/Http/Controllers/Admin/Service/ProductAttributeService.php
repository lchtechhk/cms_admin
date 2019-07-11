<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\UploadService;
use App\Http\Controllers\Admin\Service\LanguageService;
use App\Http\Controllers\Admin\Service\View_ProductAttributeService;
use App\Http\Controllers\Admin\Service\ProductAttributeDescriptionService;

class ProductAttributeService extends BaseApiService{
    private $UploadService;
    private $LanguageService;
    private $ProductAttributeDescriptionService;
    private $View_ProductAttributeService;

    function __construct(){
        $this->setTable('product_attribute');
        $this->UploadService = new UploadService();
        $this->LanguageService = new LanguageService();
        $this->ProductAttributeDescriptionService = new ProductAttributeDescriptionService();
        $this->View_ProductAttributeService = new View_ProductAttributeService();

    }
    // function getListing($product_id){
    //     $product_attribute_array = $this->View_ProductAttributeService->findByColumnAndId('product_id',$product_id);
    //     $product_attribute = !empty($product_attribute_array) && sizeof($product_attribute_array) > 0 ? $product_attribute_array[0] : array();
    //     $product_attribute->language_array = array();
    //     foreach ($product_attribute_array as $obj) {
    //         $language_id = $obj->language_id;
    //         $name = $obj->name;
    //         $product_attribute->language_array[$language_id] = array();
    //         $product_attribute->language_array[$language_id]['name'] = $name;
    //     }
    //     // Log::info('[product_attribute] -- getProductAttribute : ' .json_encode($product_attribute));
    //     return $product_attribute;
    // }

    function getProductAttribute($product_id){
        $product_attribute_array = $this->findByColumnAndId('product_id',$product_id);
        $product_attribute = !empty($product_attribute_array) && sizeof($product_attribute_array) > 0 ? $product_attribute_array[0] : array();
        Log::info('[ProductAttribute] -- getProductAttribute : ' .json_encode($product_attribute));
        return $product_attribute;
    }
    function redirect_view($result,$title){
        $result['languages'] = $this->LanguageService->findAll();
        $result['label'] = "ProductAttribute";
        switch($result['operation']){
            case 'listing':
                $result["product_attributes"] = $this->View_ProductAttributeService->getListing($result['product_id']);
                Log::info('[listing] --  : ' . \json_encode($result));
                return view("admin.product_attribute.listingProductAttribute", $title)->with('result', $result);
            break;
            case 'view_add':
                Log::info('[view_add] --  : ' . \json_encode($result));
                return view("admin.product_attribute.productAttributeDialog", $title)->with('result', $result);
            break;
            case 'view_edit':
                // Log::info('[view_edit] --  : ');
                $result['product_image'] = $this->getProductAttribute($result['product_id']);
                Log::info('[view_edit] --  : ' . \json_encode($result));
                return view("admin.product_attribute.viewProductAttribute", $title)->with('result', $result);
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
                // try{
                //     DB::beginTransaction();
                //     if($image = $this->UploadService->upload_image($result['request'],'image','resources/assets/images/product_attribute/'))$result['image'] = $image;
                //     $update_product_result = $this->update("product_image_id",$result);
                //     if(empty($update_product_result['status']) || $update_product_result['status'] == 'fail')throw new Exception("Error To Update Product Image");
                //     $result = $this->response($result,"Successful","listing");
                //     $result["product_attribute"] = $this->getListing($result['product_id']);
                //     DB::commit();
                //     return view("admin.product_attribute.listingProductAttribute", $title)->with('result', $result);
                // }catch(Exception $e){
                //     $result = $this->throwException($result,$e->getMessage(),true);
                //     return view("admin.product_attribute.listingProductAttribute", $title)->with('result', $result);
                // }		
            break;
            case 'delete': 
                Log::info('[delete] --  : ');
                try{
                    $delete_product_image_result = $this->deleteByKey_Value("product_image_id",$result['product_image_id']);
                    if(empty($delete_product_image_result['status']) || $delete_product_image_result['status'] == 'fail')throw new Exception("Error To Delete Product Image");
                    $result["product_attribute"] = $this->getListing($result['product_id']);
                    $result = $this->response($result,"Success To Delete Product Image","listing");
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }	
                return view("admin.product_attribute.listingProductAttribute", $title)->with('result', $result);
            break;
        }
    }
}

?>