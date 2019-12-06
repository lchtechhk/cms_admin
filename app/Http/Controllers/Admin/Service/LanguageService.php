<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

     class LanguageService extends BaseApiService{

        function __construct(){
            $this->setTable('languages');
        }
        function redirect_view($result,$title){
        }
    }
?>