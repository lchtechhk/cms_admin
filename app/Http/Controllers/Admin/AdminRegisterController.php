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

use App\Http\Controllers\Admin\Service\RegisterService;

class AdminRegisterController extends Controller{
    private $RegisterService;

	public function __construct(){
		$this->RegisterService = new RegisterService();
	
	}

    function view_registerCompany(Request $request){
        $title = array('pageTitle' => Lang::get("labels.RegisterCompany"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'view_registerCompany';
        // Log::info('[result] --  : ' . json_encode($result));
        return $this->RegisterService->redirect_view($result,$title);
    }
    function add_registerCompany(Request $request){
        $title = array('pageTitle' => Lang::get("labels.RegisterCompany"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'add_registerCompany';
        // Log::info('[result] --  : ' . json_encode($result));
        return $this->RegisterService->redirect_view($result,$title);
    }
}
