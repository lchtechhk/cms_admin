<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

class View_ProductOptionValueService extends BaseApiService{

    function __construct(){
        $this->setTable('view_product_option_value');

    }

    function getListing(){
        $product_option_value_array = $this->findAllWithLanguage();
        return $product_option_value_array;
    }

    function getProductOptionValue($product_option_value_id){
        $product_option_value_array = $this->findByColumn_Value("product_option_value_id",$product_option_value_id);
        $product_option_value = !empty($product_option_value_array) && sizeof($product_option_value_array) > 0 ? $product_option_value_array[0] : array();
        $product_option_value->language_array = array();
        foreach ($product_option_value_array as $obj) {
            $language_id = $obj->language_id;
            $name = $obj->value_name;
            $product_option_value->language_array[$language_id] = array();
            $product_option_value->language_array[$language_id]['name'] = $name;
        }
        Log::info('[product_option_value] -- getListing : ' .json_encode($product_option_value));
        return $product_option_value;
    }
    
    function redirect_view($result,$title){
    }
}

?>