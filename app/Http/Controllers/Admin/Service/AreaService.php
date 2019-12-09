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
            $this->companyAuth = true;
            $this->CountryService = new CountryService();
            $this->CityService = new CityService();
            $this->View_CCAreaService = new View_CCAreaService();
            $this->View_CCADistrictService = new View_CCADistrictService();
            $this->View_CCADZoneService = new View_CCADZoneService();
        }
        public function delete_relative($array){
            $result = array();	
            $result['operation'] = 'delete';
            $result['label'] = $array['label'];

            try{
                DB::connection()->getPdo()->beginTransaction();
                Log::info('[AreaService] : ' . $array['id']);
                // $countries_id = $this->View_CCADZoneService->findByColumn_Values_Return_Array('countries_id','zone_id',$request->id);
                // $cities_id_array = $this->View_CCADZoneService->findByColumn_Values_Return_Array('cities_id','cities_id',$request->id);
                // $area_id_array = $this->View_CCADZoneService->findByColumn_Values_Return_Array('cities_id','area_id',$request->id);
                $district_id_array = $this->View_CCADZoneService->findByColumn_Values_Return_Array('cities_id','district_id',$array['id']);
                $zone_id_array = $this->View_CCADZoneService->findByColumn_Values_Return_Array('cities_id','zone_id',$array['id']);
                
                
                $delete_count = $this->delete($array['id']);
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
				
            }catch (Exception $e){
                $result = $this->throwException($result,$e->getMessage(),true);
            }
            return $result;
        }
        public function getArea($area_id){
            $area_array = $this->findById($area_id);
            return !empty($area_array) && sizeof($area_array) > 0 ? $area_array[0] : array();
        }
        function redirect_view($result,$title){
            $result['label'] = "Area";
            $result['cities'] = $this->CityService->findAll();
            switch($result['operation']){
                case 'listing':
                    $result['country_search'] = $this->CountryService->findAll();
                    $result['city_search'] = $this->CityService->findAll();
                    $result['area'] = $this->View_CCAreaService->getListing();
                    return view("admin.location.area.listingArea", $title)->with('result', $result);
                break;
                case 'view_add':
                    return view("admin.location.area.addArea", $title)->with('result', $result);
                break;
                case 'view_edit':
                    $result['area'] = $this->getArea($result['id']);
                    return view("admin.location.area.editArea", $title)->with('result', $result);		
                break;
                case 'add':
                    try{
                        DB::beginTransaction();
                        $add_area_result = $this->add($result);
                        if(empty($add_area_result['status']) || $add_area_result['status'] == 'fail')throw new Exception("Error To Add Area");
                        $result['area'] = $this->getArea($add_area_result['response_id']);
                        $result = $this->response($result,"Success To Add Area","view_edit");
                        DB::commit();
                        return view("admin.location.area.editArea", $title)->with('result', $result);
                    }catch(Exception $e){
                        $result = $this->throwException($result,$e->getMessage(),true);
                    }
                    return view("admin.location.area.addArea", $title)->with('result', $result);
                break;

                case 'edit':
                    try{
                        DB::beginTransaction();
                        $update_area_result = $this->update('id',$result);
                        if(empty($update_area_result['status']) || $update_area_result['status'] == 'fail')throw new Exception("Error To Add Area");
                        $result['area'] = $this->getArea($result['id']);
                        $result = $this->response($result,"Success To Add Area","view_edit");
                        DB::commit();
                    }catch(Exception $e){
                        $result = $this->throwException($result,$e->getMessage(),true);
                    }	
                    return view("admin.location.area.editArea", $title)->with('result', $result);	
                break;
                case 'delete':
                    try{ 
                        $delete_relative_result = $this->delete_relative($result);
                        if(empty($delete_relative_result['status']) || $delete_relative_result['status'] == 'fail')throw new Exception("Error To Add Area");

                        $result['country_search'] = $this->CountryService->findAll();
                        $result['city_search'] = $this->CityService->findAll();
                        $result['area'] = $this->View_CCAreaService->getListing();
                    }catch(Exception $e){
                        $result = $this->throwException($result,$e->getMessage(),true);
                    }
                    return view("admin.location.area.listingArea", $title)->with('result', $result);	
                break;
            }
        }
    }
?>