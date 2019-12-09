<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Session;

use App\Http\Controllers\Admin\Service\BaseApiService;
     class View_SubCategoryService extends BaseApiService{
        function __construct(){
            $this->setTable('view_sub_category');
            $this->companyAuth = true;
        }

        function getListing(){
            return $this->findByArray(array('company_id'=>Session::get('default_company_id'),'sub_category_language_id' => session('language_id')));
        }
        function redirect_view($result,$title){
        }
    }
?>