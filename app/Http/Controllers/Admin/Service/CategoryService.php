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
        $this->View_CategoryService = new View_CategoryService();
        $this->LanguageService = new LanguageService();
        $this->UploadService = new UploadService();
        $this->CategoryDescriptionService = new CategoryDescriptionService();

    }
    function getListing(){
        return $this->findAllByLanguage(session('language_id'));
    }

    function redirect_view($result,$title){
        $result['label'] = "Category";
        switch($result['operation']){
            case 'listing':
                $result['categories'] = $this->View_CategoryService->getListing();
                // Log::info('['.$result['label'].'] -- getListing : ' .json_encode($result));
                return view("admin.category.listingCategory", $title)->with('result', $result);
            break;
            case 'view_add':
                $language_array = $this->LanguageService->findAll();
                $result['languages'] = $language_array;
                return view("admin.category.viewCategory", $title)->with('result', $result);
            break;
            case 'view_edit':
                $result['languages'] = $this->LanguageService->findAll();
                $category_array = $this->View_CategoryService->findByColumnAndId('category_id',$result['request']->id);
                $result['category'] = $category_array[0];
                return view("admin.category.viewCategory", $title)->with('result', $result);
            break;
            case 'add':
                try{
                    DB::beginTransaction();
                    $result['languages'] = $this->LanguageService->findAll();
                    if($image = $this->UploadService->upload_image($result['request'],'image','resources/assets/images/category_images/'))$result['image'] = $image;
                    if($icon = $this->UploadService->upload_image($result['request'],'icon','resources/assets/images/category_icons/'))$result['icon'] = $icon;
                    $add_category_result = $this->add($result,"Successful","Fail");
                    if(empty($add_category_result['status']) || $add_category_result['status'] == 'fail')throw new Exception("Error To Add Category");
                    $result['category_id'] = $add_category_result['response_id'];
                    Log::info('[result] --  : ' .json_encode($result));
                    foreach ($result['name'] as $language_id => $name) {
                        $param = array();
                        $param['language_id'] = $language_id;
                        $param['category_id'] = $result['category_id'];
                        $param['name'] = $name;
                        $param['label'] = $result['label'];
                        $add_sub_category_description_result = $this->CategoryDescriptionService->add($param,"Successful","Fail");
                        if(empty($add_sub_category_description_result['status']) || $add_sub_category_description_result['status'] == 'fail')throw new Exception("Error To Add SubCategory Description");
                    }
                    $result['status'] = 'success';
                    $result['message'] =  'Success To Add Category';
                    $result['label'] = "Category";
                    $result['operation'] = "view_edit";
                    $category_array = $this->findByColumnAndId("category_id",$result['category_id']);
                    $result['category'] = !empty($category_array) && sizeof($category_array) ? $category_array[0] : array();
                    DB::commit();
                    return view("admin.category.viewCategory", $title)->with('result', $result);
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                    return view("admin.category.viewCategory", $title)->with('result', $result);
                }
            break;
            case 'edit':
                try{
                    DB::beginTransaction();
                    $result['languages'] = $this->LanguageService->findAll();
                    if($image = $this->UploadService->upload_image($result['request'],'image','resources/assets/images/category_images/'))$result['image'] = $image;
                    if($icon = $this->UploadService->upload_image($result['request'],'icon','resources/assets/images/category_icons/'))$result['icon'] = $icon;
                    Log::info('[result] --  : ' . json_encode($result));
                    $update_category_result = $this->update("category_id",$result,"Successful","Fail");
                    if(empty($update_category_result['status']) || $update_category_result['status'] == 'fail')throw new Exception("Error To update Category");
                    foreach ($result['name'] as $language_id => $name) {
                        $param = array();
                        $param['language_id'] = $language_id;
                        $param['category_id'] = $result['category_id'];
                        $param['name'] = $name;
                        $param['label'] = $result['label'];
                        $update_sub_category_description_result = $this->CategoryDescriptionService->update("category_id",$param,"Successful","Fail");
                        if(empty($update_sub_category_description_result['status']) || $update_sub_category_description_result['status'] == 'fail')throw new Exception("Error To Update Category");
                    }
                    $result['status'] = 'success';
                    $result['message'] =  'Success To Update Category';
                    $result['label'] = "Category";
                    $result['operation'] = "view_edit";
                    $category_array = $this->findByColumnAndId("category_id",$result['category_id']);
                    $result['category'] = !empty($category_array) && sizeof($category_array) ? $category_array[0] : array();
                    DB::commit();
                    return view("admin.category.viewCategory", $title)->with('result', $result);
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                    return view("admin.category.viewCategory", $title)->with('result', $result);
                }		
            break;
            case 'delete': 
                Log::info('[result] --  : ' . $result['id']);
                $delete_category_result = $this->deleteByKey_Value("category_id",$result['id'],"Successful","Fail");
                $delete_category_result['categories'] = $this->View_CategoryService->getListing();
                $delete_category_result['label'] = $result['label'];
                return view("admin.category.listingCategory", $title)->with('result', $delete_category_result);
            break;
        }
    }
}

?>