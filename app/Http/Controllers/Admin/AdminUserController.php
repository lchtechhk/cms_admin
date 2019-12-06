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

use App\Http\Controllers\Admin\Service\UserService;

class AdminUserController extends Controller{
    private $UserService;
	public function __construct(){
		$this->UserService = new UserService();
	}
	function changeDefaultCompany(Request $request){
        $title = array('pageTitle' => Lang::get("labels.title_dashboard"));
        $user_id = auth()->guard('admin')->user()->user_id;
        $result = array();
        try{
            DB::beginTransaction();
            $company_id = $request->company_id;
            $result['user_id'] = $user_id;
            $result['default_company_id'] = $company_id;
            $add_user_result = $this->UserService->update("user_id",$result);
            $result = $this->UserService->response($result,"Success To Change Default Company","change_default_company");
            DB::commit();
        }catch(Exception $e){
            $result = $this->UserService->throwException($result,$e->getMessage(),true);
        }
        $user = $this->UserService->findByColumn_Value("user_id",$user_id);
		return redirect()->intended('admin/dashboard/this_month')->with('administrators', $user);
    }
	function listingUser(Request $request){
        $title = array('pageTitle' => Lang::get("labels.ListUser"));
        $result = array();
		$result['operation'] = 'listing';
		return $this->UserService->redirect_view($result,$title);
    }

    function view_addUser(Request $request){
        $title = array('pageTitle' => Lang::get("labels.view_addUser"));
        $result = array();
		$result['request'] = $request;
        $result['operation'] = 'view_add';
		return $this->UserService->redirect_view($result,$title);
    }

    function view_editUser(Request $request){
        $title = array('pageTitle' => Lang::get("labels.view_editUser"));
        $result = array();
        $result['request'] = $request;
        $result['operation'] = 'view_edit';
        $result['user_id'] = $request->user_id;
		return $this->UserService->redirect_view($result,$title);
    }

    function addUser(Request $request){
        $title = array('pageTitle' => Lang::get("labels.addUser"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'add';
        // Log::info('[result] --  : ' . json_encode($result));
        return $this->UserService->redirect_view($result,$title);
    }

    function updateUser(Request $request){
        $title = array('pageTitle' => Lang::get("labels.updateUser"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'edit';
        return $this->UserService->redirect_view($result,$title);
    }

    function deleteUser(Request $request){
        $title = array('pageTitle' => Lang::get("labels.deleteUser"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'delete';
        return $this->UserService->redirect_view($result,$title);
	}
}
