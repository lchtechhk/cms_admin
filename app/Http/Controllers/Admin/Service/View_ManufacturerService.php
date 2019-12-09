<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;
use Session;
class View_ManufacturerService extends BaseApiService{

    function __construct(){
        $this->setTable('view_manufacturer');
        $this->companyAuth = true;
    }

    function getListing(){
        return $this->findAllWithLanguage();
    }
    function redirect_view($result,$title){
    }
}

?>