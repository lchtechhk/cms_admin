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
            $this->companyAuth = true;
            $this->CountryService = new CountryService();
            $this->View_CCityService = new View_CCityService();
            $this->View_CCADZoneService = new View_CCADZoneService();
            $this->View_CCADistrictService = new View_CCADistrictService();
            $this->View_CCAreaService = new View_CCAreaService();
            
        }
        public function delete_relative($array){
            $result = array();	
            $result['operation'] = 'delete';
            $result['label'] = $array['label'];
            try{
                DB::connection()->getPdo()->beginTransaction();
                Log::info('[CityService] : ' . json_encode($array));
                // $countries_id = $this->View_CCADZoneService->findByColumn_Values_Return_Array('countries_id','zone_id',$request->id);
                // $cities_id_array = $this->View_CCADZoneService->findByColumn_Values_Return_Array('cities_id','cities_id',$request->id);
                $area_id_array = $this->View_CCADZoneService->findByColumn_Values_Return_Array('cities_id','area_id',$array['id']);
                $district_id_array = $this->View_CCADZoneService->findByColumn_Values_Return_Array('cities_id','district_id',$array['id']);
                $zone_id_array = $this->View_CCADZoneService->findByColumn_Values_Return_Array('cities_id','zone_id',$array['id']);
                
                
                $delete_count = $this->delete($array['id']);
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
				
            }catch (Exception $e){
                $result = $this->throwException($result,$e->getMessage(),true);
            }
            return $result;
        }
        public function getCity($city_id){
            $cities = $this->findById($city_id);
            $city = !empty($cities) && sizeof($cities) > 0 ? $cities[0] : array();
            return $city;
        }
        function redirect_view($result,$title){
            $result['label'] = "City";
            $result['countries'] = $this->CountryService->findAll();
            $result['country_search'] = $result['countries'];
            switch($result['operation']){
                case 'listing':
                    $result['cities'] = $this->View_CCityService->getListing();
                    return view("admin.location.city.listingCity", $title)->with('result', $result);
                break;
                case 'view_add':
                    return view("admin.location.city.addCity", $title)->with('result', $result);
                break;
                case 'view_edit':
                    $result['city'] = $this->getCity($result['request']->id);
                    return view("admin.location.city.editCity", $title)->with('result', $result);	
                break;

                case 'add':
                    try{
                        DB::beginTransaction();
                        $add_city_result = $this->add($result);
                        if(empty($add_city_result['status']) || $add_city_result['status'] == 'fail')throw new Exception("Error To Add Category");
                        $result['city'] = $this->getCity($add_city_result['response_id']);
                        $result = $this->response($result,"Success To Add City","view_edit");
                        DB::commit();
                        return view("admin.location.city.editCity", $title)->with('result', $result);
                    }catch(Exception $e){
                        $result = $this->throwException($result,$e->getMessage(),true);
                        return view("admin.location.city.addCity", $title)->with('result', $result);
                    }	
                break;
                case 'edit':
                    try{
                        DB::beginTransaction();
                        $update_city_result = $this->update('id',$result);
                        if(empty($update_city_result['status']) || $update_city_result['status'] == 'fail')throw new Exception("Error To Update City");
                        $result = $this->response($result,"Success To Update City","view_edit");
                        DB::commit();
                    }catch(Exception $e){
                        $result = $this->throwException($result,$e->getMessage(),true);
                    }		
                    // Log::info('[city result] --  : ' . json_encode($result));
                    $result['city'] = $this->getCity($result['id']);
                    return view("admin.location.city.editCity", $title)->with('result', $result);

                break;
                case 'delete': 
                    try{
                        $delete_relative_result = $this->delete_relative($result); 
                        if(empty($delete_relative_result['status']) || $delete_relative_result['status'] == 'fail')throw new Exception("Error To Delete City");
                        $result = $this->response($result,"Success To Delete City","listing");
                    }catch(Exception $e){
                        $result = $this->throwException($result,$e->getMessage(),true);
                    }	
                    $result['cities'] = $this->View_CCityService->getListing();
                    return view("admin.location.city.listingCity", $title)->with('result', $result);	
                break;
            }
        }
    }
?>