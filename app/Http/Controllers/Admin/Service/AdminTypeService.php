<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\UploadService;

use function GuzzleHttp\json_encode;

class PermissionService extends BaseApiService{
    private $UploadService;


    function __construct(){
        $this->setTable('cms.admin_type');
        $this->UploadService = new UploadService();
    }

    function redirect_view($result,$title){

    }
}

?>