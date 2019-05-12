<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;
use App\Http\Controllers\Admin\Service\BaseApiService;
use App\Http\Controllers\Admin\Service\CountryService;
use App\Http\Controllers\Admin\Service\CityService;
use App\Http\Controllers\Admin\Service\View_CCADZoneService;
use App\Http\Controllers\Admin\Service\View_CCADistrictService;
use App\Http\Controllers\Admin\Service\View_CCAreaService;
     class AreaService extends BaseApiService{
        private $CountryService;
        private $CityService;
        
        private $View_CCAreaService;
        private $View_CCADistrictService;
        private $View_CCADZoneService;
        function __construct(){
            $this->setTable('area');
            $this->CountryService = new CountryService();
            $this->CityService = new CityService();
            $this->View_CCAreaService = new View_CCAreaService();
            $this->View_CCADistrictService = new View_CCADistrictService();
            $this->View_CCADZoneService = new View_CCADZoneService();
        }
        public function delete_relative($array,$success_msg,$fail_msg){
            $result = array();	
            $result['operation'] = 'delete';
            $result['label'] = $array['label'];

            try{
                DB::connection()->getPdo()->beginTransaction();
                Log::info('[AreaService] : ' . $array['id']);
                // $countries_id = $this->View_CCADZoneService->findByColumn_IdArray('countries_id','zone_id',$request->id);
                // $cities_id_array = $this->View_CCADZoneService->findByColumn_IdArray('cities_id','cities_id',$request->id);
                // $area_id_array = $this->View_CCADZoneService->findByColumn_IdArray('cities_id','area_id',$request->id);
                $district_id_array = $this->View_CCADZoneService->findByColumn_IdArray('cities_id','district_id',$array['id']);
                $zone_id_array = $this->View_CCADZoneService->findByColumn_IdArray('cities_id','zone_id',$array['id']);
                
                
                $delete_count = $this->delete($array['id'],$success_msg,$fail_msg);
                if($delete_count == 0) throw new Exception("Error To Delete Area", 1);
                
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
            $result['label'] = "Area";
            switch($result['operation']){
                case 'listing':
                    $result['country_search'] = $this->CountryService->findAll();
                    $result['city_search'] = $this->CityService->findAll();
                    $result['area'] = $this->View_CCAreaService->getListing();
                    return view("admin.location.area.listingArea", $title)->with('result', $result);
                break;
                case 'view_add':
                    $result['city'] = $this->CityService->findAll();
                    return view("admin.location.area.addArea", $title)->with('result', $result);
                break;
                case 'view_edit':
                    $result['city'] = $this->CityService->findAll(); 
                    $result['area'] = $this->findById($result['request']->id);

                    return view("admin.location.area.editArea", $title)->with('result', $result);		
                break;
                case 'add':
                    $add_area_result = $this->add($result,"labels.AreaAddedMessage","labels.AreaAddedMessageFail");
                    $add_area_result['city'] = $this->CityService->findAll();

                    return view("admin.location.area.addArea", $title)->with('result', $add_area_result);
                break;

                case 'edit':
                    $update_area_result = $this->update($result,"labels.AreaAddedMessage","labels.AreaAddedMessageFail");

                    $update_area_result['city'] = $this->CityService->findAll(); 
                    $update_area_result['area'] = $this->findById($result['request']->id);
                    // Log::error('message : ' .json_encode($result['area']));
                    return view("admin.location.area.editArea", $title)->with('result', $update_area_result);		
                break;
                case 'delete': 
                    $delete_relative_result = $this->delete_relative($result,"labels.AreaDeletedMessage","labels.AreaDeletedFail");
                    $delete_relative_result['country_search'] = $this->CountryService->findAll();
                    $delete_relative_result['city_search'] = $this->CityService->findAll();
                    $delete_relative_result['area'] = $this->View_CCAreaService->getListing();
                    return view("admin.location.area.listingArea", $title)->with('result', $delete_relative_result);	
                break;
            }
        }
    }
?>