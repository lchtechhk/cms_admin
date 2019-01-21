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

	public function add(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddZone"));
		$result = $this->ZoneService->add($request,"labels.ZoneAddedMessage","labels.CityAddedMessageFail");
		return $this->ZoneService->redirect_view($result,$title);
	}

	public function update(Request $request){
		$title = array('pageTitle' => Lang::get("labels.EditZone"));
		$result = $this->ZoneService->update($request,"labels.ZoneAddedMessage","labels.CityAddedMessageFail");
		return $this->ZoneService->redirect_view($result,$title);

	}
	public function deleteCity(Request $request){
		$title = array('pageTitle' => Lang::get("labels.ListingZones"));		
		$result = $this->ZoneService->delete($request,"labels.ZoneDeleted","labels.ZoneDeletedFail");
		return $this->ZoneService->redirect_view($result,$title);
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
		$result['operation'] = 'add';
		return $this->ZoneService->redirect_view($result,$title);
	}
    //view_EditZone
	public function view_EditZone(Request $request){	
		$title = array('pageTitle' => Lang::get("labels.EditZone"));
		$result = array();
		$result['request'] = $request;
		$result['operation'] = 'edit';
		return $this->ZoneService->redirect_view($result,$title);
    }
	
}
