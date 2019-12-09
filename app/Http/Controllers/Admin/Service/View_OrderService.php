<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;
use Session;

class View_OrderService extends BaseApiService{

    function __construct(){
        $this->setTable('view_order');
        $this->companyAuth = true;

    }

    function getListing(){
        return $this->findByColumn_Value('company_id',Session::get('default_company_id'));
    }
    function redirect_view($result,$title){
    }
}

?>