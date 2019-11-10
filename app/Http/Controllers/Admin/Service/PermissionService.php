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
        $this->setTable('cms.permission');
        $this->UploadService = new UploadService();
    }

    function redirect_view($result,$title){
 

        switch($result['operation']){
            case 'listing':
                Log::info('[listing] --  : ' . \json_encode($result));
            break;
            case 'view_add':
                $result['order'] =  array();
                Log::info('[view_add] --  : ' . json_encode($result['order']));
         
            break;
            case 'view_edit':
                Log::info('[view_edit] --  : ' . \json_encode($result));
 
            break;
            case 'add':

            break;
            case 'edit':
     
            break;
            case 'add_product':
 
            break;
            case 'edit_product':
     
            break;
            case 'delete_product':
                Log::info('[delete_product] --  : '. \json_encode($result));
                
            break;
            case 'delete': 
                    Log::info('[delete] --  : ');

            break;

            
        }
    }
}

?>