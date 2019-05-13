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
use Illuminate\Http\Request;


use App\Http\Controllers\Admin\Service\CountryService;

class AdminCountryController extends Controller {
	protected $CountryService;

	public function __construct(){
		$this->CountryService = new CountryService();
	}

	// listingCountry
	public function listingCountry(Request $request){
		$title = array('pageTitle' => Lang::get("labels.ListingCountry"));		
		$result = array();
		$result['operation'] = 'listing';
		return $this->CountryService->redirect_view($result,$title);
	}
	//view_addCountry
	public function view_addCountry(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddCountry"));
		$result = array();
		$result['request'] = $request;
		$result['operation'] = 'view_add';
		return $this->CountryService->redirect_view($result,$title);
	}
    //view_editCountry
	public function view_editCountry(Request $request){	
		$title = array('pageTitle' => Lang::get("labels.EditCountry"));
		$result = array();
		$result['request'] = $request;
		$result['operation'] = 'view_edit';
		return $this->CountryService->redirect_view($result,$title);
	}
	
	public function addCountry(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddCountry"));
		$result = array();
		$result = $request->input();
		$result['request'] = $request;
		$result['operation'] = 'add';
		
		return $this->CountryService->redirect_view($result,$title);
	}

	public function updateCountry(Request $request){
		$title = array('pageTitle' => Lang::get("labels.EditCountry"));
		$result = array();
		$result = $request->input();
		$result['request'] = $request;
		$result['operation'] = 'edit';
		return $this->CountryService->redirect_view($result,$title);
	}
	public function deleteCountry(Request $request){
		$title = array('pageTitle' => Lang::get("labels.ListingCountry"));		
		$result = array();
		$result = $request->input();
		$result['request'] = $request;
		$result['operation'] = 'delete';
		return $this->CountryService->redirect_view($result,$title);
	}
}
