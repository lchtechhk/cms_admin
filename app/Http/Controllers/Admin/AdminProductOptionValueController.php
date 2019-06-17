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

use App\Http\Controllers\Admin\Service\ProductOptionValueService;

class AdminProductOptionValueController extends Controller{
    private $ProductOptionValueService;

	public function __construct(){
		$this->ProductOptionValueService = new ProductOptionValueService();
	
	}
	
	function listingManufacturer(Request $request){
        // $title = array('pageTitle' => Lang::get("labels.ListManufacturer"));
        // $result = array();
		// $result['operation'] = 'listing';
		Log::info('[listing] --  : ');

		// return $this->ProductOptionValueService->redirect_view($result,$title);
    }

    function view_addManufacturer(Request $request){
        $title = array('pageTitle' => Lang::get("labels.view_addManufacturer"));
        $result = array();
		$result['request'] = $request;
        $result['operation'] = 'view_add';
		return $this->ProductOptionValueService->redirect_view($result,$title);
    }

    function view_editManufacturer(Request $request){
        $title = array('pageTitle' => Lang::get("labels.view_editManufacturer"));
        $result = array();
        $result['request'] = $request;
        $result['operation'] = 'view_edit';
        $result['manufacturer_id'] = $request->manufacturer_id;
        $result['operation'] = 'view_edit';
		return $this->ProductOptionValueService->redirect_view($result,$title);
    }

    function addManufacturer(Request $request){
        $title = array('pageTitle' => Lang::get("labels.addManufacturer"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'add';
        // Log::info('[result] --  : ' . json_encode($result));
        return $this->ProductOptionValueService->redirect_view($result,$title);
    }

    function updateManufacturer(Request $request){
        $title = array('pageTitle' => Lang::get("labels.updateManufacturer"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'edit';
        return $this->ProductOptionValueService->redirect_view($result,$title);
    }

    function deleteManufacturer(Request $request){
        $title = array('pageTitle' => Lang::get("labels.deleteManufacturer"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'delete';
        return $this->ProductOptionValueService->redirect_view($result,$title);
	}
}
