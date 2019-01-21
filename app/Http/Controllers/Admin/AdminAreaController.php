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

	public function add(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddArea"));
		$result = $this->AreaService->add($request,"labels.AreaAddedMessage","labels.AreaAddedMessageFail");
		return $this->AreaService->redirect_view($result,$title);
	}

	public function update(Request $request){
		$title = array('pageTitle' => Lang::get("labels.EditArea"));
		$result = $this->AreaService->update($request,"labels.AreaAddedMessage","labels.AreaAddedMessageFail");
		return $this->AreaService->redirect_view($result,$title);
	}
	public function deleteArea(Request $request){
        // Log::info('[delete request id] : ' . $request->id);
		$title = array('pageTitle' => Lang::get("labels.ListingCountry"));		
		$result = $this->AreaService->delete($request,"labels.AreaDeletedMessage","labels.AreaDeletedFail");
		return $this->AreaService->redirect_view($result,$title);
	}

	// listingArea
	public function listingArea(Request $request){
        Log::info('listingArea : ' . json_encode($request));
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
		$result['operation'] = 'add';
		return $this->AreaService->redirect_view($result,$title);
	}
    //view_editCountry
	public function view_editArea(Request $request){	
		$title = array('pageTitle' => Lang::get("labels.EditArea"));
		$result = array();
		$result['request'] = $request;
		$result['operation'] = 'edit';
		return $this->AreaService->redirect_view($result,$title);
    }
	
}
 