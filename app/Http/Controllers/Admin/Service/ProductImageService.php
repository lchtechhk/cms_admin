<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;


class ProductImageService extends BaseApiService{

    function __construct(){
        $this->setTable('product_image');

    }
    function getListing($product_id){
        $product_image_array = $this->findByColumnAndId('product_id',$product_id);
        Log::info('[ProductImage] -- getListing : ' .json_encode($product_image_array));
        return $product_image_array;
    }
    function redirect_view($result,$title){
        $result['label'] = "ProductImage";
        switch($result['operation']){
            case 'listing':
                $result["product_images"] = $this->getListing($result['product_id']);
                Log::info('[listing] --  : ' . \json_encode($result));
                return view("admin.productImage.listingProductImage", $title)->with('result', $result);
            break;
            case 'view_add':
                Log::info('[view_add] --  : ');
                return view("admin.productImage.viewProductImage", $title)->with('result', $result);
            break;
            case 'view_edit':
                Log::info('[view_edit] --  : ');

                return view("admin.productImage.viewProductImage", $title)->with('result', $result);
            break;
            case 'add':
                try{
                    DB::beginTransaction();
                    Log::info('[add] --  : ');
                    DB::commit();
                    return view("admin.productImage.viewProductImage", $title)->with('result', $result);
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                    return view("admin.productImage.viewProductImage", $title)->with('result', $result);
                }
            break;
            case 'edit':
                try{
                    DB::beginTransaction();
                    Log::info('[edit] --  : ');
                    DB::commit();
                    return view("admin.productImage.viewProductImage", $title)->with('result', $result);
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                    return view("admin.productImage.viewProductImage", $title)->with('result', $result);
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