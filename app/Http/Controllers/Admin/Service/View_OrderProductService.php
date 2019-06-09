<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

class View_OrderProductService extends BaseApiService{

    function __construct(){
        $this->setTable('view_order_product');
    }
    function redirect_view($result,$title){
    }
}

?>