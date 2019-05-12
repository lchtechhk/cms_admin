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

	// listingDistrict
	public function listingDistrict(Request $request){
		$title = array('pageTitle' => Lang::get("labels.ListingDistrict"));		
		$result = array();
		$result['operation'] = 'listing';
		return $this->DistrictService->redirect_view($result,$title);
	}
	//view_AddDistrict
	public function view_addDistrict(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddDistrict"));
		$result = array();
		$result['request'] = $request;
		$result['operation'] = 'view_add';
		return $this->DistrictService->redirect_view($result,$title);
	}
    //view_EditDistrict
	public function view_editDistrict(Request $request){	
		$title = array('pageTitle' => Lang::get("labels.EditDistrict"));
		$result = array();
		$result['request'] = $request;
		$result['operation'] = 'view_edit';
		return $this->DistrictService->redirect_view($result,$title);
    }

	public function addDistrict(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddDistrict"));
		$result = array();
		$result = $request->input();
		$result['request'] = $request;
		$result['operation'] = 'add';
		return $this->DistrictService->redirect_view($result,$title);
	}

	public function updateDistrict(Request $request){
		$title = array('pageTitle' => Lang::get("labels.EditDistrict"));
		$result = array();
		$result = $request->input();
		$result['request'] = $request;
		$result['operation'] = 'edit';
		return $this->DistrictService->redirect_view($result,$title);

	}
	public function deleteDistrict(Request $request){
		$title = array('pageTitle' => Lang::get("labels.ListingDistricts"));		
		$result = array();
		$result = $request->input();
		$result['request'] = $request;
		$result['operation'] = 'delete';
		return $this->DistrictService->redirect_view($result,$title);
	}
	
}
