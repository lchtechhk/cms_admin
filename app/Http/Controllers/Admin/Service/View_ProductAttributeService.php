<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;
use App\Http\Controllers\Admin\Service\OrderProductDescriptionService;

class View_ProductAttributeService extends BaseApiService{
    private $OrderProductDescriptionService;
    

    function __construct(){
        $this->setTable('view_product_attribute');
        $this->OrderProductDescriptionService = new OrderProductDescriptionService();
        $this->companyAuth = true;
    }

    function getAllProduct(){
        $product_attribute_array = DB::table($this->getTable())->where('language_id',session('language_id'))->get();
        Log::info('['.$this->getTable().'] -- getAllProduct : ' . json_encode($product_attribute_array));
        return $product_attribute_array;
    }

    function getListing($product_id){
        $product_attribute_array = DB::table($this->getTable())->where('language_id',session('language_id'))->where('product_id',$product_id)->get();
        Log::info('['.$this->getTable().'] -- getListing : ' . json_encode($product_attribute_array));
        return $product_attribute_array;
    }

    function getProductAttribute($product_attribute_id){
        
        $product_attribute_array = $this->findByColumn_Value("product_attribute_id",$product_attribute_id);
        $product_attribute = !empty($product_attribute_array) && sizeof($product_attribute_array) > 0 ? $product_attribute_array[0] : array();
        $product_attribute->language_array = array();
        foreach ($product_attribute_array as $obj) {
            $language_id = $obj->language_id;
            $name = $obj->product_attribute_name;
            $product_attribute->language_array[$language_id] = array();
            $product_attribute->language_array[$language_id]['name'] = $name;
        }
        return $product_attribute;
    }

    function getProductByAttributeId($product_attribute_id){
        $product_attribute_array = $this->findByColumn_Value("product_attribute_id",$product_attribute_id);
        $product_attribute = !empty($product_attribute_array) && sizeof($product_attribute_array) > 0 ? $product_attribute_array[0] : array();
        $product_attribute->language_array = array();
        foreach ($product_attribute_array as $obj) {
            $language_id = $obj->language_id;
            $product_name = $obj->product_name;
            $product_attribute_name = $obj->product_attribute_name;
            $product_description = $obj->product_description;
            $product_attribute->language_array[$language_id] = array();
            $product_attribute->language_array[$language_id]['product_name'] = $product_name;
            $product_attribute->language_array[$language_id]['product_attribute_name'] = $product_attribute_name;
            $product_attribute->language_array[$language_id]['product_description'] = $product_description;

        }
        return $product_attribute;
    }
    
    function send_to_orderDescription($order_id,$order_product_id,$product_attribute_id){
        $result =array();
        try{
            $product_attribute_array = $this->findByColumn_Value('product_attribute_id',$product_attribute_id);
            foreach ($product_attribute_array as $obj) {
                $order_item_param["order_id"] = $order_id;
                $order_item_param["order_product_id"] = $order_product_id;
                $order_item_param["language_id"] = $obj->language_id;
                $order_item_param["product_id"] = $obj->product_id;
                $order_item_param["product_attribute_id"] = $obj->product_attribute_id;
                $order_item_param["product_name"] = $obj->product_name;
                $order_item_param["product_attribute_name"] = $obj->product_attribute_name;
                $order_item_param["product_description"] = $obj->product_description;
                $add_order_item_result = $this->OrderProductDescriptionService->add($order_item_param);
                if(empty($add_order_item_result['status']) || $add_order_item_result['status'] == 'fail')throw new Exception("Error To Add Order Item Description");
            }
            $result = $this->response($result,"Successful","view_edit");

        }catch(Exception $e){
            $result = $this->throwException($result,$e->getMessage(),true);
        }
        return $result;
    
    }
    function redirect_view($result,$title){
    }
}

?>