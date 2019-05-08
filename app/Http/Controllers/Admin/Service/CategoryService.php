<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;


class CategoryService extends BaseApiService{


    function __construct(){
        $this->setTable('category');

    }
    function getListing(){
        return $this->findAll();
    }

    function redirect_view($result,$title){
        $result['label'] = "Category";
        switch($result['operation']){
            case 'delete': 
            case 'listing':
                $result['customers'] = $this->getListing();
                Log::info('[Customer] -- getListing : ' .json_encode($result['customers'][0]));
                return view("admin.category.listingcategory", $title)->with('result', $result);
            break;
            case 'add':
                return view("admin.category.view_addcategory", $title)->with('result', $result);
            break;
            case 'edit':
                $result['customers'] = $this->findById($result['request']->id);
                return view("admin.category.view_editcategory", $title)->with('result', $result);		
            break;
        }
    }
}

?>