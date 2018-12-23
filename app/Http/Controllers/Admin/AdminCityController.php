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
use Illuminate\Http\Request;


use App\Http\Controllers\Admin\Service\CityService;

class AdminCityController extends Controller {
	protected $CityService;

	public function __construct(){
		$this->CityService = new CityService('cities');
	}

	public function add(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddCity"));
		$result = $this->CityService->add($request,"labels.CityAddedMessage","labels.CityAddedMessageFail");
		$result['operation'] = 'add';
		return $this->CityService->redirect_view($result,$title);
	}

	public function update(Request $request){
		$title = array('pageTitle' => Lang::get("labels.EditCity"));
		$result = $this->CityService->update($request,"labels.CityAddedMessage","labels.CityAddedMessageFail");
		$result['operation'] = 'edit';
		$result['request'] = $request;
		return $this->CityService->redirect_view($result,$title);

	}
	public function deleteCity(Request $request){
		$title = array('pageTitle' => Lang::get("labels.ListingCities"));		
		$result = $this->CityService->delete($request,"labels.CityDeletedTax","labels.CityDeletedTaxFail");
		$result['operation'] = 'delete';
		return $this->CityService->redirect_view($result,$title);
	}

	// listingCities
	public function listingCities(Request $request){
		$title = array('pageTitle' => Lang::get("labels.ListingZones"));		
		$result = array();
		$result['operation'] = 'delete';
		return $this->CityService->redirect_view($result,$title);
		// Log::info('result : ' . json_encode($result));
	}

	public function view_addCity(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddCity"));
		$result = array();
		$result['request'] = $request;
		$result['operation'] = 'add';
		return $this->CityService->redirect_view($result,$title);
	}
    //editCity
	public function view_editCity(Request $request){	
		$title = array('pageTitle' => Lang::get("labels.EditCity"));
		$result = array();
		$result['request'] = $request;
		$result['operation'] = 'edit';
		return $this->CityService->redirect_view($result,$title);
    }
	
}
