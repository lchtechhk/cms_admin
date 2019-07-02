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

use App\Http\Controllers\Admin\Service\ProductOptionService;

class AdminProductOptionController extends Controller{
    private $ProductOptionService;

	public function __construct(){
		$this->ProductOptionService = new ProductOptionService();
	
	}
	
	function listingProductOption(Request $request){
        $title = array('pageTitle' => Lang::get("labels.ListProductOption"));
        $result = array();
		$result['operation'] = 'listing';
		Log::info('[listing] --  : ');
		return $this->ProductOptionService->redirect_view($result,$title);
    }

    function view_addProductOption(Request $request){
        $title = array('pageTitle' => Lang::get("labels.view_addProductOption"));
        $result = array();
		$result['request'] = $request;
        $result['operation'] = 'view_add';
		return $this->ProductOptionService->redirect_view($result,$title);
    }

    function view_editProductOption(Request $request){
        $title = array('pageTitle' => Lang::get("labels.view_editProductOption"));
        $result = array();
        $result['request'] = $request;
        $result['operation'] = 'view_edit';
        $result['product_option_id'] = $request->product_option_id;
		return $this->ProductOptionService->redirect_view($result,$title);
    }

    function addProductOption(Request $request){
        $title = array('pageTitle' => Lang::get("labels.addProductOption"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'add';
        // Log::info('[result] --  : ' . json_encode($result));
        return $this->ProductOptionService->redirect_view($result,$title);
    }

    function updateProductOption(Request $request){
        $title = array('pageTitle' => Lang::get("labels.updateProductOption"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'edit';
        return $this->ProductOptionService->redirect_view($result,$title);
    }

    function deleteProductOption(Request $request){
        $title = array('pageTitle' => Lang::get("labels.deleteProductOption"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'delete';
        return $this->ProductOptionService->redirect_view($result,$title);
	}
}
