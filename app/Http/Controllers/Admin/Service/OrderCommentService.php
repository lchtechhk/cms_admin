<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;


class OrderCommentService extends BaseApiService{

    function __construct(){
        $this->setTable('order_comment');

    }


    function redirect_view($result,$title){
    }
}

?>