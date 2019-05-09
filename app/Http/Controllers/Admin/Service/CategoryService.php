<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\View_CategoryService;

class CategoryService extends BaseApiService{
    private $View_CategoryService;

    function __construct(){
        $this->setTable('category');
        $this->View_CategoryService = new View_CategoryService();
    }
    function getListing(){
        return $this->findAll();
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
            case 'add':
                return view("admin.category.view_addCategory", $title)->with('result', $result);
            break;
            case 'edit':
                $result['category'] = $this->findById($result['request']->id);
                return view("admin.category.view_editCategory", $title)->with('result', $result);		
            break;
        }
    }
}

?>