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
	
	function listingProductOptionValue(Request $request){
        $title = array('pageTitle' => Lang::get("labels.ListProductOptionValue"));
        $result = array();
		$result['operation'] = 'listing';
		// Log::info('[listing] --  : ');
		return $this->ProductOptionValueService->redirect_view($result,$title);
    }

    function view_addProductOptionValue(Request $request){
        $title = array('pageTitle' => Lang::get("labels.view_addProductOptionValue"));
        $result = array();
		$result['request'] = $request;
        $result['operation'] = 'view_add';
		return $this->ProductOptionValueService->redirect_view($result,$title);
    }

    function view_editProductOptionValue(Request $request){
        $title = array('pageTitle' => Lang::get("labels.view_editProductOptionValue"));
        $result = array();
        $result['request'] = $request;
        $result['operation'] = 'view_edit';
        $result['product_option_value_id'] = $request->product_option_value_id;
        $result['operation'] = 'view_edit';
		return $this->ProductOptionValueService->redirect_view($result,$title);
    }

    function addProductOptionValue(Request $request){
        $title = array('pageTitle' => Lang::get("labels.addProductOptionValue"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'add';
        // Log::info('[result] --  : ' . json_encode($result));
        return $this->ProductOptionValueService->redirect_view($result,$title);
    }

    function updateProductOptionValue(Request $request){
        $title = array('pageTitle' => Lang::get("labels.updateProductOptionValue"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'edit';
        return $this->ProductOptionValueService->redirect_view($result,$title);
    }

    function deleteProductOptionValue(Request $request){
        $title = array('pageTitle' => Lang::get("labels.deleteProductOptionValue"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'delete';
        return $this->ProductOptionValueService->redirect_view($result,$title);
	}
}
