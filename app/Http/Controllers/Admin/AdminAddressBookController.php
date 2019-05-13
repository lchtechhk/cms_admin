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
use function GuzzleHttp\json_encode;

class AdminAddressBookController extends Controller{
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

    //listingCustomerAddress
	public function listingAddressBook(Request $request){
		$title = array('pageTitle' => Lang::get("labels.ListingCustomerAddress"));
		$result = array();
		$result = $request->input();
		$result['request'] = $request;
		$result['operation'] = 'listing';
		$result['customer_id'] = $request->customer_id;
		// Log::info('listingAddressBook : ' .json_encode($result));
		return $this->AddressBookService->redirect_view($result,$title);
    }
    
    //view_addAddressBook
	public function view_addAddressBook(Request $request){
		$title = "";
        $result = array();
		$result = $request->input();
		$result['request'] = $request;
		$result['operation'] = 'view_add';
		$result['customer_id'] = $request->customer_id;
		return $this->AddressBookService->redirect_view($result,$title);
    }

	//view_editAddressBook
	public function view_editAddressBook(Request $request){
		$title = "";
		$result = array();
		$result = $request->input();
		$result['request'] = $request;
		$result['operation'] = 'view_edit';
		$result['customer_id'] = $request->customer_id;
		return $this->AddressBookService->redirect_view($result,$title);
    }
    
    //addAddressBook
	public function addAddressBook(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddCustomerAddress"));
		$result = array();
		$result = $request->input();
		$result['request'] = $request;
		$result['operation'] = 'add';
		return $this->AddressBookService->redirect_view($result,$title);
	}

    //updateAddressBook
	public function updateAddressBook(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddCustomerAddress"));
		$result = array();
		$result = $request->input();
		$result['request'] = $request;
		$result['operation'] = 'edit';
		$result['id'] = $request->address_book_id;
		// Log::info('updateAddressBook : ' .json_encode($result));
		return $this->AddressBookService->redirect_view($result,$title);
    }

	//delete Customers address
	public function deleteAddressBook(Request $request){
		$title = array('pageTitle' => Lang::get("labels.ListingCustomerAddress"));
		$result = array();
		$result = $request->input();
		$result['request'] = $request;
		$result['operation'] = 'delete';
		return $this->AddressBookService->redirect_view($result,$title);
	}
}
