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


use App\Http\Controllers\Admin\Service\CityService;

class AdminCityController extends Controller {
	private $CityService;
	public function __construct(){
		$this->CityService = new CityService();
	}

	// listingCities
	public function listingCity(Request $request){
		$title = array('pageTitle' => Lang::get("labels.ListingCities"));		
		$result = array();
		$result['operation'] = 'listing';
		return $this->CityService->redirect_view($result,$title);
	}
	//view_addCity
	public function view_addCity(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddCity"));
		$result = array();
		$result['request'] = $request;
		$result['operation'] = 'view_add';
		return $this->CityService->redirect_view($result,$title);
	}
	//view_editCity
	public function view_editCity(Request $request){	
		$title = array('pageTitle' => Lang::get("labels.EditCity"));
		$result = array();
		$result['request'] = $request;
		$result['operation'] = 'view_edit';
		return $this->CityService->redirect_view($result,$title);
	}

	public function addCity(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddCity")); 
		$result = array();
		$result = $request->input();
		$result['request'] = $request;
		$result['operation'] = 'add';
		return $this->CityService->redirect_view($result,$title);
	}

	public function updateCity(Request $request){
		$title = array('pageTitle' => Lang::get("labels.EditCity"));
		$result = array();
		$result = $request->input();
		$result['request'] = $request;
		$result['operation'] = 'edit';
		return $this->CityService->redirect_view($result,$title);

	}
	public function deleteCity(Request $request){
		$title = array('pageTitle' => Lang::get("labels.ListingCities"));	
		$result = array();
		$result = $request->input();
		$result['request'] = $request;
		$result['operation'] = 'delete';
		return $this->CityService->redirect_view($result,$title);
	}
}
