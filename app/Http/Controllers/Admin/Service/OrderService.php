<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\LanguageService;
use App\Http\Controllers\Admin\Service\UploadService;
use App\Http\Controllers\Admin\Service\View_ProductAttributeService;
use App\Http\Controllers\Admin\Service\OrderProductService;
use App\Http\Controllers\Admin\Service\OrderProductDescriptionService;
use App\Http\Controllers\Admin\Service\View_OrderProductService;
use App\Http\Controllers\Admin\Service\OrderCommentService;
use function GuzzleHttp\json_encode;

class OrderService extends BaseApiService{
    private $LanguageService;
    private $UploadService;
    private $View_OrderService;
    private $OrderProductService;
    private $OrderProductDescriptionService;
    private $View_OrderProductService;
    private $View_ProductAttributeService;
    private $OrderCommentService;

    function __construct(){
        $this->setTable('cms.order');
        $this->LanguageService = new LanguageService();
        $this->UploadService = new UploadService();
        $this->View_OrderService = new View_OrderService();
        $this->OrderProductDescriptionService = new OrderProductDescriptionService();
        $this->OrderProductService = new OrderProductService();
        $this->View_OrderProductService = new View_OrderProductService();
        $this->OrderCommentService = new OrderCommentService();
        $this->View_ProductAttributeService = new View_ProductAttributeService();
    }

    function update_order_total_price($order_id){
        $order_array = $this->findByColumnAndId("order_id",$order_id);
        $order = !empty($order_array) && sizeof($order_array) > 0 ? $order_array[0] : array();

        $order_product_array = $this->View_OrderProductService->findByColumnAndId("order_id",$order_id);

        $original_total_price = $order->order_price;
        $total_price = 0;
        foreach ($order_product_array as $p) {
            $final_price = $p->final_price;
            $total_price += $final_price;
        }
        if($original_total_price != $total_price ){
            $data = array();
            $data['order_id'] = $order_id;
            $data['order_price'] = $total_price;
            Log::info('[$this->getTable()] --  : ' . $this->getTable());

            Log::info('order_id : ' .$order_id);
            Log::info('original_total_price : ' .$original_total_price);
            Log::info('total_price : ' .$total_price);
            $update_order_result = $this->update("order_id",$data);
            if(empty($update_order_result['status']) || $update_order_result['status'] == 'fail')throw new Exception("Error To Update Order");
        }
    }
    function getOrder($order_id){
        $order_array = $this->findByColumnAndId("order_id",$order_id);
        $order = !empty($order_array) && sizeof($order_array) > 0 ? $order_array[0] : array();
        $order_product_array = $this->View_OrderProductService->findByColumnWithLanguage("order_id",$order_id);
        $order_comment_array = $this->OrderCommentService->findByColumnAndId("order_id",$order_id);
        $order->order_products = $order_product_array;
        $order->order_comments = $order_comment_array;
        Log::info('[order] -- getListing : ' .json_encode($order));
        return $order;
    }

    function addOrderProduct($result){
        $product = array();
        $product_description = array();
        $product['order_id'] = $result['order_id'];
        $product['product_price'] = $result['product_price'];
        $product['product_quantity'] = $result['product_quantity'];
        $product['final_price'] = $result['final_price'];
        $product['product_attribute_id'] = $result['product_attribute_id'];
        try{
            $inset_order_product_result = $this->OrderProductService->add($product);
            if(empty($inset_order_product_result['status']) || $inset_order_product_result['status'] == 'fail')throw new Exception("Error To Inset Order Product");
            $product_description['order_product_id'] = $inset_order_product_result['response_id'];
            $product_description['language_id'] = 1;
            $product_description['product_id'] = 1;
            $product_description['product_attribute_id'] = $product['product_attribute_id'];
            $product_description['product_name'] = "product_name";
            $product_description['product_attribute_name'] = "product_attribute_name";
            $product_description['description'] = "description";
            $inset_order_product_desc_result = $this->OrderProductDescriptionService->add($product_description);
            if(empty($inset_order_product_desc_result['status']) || $inset_order_product_desc_result['status'] == 'fail')throw new Exception("Error To Inset Order Product Description");
            return true;
        }catch(Exception $e){
            Log::error('addOrderProduct' . $e->getMessage());
        }
        return false;
    }
    function redirect_view($result,$title){
        $result['languages'] = $this->LanguageService->findAll();
        $result['label'] = "Order";
        $result['product_attributes'] = $this->View_ProductAttributeService->getAllProduct();
        // error_log("abcd : " . $result['operation']);
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
            case 'add_product':
                try{
                    DB::beginTransaction();
                    $a = $this->addOrderProduct($result);
                    Log::info('[add_product] --  : ' . $a);
                    // $update_order_product_result = $this->OrderProductService->update("order_product_id",$result);
                    // if(empty($update_order_product_result['status']) || $update_order_product_result['status'] == 'fail')throw new Exception("Error To Update Order Product");
                    // $update_order_result = $this->update_order_total_price($result['order_id']);

                    // $result = $this->response($result,"Successful","view_edit");
                    // $result['order'] = $this->getOrder($result['order_id']);
                    DB::commit();
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }		
                // Log::info('[edit] --  : ' . \json_encode($result));
            // return view("admin.order.viewOrder", $title)->with('result', $result);
            break;
            case 'edit_product':
                try{
                    DB::beginTransaction();
                    $update_order_product_result = $this->OrderProductService->update("order_product_id",$result);
                    if(empty($update_order_product_result['status']) || $update_order_product_result['status'] == 'fail')throw new Exception("Error To Update Order Product");
                    $update_order_result = $this->update_order_total_price($result['order_id']);

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
            // case 'part_customer_address':
            //     $result['order'] = $this->getOrder($result['order_id']);
            //     Log::info('[part_customer_address] --  : ' . \json_encode($result));
            //     return view("admin.order.dialog_customer_address")->with('result', $result);
            // break;
            case 'part_edit_product':
                return view("admin.order.dialog_edit_product")->with('result', $result);
            break;
            
        }
    }
}

?>