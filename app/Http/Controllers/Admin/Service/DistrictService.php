<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;
use App\Http\Controllers\Admin\Service\BaseApiService;
use App\Http\Controllers\Admin\Service\View_CCADistrictService;
use App\Http\Controllers\Admin\Service\View_CCADZoneService;

use App\Http\Controllers\Admin\Service\CountryService;
use App\Http\Controllers\Admin\Service\CityService;
use App\Http\Controllers\Admin\Service\AreaService;

     class DistrictService extends BaseApiService{
        private $CountryService;
        private $CityService;
        private $AreaService;
        private $View_CCADistrictService;
        private $View_CCADZoneService;
        function __construct(){
            $this->setTable('district');
            $this->CountryService = new CountryService();
            $this->CityService = new CityService();
            $this->AreaService = new AreaService();
            $this->View_CCADistrictService = new View_CCADistrictService();
            $this->View_CCADZoneService = new View_CCADZoneService();

        }

        function redirect_view($result,$title){
            $result['label'] = "District";
            switch($result['operation']){
                case 'listing':
                    $result['country_search'] = $this->CountryService->findAll();
                    $result['city_search'] = $this->CityService->findAll();
                    $result['area_search'] = $this->AreaService->findAll();
                    $result['district'] = $this->View_CCADistrictService->getListing();
                    return view("admin.location.district.listingDistrict", $title)->with('result', $result);
                break;
                case 'view_add':
                    $result['area'] = $this->AreaService->findAll();
                    return view("admin.location.district.addDistrict", $title)->with('result', $result);
                break;
                case 'view_edit':
                    $result['district'] = $this->findById($result['request']->id);
                    $result['area'] = $this->AreaService->findAll();
                    return view("admin.location.district.editDistrict", $title)->with('result', $result);		
                break;
                case 'add':
                    $add_district_result = $this->add($result);
                    $add_district_result['area'] = $this->AreaService->findAll();
                    return view("admin.location.district.addDistrict", $title)->with('result', $add_district_result);
                break;
                case 'edit':
                    $update_district_result = $this->update('id',$result);
                    $update_district_result['district'] = $this->findById($result['request']->id);
                    $update_district_result['area'] = $this->AreaService->findAll();
                    return view("admin.location.district.editDistrict", $title)->with('result', $update_district_result);		
                break;
                case 'delete': 
                    $delete_relative_result = $this->delete_relative($result);
                    $delete_relative_result['country_search'] = $this->CountryService->findAll();
                    $delete_relative_result['city_search'] = $this->CityService->findAll();
                    $delete_relative_result['area_search'] = $this->AreaService->findAll();
                    $delete_relative_result['district'] = $this->View_CCADistrictService->getListing();
                    return view("admin.location.district.listingDistrict", $title)->with('result', $delete_relative_result);	
                break;
            }
        }

        public function delete_relative($array){
            $result = array();	
            $result['operation'] = 'delete';
            $result['label'] = $array['label'];

            try{
                DB::connection()->getPdo()->beginTransaction();
                Log::info('[DistrictService] : ' . $array['id']);
                // $countries_id = $this->View_CCADZoneService->findByColumn_IdArray('countries_id','zone_id',$request->id);
                // $cities_id_array = $this->View_CCADZoneService->findByColumn_IdArray('cities_id','cities_id',$request->id);
                // $area_id_array = $this->View_CCADZoneService->findByColumn_IdArray('cities_id','area_id',$request->id);
                // $district_id_array = $this->View_CCADZoneService->findByColumn_IdArray('cities_id','district_id',$request->id);
                $zone_id_array = $this->View_CCADZoneService->findByColumn_IdArray('cities_id','zone_id',$array['id']);
                
                
                $delete_count = $this->delete($array['id']);
                if($delete_count == 0) throw new Exception("Error To Delete District", 1);
                
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
    }
?>