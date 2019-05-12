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

use App\Http\Controllers\Admin\Service\SubCategoryService;

class AdminSubCategoryController extends Controller{
    private $SubCategoryService;
    
    public function __construct(){
		$this->SubCategoryService = new SubCategoryService();
    }
    
    function listingSubCategory(Request $request){
        $title = array('pageTitle' => Lang::get("labels.listSubCategory"));
        $result = array();
		$result['operation'] = 'listing';
		return $this->SubCategoryService->redirect_view($result,$title);
    }

    function view_addSubCategory(Request $request){
        $title = array('pageTitle' => Lang::get("labels.view_addSubCategory"));
        $result = array();
		$result['request'] = $request;
		$result['operation'] = 'add';
		return $this->SubCategoryService->redirect_view($result,$title);
        Log::info('view_addSubCategory : ');
    }

    function view_editSubCategory(Request $request){
        $title = array('pageTitle' => Lang::get("labels.view_editSubCategory"));
        $result = array();
		$result['request'] = $request;
		$result['operation'] = 'edit';
		return $this->SubCategoryService->redirect_view($result,$title);
        Log::info('view_editSubCategory : ');
    }

    function addSubCategory(Request $request){
        $title = array('pageTitle' => Lang::get("labels.addSubCategory"));
        Log::info('addSubCategory : ');
    }

    function updateSubCategory(Request $request){
        $title = array('pageTitle' => Lang::get("labels.updateCategory"));
        Log::info('updateSubCategory : ');
    }

    function deleteSubCategory(Request $request){
        $title = array('pageTitle' => Lang::get("labels.deleteSubCategory"));
        Log::info('deleteSubCategory : ');
    }
}
