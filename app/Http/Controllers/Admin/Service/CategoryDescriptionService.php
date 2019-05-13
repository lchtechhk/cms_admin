<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

class CategoryDescriptionService extends BaseApiService{

    function __construct(){
        $this->setTable('category_description');


    }
    function updateByLangAndId($id,$language){
        
    }
    function redirect_view($result,$title){
    }
}

?>