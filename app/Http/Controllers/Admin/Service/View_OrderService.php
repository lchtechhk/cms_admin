<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

class View_OrderService extends BaseApiService{

    function __construct(){
        $this->setTable('view_order');

    }

    function getListing(){
        return $this->findAll();
    }
    function redirect_view($result,$title){
    }
}

?>