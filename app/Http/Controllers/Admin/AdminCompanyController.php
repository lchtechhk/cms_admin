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

//for authenitcate login data
use Log;
use Auth;

//for requesting a value 
use Illuminate\Http\Request;
use function GuzzleHttp\json_encode;

use App\Http\Controllers\Admin\Service\CompanyService;

class AdminCompanyController extends Controller{
    private $CompanyService;
    
	public function __construct(){
		$this->CompanyService = new CompanyService();

	}
    
    function listingStaff(Request $request){
        $title = array('pageTitle' => Lang::get("labels.ListingStaff"));
        $result = array();
		$result['operation'] = 'listingStaff';
		return $this->CompanyService->redirect_view($result,$title);
    }
	function listingCompany(Request $request){
        $title = array('pageTitle' => Lang::get("labels.ListCompany"));
        $result = array();
		$result['operation'] = 'listing';
		return $this->CompanyService->redirect_view($result,$title);
    }

    function view_addCompany(Request $request){
        $title = array('pageTitle' => Lang::get("labels.view_addCompany"));
        $result = array();
		$result['request'] = $request;
        $result['operation'] = 'view_add';
		return $this->CompanyService->redirect_view($result,$title);
    }

    function view_editCompany(Request $request){
        $title = array('pageTitle' => Lang::get("labels.view_editCompany"));
        $result = array();
        $result['request'] = $request;
        $result['operation'] = 'view_edit';
        $result['company_id'] = $request->company_id;
		return $this->CompanyService->redirect_view($result,$title);
    }

    function addCompany(Request $request){
        $title = array('pageTitle' => Lang::get("labels.addCompany"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'add';
        // Log::info('[result] --  : ' . json_encode($result));
        return $this->CompanyService->redirect_view($result,$title);
    }

    function updateCompany(Request $request){
        $title = array('pageTitle' => Lang::get("labels.updateCompany"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'edit';
        return $this->CompanyService->redirect_view($result,$title);
    }

    function deleteCompany(Request $request){
        $title = array('pageTitle' => Lang::get("labels.deleteCompany"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'delete';
        return $this->CompanyService->redirect_view($result,$title);
	}
}
