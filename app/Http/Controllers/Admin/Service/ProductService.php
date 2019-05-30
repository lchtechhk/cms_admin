<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\View_ProductService;
use App\Http\Controllers\Admin\Service\View_CategoryService;
use App\Http\Controllers\Admin\Service\View_SubCategoryService;
use App\Http\Controllers\Admin\Service\View_ManufacturerService;
use App\Http\Controllers\Admin\Service\UnitService;

use App\Http\Controllers\Admin\Service\LanguageService;
use App\Http\Controllers\Admin\Service\UploadService;
use App\Http\Controllers\Admin\Service\ProductDescriptionService;

use function GuzzleHttp\json_encode;

class ProductService extends BaseApiService{
    private $View_ProductService;
    private $LanguageService;
    private $UploadService;
    private $ProductService;


    function __construct(){
        $this->setTable('product');
        $this->View_ProductService = new View_ProductService();
        $this->LanguageService = new LanguageService();
        $this->UploadService = new UploadService();
        $this->ProductDescriptionService = new ProductDescriptionService();
        $this->View_CategoryService = new View_CategoryService();
        $this->View_SubCategoryService = new View_SubCategoryService();
        $this->View_ManufacturerService = new View_ManufacturerService();
        $this->UnitService = new UnitService();


    }

    function getProduct($sub_category_id){
        $sub_category_array = $this->View_SubCategoryService->findByColumnAndId("sub_category_id",$sub_category_id);
        $sub_category = !empty($sub_category_array) && sizeof($sub_category_array) > 0 ? $sub_category_array[0] : array();
        $sub_category->language_array = array();
        foreach ($sub_category_array as $obj) {
            $language_id = $obj->sub_category_language_id;
            $name = $obj->category_name;
            $sub_category->language_array[$language_id] = array();
            $sub_category->language_array[$language_id]['name'] = $name;
        }
        Log::info('[sub_category] -- getSubCategory : ' .json_encode($sub_category));
        return $sub_category;
    }
    
    function redirect_view($result,$title){
        $result['languages'] = $this->LanguageService->findAll();
        $result['view_sub_categories'] = $this->View_SubCategoryService->getListing();
        $result['view_manufacturers'] = $this->View_ManufacturerService->getListing();
        $result['units'] = $this->UnitService->getUnit();
        $result['label'] = "Product";
        switch($result['operation']){
            case 'listing':
                $result['products'] = $this->View_ProductService->getListing();
                Log::info('[listing] --  : ' . \json_encode($result));
                return view("admin.Product.listingProduct", $title)->with('result', $result);
            break;
            case 'view_add':
                Log::info('[view_add] --  : ' . \json_encode($result));
                return view("admin.Product.viewProduct", $title)->with('result', $result);
            break;
            case 'view_edit':
                $result['product'] = $this->getSubCategory($result['product_id']);
                Log::info('[view_edit] --  : '. \json_encode($result));

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