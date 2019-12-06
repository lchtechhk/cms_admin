<?php

/*
Project Name: IonicEcommerce
Project URI: http://ionicecommerce.com
Author: VectorCoder Team
Author URI: http://vectorcoder.com/
Version: 1.0
*/

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

//validator is builtin class in laravel
use Validator;
use App;
use Lang;
use Log;

use App\Admin;
use App\Root;

use DB;
//for password encryption or hash protected
use Hash;
//use App\Administrator;

//for authenitcate login data
use Auth;
use Session;
//for requesting a value 
use Illuminate\Http\Request;

use App\Http\Controllers\Admin\Service\LanguageService;
use App\Http\Controllers\Admin\Service\View_CompanyService;
use App\Http\Controllers\Admin\Service\UserService;
use App\Http\Controllers\Admin\Service\View_OrderService;

class AdminController extends Controller{
	private $LanguageService;
	private $UserService;
	private $View_CompanyService;
	private $View_OrderService;

	function __construct(){
		$this->LanguageService = new LanguageService();
		$this->UserService = new UserService();
		$this->View_CompanyService = new View_CompanyService();
		$this->View_OrderService = new View_OrderService();

	}
	public function dashboard(Request $request){
		Log::info('dashboard');
		$title 			  = 	array('pageTitle' => Lang::get("labels.title_dashboard"));
		$language_id      = 	'1';
		$result 		  =		array();
		
		$reportBase		  = 	$request->reportBase;
		
		//recently order placed
        $orders = $this->View_OrderService->findByColumn_Value('company_id',Session::get('default_company_id'));
		
			
		
		$index = 0;
		$total_price = array();

		$compeleted_orders = 0;
		$pending_orders = 0;

		
		$result['orders'] = $orders->chunk(10);
		$result['pending_orders'] = $pending_orders;
		$result['compeleted_orders'] = $compeleted_orders;
		$result['total_orders'] = count($orders);
		
		$result['inprocess'] = count($orders)-$pending_orders-$compeleted_orders;
		//add to cart orders
		
		$result['cart'] = 0;
		
		//Rencently added products
		$recentProducts = DB::table('product')
			->leftJoin('product_description','product_description.product_id','=','product.product_id')
			->where('product_description.language_id','=', $language_id)
			->orderBy('product.product_id', 'DESC')
			->paginate(8);
			
		$result['recentProducts'] = $recentProducts;
		
		//products
		$products = DB::table('product')
			->leftJoin('product_description','product_description.product_id','=','product.product_id')
			->where('product_description.language_id','=', $language_id)
			->orderBy('product.product_id', 'DESC')
			->get();
			
		//low products & out of stock
		$lowLimit = 0;
		$outOfStock = 0;
		foreach($products as $products_data){
			if($products_data->low_limit >= 1 && $products_data->quantity >= $products_data->low_limit){
				$lowLimit++;
			}elseif($products_data->quantity == 0){
				$outOfStock++;
			}
		}
		
		$result['lowLimit'] = $lowLimit;
		$result['outOfStock'] = $outOfStock;	
		$result['totalProducts'] = count($products);
		
		$result['recentCustomers'] = array();
		$result['totalCustomers'] = 0;
		$result['reportBase'] = $reportBase;	
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$currency = $myVar->getSetting();
		$result['currency'] = $currency;
		
		return view("admin.dashboard",$title)->with('result', $result);
	}
	
	
	public function login(){
		if (Auth::check()) {
		  return redirect('/admin/dashboard/this_month');
		}else{
			$title = array('pageTitle' => Lang::get("labels.login_page_name"));
			return view("admin.login",$title);
		}
	}
	
	public function admininfo(){
		$administor = administrators::all();		
		return view("admin.login",$title);
	}
	
	//login function
	public function checkLogin(Request $request){
		$validator = Validator::make(
			array(
					'email'    => $request->email,
					'password' => $request->password
				), 
			array(
					'email'    => 'required | email',
					'password' => 'required',
				)
		);
		//check validation
		if($validator->fails()){
			return redirect('admin/login')->withErrors($validator)->withInput();
		}else{
			//check authentication of email and password
			$adminInfo = array("email" => $request->email, "password" => $request->password);
			if(auth()->guard('admin')->attempt($adminInfo)) {
				$user_auth = auth()->guard('admin')->user();
				Log::info('user_auth : ' . json_encode($user_auth));
				$language_id = $user_auth->default_language;
				$user = $this->UserService->findByColumn_Value("user_id",$user_auth->user_id);
				session(['language_id' => $language_id]);
				Log::info('user : ' . json_encode($user));
				return redirect()->intended('admin/dashboard/this_month')->with('administrators', $user);
			}else{
				return redirect('admin/login')->with('loginError',Lang::get("labels.EmailPasswordIncorrectText"));
			}

		}
		
	}
	
	//logout
	public function logout(){
		Auth::guard('admin')->logout();
		return redirect()->intended('admin/login');
	}
	
	//admin profile
	public function adminProfile(Request $request){
		$title = array('pageTitle' => Lang::get("labels.Profile"));		
		
		$result = array();
		
		$countries = DB::table('countries')->get();
		$zones = DB::table('zones')->where('zone_country_id', '=', auth()->guard('admin')->user()->country)->get();
		
		$result['countries'] = $countries;
		$result['zones'] = $zones;
		
		return view("admin.adminProfile",$title)->with('result', $result);
	}
	
	//updateProfile
	public function updateProfile(Request $request){
		
		$updated_at	= date('y-m-d h:i:s');
		
		$myVar = new AdminSiteSettingController();
		$languages = $myVar->getLanguages();		
		$extensions = $myVar->imageType();
		
		if($request->hasFile('newImage') and in_array($request->newImage->extension(), $extensions)){
			$image = $request->newImage;
			$fileName = time().'.'.$image->getClientOriginalName();
			$image->move('resources/views/admin/images/admin_profile/', $fileName);
			$uploadImage = 'resources/views/admin/images/admin_profile/'.$fileName; 
		}	else{
			$uploadImage = $request->oldImage;
		}	
		
		$orders_status = DB::table('administrators')->where('myid','=', auth()->guard('admin')->user()->myid)->update([
				'user_name'		=>	$request->user_name,
				'first_name'	=>	$request->first_name,
				'last_name'		=>	$request->last_name,
				'address'		=>	$request->address,
				'city'			=>	$request->city,
				'state'			=>	$request->state,
				'zip'			=>	$request->zip,
				'country'		=>	$request->country,
				'phone'			=>	$request->phone,
				'image'			=>	$uploadImage,
				'updated_at'	=>	$updated_at
				]);
		
		$message = Lang::get("labels.ProfileUpdateMessage");
		return redirect()->back()->withErrors([$message]);
	}
	
	//updateProfile
	public function updateAdminPassword(Request $request){
		
		$orders_status = DB::table('administrators')->where('myid','=', auth()->guard('admin')->user()->myid)->update([
				'password'		=>	Hash::make($request->password)
				]);
		
		$message = Lang::get("labels.PasswordUpdateMessage");
		return redirect()->back()->withErrors([$message]);
	}

}
