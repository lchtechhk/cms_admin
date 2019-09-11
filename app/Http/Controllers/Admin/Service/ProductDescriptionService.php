<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\View_ProductService;
use App\Http\Controllers\Admin\Service\LanguageService;
use App\Http\Controllers\Admin\Service\UploadService;
use function GuzzleHttp\json_encode;

class ProductDescriptionService extends BaseApiService{
    private $View_ProductService;
    private $LanguageService;
    private $UploadService;
    private $ProductService;


    function __construct(){
        $this->setTable('product_description');
        $this->View_ProductService = new View_ProductService();
        $this->LanguageService = new LanguageService();
        $this->UploadService = new UploadService();

    }
    function redirect_view($result,$title){
        $result['languages'] = $this->LanguageService->findAll();
        $result['label'] = "Product";
        switch($result['operation']){
            case 'listing':
                Log::info('[listing] --  : ');
                return view("admin.Product.listingProduct", $title)->with('result', $result);
            break;
            case 'view_add':
                Log::info('[view_add] --  : ');
                return view("admin.Product.viewProduct", $title)->with('result', $result);
            break;
            case 'view_edit':
                Log::info('[view_edit] --  : ');

                return view("admin.Product.viewProduct", $title)->with('result', $result);
            break;
            case 'add':
                try{
                    DB::beginTransaction();
                    Log::info('[add] --  : ');
                    DB::commit();
                    return view("admin.Product.viewProduct", $title)->with('result', $result);
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                    return view("admin.Product.viewProduct", $title)->with('result', $result);
                }
            break;
            case 'edit':
                try{
                    DB::beginTransaction();
                    Log::info('[edit] --  : ');
                    DB::commit();
                    return view("admin.Product.viewProduct", $title)->with('result', $result);
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                    return view("admin.Product.viewProduct", $title)->with('result', $result);
                }		
            break;
            case 'delete': 
                try{
                    Log::info('[delete] --  : ');
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }	
                
                return view("admin.Product.listingProduct", $title)->with('result', $result);
            break;
        }
    }
}

?>