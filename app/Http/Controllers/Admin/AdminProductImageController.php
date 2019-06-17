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

use App\Http\Controllers\Admin\Service\ProductImageService;

class AdminProductImageController extends Controller{
    private $ProductImageService;

	public function __construct(){
		$this->ProductImageService = new ProductImageService();
	
	}
	
	function listingProductImage(Request $request){
        $title = array('pageTitle' => Lang::get("labels.ListProductImage"));
        $result = array();
        $result['operation'] = 'listing';
        $result['request'] = $request;
        $result['product_id'] = $request->product_id;
		Log::info('[listing] --  : ');
		return $this->ProductImageService->redirect_view($result,$title);
    }

    function view_addProductImage(Request $request){
        $title = array('pageTitle' => Lang::get("labels.view_addProductImage"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'view_add';
        Log::info('[view_addProductImage] --  : ' . \json_encode($result));
		return $this->ProductImageService->redirect_view($result,$title);
    }

    function view_editProductImage(Request $request){
        $title = array('pageTitle' => Lang::get("labels.view_editProductImage"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'view_edit';
		return $this->ProductImageService->redirect_view($result,$title);
    }

    function addProductImage(Request $request){
        $title = array('pageTitle' => Lang::get("labels.addProductImage"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'add';
        Log::info('[result] --  : ' . json_encode($result));
        return $this->ProductImageService->redirect_view($result,$title);
    }

    function updateProductImage(Request $request){
        $title = array('pageTitle' => Lang::get("labels.updateProductImage"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'edit';
        return $this->ProductImageService->redirect_view($result,$title);
    }

    function deleteProductImage(Request $request){
        $title = array('pageTitle' => Lang::get("labels.deleteProductImage"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'delete';
        return $this->ProductImageService->redirect_view($result,$title);
	}
}
