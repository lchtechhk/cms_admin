<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

class View_ProductOptionDescService extends BaseApiService{

    function __construct(){
        $this->setTable('product_option_value_description');

    }

    function getListing(){
        $product_option_array = $this->findAllByLanguage(session('language_id') );
        return $product_option_array;
    }

    function getProductOptionValue($product_option_value_id){
        $product_option_array = $this->findByColumnAndId("product_option_value_id",$product_option_value_id);
        $product_option = !empty($product_option_array) && sizeof($product_option_array) > 0 ? $product_option_array[0] : array();
        $product_option->language_array = array();
        foreach ($product_option_array as $obj) {
            $language_id = $obj->language_id;
            $name = $obj->name;
            $product_option->language_array[$language_id] = array();
            $product_option->language_array[$language_id]['name'] = $name;
        }
        Log::info('[product_option] -- getListing : ' .json_encode($product_option));
        return $product_option;
    }
    
    function redirect_view($result,$title){
    }
}

?>