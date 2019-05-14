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


use App\Http\Controllers\Admin\Service\AreaService;

class AdminAreaController extends Controller {
	protected $AreaService;

	public function __construct(){
		$this->AreaService = new AreaService();
	}

	// listingArea
	public function listingArea(Request $request){
		$title = array('pageTitle' => Lang::get("labels.ListingArea"));		
		$result = array();
		$result['operation'] = 'listing';
		return $this->AreaService->redirect_view($result,$title);
	}
	//view_AddArea
	public function view_addArea(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddArea"));
		$result = array();
		$result['request'] = $request;
		$result['operation'] = 'view_add';
		return $this->AreaService->redirect_view($result,$title);
	}
    //view_editCountry
	public function view_editArea(Request $request){	
		$title = array('pageTitle' => Lang::get("labels.EditArea"));
		$result = array();
		$result['request'] = $request;
		$result['id'] = $request->id;
		$result['operation'] = 'view_edit';
		return $this->AreaService->redirect_view($result,$title);
	}
	
	public function addArea(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddArea"));
		$result = array();
		$result = $request->input();
		$result['request'] = $request;
		$result['operation'] = 'add';
		return $this->AreaService->redirect_view($result,$title);
	}

	public function updateArea(Request $request){
		$title = array('pageTitle' => Lang::get("labels.EditArea"));
		$result = array();
		$result = $request->input();
		$result['request'] = $request;
		$result['operation'] = 'edit';
		return $this->AreaService->redirect_view($result,$title);
	}
	public function deleteArea(Request $request){
		$title = array('pageTitle' => Lang::get("labels.ListingArea"));	
		$result = array();
		$result = $request->input();
		$result['request'] = $request;
		$result['operation'] = 'delete';
		return $this->AreaService->redirect_view($result,$title);
	}
}
 