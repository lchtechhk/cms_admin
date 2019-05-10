<?php
/*
Project Name: IonicEcommerce
Project URI: http://ionicecommerce.com
Author: VectorCoder Team
Author URI: http://vectorcoder.com/
Version: 2.8
*/
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
        Log::info('view_addCategory : ');

		return $this->CategoryService->redirect_view($result,$title);
    }

    function view_editCategory(Request $request){
        $title = array('pageTitle' => Lang::get("labels.view_editCategory"));
        $result = array();
		$result['request'] = $request;
        $result['operation'] = 'view_edit';
		return $this->CategoryService->redirect_view($result,$title);
    }

    function addCategory(Request $request){
        $title = array('pageTitle' => Lang::get("labels.addCategory"));
        Log::info('addCategory : ');
    }

    function updateCategory(Request $request){
        $title = array('pageTitle' => Lang::get("labels.updateCategory"));
        Log::info('updateCategory : ');
    }

    function deleteCategory(Request $request){
        $title = array('pageTitle' => Lang::get("labels.deleteCategory"));
        Log::info('deleteCategory : ');
    }
}
