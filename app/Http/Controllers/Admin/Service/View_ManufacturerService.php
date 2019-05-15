<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

class View_ManufacturerService extends BaseApiService{

    function __construct(){
        $this->setTable('view_manufacturer');

    }

    function getListing(){
        return $this->findAllByLanguage(session('language_id') );
    }
    function redirect_view($result,$title){
    }
}

?>