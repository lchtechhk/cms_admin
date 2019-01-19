<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;

use App\Http\Controllers\Admin\Service\BaseApiService;
     class View_CCADistrictService extends BaseApiService{
        function __construct(){
            $this->setTable('view_country_city_area_district');
        }

        function getListing(){
            $result = DB::table($this->getTable())
            ->where('district_status','=','active')
			->orderBy('countries_id','ASC')
            ->paginate(60);
            return $result;
        }
        function redirect_view($result,$title){
            // switch($result['operation']){
            //     case 'listing':
            //         return view("admin.listingCities", $title)->with('result', $result);
            //     break;
            //     case 'add':
            //         return view("admin.addCity", $title)->with('result', $result);
            //     break;

            //     case 'edit':
            //         return view("admin.editCity", $title)->with('result', $result);		
            //     break;
            //     case 'delete': 
            //         return view("admin.listingCities", $title)->with('result', $result);	
            //     break;
            // }

        }
    }
?>