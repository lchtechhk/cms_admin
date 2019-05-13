<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;


class SubCategoryDescriptionService extends BaseApiService{


    function __construct(){
        $this->setTable('sub_category_description');

    }

    function redirect_view($result,$title){
    }
}

?>