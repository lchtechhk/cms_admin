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

use App\Http\Controllers\Admin\Service\CategoryService;
use function GuzzleHttp\json_encode;

class AdminCategoryController extends Controller{
    private $CategoryService;
    
    public function __construct(){
		$this->CategoryService = new CategoryService();
	
    }

    function listingCategory(Request $request){
        $title = array('pageTitle' => Lang::get("labels.ListCategory"));
        $result = array();
		$result['operation'] = 'listing';
		return $this->CategoryService->redirect_view($result,$title);
    }

    function view_addCategory(Request $request){
        $title = array('pageTitle' => Lang::get("labels.view_addCategory"));
        $result = array();
		$result['request'] = $request;
        $result['operation'] = 'view_add';
		return $this->CategoryService->redirect_view($result,$title);
    }

    function view_editCategory(Request $request){
        $title = array('pageTitle' => Lang::get("labels.view_editCategory"));
        $result = array();
        $result['request'] = $request;
        $result['category_id'] = $request->category_id;
        $result['operation'] = 'view_edit';
		return $this->CategoryService->redirect_view($result,$title);
    }

    function addCategory(Request $request){
        $title = array('pageTitle' => Lang::get("labels.addCategory"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'add';
        // Log::info('[result] --  : ' . json_encode($result));
        return $this->CategoryService->redirect_view($result,$title);
    }

    function updateCategory(Request $request){
        $title = array('pageTitle' => Lang::get("labels.updateCategory"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'edit';
        return $this->CategoryService->redirect_view($result,$title);
    }

    function deleteCategory(Request $request){
        $title = array('pageTitle' => Lang::get("labels.deleteCategory"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'delete';
        return $this->CategoryService->redirect_view($result,$title);
    }
}
