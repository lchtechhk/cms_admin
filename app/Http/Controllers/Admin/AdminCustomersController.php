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
use App;
use Lang;
use DB;
//for password encryption or hash protected
use Hash;
use App\Administrator;

use Log;
//for authenitcate login data
use Auth;
//for redirect
use Illuminate\Support\Facades\Redirect;

//for requesting a value 
use Illuminate\Http\Request;

use App\Http\Controllers\Admin\Service\CustomersService;
use App\Http\Controllers\Admin\Service\View_CustomersService;

use App\Http\Controllers\Admin\Service\UploadService;
use App\Http\Controllers\Admin\Service\CountryService;

use function GuzzleHttp\json_encode;

class AdminCustomersController extends Controller{
	private $CustomersService;
	private $View_CustomersService;
	private $UploadService;
	private $CountryService;
	public function __construct(){
		$this->CustomersService = new CustomersService();
		$this->View_CustomersService = new View_CustomersService();
		$this->UploadService = new UploadService();
		$this->CountryService = new CountryService();
	}

	//listingCustomer
	public function listingCustomer(Request $request){
		$title = array('pageTitle' => Lang::get("labels.ListingCustomers"));
		$result = array();
		$result['operation'] = 'listing';
		return $this->CustomersService->redirect_view($result,$title);
	}

	//view_AddCustomer
	public function view_addCustomer(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddCustomer"));
		$result = array();
		$result['request'] = $request;
		$result['operation'] = 'view_add';
		return $this->CustomersService->redirect_view($result,$title);
	}

	//view_editCustomer
	public function view_editCustomer(Request $request){
		$title = array('pageTitle' => Lang::get("labels.EditCustomer"));
		$request['customers_picture'] = $this->UploadService->upload_image($request,'newImage','resources/assets/images/user_profile/');
		$result = array();
		$result['request'] = $request;
		$result['operation'] = 'view_edit';
		return $this->CustomersService->redirect_view($result,$title);
	}

	//add addcustomers page
	public function addCustomer(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddCustomer"));
		$result = array();
		$result = $request->input();
		$result['request'] = $request;
		$result['operation'] = 'add';
		return $this->CustomersService->redirect_view($result,$title);
	}
	
	//edit updateCustomer
	public function updateCustomer(Request $request){
		$title = array('pageTitle' => Lang::get("labels.EditCustomer"));
		$result = array();
		$result = $request->input();
		$result['request'] = $request;
		$result['operation'] = 'edit';
		return $this->CustomersService->redirect_view($result,$title);
	}

	//deleteProduct
	public function deleteCustomer(Request $request){
		$title = array('pageTitle' => Lang::get("labels.DeleteCustomer"));
		$result = array();
		$result = $request->input();
		$result['request'] = $request;
		$result['operation'] = 'delete';
		return $this->CustomersService->redirect_view($result,$title);

	}

}
