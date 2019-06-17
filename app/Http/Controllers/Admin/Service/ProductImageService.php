<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\UploadService;
class ProductImageService extends BaseApiService{
    private $UploadService;


    function __construct(){
        $this->setTable('product_image');
        $this->UploadService = new UploadService();

    }
    function getListing($product_id){
        $product_image_array = $this->findByColumnAndId('product_id',$product_id);
        Log::info('[ProductImage] -- getListing : ' .json_encode($product_image_array));
        return $product_image_array;
    }
    function getProductImage($product_image_id){
        $product_image_array = $this->findByColumnAndId('product_image_id',$product_image_id);
        $product_image = !empty($product_image_array) && sizeof($product_image_array) > 0 ? $product_image_array[0] : array();
        Log::info('[ProductImage] -- getProductImage : ' .json_encode($product_image));
        return $product_image;
    }
    function redirect_view($result,$title){
        $result['label'] = "ProductImage";
        switch($result['operation']){
            case 'listing':
                $result["product_images"] = $this->getListing($result['product_id']);
                // Log::info('[listing] --  : ' . \json_encode($result));
                return view("admin.productImage.listingProductImage", $title)->with('result', $result);
            break;
            case 'view_add':
                // Log::info('[view_add] --  : ' . \json_encode($result));
                return view("admin.productImage.ProductImageDialog", $title)->with('result', $result);
            break;
            case 'view_edit':
                // Log::info('[view_edit] --  : ');
                $result['product_image'] = $this->getProductImage($result['product_image_id']);
                Log::info('[view_edit] --  : ' . \json_encode($result));
                return view("admin.productImage.ProductImageDialog", $title)->with('result', $result);
            break;
            case 'add':
                //  Log::info('[add] --  : '. \json_encode($result["product_images"]));
                try{
                    DB::beginTransaction();
                    if($image = $this->UploadService->upload_image($result['request'],'image','resources/assets/images/product_images/'))$result['image'] = $image;
                    $add_product_image_result = $this->add($result);
                    if(empty($add_product_image_result['status']) || $add_product_image_result['status'] == 'fail')throw new Exception("Error To Add Product Image");
                    $result['product_image_id'] = $add_product_image_result['response_id'];
                    $result = $this->response($result,"Successful","listing");
                    $result["product_images"] = $this->getListing($result['product_id']);
                    DB::commit();
                    return view("admin.productImage.listingProductImage", $title)->with('result', $result);
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                    return view("admin.productImage.listingProductImage", $title)->with('result', $result);
                }
            break;
            case 'edit':
                // Log::info('[edit] --  : ' . \json_encode($result));
                try{
                    DB::beginTransaction();
                    if($image = $this->UploadService->upload_image($result['request'],'image','resources/assets/images/product_images/'))$result['image'] = $image;
                    $update_product_result = $this->update("product_image_id",$result);
                    if(empty($update_product_result['status']) || $update_product_result['status'] == 'fail')throw new Exception("Error To Update Product Image");
                    $result = $this->response($result,"Successful","listing");
                    $result["product_images"] = $this->getListing($result['product_id']);
                    DB::commit();
                    return view("admin.productImage.listingProductImage", $title)->with('result', $result);
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                    return view("admin.productImage.listingProductImage", $title)->with('result', $result);
                }		
            break;
            case 'delete': 
                try{
                    Log::info('[delete] --  : ');
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }	
                
                return view("admin.productImage.listingProductImage", $title)->with('result', $result);
            break;
        }
    }
}

?>