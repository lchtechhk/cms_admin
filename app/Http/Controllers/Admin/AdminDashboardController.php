<?php
/*
Project Name: IonicEcommerce
Project URI: http://ionicecommerce.com
Author: VectorCoder Team
Author URI: http://vectorcoder.com/
Version: 2.8
*/
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

//validator is builtin class in laravel
use Validator;

use DB;
//for password encryption or hash protected
use Hash;
use App\Administrator;

//for authenitcate login data
use Auth;

//for requesting a value 
use Illuminate\Http\Request;
//use Illuminate\Routing\Controller;

use App\Http\Controllers\Admin\Service\View_OrderService;

class AdminDashboardController extends Controller
{
	private $View_OrderService;

	function __construct(){
		$this->View_OrderService = new View_OrderService();
	}

	//listingOrderStatus
	public function dashboard(Request $request){
		$title = array('pageTitle' => 'Dashboard');		
		$result = array();
		
		$orders = $this->View_OrderService->findByColumn_Value('company_id',Session::get('default_company_id'));
			
		$recentOrders = array_slice($input, 0, 10);
		$result['recentOrders'] = $recentOrders;
		print_r($recentOrders);
		//return view("admin.dashboard",$title)->with('result', $result);
	}
	
}
