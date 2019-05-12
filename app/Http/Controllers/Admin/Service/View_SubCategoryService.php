<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;

use App\Http\Controllers\Admin\Service\BaseApiService;
     class View_SubCategoryService extends BaseApiService{
        function __construct(){
            $this->setTable('view_sub_category');
        }

        function getListing(){
            $result = DB::table($this->getTable())->where('sub_category_language_id',session('language_id'))->get();
            Log::info('['.$this->getTable().'] -- findAllByLanguage : ' . json_encode($result));
            return $result;
        }
        function redirect_view($result,$title){
        }
    }
?>