<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\LanguageService;
use App\Http\Controllers\Admin\Service\UploadService;
use function GuzzleHttp\json_encode;

class OrderProductDescriptionService extends BaseApiService{
    private $LanguageService;
    private $UploadService;

    function __construct(){
        $this->setTable('order_product_description');
        $this->LanguageService = new LanguageService();
        $this->UploadService = new UploadService();
    }


    function redirect_view($result,$title){
    }
}

?>