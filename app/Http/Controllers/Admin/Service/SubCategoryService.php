<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\View_CategoryService;
use App\Http\Controllers\Admin\Service\View_SubCategoryService;
use App\Http\Controllers\Admin\Service\SubCategoryDescriptionService;
use App\Http\Controllers\Admin\Service\LanguageService;
use App\Http\Controllers\Admin\Service\UploadService;

class SubCategoryService extends BaseApiService{
    private $View_CategoryService;
    private $View_SubCategoryService;
    private $LanguageService;
    private $UploadService;
    private $SubCategoryDescriptionService;
    
    function __construct(){
        $this->setTable('sub_category');
        $this->View_CategoryService = new View_CategoryService();
        $this->View_SubCategoryService = new View_SubCategoryService();
        $this->LanguageService = new LanguageService();
        $this->UploadService = new UploadService();
        $this->SubCategoryDescriptionService = new SubCategoryDescriptionService();
    }
    function getListing(){
        return $this->findAll();
    }

    function redirect_view($result,$title){
        $result['label'] = "SubCategory";
        $result['languages'] = $this->LanguageService->findAll();
        $result['categories'] = $this->View_CategoryService->getListing();
        switch($result['operation']){
            case 'listing':
                $result['subCategory'] = $this->View_SubCategoryService->getListing();
                return view("admin.subcategory.listingSubcategory", $title)->with('result', $result);
            break;
            case 'view_add':
                return view("admin.subcategory.viewSubcategory", $title)->with('result', $result);
            break;
            case 'view_edit':
                $sub_category_array = $this->View_SubCategoryService->findByColumnAndId("sub_category_id",$result['sub_category_id']);
                $result['sub_category'] = !empty($sub_category_array) &&  sizeof($sub_category_array) > 0 ? $sub_category_array[0] : array();
                return view("admin.subcategory.viewSubcategory", $title)->with('result', $result);	
            break;
            case 'add':
                try{
                    DB::beginTransaction();
                    if($image = $this->UploadService->upload_image($result['request'],'image','resources/assets/images/sub_category_images/'))$result['image'] = $image;
                    if($icon = $this->UploadService->upload_image($result['request'],'icon','resources/assets/images/sub_category_icons/'))$result['icon'] = $icon;
                    $add_sub_category_result = $this->add($result);
                    if(empty($add_sub_category_result['status']) || $add_sub_category_result['status'] == 'fail')throw new Exception("Error To Add Category");
                    foreach ($result['name'] as $language_id => $name) {
                        $param = array();
                        $param['language_id'] = $language_id;
                        $param['category_id'] = $result['category_id'];
                        $param['sub_category_id'] = $add_sub_category_result["response_id"];
                        $param['name'] = $name;
                        $param['label'] = $result['label'];
                        $add_sub_category_description_result = $this->SubCategoryDescriptionService->add($param);
                        if(empty($add_sub_category_description_result['status']) || $add_sub_category_description_result['status'] == 'fail')throw new Exception("Error To Add SubCategory Description");
                    }    
                    $sub_category_array = $this->View_SubCategoryService->findByColumnAndId("sub_category_id",$add_sub_category_result["response_id"]);
                    $result['sub_category'] = !empty($sub_category_array) &&  sizeof($sub_category_array) > 0 ? $sub_category_array[0] : array();
                    $result = $this->response($result,"Success To Add SubCategory","view_edit");
                    DB::commit();
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }
                return view("admin.subcategory.viewSubcategory", $title)->with('result', $result);
            break;
            case 'edit':
                try{
                    DB::beginTransaction();
                    if($image = $this->UploadService->upload_image($result['request'],'image','resources/assets/images/sub_category_images/'))$result['image'] = $image;
                    if($icon = $this->UploadService->upload_image($result['request'],'icon','resources/assets/images/sub_category_icons/'))$result['icon'] = $icon;
                    $update_sub_category_result = $this->update("sub_category_id",$result);
                    if(empty($update_sub_category_result['status']) || $update_sub_category_result['status'] == 'fail')throw new Exception("Error To Update SubCategory");
                    foreach ($result['name'] as $language_id => $name) {
                        $param = array();
                        $param['name'] = $name;
                        $param['label'] = $result['label'];
                        $update_sub_category_description_result = $this->SubCategoryDescriptionService->updateByMultipleKey_Value($param,array("sub_category_id","language_id",),array($result['sub_category_id'],$language_id));
                        if(empty($update_sub_category_description_result['status']) || $update_sub_category_description_result['status'] == 'fail')throw new Exception("Error To Update SubCategory Description");
                    }    
                    $result = $this->response($result,"Successful","view_edit");
                    $sub_category_array = $this->View_SubCategoryService->findByColumnAndId("sub_category_id",$result['sub_category_id']);
                    $result['sub_category'] = !empty($sub_category_array) &&  sizeof($sub_category_array) > 0 ? $sub_category_array[0] : array();
                    DB::commit();
                    return view("admin.subcategory.viewSubcategory", $title)->with('result', $result);
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }
                return view("admin.subcategory.viewSubcategory", $title)->with('result', $result);		
            break;
            case 'delete': 
                try{
                    $delete_sub_category_result = $this->deleteByKey_Value("sub_category_id",$result['id']);
                    if(empty($delete_sub_category_result['status']) || $delete_sub_category_result['status'] == 'fail')throw new Exception("Error To Delete Sub Category");
                    $delete_sub_category_description_result = $this->SubCategoryDescriptionService->deleteByKey_Value("sub_category_id",$result['id']);
                    if(empty($delete_sub_category_description_result['status']) || $delete_sub_category_description_result['status'] == 'fail')throw new Exception("Error To Delete Category");
                    $result['subCategory'] = $this->View_SubCategoryService->getListing();
                    $result = $this->response($result,"Success To Delete SubCategory","listing");
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }	
                return view("admin.subcategory.listingSubcategory", $title)->with('result', $result);
            break;
        }
    }
}

?>