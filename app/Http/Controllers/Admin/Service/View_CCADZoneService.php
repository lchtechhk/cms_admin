<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;

use App\Http\Controllers\Admin\Service\BaseApiService;
     class View_CCADZoneService extends BaseApiService{
        function __construct(){
            $this->setTable('view_country_city_area_district_zone');
            $this->companyAuth = true;

        }

        function getListing(){
            $result = DB::table($this->getTable())
            ->where('zone_status','=','active')
            ->where('company_id','=',Session::get('default_company_id'))
            ->orderBy('countries_id','ASC')
            ->orderBy('zone_id','ASC')
            ->paginate(60);
            return $result;
        }
        function redirect_view($result,$title){
           
        }

        function getCCADZoneNameById($zone_id){
            $CCADZoneName_obj = array();
            $result = DB::table($this->getTable())
            ->where('zone_id','=',$zone_id)
            ->first();
            $countries_name = $result->countries_name;
            $cities_name = $result->cities_name;
            $area_name = $result->area_name;
            $district_name = $result->district_name;
            $zone_name = $result->zone_name;

            $ch = $countries_name . " " . $cities_name . " " . $area_name . " " . $district_name . " ". $zone_name;
            $en = $zone_name . " " . $district_name . " " . $area_name . " " . $cities_name . " ". $countries_name;
            $CCADZoneName_obj['ch'] = $ch;
            $CCADZoneName_obj['en'] = $en;
            return $CCADZoneName_obj;
        }
    }
?>