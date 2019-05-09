<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;

use App\Http\Controllers\Admin\Service\BaseApiService;
     class View_CategoryService extends BaseApiService{
        function __construct(){
            $this->setTable('view_category');
        }

        function getListing(){
            $result = DB::table($this->getTable())
            ->where('status','=','active')
            ->orderBy('category_id','ASC')
            ->get();
            return $result;
        }
        function redirect_view($result,$title){
        }
    }
?>