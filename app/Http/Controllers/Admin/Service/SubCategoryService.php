<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;


class SubCategoryService extends BaseApiService{


    function __construct(){
        $this->setTable('sub_category');

    }
    function getListing(){
        return $this->findAll();
    }

    function redirect_view($result,$title){
        $result['label'] = "SubCategory";
        switch($result['operation']){
            case 'delete': 
            case 'listing':
                $result['customers'] = $this->getListing();
                Log::info('[Customer] -- getListing : ' .json_encode($result['customers'][0]));
                return view("admin.sub_category.listingSubCategory", $title)->with('result', $result);
            break;
            case 'add':
                return view("admin.sub_category.view_addSubCategory", $title)->with('result', $result);
            break;
            case 'edit':
                $result['customers'] = $this->findById($result['request']->id);
                return view("admin.sub_category.view_editSubCategory", $title)->with('result', $result);		
            break;
        }
    }
}

?>