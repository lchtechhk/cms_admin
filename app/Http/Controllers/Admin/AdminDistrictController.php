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


use App\Http\Controllers\Admin\Service\DistrictService;

class AdminDistrictController extends Controller {
	protected $DistrictService;

	public function __construct(){
		$this->DistrictService = new DistrictService();
	}

	public function add(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddDistrict"));
		$result = $this->DistrictService->add($request,"labels.DistrictAddedMessage","labels.CityAddedMessageFail");
		return $this->DistrictService->redirect_view($result,$title);
	}

	public function update(Request $request){
		$title = array('pageTitle' => Lang::get("labels.EditDistrict"));
		$result = $this->DistrictService->update($request,"labels.DistrictAddedMessage","labels.CityAddedMessageFail");
		return $this->DistrictService->redirect_view($result,$title);

	}
	public function deleteCity(Request $request){
		$title = array('pageTitle' => Lang::get("labels.ListingDistricts"));		
		$result = $this->DistrictService->delete($request,"labels.DistrictDeleted","labels.DistrictDeletedFail");
		return $this->DistrictService->redirect_view($result,$title);
	}

	// listingDistrict
	public function listingDistrict(Request $request){
		$title = array('pageTitle' => Lang::get("labels.ListingDistrict"));		
		$result = array();
		$result['operation'] = 'listing';
		return $this->DistrictService->redirect_view($result,$title);
	}
	//view_AddDistrict
	public function view_AddDistrict(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddDistrict"));
		$result = array();
		$result['request'] = $request;
		$result['operation'] = 'add';
		return $this->DistrictService->redirect_view($result,$title);
	}
    //view_EditDistrict
	public function view_EditDistrict(Request $request){	
		$title = array('pageTitle' => Lang::get("labels.EditDistrict"));
		$result = array();
		$result['request'] = $request;
		$result['operation'] = 'edit';
		return $this->DistrictService->redirect_view($result,$title);
    }
	
}
