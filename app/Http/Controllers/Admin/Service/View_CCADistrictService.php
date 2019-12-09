<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Session;

use App\Http\Controllers\Admin\Service\BaseApiService;
     class View_CCADistrictService extends BaseApiService{
        function __construct(){
            $this->setTable('view_country_city_area_district');
            $this->companyAuth = true;
        }

        function getListing(){
            $result = DB::table($this->getTable())
            ->where('district_status','=','active')
            ->where('company_id','=',Session::get('default_company_id'))
            ->orderBy('countries_id','ASC')
            ->orderBy('district_id','ASC')
            ->paginate(60);
            return $result;
        }
        function redirect_view($result,$title){
        }
        function getCCADistrictNameById($district_id){
            $CCADistrict_obj = array();
            $result = DB::table($this->getTable())
            ->where('district_id','=',$district_id)
            ->first();
            $countries_name = $result->countries_name;
            $cities_name = $result->cities_name;
            $area_name = $result->area_name;
            $district_name = $result->district_name;

            $ch = $countries_name . " " . $cities_name . " " . $area_name . " " . $district_name ;
            $en = $district_name . " " . $area_name . " " . $cities_name . $countries_name;
            $CCADistrict_obj['ch'] = $ch;
            $CCADistrict_obj['en'] = $en;
            return $CCADistrict_obj;
        }
    }
?>