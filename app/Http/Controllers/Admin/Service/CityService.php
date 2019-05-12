<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\BaseApiService;
use App\Http\Controllers\Admin\Service\View_CCityService;
use App\Http\Controllers\Admin\Service\CountryService;
use App\Http\Controllers\Admin\Service\View_CCADZoneService;
use App\Http\Controllers\Admin\Service\View_CCADistrictService;
use App\Http\Controllers\Admin\Service\View_CCAreaService;
use function GuzzleHttp\json_encode;

class CityService extends BaseApiService{
        private $CountryService;
        private $ZoneService;

        private $View_CCityService;
        private $View_CCADZoneService;
        function __construct(){
            $this->setTable('cities');
            $this->CountryService = new CountryService();
            $this->View_CCityService = new View_CCityService();
            $this->View_CCADZoneService = new View_CCADZoneService();
            $this->View_CCADistrictService = new View_CCADistrictService();
            $this->View_CCAreaService = new View_CCAreaService();
            
        }
        public function delete_relative($array,$success_msg,$fail_msg){
            $result = array();	
            $result['operation'] = 'delete';
            $result['label'] = $array['label'];
            try{
                DB::connection()->getPdo()->beginTransaction();
                Log::info('[CityService] : ' . json_encode($array));
                // $countries_id = $this->View_CCADZoneService->findByColumn_IdArray('countries_id','zone_id',$request->id);
                // $cities_id_array = $this->View_CCADZoneService->findByColumn_IdArray('cities_id','cities_id',$request->id);
                $area_id_array = $this->View_CCADZoneService->findByColumn_IdArray('cities_id','area_id',$array['id']);
                $district_id_array = $this->View_CCADZoneService->findByColumn_IdArray('cities_id','district_id',$array['id']);
                $zone_id_array = $this->View_CCADZoneService->findByColumn_IdArray('cities_id','zone_id',$array['id']);
                
                
                $delete_count = $this->delete($array['id'],$success_msg,$fail_msg);
                if($delete_count == 0) throw new Exception("Error To Delete City", 1);

                if(is_array($area_id_array) && sizeof($area_id_array) > 0){
                    $delete_count = $this->customMultipleDelete('area',$area_id_array);
                    if($delete_count == 0) throw new Exception("Error To Delete Area", 1);
                }
                
                if(is_array($district_id_array) && sizeof($district_id_array) > 0){
                    $delete_count = $this->customMultipleDelete('district',$district_id_array);
                    if($delete_count == 0) throw new Exception("Error To Delete District", 1);
                }

                if(is_array($zone_id_array) && sizeof($zone_id_array) > 0){
                    $delete_count = $this->customMultipleDelete('zones',$zone_id_array);
                    if($delete_count == 0) throw new Exception("Error To Delete Zones", 1);
                }
                DB::connection()->getPdo()->commit();
                $result['status'] = 'success';
				$result['message'] =  Lang::get($success_msg);
            }catch (Exception $e){
                $result = $this->throwException($result,$e->getMessage(),true);
            }
            return $result;
        }
        function redirect_view($result,$title){
            $result['label'] = "City";
            switch($result['operation']){
                case 'listing':
                    $result['country_search'] = $this->CountryService->findAll();
                    $result['cities'] = $this->View_CCityService->getListing();
                    return view("admin.location.city.listingCity", $title)->with('result', $result);
                break;
                case 'view_add':
                    $result['countries'] = $this->CountryService->findAll();
                    return view("admin.location.city.addCity", $title)->with('result', $result);
                break;
                case 'view_edit':
                    $result['countries'] = $this->findById($result['request']->id);
                    $cities = $this->findById($result['request']->id);
                    $city = !empty($cities) && sizeof($cities) > 0 ? $cities[0] : array();
                    $result['city'] = $city;
                    Log::info('[result] -- getListing : ' .json_encode($result));

                    return view("admin.location.city.editCity", $title)->with('result', $result);	
                break;

                case 'add':
                    $add_city_result = $this->add($result,"labels.CityAddedMessage","labels.CityAddedMessageFail");

                    $add_city_result['countries'] = $this->CountryService->findAll();
                    return view("admin.location.city.addCity", $title)->with('result', $add_city_result);
                break;
                case 'edit':
                    $update_city_result = $this->update('id',$result,"labels.CityAddedMessage","labels.CityAddedMessageFail");
                    $cities = $this->findById($result['request']->id);
                    $city = !empty($cities) && sizeof($cities) > 0 ? $cities[0] : array();
                    $update_city_result['city'] = $city;
                    $update_city_result['countries'] = $this->CountryService->findAll();
                    return view("admin.location.city.editCity", $title)->with('result', $update_city_result);		
                break;
                case 'delete': 
                    $result = $this->delete_relative($result,"labels.CityDeletedTax","labels.CityDeletedTaxFail"); 

                    $result['country_search'] = $this->CountryService->findAll();
                    $result['cities'] = $this->View_CCityService->getListing();
                    return view("admin.location.city.listingCity", $title)->with('result', $result);	
                break;
            }
        }
    }
?>