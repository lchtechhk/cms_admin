<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\LanguageService;
use App\Http\Controllers\Admin\Service\UploadService;
use function GuzzleHttp\json_encode;

class OrderService extends BaseApiService{
    private $LanguageService;
    private $UploadService;
    private $View_OrderService;

    function __construct(){
        $this->setTable('order');
        $this->LanguageService = new LanguageService();
        $this->UploadService = new UploadService();
        $this->View_OrderService = new View_OrderService();

    }

    function redirect_view($result,$title){
        $result['languages'] = $this->LanguageService->findAll();
        $result['label'] = "Order";
        switch($result['operation']){
            case 'listing':
                $result['orders'] = array();
                // $result['orders'] = $this->View_OrderService->getListing();
                Log::info('[listing] --  : ' . \json_encode($result));
                return view("admin.order.listingOrder", $title)->with('result', $result);
            break;
            case 'view_add':
                Log::info('[view_add] --  : ');
                return view("admin.order.viewOrder", $title)->with('result', $result);
            break;
            case 'view_edit':
                Log::info('[view_edit] --  : ');
                return view("admin.order.viewOrder", $title)->with('result', $result);
            break;
            case 'add':
                try{
                    DB::beginTransaction();
                    Log::info('[add] --  : ');
                    DB::commit();
                    return view("admin.order.viewOrder", $title)->with('result', $result);
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                    return view("admin.order.viewOrder", $title)->with('result', $result);
                }
            break;
            case 'edit':
                try{
                    DB::beginTransaction();
                    Log::info('[edit] --  : ');
                    DB::commit();
                    return view("admin.order.viewOrder", $title)->with('result', $result);
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                    return view("admin.order.viewOrder", $title)->with('result', $result);
                }		
            break;
            case 'delete': 
                try{
                    Log::info('[delete] --  : ');
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }	
                
                return view("admin.order.listingOrder", $title)->with('result', $result);
            break;
        }
    }
}

?>