<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

class View_ProductOptionService extends BaseApiService{

    function __construct(){
        $this->setTable('view_product_option');

    }

    function getListing(){
        $product_option_array = $this->findAllWithLanguage();
        return $product_option_array;
    }

    function getProductOption($product_option_id){
        $product_option_array = $this->findByColumn_Value("product_option_id",$product_option_id);
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