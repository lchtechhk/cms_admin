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

use App\Http\Controllers\Admin\Service\ProductService;
class AdminProductController extends Controller{
    private $ProductService;

	public function __construct(){
		$this->ProductService = new ProductService();
	
	}
	
	function listingProduct(Request $request){
        $title = array('pageTitle' => Lang::get("labels.ListProduct"));
        $result = array();
		$result['operation'] = 'listing';
		Log::info('[listing] --  : ');
		return $this->ProductService->redirect_view($result,$title);
    }

    function view_addProduct(Request $request){
        $title = array('pageTitle' => Lang::get("labels.view_addProduct"));
        $result = array();
		$result['request'] = $request;
        $result['operation'] = 'view_add';
		return $this->ProductService->redirect_view($result,$title);
    }

    function view_editProduct(Request $request){
        $title = array('pageTitle' => Lang::get("labels.view_editProduct"));
        $result = array();
        $result['request'] = $request;
        $result['product_id'] = $request->product_id;
        $result['operation'] = 'view_edit';
		return $this->ProductService->redirect_view($result,$title);
    }

    function addProduct(Request $request){
        $title = array('pageTitle' => Lang::get("labels.addProduct"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'add';
        // Log::info('[result] --  : ' . json_encode($result));
        return $this->ProductService->redirect_view($result,$title);
    }

    function updateProduct(Request $request){
        $title = array('pageTitle' => Lang::get("labels.updateProduct"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'edit';
        return $this->ProductService->redirect_view($result,$title);
    }

    function deleteProduct(Request $request){
        $title = array('pageTitle' => Lang::get("labels.deleteProduct"));
        $result = array();
        $result = $request->input();
        $result['request'] = $request;
        $result['operation'] = 'delete';
        return $this->ProductService->redirect_view($result,$title);
	}
}


