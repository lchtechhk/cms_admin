<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\View_SubCategoryService;

class SubCategoryService extends BaseApiService{
    private $View_SubCategoryService;

    function __construct(){
        $this->setTable('sub_category');
        $this->View_SubCategoryService = new View_SubCategoryService();

    }
    function getListing(){
        return $this->findAll();
    }

    function redirect_view($result,$title){
        $result['label'] = "SubCategory";
        switch($result['operation']){
            case 'delete': 
            case 'listing':
                $result['subCategory'] = $this->View_SubCategoryService->getListing();
                Log::info('['.$result['label'].'] -- getListing : ' .json_encode($result));
                return view("admin.subcategory.listingSubCategory", $title)->with('result', $result);
            break;
            case 'add':
                return view("admin.subcategory.addSubCategory", $title)->with('result', $result);
            break;
            case 'edit':
                $result['customers'] = $this->findById($result['request']->id);
                return view("admin.subcategory.view_editSubCategory", $title)->with('result', $result);		
            break;
        }
    }
}

?>