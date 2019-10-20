<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

//validator is builtin class in laravel
use Validator;
use App;
use Lang;
use DB;
use Exception;

//for password encryption or hash protected
use Hash;
use App\Administrator;

//for authenitcate login data
use Log;
use Auth;

//for requesting a value 
use Illuminate\Http\Request;
use function GuzzleHttp\json_encode;

use App\Http\Controllers\Admin\Service\OrderService;
use App\Http\Controllers\Admin\Service\OrderProductService;
use App\Http\Controllers\Admin\Service\OrderProductDescriptionService;
use App\Http\Controllers\Admin\Service\View_ProductAttributeService;

use App\Http\Controllers\Admin\Service\View_AddressBookService;

use function GuzzleHttp\json_decode;

class AdminOrderController extends Controller{
    private $OrderService;
    private $OrderProductService;
    private $OrderProductDescriptionService;
    private $View_ProductAttributeService;

    private $View_AddressBookService;

	public function __construct(){
        $this->OrderService = new OrderService();
        $this->OrderProductService = new OrderProductService();
        $this->OrderProductDescriptionService = new OrderProductDescriptionService();
        $this->View_ProductAttributeService = new View_ProductAttributeService();

	    $this->View_AddressBookService = new View_AddressBookService();
	}
	
	function listingOrder(Request $request){
        $title = array('pageTitle' => Lang::get("labels.ListOrder"));
        $result = array();
		$result['operation'] = 'listing';
		Log::info('[listing] --  : ');
		return $this->OrderService->redirect_view($result,$title);
    }

    function view_addOrder(Request $request){
        $title = array('pageTitle' => Lang::get("labels.view_addOrder"));
        $result = array();
		$result['request'] = $request;
        $result['operation'] = 'view_add';
		return $this->OrderService->redirect_view($result,$title);
    }

    function view_editOrder(Request $request){
        $title = array('pageTitle' => Lang::get("labels.view_editOrder"));
        $result = array();
        $result['request'] = $request;
        $result['order_id'] = $request->order_id;
        $result['operation'] = 'view_edit';
		return $this->OrderService->redirect_view($result,$title);
    }

    function addOrder(Request $request){
        $title = array('pageTitle' => Lang::get("labels.addOrder"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'add';
        // Log::info('[result] --  : ' . json_encode($result));
        return $this->OrderService->redirect_view($result,$title);
    }

    function addOrderProduct(Request $request){
        $title = array('pageTitle' => Lang::get("labels.addOrderProduct"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'add_product';
        return $this->OrderService->redirect_view($result,$title);
    }

    function updateOrder(Request $request){
        $title = array('pageTitle' => Lang::get("labels.updateOrder"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'edit';
        return $this->OrderService->redirect_view($result,$title);
    }

    function updateOrderProduct(Request $request){
        $title = array('pageTitle' => Lang::get("labels.updateOrderProduct"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'edit_product';
        return $this->OrderService->redirect_view($result,$title);
    }

    function deleteOrderProduct(Request $request){
        $title = array('pageTitle' => Lang::get("labels.deleteOrderProduct"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'delete_product';
        return $this->OrderService->redirect_view($result,$title);
    }

    function deleteOrder(Request $request){
        $title = array('pageTitle' => Lang::get("labels.deleteOrder"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'delete';
        return $this->OrderService->redirect_view($result,$title);
    }
    
    function part_customer_address(Request $request){
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['order_id'] = $request->order_id;
        $result['operation'] = 'part_customer_address';
        return $this->OrderService->redirect_view($result,"");
    }

    function part_edit_product(Request $request){
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['order_product'] = json_decode($request->order_product);
        $result['operation'] = 'part_edit_product';
        Log::info('[result] --  : ' . json_encode($result));
        return $this->OrderService->redirect_view($result,"");
    }

     // function getAPI($customer_id){
    //     $result = array();
    //     Log::info('[customer_id] --  : ' . $customer_id);
    // }

    function findAddressByCustomerId(Request $request){
        $customer_id = $request->input("customer_id");
        $result = $this->View_AddressBookService->findByColumnAndId("customer_id",$customer_id);
        Log::info('[findAddressByCustomerId] --  : ' . json_encode($result));
        return $result;
    }

    function findAddressByAddressId(Request $request){
        $address_id = $request->input("address_id");
        
        $result_array = $this->View_AddressBookService->findByColumnAndId("id",$address_id);
        $result = array();
        if(!empty($result_array) && \sizeof($result_array) > 0){
            $result = $result_array[0];
            Log::info('[findAddressByAddressId] --  : ' . json_encode($result));
            return json_encode($result);
        }
        return null;
    }

    function createOrder(Request $request){
        $customer_address_obj = $request->input("customer_address_obj");
        $shipping_address_obj = $request->input("shipping_address_obj");
        $order_obj = $request->input("order_obj");

        $order_product_array = !empty($request->input("order_product_array")) && sizeof($request->input("order_product_array")) > 0 ? $request->input("order_product_array") : array();
        $product_item_size = sizeof($order_product_array);

        $order_obj = array_merge($customer_address_obj,$shipping_address_obj,$order_obj);
        // Log::info('[customer_address_obj] --  : ' . json_encode($customer_address_obj));
        // Log::info('[shipping_address_obj] --  : ' . json_encode($shipping_address_obj));
        // Log::info('[order_product_array] --  : ' . json_encode($order_product_array));
        // Log::info('[order_obj] --  : ' . json_encode($order_obj));
        try{ 
            DB::beginTransaction();
            $add_order_result = $this->OrderService->add($order_obj);
            if(empty($add_order_result['status']) || $add_order_result['status'] == 'fail')throw new Exception("Error To Add Order");
            $order_id = $add_order_result['response_id'];


            $order_price = 0;
            foreach ($order_product_array as $index => $product_param) {
                $final_price = $product_param['final_price'];
                $product_attribute_id = $product_param['product_attribute_id'];
                // Add Product
                $product_param['order_id'] = $add_order_result['response_id'];
                $add_order_product_result = $this->OrderProductService->add($product_param);
                if(empty($add_order_product_result['status']) || $add_order_product_result['status'] == 'fail')throw new Exception("Error To Add Order");
                $order_product_id = $add_order_product_result['response_id'];
                // Add Product Description 
                $add_orderDescription = $this->View_ProductAttributeService->send_to_orderDescription($order_id,$order_product_id,$product_attribute_id);
                if(empty($add_orderDescription['status']) || $add_orderDescription['status'] == 'fail')throw new Exception("Error To Add Order Item Description");
                // Calculator order_price
                $order_price += $final_price;
            }
                //Update Order
                if($product_item_size > 0){                
                    $update_order_param = array('order_id'=>$order_id,'order_price'=>$order_price);
                    $update_product_result = $this->OrderService->update("order_id",$update_order_param);
                    if(empty($update_product_result['status']) || $update_product_result['status'] == 'fail')throw new Exception("Error To Update Order");
                }
            DB::commit();
        }catch(Exception $e){
           $this->View_ProductAttributeService->throwException(array(),$e->getMessage(),true);
        }	
    }
}
