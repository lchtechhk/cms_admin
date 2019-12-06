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

    }

    function getListing(){
        return $this->findByColumn_ValueWithLanguage('company_id',Session::get('default_company_id'));
    }
    function redirect_view($result,$title){
    }
}

?>