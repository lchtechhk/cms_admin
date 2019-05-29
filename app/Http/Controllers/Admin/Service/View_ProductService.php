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
        function redirect_view($result,$title){
        }
    }
?>