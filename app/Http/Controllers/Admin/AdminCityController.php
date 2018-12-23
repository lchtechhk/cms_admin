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
use App\Http\Controllers\Admin\Service\CountryService;

class AdminCityController extends Controller {
	protected $CityService;
	protected $CountryService;

	public function __construct(){
		$this->CityService = new CityService('cities');
		$this->CountryService = new CountryService('countries');
		// Log::info('[AdminCityController] - __construct : ' );
	}


	public function add(Request $request){
		$request['status'] = 'active';
		$title = array('pageTitle' => Lang::get("labels.AddCity"));

		$result = array();
		$result = $this->CityService->add($request,"labels.CityAddedMessage","labels.CityAddedMessageFail");
		$result['operation'] = 'add';
		$result['request'] = $request;
		// $result['countries'] = $this->CountryService->findAll();
		// Log::info('[AdminCityController] - add : ' . json_encode($result['countries']));			
		return $this->CityService->redirect_view($result,$title,$request);
	}

        public function update(Request $request){
			$title = array('pageTitle' => Lang::get("labels.EditCity"));
			$result = $this->CityService->update($request,"labels.CityAddedMessage","labels.CityAddedMessageFail");
			$result['operation'] = 'edit';
			$result['request'] = $request;
			return $this->CityService->redirect_view($result,$title,$request);

		}
        


	//deleteCity
	public function deleteCity(Request $request){
		$title = array('pageTitle' => Lang::get("labels.ListingCities"));		
		$result = $this->CityService->delete($request,"labels.CityDeletedTax","labels.CityDeletedTaxFail");
		$result['operation'] = 'delete';
		// Log::info('[deleteCity] : ' . json_encode($result));
		return $this->CityService->redirect_view($result,$title,$request);

		// return redirect()->back()->withErrors($result);
	}

	public function view_addCity(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddCity"));
		$result = array();
		$result['message'] = array();
		$result['request'] = $request;
		$result['operation'] = 'add';
		return $this->CityService->redirect_view($result,$title);
	}
    //editCity
	public function view_editCity(Request $request){	
		$title = array('pageTitle' => Lang::get("labels.EditCity"));
		$result = array();
		$result['message'] = array();
		$result['request'] = $request;
		$result['operation'] = 'edit';
		return $this->CityService->redirect_view($result,$title);
    }
	
}
