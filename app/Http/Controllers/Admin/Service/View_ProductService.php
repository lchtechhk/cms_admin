<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;

use App\Http\Controllers\Admin\Service\BaseApiService;
     class View_ProductService extends BaseApiService{
        function __construct(){
            $this->setTable('view_product');
        }

        function getListing(){
            return DB::table($this->getTable())->where('language_id',session('language_id'))->get();
        }
        function getProduct($product_id){
            $array = DB::table($this->getTable())->where('language_id',session('language_id'))->where('product_id',$product_id)->get();
            $result = !empty($array) && sizeof($array) > 0 ? $array[0] : array();
            return $result;
        }
        function redirect_view($result,$title){
        }
    }
?>