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


use App\Http\Controllers\Admin\Service\ZoneService;

class AdminZoneController extends Controller {
	protected $ZoneService;

	public function __construct(){
		$this->ZoneService = new ZoneService();
	}

	// listingZones
	public function listingZone(Request $request){
		$title = array('pageTitle' => Lang::get("labels.ListingZones"));		
		$result = array();
		$result['operation'] = 'listing';
		return $this->ZoneService->redirect_view($result,$title);
	}
	//view_AddZone
	public function view_AddZone(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddZone"));
		$result = array();
		$result['request'] = $request;
		$result['operation'] = 'view_add';
		return $this->ZoneService->redirect_view($result,$title);
	}
	//view_EditZone
	public function view_EditZone(Request $request){	
		$title = array('pageTitle' => Lang::get("labels.EditZone"));
		$result = array();
		$result['request'] = $request;
		$result['id'] = $request->id;
		$result['operation'] = 'view_edit';
		return $this->ZoneService->redirect_view($result,$title);
	}

	public function addZone(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddZone"));
		$result = array();
		$result = $request->input();
		$result['request'] = $request;
		$result['operation'] = 'add';
		return $this->ZoneService->redirect_view($result,$title);
	}

	public function updateZone(Request $request){
		$title = array('pageTitle' => Lang::get("labels.EditZone"));
		$result = array();
		$result = $request->input();
		$result['request'] = $request;
		$result['operation'] = 'edit';
		return $this->ZoneService->redirect_view($result,$title);

	}
	public function deleteZone(Request $request){
		$title = array('pageTitle' => Lang::get("labels.ListingZones"));
		$result = array();
		$result = $request->input();
		$result['request'] = $request;
		$result['operation'] = 'delete';		
		return $this->ZoneService->redirect_view($result,$title);
	}
}
