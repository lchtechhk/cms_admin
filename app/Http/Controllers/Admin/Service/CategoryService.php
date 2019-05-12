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
                $result['language'] = $language_array;
                return view("admin.category.viewCategory", $title)->with('result', $result);
            break;
            case 'view_edit':
                $result['language'] = $this->LanguageService->findAll();
                $category_array = $this->View_CategoryService->findByColumnAndId('category_id',$result['request']->id);
                $result['category'] = $category_array[0];
                return view("admin.category.viewCategory", $title)->with('result', $result);
            break;
            case 'add':
                try{
                    DB::beginTransaction();
                    // Log::info('[result] --  : ' .json_encode($result));
                    $result['language'] = $this->LanguageService->findAll();
                    $result['image'] = $this->UploadService->upload_image($result['request'],'image','resources/assets/images/category_images/');
                    $result['icon'] = $this->UploadService->upload_image($result['request'],'icon','resources/assets/images/category_icons/');
                    $category_result = $this->add($result,"Successful","Fail");
                    if(empty($category_result['status']) || $category_result['status'] == 'fail')throw new Exception("Error To Add Category");
                    $result['category_id'] = $category_result['response_id'];
                    $sub_category_description_result = $this->CategoryDescriptionService->add($result,"Successful","Fail");
                    if(empty($sub_category_description_result['status']) || $sub_category_description_result['status'] == 'fail')throw new Exception("Error To Add Category");

                    $result['status'] = 'success';
                    $result['message'] =  'Success To Add Category';
                    DB::commit();
                    return view("admin.category.viewCategory", $title)->with('result', $result);
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                    return view("admin.category.viewCategory", $title)->with('result', $result);
                }
            break;
            case 'edit':
                $result['category'] = $this->findById($result['request']->id);
                return view("admin.category.viewCategory", $title)->with('result', $result);		
            break;
            case 'delete': 
                $delete_category_result = $this->delete($result['id'],"Successful","Fail");
                $delete_category_result['categories'] = $this->View_CategoryService->getListing();
                return view("admin.category.listingCategory", $title)->with('result', $delete_category_result);
            break;
        }
    }
}

?>