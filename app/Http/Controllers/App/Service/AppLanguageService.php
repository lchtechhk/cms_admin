<?php
namespace App\Http\Controllers\App\Service;
use Log;
use DB;
use Lang;
use Exception;

     class AppLanguageService extends AppBaseApiService{

        function __construct(){
            $this->setTable('languages');
        }
    }
?>