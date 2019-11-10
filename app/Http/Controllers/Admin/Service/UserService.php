<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\UploadService;
use App\Http\Controllers\Admin\Service\LanguageService;
use App\Http\Controllers\Admin\Service\PermissionService;

class UserService extends BaseApiService{
    private $UploadService;
    private $LanguageService;
    private $PermissionService;

    function __construct(){
        $this->setTable('user');
        $this->LanguageService = new LanguageService();
        $this->UploadService = new UploadService();
        $this->PermissionService = new PermissionService();

    }

    function redirect_view($result,$title){
        $result['label'] = "User";
        $result['permissions'] = $this->PermissionService->findAll();

        switch($result['operation']){
            case 'listing':
                Log::info('[listing] --  : ' . \json_encode($result));
                $result['users'] = $this->findAll();
                return view("admin.user.listingUser", $title)->with('result', $result);
            break;
            case 'view_add':
                Log::info('[view_add] --  : ' . \json_encode($result));
                return view("admin.user.viewUser", $title)->with('result', $result);
            break;
            case 'view_edit':
                Log::info('[view_edit] --  : ' . \json_encode($result));
                return view("admin.user.viewUser", $title)->with('result', $result);
            break;
            case 'add':
                 Log::info('[add] --  : '. \json_encode($result));
               
            break;
            case 'edit':
                Log::info('[edit] --  : ' . \json_encode($result));
            break;
            case 'delete': 
                Log::info('[delete] --  : ');
            break;
        }
    }
}

?>