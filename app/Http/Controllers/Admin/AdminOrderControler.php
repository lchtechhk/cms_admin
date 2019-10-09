<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

//validator is builtin class in laravel
use Validator;
use App;
use Lang;
use DB;
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
use App\Http\Controllers\Admin\Service\AddressBookService;

use function GuzzleHttp\json_decode;

class AdminOrderControler extends Controller{
    private $OrderService;
    private $AddressBookService;

	public function __construct(){
		$this->OrderService = new OrderService();
	    $this->AddressBookService = new AddressBookService();
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
        $result = $this->AddressBookService->findByColumnAndId("customer_id",$customer_id);
        Log::info('[findAddressByCustomerId] --  : ' . json_encode($result));
        return $result;
    }

    function findAddressByAddressId(Request $request){
        $address_id = $request->input("address_id");
        
        $result_array = $this->AddressBookService->findByColumnAndId("id",$address_id);
        $result = array();
        if(!empty($result_array) && \sizeof($result_array) > 0){
            $result = $result_array[0];
            Log::info('[findAddressByAddressId] --  : ' . json_encode($result));
            return json_encode($result);
        }
        return null;
    }
}
