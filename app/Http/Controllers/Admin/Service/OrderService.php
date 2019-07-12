<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\LanguageService;
use App\Http\Controllers\Admin\Service\UploadService;
use App\Http\Controllers\Admin\Service\OrderProductService;
use App\Http\Controllers\Admin\Service\View_OrderProductService;
use App\Http\Controllers\Admin\Service\OrderCommentService;
use function GuzzleHttp\json_encode;

class OrderService extends BaseApiService{
    private $LanguageService;
    private $UploadService;
    private $View_OrderService;
    private $OrderProductService;
    private $View_OrderProductService;
    private $OrderCommentService;

    function __construct(){
        $this->setTable('cms.order');
        $this->LanguageService = new LanguageService();
        $this->UploadService = new UploadService();
        $this->View_OrderService = new View_OrderService();
        $this->OrderProductService = new OrderProductService();
        $this->View_OrderProductService = new View_OrderProductService();
        $this->OrderCommentService = new OrderCommentService();

    }

    function getOrder($order_id){
        $order_array = $this->findByColumnAndId("order_id",$order_id);
        $order = !empty($order_array) && sizeof($order_array) > 0 ? $order_array[0] : array();
        $order_product_array = $this->View_OrderProductService->findByColumnAndId("order_id",$order_id);
        $order_comment_array = $this->OrderCommentService->findByColumnAndId("order_id",$order_id);
        $order->order_products = $order_product_array;
        $order->order_comments = $order_comment_array;
        Log::info('[order] -- getListing : ' .json_encode($order));
        return $order;
    }

    function redirect_view($result,$title){
        $result['languages'] = $this->LanguageService->findAll();
        $result['label'] = "Order";
        switch($result['operation']){
            case 'listing':
                $result['orders'] = $this->findAll();
                Log::info('[listing] --  : ' . \json_encode($result));
                return view("admin.order.listingOrder", $title)->with('result', $result);
            break;
            case 'view_add':
                Log::info('[view_add] --  : ');
                $result['order'] =  array();
                return view("admin.order.addOrder", $title)->with('result', $result);
            break;
            case 'view_edit':
                Log::info('[view_edit] --  : ');
                $result['order'] = $this->getOrder($result['order_id']);
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
                    $update_order_result = $this->update("order_id",$result);
                    if(empty($update_order_result['status']) || $update_order_result['status'] == 'fail')throw new Exception("Error To Update Order");
                    $result = $this->response($result,"Successful","view_edit");
                    $result['order'] = $this->getOrder($result['order_id']);
                    DB::commit();
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }		
                // Log::info('[edit] --  : ' . \json_encode($result));
                return view("admin.order.viewOrder", $title)->with('result', $result);
            break;
            case 'delete': 
                try{
                    Log::info('[delete] --  : ');
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }	
                return view("admin.order.listingOrder", $title)->with('result', $result);
            break;
            case 'view_address':
                $result['order'] = $this->getOrder($result['order_id']);
                error_log(\json_encode($result));
                return view("admin.order.view_order_address_part")->with('result', $result);
            break;
        }
    }
}

?>