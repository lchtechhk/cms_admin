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

use App\Http\Controllers\Admin\Service\ProductAttributeService;

class AdminProductAttributeController extends Controller{
    private $ProductAttributeService;

	public function __construct(){
		$this->ProductAttributeService = new ProductAttributeService();
	
	}
	
	function listingProductAttribute(Request $request){
        $title = array('pageTitle' => Lang::get("labels.ListProductAttribute"));
        $result = array();
        $result['operation'] = 'listing';
        $result['request'] = $request;
        $result['product_id'] = $request->product_id;
		// Log::info('[listing] --  : ');
		return $this->ProductAttributeService->redirect_view($result,$title);
    }

    function view_addProductAttribute(Request $request){
        $title = array('pageTitle' => Lang::get("labels.view_addProductAttribute"));
        $result = array();
		$result['request'] = $request;
        $result['operation'] = 'view_add';
		return $this->ProductAttributeService->redirect_view($result,$title);
    }

    function view_editProductAttribute(Request $request){
        $title = array('pageTitle' => Lang::get("labels.view_editProductAttribute"));
        $result = array();
        $result['request'] = $request;
        $result['operation'] = 'view_edit';
        $result['ProductAttribute_id'] = $request->ProductAttribute_id;
        $result['operation'] = 'view_edit';
		return $this->ProductAttributeService->redirect_view($result,$title);
    }

    function addProductAttribute(Request $request){
        $title = array('pageTitle' => Lang::get("labels.addProductAttribute"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'add';
        // Log::info('[result] --  : ' . json_encode($result));
        return $this->ProductAttributeService->redirect_view($result,$title);
    }

    function updateProductAttribute(Request $request){
        $title = array('pageTitle' => Lang::get("labels.updateProductAttribute"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'edit';
        return $this->ProductAttributeService->redirect_view($result,$title);
    }

    function deleteProductAttribute(Request $request){
        $title = array('pageTitle' => Lang::get("labels.deleteProductAttribute"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'delete';
        return $this->ProductAttributeService->redirect_view($result,$title);
	}
}
