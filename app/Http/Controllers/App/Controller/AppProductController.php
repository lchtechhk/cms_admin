<?php
namespace App\Http\Controllers\App\Controller;
use App\Http\Controllers\Controller;

use Validator;
use App;
use Lang;
use DB;
use Hash;
use Log;
use Auth;

//for requesting a value 
use Illuminate\Http\Request;
use function GuzzleHttp\json_encode;

use App\Http\Controllers\App\Service\AppProductService;

class AppProductController extends Controller{
    private $AppProductService;
    
	public function __construct(){
		$this->AppProductService = new AppProductService();

	}
    
    function listingProduct(Request $request){
        try{
            $result = array();
            $result['success'] = true;
            $result['products'] = $this->AppProductService->getProductList();
            return response()->json($result, 200);
        }catch(Exception $e){
            $result['success'] = false;
            $result['msg'] = $e->getMessage();
            return response()->json($result, 500);
        }
    }
}
