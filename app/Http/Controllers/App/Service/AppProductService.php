<?php
namespace App\Http\Controllers\App\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\App\Service\AppUploadService;
use App\Http\Controllers\App\Service\AppLanguageService;

use function GuzzleHttp\json_encode;

class AppProductService extends AppBaseApiService{
    private $AppLanguageService;
    private $AppUploadService;


    function __construct(){
        $this->setTable('product');
        $this->companyAuth = true;
        $this->AppLanguageService = new AppLanguageService();
    }

    function getProductList(){
        return $this->findAll();
    }
}

?>