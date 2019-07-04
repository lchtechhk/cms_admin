<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

class ProductOptionDescService extends BaseApiService{
    function __construct(){
        $this->setTable('product_option_description');
    }
    function redirect_view($result,$title){
    }
}

?>