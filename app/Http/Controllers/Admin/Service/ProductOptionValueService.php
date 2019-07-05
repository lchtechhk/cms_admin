<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\UploadService;
use App\Http\Controllers\Admin\Service\ProductOptionValueDescService;
use App\Http\Controllers\Admin\Service\View_ProductOptionValueService;
use App\Http\Controllers\Admin\Service\View_ProductOptionService;

use App\Http\Controllers\Admin\Service\LanguageService;

class ProductOptionValueService extends BaseApiService{
    private $ProductOptionValueDescService;
    private $View_ProductOptionValueService;
    private $View_ProductOptionService;

    private $LanguageService;

    function __construct(){
        $this->setTable('product_option_value');
        $this->LanguageService = new LanguageService();
        $this->UploadService = new UploadService();
        $this->ProductOptionValueDescService = new ProductOptionValueDescService();
        $this->View_ProductOptionValueService = new View_ProductOptionValueService();
        $this->View_ProductOptionService = new View_ProductOptionService();

    }
    function redirect_view($result,$title){
        $result['label'] = "ProductOptionValue";
        $result['languages'] = $this->LanguageService->findAll();
        $result['view_product_options'] = $this->View_ProductOptionService->getListing();
        switch($result['operation']){
            case 'listing':
                $result["product_option_values"] = $this->View_ProductOptionValueService->getListing();
                // Log::info('[listing] --  : ' . \json_encode($result));
                return view("admin.product_option_value.listingProductOptionValue", $title)->with('result', $result);
            break;
            case 'view_add':
                // Log::info('[view_add] --  : ' . \json_encode($result));
                return view("admin.product_option_value.viewProductOptionValue", $title)->with('result', $result);
            break;
            case 'view_edit':
                // Log::info('[view_edit] --  : ');
                $result['product_option_value'] = $this->View_ProductOptionValueService->getProductOptionValue($result['product_option_value_id']);
                Log::info('[view_edit] --  : ' . \json_encode($result));
                return view("admin.product_option_value.viewProductOptionValue", $title)->with('result', $result);
            break;
            case 'add':
                //  Log::info('[add] --  : '. \json_encode($result));
                 try{
                    DB::beginTransaction();
                    $add_product_option_value_result = $this->add($result);
                    $result['product_option_value_id'] = $add_product_option_value_result['response_id'];
                    if(empty($add_product_option_value_result['status']) || $add_product_option_value_result['status'] == 'fail')throw new Exception("Error To Add Product Option Value");
                    foreach ($result['language_array'] as $language_id => $obj) {
                        $name = $obj['name'];
                        $param = array();
                        $param['language_id'] = $language_id;
                        $param['product_option_value_id'] = $result['product_option_value_id'];
                        $param['name'] = $name;
                        $add_product_option_value_desc_result = $this->ProductOptionValueDescService->add($param);
                        if(empty($add_product_option_value_desc_result['status']) || $add_product_option_value_desc_result['status'] == 'fail')throw new Exception("Error To Add Product Option Value Description");
                    }
                    $result = $this->response($result,"Successful","listing");
                    $result["product_option_values"] = $this->View_ProductOptionValueService->getListing();
                    DB::commit();
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }
                $result["product_option_values"] = $this->View_ProductOptionValueService->getListing();
                return view("admin.product_option_value.listingProductOptionValue", $title)->with('result', $result);
            break;
            case 'edit':
            Log::info('[edit] --  : ' . \json_encode($result));
                try{
                    DB::beginTransaction();
                    $update_product_option_value_result = $this->update("product_option_value_id",$result);
                    if(empty($update_product_option_value_result['status']) || $update_product_option_value_result['status'] == 'fail')throw new Exception("Error To Update Product Option");
                    foreach ($result['language_array'] as $language_id => $obj) {
                        $name = $obj['name'];
                        $param = array();
                        $param['language_id'] = $language_id;
                        $param['product_option_value_id'] = $result['product_option_value_id'];
                        $param['name'] = $name;
                        $isExisting = $this->ProductOptionValueDescService->isExistingByMultipleKey_Value($param,array("product_option_value_id","language_id"),array($result['product_option_value_id'],$language_id));
                        if($isExisting){
                            $update_product_option_value_description_result = $this->ProductOptionValueDescService->updateByMultipleKey_Value($param,array("product_option_value_id","language_id"),array($result['product_option_value_id'],$language_id));
                            if(empty($update_product_option_value_description_result['status']) || $update_product_option_value_description_result['status'] == 'fail')throw new Exception("Error To Update Product Option Value");
                        }else {
                            $add_product_option_value_description_result = $this->ProductOptionValueDescService->add($param);
                            if(empty($add_product_option_value_description_result['status']) || $add_product_option_value_description_result['status'] == 'fail')throw new Exception("Error To Add Product Option Value Description");
                        }
                    }
                    $result = $this->response($result,"Successful","listing");
                    DB::commit();
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }	
                $result["product_option_values"] = $this->View_ProductOptionValueService->getListing();
                return view("admin.product_option_value.listingProductOptionValue", $title)->with('result', $result);	
            break;
            case 'delete': 
                Log::info('[delete] --  : ');
                try{
                    $delete_product_option_value_result = $this->deleteByKey_Value("product_option_value_id",$result['product_option_value_id']);
                    if(empty($delete_product_option_value_result['status']) || $delete_product_option_value_result['status'] == 'fail')throw new Exception("Error To Delete Product Option Value");
                    $delete_product_option_desc_result = $this->ProductOptionValueDescService->deleteByKey_Value("product_option_value_id",$result['product_option_value_id']);
                    if(empty($delete_product_option_desc_result['status']) || $delete_product_option_desc_result['status'] == 'fail')throw new Exception("Error To Delete Product Option Value Description");
                    $result["product_option_values"] = $this->View_ProductOptionValueService->getListing();
                    $result = $this->response($result,"Successful","listing");
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }	
                return view("admin.product_option_value.listingProductOptionValue", $title)->with('result', $result);
            break;
        }
    }
}

?>