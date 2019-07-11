<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\UploadService;
use App\Http\Controllers\Admin\Service\LanguageService;


class ProductAttributeDescriptionService extends BaseApiService{
    private $UploadService;
    private $LanguageService;

    function __construct(){
        $this->setTable('product_attribute_description');
        $this->LanguageService = new LanguageService();
        $this->UploadService = new UploadService();

    }

    function redirect_view($result,$title){
      
    }
}

?>