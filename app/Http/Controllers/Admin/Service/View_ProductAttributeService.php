<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

class View_ProductAttributeService extends BaseApiService{

    function __construct(){
        $this->setTable('view_product_attribute');

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
        
        $product_attribute_array = $this->findByColumnAndId("product_attribute_id",$product_attribute_id);
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
    
    function redirect_view($result,$title){
    }
}

?>