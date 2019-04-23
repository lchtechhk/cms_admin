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

use App\Http\Controllers\Admin\Service\AddressBookService;


class AdminCustomersController extends Controller{
	private $AddressBookService;
	private $CustomersService;
	private $View_CustomersService;
	private $UploadService;
	private $CountryService;
	public function __construct(){
		$this->CustomersService = new CustomersService();
		$this->View_CustomersService = new View_CustomersService();
		$this->UploadService = new UploadService();
		$this->CountryService = new CountryService();
		$this->AddressBookService = new AddressBookService();
	}

	//add listingCustomer
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
		$result['operation'] = 'add';
		return $this->CustomersService->redirect_view($result,$title);
	}

	//view_AddAddress
	public function listingCustomerAddress(Request $request){
		$title = array('pageTitle' => Lang::get("labels.ListingCustomerAddress"));
				
		$language_id            				=   $request->language_id;
		$customer_id            				=   $request->id;		
		
		$result = array();
		$result['operation'] = 'listing';
		$result['customer_id'] = $customer_id;
		// $customer_addresses = DB::table('address_book')
		// 	->leftJoin('zones', 'zones.zone_id', '=', 'address_book.entry_zone_id')
		// 	->leftJoin('countries', 'countries.countries_id', '=', 'address_book.entry_country_id')
		// 	->where('customers_id', '=', $customers_id)->get();	

		return $this->AddressBookService->redirect_view($result,$title);
	}

	//add Customer address
	public function addNewCustomerAddress(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddCustomerAddress"));
		$customer_id            				=   $request->id;		

		$result = $this->AddressBookService->add($request,"labels.AddressAddedMessage","labels.AddressAddedMessageFail");
		$result['customer_id'] = $customer_id;
		// return $this->AddressBookService->redirect_view($result,$title);

		// $address_id = DB::table('address_book')->insertGetId([
		// 				'customers_id'   		=>   $request->customers_id,
		// 				'entry_gender'		 	=>   $request->entry_gender,
		// 				'entry_company'		 	=>   $request->entry_company,
		// 				'entry_firstname'	 	=>	 $request->entry_firstname,
		// 				'entry_lastname'   		=>   $request->entry_lastname,
		// 				'entry_street_address'	=>   $request->entry_street_address,
		// 				'entry_suburb' 			=>   $request->entry_suburb,
		// 				'entry_postcode'	 	=>	 $request->entry_postcode,
		// 				'entry_city'   			=>   $request->entry_city,
		// 				'entry_state'		 	=>   $request->entry_state,
		// 				'entry_country_id'		=>   $request->entry_country_id,
		// 				'entry_zone_id'	 		=>	 $request->entry_zone_id
		// 				]);
						
		// //set default address
		// if($request->is_default=='1'){
		// 		DB::table('customers')->where('customers_id','=', $request->customers_id)->update([
		// 				'customers_default_address_id'		 	=>   $address_id
		// 				]);
		// }
		
		// $customer_addresses = DB::table('address_book')
		// 	->leftJoin('zones', 'zones.zone_id', '=', 'address_book.entry_zone_id')
		// 	->leftJoin('countries', 'countries.countries_id', '=', 'address_book.entry_country_id')
		// 	->where('customers_id', '=', $request->customers_id)->get();
		// 	return ($customer_addresses);
	}

	//view_EditArea
	public function view_editCustomer(Request $request){
		$title = array('pageTitle' => Lang::get("labels.EditCustomer"));
		$this->UploadService->upload_image($request,'resources/assets/images/user_profile/');
		$result = array();
		$result['request'] = $request;
		$result['operation'] = 'edit';
		return $this->CustomersService->redirect_view($result,$title);
	}
	//add addcustomers page
	public function addNewCustomer(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddCustomer"));
		$email = $request['email'];
		$id = $request['id'];
		$own_email_count = $this->View_CustomersService->getCountByEmailAndId($email,$id);
		$duplicate_email_count = $this->View_CustomersService->getCountForEmailExisting($email,$id);
		Log::info('id : ' . $id);
		Log::info('own_email_count : ' . $own_email_count);
		Log::info('duplicate_email_count : ' . $duplicate_email_count);

		if($own_email_count > 1 ){
			unset($request['email']);
		}else if($own_email_count == 0 && $duplicate_email_count > 0){
			$result['request'] = $request;
			$result['operation'] = 'add';
			$result['status'] = 'fail';
			$result['message'] =  'Update Error, The Email Is Duplicate In DB';
			return $this->CustomersService->redirect_view($result,$title);
		}
		$this->UploadService->upload_image($request,'resources/assets/images/user_profile/');
		$result = $this->CustomersService->add($request,"labels.AreaAddedMessage","labels.AreaAddedMessageFail");
		return $this->CustomersService->redirect_view($result,$title);
	}
	
	//edit updateCustomer
	public function updateCustomer(Request $request){
		$title = array('pageTitle' => Lang::get("labels.EditCustomer"));
		$email = $request['email'];
		$id = $request['id'];
		$own_email_count = $this->View_CustomersService->getCountByEmailAndId($email,$id);
		$duplicate_email_count = $this->View_CustomersService->getCountForEmailExisting($email,$id);
		if($own_email_count > 1 ){
			unset($request['email']);
		}else if($own_email_count == 0 && $duplicate_email_count > 0){
			$result['request'] = $request;
			$result['operation'] = 'edit';
			$result['status'] = 'fail';
			$result['message'] =  'Update Error, The Email Is Duplicate In DB';
			return $this->CustomersService->redirect_view($result,$title);
		}
		$this->UploadService->upload_image($request,'resources/assets/images/user_profile/');
		$result = $this->CustomersService->update($request,"labels.CustomerAddedMessage","labels.CustomerAddedMessageFail");
		return $this->CustomersService->redirect_view($result,$title);
	}
	//add addcustomers data and redirect to address
	// public function addNewCustomer(Request $request){
				
	// 	$language_id            				=   '1';
		
	// 	//get function from other controller
	// 	$myVar = new AdminSiteSettingController();	
	// 	$extensions = $myVar->imageType();			
		
	// 	$customerData = array();
	// 	$message = array();
	// 	$errorMessage = array();
		
	// 	//check email already exists
	// 	$existEmail = DB::table('customers')->where('email', '=', $request->email)->get();
	// 	if(count($existEmail)>0){
	// 		$title = array('pageTitle' => 'Add Customer');
			
	// 		$customerData['message'] = $message;
	// 		$customerData['errorMessage'] = 'Email address already exist.';
	// 		return view("admin.addcustomers",$title)->with('customers', $customerData);
	// 	}else{
						
	// 		if($request->hasFile('newImage') and in_array($request->newImage->extension(), $extensions)){
	// 			$image = $request->newImage;
	// 			$fileName = time().'.'.$image->getClientOriginalName();
	// 			$image->move('resources/assets/images/user_profile/', $fileName);
	// 			$customers_picture = 'resources/assets/images/user_profile/'.$fileName; 
	// 		}	else{
	// 			$customers_picture = '';
	// 		}			
			
	// 		$customers_id = DB::table('customers')->insertGetId([
	// 					'customers_gender'   		 	=>   $request->customers_gender,
	// 					'customers_firstname'		 	=>   $request->customers_firstname,
	// 					'customers_lastname'		 	=>   $request->customers_lastname,
	// 					'customers_dob'	 			 	=>	 $request->customers_dob,
	// 					'customers_gender'   		 	=>   $request->customers_gender,
	// 					'email'	 	=>   $request->email,
	// 					'customers_default_address_id' 	=>   $request->customers_default_address_id,
	// 					'customers_telephone'	 		=>	 $request->customers_telephone,
	// 					'customers_fax'   				=>   $request->customers_fax,
	// 					'password'		 				=>   Hash::make($request->password),
	// 					'isActive'		 	 			=>   $request->isActive,
	// 					'customers_picture'	 			=>	 $customers_picture,
	// 					'created_at'					 =>	 time()
	// 					]);
					
	// 		return redirect('admin/addaddress/'.$customers_id);		
	// 	}
	// }
	
	

	
	//edit Customers address
	public function editAddress(Request $request){
				
		$customers_id            =   $request->customers_id;	
		$address_book_id         =   $request->address_book_id;	
		
		$customer_addresses = DB::table('address_book')
			->leftJoin('zones', 'zones.zone_id', '=', 'address_book.entry_zone_id')
			->leftJoin('countries', 'countries.countries_id', '=', 'address_book.entry_country_id')
			->where('address_book_id', '=', $address_book_id)->get();	
		
		$countries = DB::table('countries')->get();	
		$zones = DB::table('zones')->where('zone_country_id','=', $customer_addresses[0]->entry_country_id)->get();
		
		$customers = DB::table('customers')->where('customers_id','=', $customers_id)->get();	
		
		$customerData['customers_id'] = $customers_id;	
		$customerData['customer_addresses'] = $customer_addresses;	
		$customerData['countries'] = $countries;
		$customerData['zones'] = $zones;
		$customerData['customers'] = $customers;
		
		return view("admin/editAddressForm")->with('data', $customerData);
	}
	
	//update Customers address
	public function updateAddress(Request $request){
				
		$customers_id            =   $request->customers_id;	
		$address_book_id         =   $request->address_book_id;	
		
		 DB::table('address_book')->where('address_book_id','=', $address_book_id)->update([
				'entry_gender'		 	=>   $request->entry_gender,
				'entry_company'		 	=>   $request->entry_company,
				'entry_firstname'	 	=>	 $request->entry_firstname,
				'entry_lastname'   		=>   $request->entry_lastname,
				'entry_street_address'	=>   $request->entry_street_address,
				'entry_suburb' 			=>   $request->entry_suburb,
				'entry_postcode'	 	=>	 $request->entry_postcode,
				'entry_city'   			=>   $request->entry_city,
				'entry_state'		 	=>   $request->entry_state,
				'entry_country_id'		=>   $request->entry_country_id,
				'entry_zone_id'	 		=>	 $request->entry_zone_id
				]);
						
		//set default address
		if($request->is_default=='1'){
				DB::table('customers')->where('customers_id','=', $customers_id)->update([
						'customers_default_address_id'		 	=>   $address_book_id
						]);
		}
		
		$customer_addresses = DB::table('address_book')
			->leftJoin('zones', 'zones.zone_id', '=', 'address_book.entry_zone_id')
			->leftJoin('countries', 'countries.countries_id', '=', 'address_book.entry_country_id')
			->where('address_book_id', '=', $address_book_id)->get();	
		
		$countries = DB::table('countries')->get();	
		$zones = DB::table('zones')->where('zone_country_id','=', $customer_addresses[0]->entry_country_id)->get();	
		
		$customer_addresses = DB::table('address_book')
			->leftJoin('zones', 'zones.zone_id', '=', 'address_book.entry_zone_id')
			->leftJoin('countries', 'countries.countries_id', '=', 'address_book.entry_country_id')
			->where('customers_id', '=', $request->customers_id)->get();
			
		return ($customer_addresses);
	}
	
	
	//delete Customers address
	public function deleteAddress(Request $request){
				
		$customers_id            =   $request->customers_id;	
		$address_book_id         =   $request->address_book_id;	
		
		DB::table('address_book')->where('address_book_id','=', $address_book_id)->delete();
		
		$customer_addresses = DB::table('address_book')
			->leftJoin('zones', 'zones.zone_id', '=', 'address_book.entry_zone_id')
			->leftJoin('countries', 'countries.countries_id', '=', 'address_book.entry_country_id')
			->where('customers_id', '=', $request->customers_id)->get();
			
		return ($customer_addresses);
	}
	
	
	// //editcustomers data and redirect to address
	// public function editcustomers(Request $request){
	// 	$title = array('pageTitle' => Lang::get("labels.EditCustomer"));
	// 	$language_id             =   '1';	
	// 	$customers_id        	 =   $request->id;			
		
	// 	$customerData = array();
	// 	$message = array();
	// 	$errorMessage = array();
		
	// 	DB::table('customers')->where('customers_id', '=', $customers_id)->update(['is_seen' => 1 ]);
		
	// 	$customers = DB::table('customers')->where('customers_id','=', $customers_id)->get();
		
	// 	$customerData['message'] = $message;
	// 	$customerData['errorMessage'] = $errorMessage;
	// 	$customerData['customers'] = $customers;
		
	// 	return view("admin.editcustomers",$title)->with('data', $customerData);
	// }
		
	//add addcustomers data and redirect to address
	public function updatecustomers(Request $request){
				
		$language_id            		=   '1';			
		$customers_id					=	$request->customers_id;
		
		$customerData = array();
		$message = array();
		$errorMessage = array();
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();	
		$extensions = $myVar->imageType();	
				
		if($request->hasFile('newImage') and in_array($request->newImage->extension(), $extensions)){
			$image = $request->newImage;
			$fileName = time().'.'.$image->getClientOriginalName();
			$image->move('resources/assets/images/user_profile/', $fileName);
			$customers_picture = 'resources/assets/images/user_profile/'.$fileName; 
		}	else{
			$customers_picture = $request->oldImage;
		}		
		
		$customer_data = array(
			'customers_gender'   		 	=>   $request->customers_gender,
			'customers_firstname'		 	=>   $request->customers_firstname,
			'customers_lastname'		 	=>   $request->customers_lastname,
			'customers_dob'	 			 	=>	 $request->customers_dob,
			'customers_gender'   		 	=>   $request->customers_gender,
			'email'	 						=>   $request->email,
			'customers_default_address_id' 	=>   $request->customers_default_address_id,
			'customers_telephone'	 		=>	 $request->customers_telephone,
			'customers_fax'   				=>   $request->customers_fax,
			'isActive'		 	 			=>   $request->isActive,
			'customers_picture'	 			=>	 $customers_picture,
		);
		
		if($request->changePassword == 'yes'){
			$customer_data['password'] = Hash::make($request->password);
		}
		
		//check email already exists
		if($request->old_email_address!=$request->email){
			$existEmail = DB::table('customers')->where('email', '=', $request->email)->get();
			if(count($existEmail)>0){
				$title = array('pageTitle' => Lang::get("labels.EditCustomer"));
				
				$customerData['message'] = $message;
				$customerData['errorMessage'] = 'Email address already exist.';
				return view("admin.editcustomers",$title)->with('customers', $customerData);
			}else{
				DB::table('customers')->where('customers_id', '=', $customers_id)->update($customer_data);					 
				return redirect('admin/addaddress/'.$customers_id);		
			}
		}else{
			DB::table('customers')->where('customers_id', '=', $customers_id)->update($customer_data);					 
			return redirect('admin/addaddress/'.$customers_id);
		}
	}
	
	
	//deleteProduct
	public function deletecustomers(Request $request){
		$customers_id = $request->customers_id;
		
		DB::table('customers')->where('customers_id','=', $customers_id)->delete();
		DB::table('address_book')->where('customers_id','=', $customers_id)->delete();
		
		return redirect()->back()->withErrors([Lang::get("labels.DeleteCustomerMessage")]);
	}
	
	
}
