<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;

use App\Http\Controllers\Admin\Service\BaseApiService;
     class View_CCAZoneService extends BaseApiService{
        function __construct(){
            $this->setTable('view_country_city_area_zone');
        }

        function getListing(){
            $result = DB::table($this->getTable())
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