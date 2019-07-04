<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\UploadService;
use App\Http\Controllers\Admin\Service\LanguageService;

class ProductOptionService extends BaseApiService{
    private $UploadService;


    function __construct(){
        $this->setTable('product_option');
        $this->LanguageService = new LanguageService();

        $this->UploadService = new UploadService();

    }
    function getListing(){
        $product_option_array = $this->findAllByLanguage(session('language_id') );
        Log::info('[Product Option] -- getListing : ' .json_encode($product_option_array));
        return $product_option_array;
    }
    function getProductOption($product_option_id){
        $product_option_array = $this->findByColumnAndId("product_option_id",$product_option_id);
        $product_option = !empty($product_option_array) && sizeof($product_option_array) > 0 ? $product_option_array[0] : array();
        $product_option->language_array = array();
        foreach ($product_option_array as $obj) {
            $language_id = $obj->language_id;
            $name = $obj->product_option_name;
            $product_option->language_array[$language_id] = array();
            $product_option->language_array[$language_id]['product_option_name'] = $name;
        }
        Log::info('[product_option] -- getListing : ' .json_encode($product_option));
        return $product_option;
    }
    function redirect_view($result,$title){
        $result['label'] = "ProductOption";
        $result['languages'] = $this->LanguageService->findAll();

        switch($result['operation']){
            case 'listing':
                $result["product_options"] = $this->getListing();
                Log::info('[listing] --  : ' . \json_encode($result));
                return view("admin.product_option.listingProductOption", $title)->with('result', $result);
            break;
            case 'view_add':
                Log::info('[view_add] --  : ' . \json_encode($result));
                return view("admin.product_option.viewProductOption", $title)->with('result', $result);
            break;
            case 'view_edit':
                $result['product_option'] = $this->getProductOption($result['product_option_id']);
                Log::info('[view_edit] --  : ' . \json_encode($result));
                return view("admin.product_option.viewProductOption", $title)->with('result', $result);
            break;
            case 'add':
                 Log::info('[add] --  : '. \json_encode($result));
                try{
                    DB::beginTransaction();
                    foreach ($result['language_array'] as $language_id => $obj) {
                        $product_option_name = $obj['product_option_name'];
                        $param = array();
                        $param['language_id'] = $language_id;
                        $param['product_option_name'] = $product_option_name;
                        $add_product_option_result = $this->add($param);
                        if(empty($add_product_option_result['status']) || $add_product_option_result['status'] == 'fail')throw new Exception("Error To Add Product Option");
                    }
                    $result = $this->response($result,"Successful","listing");
                    $result["product_options"] = $this->getListing();
                    DB::commit();
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }
                $result["product_options"] = $this->getListing();
                return view("admin.product_option.listingProductOption", $title)->with('result', $result);
            break;
            case 'edit':
                // Log::info('[edit] --  : ' . \json_encode($result));
                try{
                    DB::beginTransaction();
                    if($image = $this->UploadService->upload_image($result['request'],'image','resources/assets/images/product_options/'))$result['image'] = $image;
                    $update_product_result = $this->update("product_image_id",$result);
                    if(empty($update_product_result['status']) || $update_product_result['status'] == 'fail')throw new Exception("Error To Update Product Image");
                    $result = $this->response($result,"Successful","listing");
                    $result["product_options"] = $this->getListing($result['product_id']);
                    DB::commit();
                    return view("admin.product_option.listingProductOption", $title)->with('result', $result);
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                    return view("admin.product_option.listingProductOption", $title)->with('result', $result);
                }		
            break;
            case 'delete': 
                Log::info('[delete] --  : ');
                try{
                    $delete_product_image_result = $this->deleteByKey_Value("product_image_id",$result['product_image_id']);
                    if(empty($delete_product_image_result['status']) || $delete_product_image_result['status'] == 'fail')throw new Exception("Error To Delete Product Image");
                    $result["product_options"] = $this->getListing($result['product_id']);
                    $result = $this->response($result,"Success To Delete Product Image","listing");
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }	
                return view("admin.product_option.listingProductOption", $title)->with('result', $result);
            break;
        }
    }
}

?>