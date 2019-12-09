<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;

use App\Http\Controllers\Admin\Service\BaseApiService;
     class View_CategoryService extends BaseApiService{
        function __construct(){
            $this->setTable('view_category');
            $this->companyAuth = true;
        }

        function getListing(){
            return $this->findAllWithLanguage();
        }
        function redirect_view($result,$title){
        }
    }
?>