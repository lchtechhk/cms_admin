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
            return $this->findAllByLanguage(session('language_id') );
        }
        function redirect_view($result,$title){
        }
    }
?>