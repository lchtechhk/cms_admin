<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

class ManufacturerDescriptionService extends BaseApiService{
    function __construct(){
        $this->setTable('manufacturer_description');
    }
    function redirect_view($result,$title){
    }
}

?>