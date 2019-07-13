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

class AdminOrderControler extends Controller{
    private $OrderService;

	public function __construct(){
		$this->OrderService = new OrderService();
	
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

    function updateOrder(Request $request){
        $title = array('pageTitle' => Lang::get("labels.updateOrder"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'edit';
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
        $result['operation'] = 'part_customer_address';
        return $this->OrderService->redirect_view($result,"");
    }
}
