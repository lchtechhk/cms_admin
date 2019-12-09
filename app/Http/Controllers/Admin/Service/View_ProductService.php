<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Session;

use App\Http\Controllers\Admin\Service\BaseApiService;
     class View_ProductService extends BaseApiService{
        function __construct(){
            $this->setTable('view_product');
            $this->companyAuth = true;
        }

        function getListing(){
            return $this->findByColumn_ValueWithLanguage('company_id',Session::get('default_company_id'));
        }

        function getProduct($product_id){
            $array = $this->findByColumn_ValueWithLanguage('product_id',$product_id);
            $result = !empty($array) && sizeof($array) > 0 ? $array[0] : array();
            return $result;
        }
        function redirect_view($result,$title){
        }
    }
?>