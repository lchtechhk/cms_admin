<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\View_CategoryService;
use App\Http\Controllers\Admin\Service\LanguageService;

class CategoryService extends BaseApiService{
    private $View_CategoryService;
	private $LanguageService;
    function __construct(){
        $this->setTable('category');
        $this->View_CategoryService = new View_CategoryService();
        $this->LanguageService = new LanguageService();

    }
    function getListing(){
        return $this->findAllByLanguage(session('language_id'));
    }

    function redirect_view($result,$title){
        $result['label'] = "Category";
        switch($result['operation']){
            case 'delete': 
            case 'listing':
                $result['category'] = $this->View_CategoryService->getListing();
                Log::info('['.$result['label'].'] -- getListing : ' .json_encode($result));
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
                $language_array = $this->LanguageService->findAll();
                $result['language'] = $language_array;
                return view("admin.category.viewCategory", $title)->with('result', $result);
            break;
            case 'edit':
                $result['category'] = $this->findById($result['request']->id);
                return view("admin.category.viewCategory", $title)->with('result', $result);		
            break;
        }
    }
}

?>