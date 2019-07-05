<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\UploadService;
use App\Http\Controllers\Admin\Service\LanguageService;
use App\Http\Controllers\Admin\Service\View_ProductOptionService;
use App\Http\Controllers\Admin\Service\ProductOptionDescService;

class ProductOptionService extends BaseApiService{
    private $UploadService;
    private $View_ProductOptionService;
    private $LanguageService;

    function __construct(){
        $this->setTable('product_option');
        $this->LanguageService = new LanguageService();
        $this->View_ProductOptionService = new View_ProductOptionService();
        $this->ProductOptionDescService = new ProductOptionDescService();
        $this->UploadService = new UploadService();

    }

    function redirect_view($result,$title){
        $result['label'] = "ProductOption";
        $result['languages'] = $this->LanguageService->findAll();

        switch($result['operation']){
            case 'listing':
                $result["product_options"] = $this->View_ProductOptionService->getListing();
                Log::info('[listing] --  : ' . \json_encode($result));
                return view("admin.product_option.listingProductOption", $title)->with('result', $result);
            break;
            case 'view_add':
                Log::info('[view_add] --  : ' . \json_encode($result));
                return view("admin.product_option.viewProductOption", $title)->with('result', $result);
            break;
            case 'view_edit':
                $result['product_option'] = $this->View_ProductOptionService->getProductOption($result['product_option_id']);
                Log::info('[view_edit] --  : ' . \json_encode($result));
                return view("admin.product_option.viewProductOption", $title)->with('result', $result);
            break;
            case 'add':
                //  Log::info('[add] --  : '. \json_encode($result));
                try{
                    DB::beginTransaction();
                    $add_product_option_result = $this->add($result);
                    $result['product_option_id'] = $add_product_option_result['response_id'];
                    if(empty($add_product_option_result['status']) || $add_product_option_result['status'] == 'fail')throw new Exception("Error To Add Product Option");
                    foreach ($result['language_array'] as $language_id => $obj) {
                        $name = $obj['name'];
                        $param = array();
                        $param['language_id'] = $language_id;
                        $param['product_option_id'] = $result['product_option_id'];
                        $param['name'] = $name;
                        $add_product_option_desc_result = $this->ProductOptionDescService->add($param);
                        if(empty($add_product_option_desc_result['status']) || $add_product_option_desc_result['status'] == 'fail')throw new Exception("Error To Add Product Option Description");
                    }
                    $result = $this->response($result,"Successful","listing");
                    $result["product_options"] = $this->View_ProductOptionService->getListing();
                    DB::commit();
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }
                $result["product_options"] = $this->View_ProductOptionService->getListing();
                return view("admin.product_option.listingProductOption", $title)->with('result', $result);
            break;
            case 'edit':
                // Log::info('[edit] --  : ' . \json_encode($result));
                try{
                    DB::beginTransaction();
                    $update_product_option_result = $this->update("product_option_id",$result);
                    if(empty($update_product_option_result['status']) || $update_product_option_result['status'] == 'fail')throw new Exception("Error To Update Product Option");
                    foreach ($result['language_array'] as $language_id => $obj) {
                        $name = $obj['name'];
                        $param = array();
                        $param['language_id'] = $language_id;
                        $param['product_option_id'] = $result['product_option_id'];
                        $param['name'] = $name;
                        $isExisting = $this->ProductOptionDescService->isExistingByMultipleKey_Value($param,array("product_option_id","language_id"),array($result['product_option_id'],$language_id));
                        if($isExisting){
                            $update_product_option_description_result = $this->ProductOptionDescService->updateByMultipleKey_Value($param,array("product_option_id","language_id"),array($result['product_option_id'],$language_id));
                            if(empty($update_product_option_description_result['status']) || $update_product_option_description_result['status'] == 'fail')throw new Exception("Error To Update Product Option");
                        }else {
                            $add_product_option_description_result = $this->ProductOptionDescService->add($param);
                            if(empty($add_product_option_description_result['status']) || $add_product_option_description_result['status'] == 'fail')throw new Exception("Error To Add Product Option Description");
                        }
                    }
                    $result = $this->response($result,"Successful","listing");
                    DB::commit();
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }	
                $result["product_options"] = $this->View_ProductOptionService->getListing();
                return view("admin.product_option.listingProductOption", $title)->with('result', $result);	
            break;
            case 'delete': 
                Log::info('[delete] --  : ');
                try{
                    $delete_product_option_result = $this->deleteByKey_Value("product_option_id",$result['product_option_id']);
                    if(empty($delete_product_option_result['status']) || $delete_product_option_result['status'] == 'fail')throw new Exception("Error To Delete Product Option");
                    $delete_product_option_desc_result = $this->ProductOptionDescService->deleteByKey_Value("product_option_id",$result['product_option_id']);
                    if(empty($delete_product_option_desc_result['status']) || $delete_product_option_desc_result['status'] == 'fail')throw new Exception("Error To Delete Product Option Description");
                    $result["product_options"] = $this->View_ProductOptionService->getListing();
                    $result = $this->response($result,"Successful","listing");
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }	
                return view("admin.product_option.listingProductOption", $title)->with('result', $result);
            break;
        }
    }
}

?>