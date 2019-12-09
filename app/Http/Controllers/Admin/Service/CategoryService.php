<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\View_CategoryService;
use App\Http\Controllers\Admin\Service\LanguageService;
use App\Http\Controllers\Admin\Service\UploadService;
use App\Http\Controllers\Admin\Service\CategoryDescriptionService;
use function GuzzleHttp\json_encode;

class CategoryService extends BaseApiService{
    private $View_CategoryService;
    private $LanguageService;
    private $UploadService;
    private $CategoryDescriptionService;


    function __construct(){
        $this->setTable('category');
        $this->companyAuth = true;
        $this->View_CategoryService = new View_CategoryService();
        $this->LanguageService = new LanguageService();
        $this->UploadService = new UploadService();
        $this->CategoryDescriptionService = new CategoryDescriptionService();

    }
    function getCategory($category_id){
        $category_array = $this->View_CategoryService->findByColumn_Value("category_id",$category_id);
        $category = !empty($category_array) && sizeof($category_array) > 0 ? $category_array[0] : array();
        $category->language_array = array();
        foreach ($category_array as $obj) {
            $language_id = $obj->language_id;
            $name = $obj->name;
            $category->language_array[$language_id] = array();
            $category->language_array[$language_id]['name'] = $name;
        }
        Log::info('[category] -- getListing : ' .json_encode($category));
        return $category;
    }
    function redirect_view($result,$title){
        $result['label'] = "Category";
        $result['languages'] = $this->LanguageService->findAll();
        switch($result['operation']){
            case 'listing':
                $result['categories'] = $this->View_CategoryService->getListing();
                // Log::info('['.$result['label'].'] -- getListing : ' .json_encode($result));
                return view("admin.category.listingCategory", $title)->with('result', $result);
            break;
            case 'view_add':
                return view("admin.category.viewCategory", $title)->with('result', $result);
            break;
            case 'view_edit':
                $result['category'] = $this->getCategory($result['category_id']);
                return view("admin.category.viewCategory", $title)->with('result', $result);
            break;
            case 'add':
                try{
                    DB::beginTransaction();
                    if($image = $this->UploadService->upload_image($result['request'],'image','resources/assets/images/category_images/'))$result['image'] = $image;
                    if($icon = $this->UploadService->upload_image($result['request'],'icon','resources/assets/images/category_icons/'))$result['icon'] = $icon;
                    $add_category_result = $this->add($result);
                    if(empty($add_category_result['status']) || $add_category_result['status'] == 'fail')throw new Exception("Error To Add Category");
                    $result['category_id'] = $add_category_result['response_id'];
                    foreach ($result['language_array'] as $language_id => $name) {
                        $param = array();
                        $param['language_id'] = $language_id;
                        $param['category_id'] = $result['category_id'];
                        $param['name'] = $name;
                        $add_category_description_result = $this->CategoryDescriptionService->add($param);
                        if(empty($add_category_description_result['status']) || $add_category_description_result['status'] == 'fail')throw new Exception("Error To Add SubCategory Description");
                    }
                    $result = $this->response($result,"Successful","view_edit");
                    $result['category'] = $this->getCategory($result['category_id']);
                    
                    DB::commit();
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }
                Log::info('[category result] -- add : ' .json_encode($result));
                return view("admin.category.viewCategory", $title)->with('result', $result);
            break;
            case 'edit':
                try{
                    DB::beginTransaction();
                    if($image = $this->UploadService->upload_image($result['request'],'image','resources/assets/images/category_images/'))$result['image'] = $image;
                    if($icon = $this->UploadService->upload_image($result['request'],'icon','resources/assets/images/category_icons/'))$result['icon'] = $icon;
                    Log::info('[result] --  : ' . json_encode($result));
                    $update_category_result = $this->update("category_id",$result);
                    if(empty($update_category_result['status']) || $update_category_result['status'] == 'fail')throw new Exception("Error To update Category");
                    foreach ($result['language_array'] as $language_id => $name) {
                        $param = array();
                        $param['name'] = $name;
                        $param['category_id'] = $result['category_id'];
                        $param['language_id'] = $language_id;
                        $isExisting = $this->CategoryDescriptionService->isExistingByMultipleKey_Value($param,array("category_id","language_id"),array($result['category_id'],$language_id));
                        if($isExisting){
                            $update_sub_category_description_result = $this->CategoryDescriptionService->updateByMultipleKey_Value($param,array("category_id","language_id"),array($result['category_id'],$language_id));
                            if(empty($update_sub_category_description_result['status']) || $update_sub_category_description_result['status'] == 'fail')throw new Exception("Error To Update Category");
                        }else {
                            $add_category_description_result = $this->CategoryDescriptionService->add($param);
                            if(empty($add_category_description_result['status']) || $add_category_description_result['status'] == 'fail')throw new Exception("Error To Add SubCategory Description");

                        }
                    }
                    $result = $this->response($result,"Successful","view_edit");
                    $result['category'] = $this->getCategory($result['category_id']);
                    DB::commit();
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }		
                return view("admin.category.viewCategory", $title)->with('result', $result);

            break;
            case 'delete': 
                try{
                    $delete_category_result = $this->deleteByKey_Value("category_id",$result['id']);
                    if(empty($delete_category_result['status']) || $delete_category_result['status'] == 'fail')throw new Exception("Error To Delete Category");
                    $delete_category_description_result = $this->CategoryDescriptionService->deleteByKey_Value("category_id",$result['id']);
                    if(empty($delete_category_description_result['status']) || $delete_category_description_result['status'] == 'fail')throw new Exception("Error To Delete Category");
                    $result['categories'] = $this->View_CategoryService->getListing();
                    $result = $this->response($result,"Success To Delete SubCategory","listing");
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }	
                
                return view("admin.category.listingCategory", $title)->with('result', $result);
            break;
        }
    }
}

?>