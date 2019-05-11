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
        function getDefault_languageId(){
            $result = $this->findByColumnAndId('is_default',1);
            $languageId = $result[0]->languages_id;
            return $languageId;
        }
        function redirect_view($result,$title){
        }
    }
?>