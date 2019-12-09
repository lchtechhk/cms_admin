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
            $this->companyAuth = true;
            $this->CountryService = new CountryService();
            $this->CityService = new CityService();
            $this->AreaService = new AreaService();
            $this->View_CCADistrictService = new View_CCADistrictService();
            $this->View_CCADZoneService = new View_CCADZoneService();

        }

        function redirect_view($result,$title){
            $result['label'] = "District";
            $result['area'] = $this->AreaService->findAll();
            switch($result['operation']){
                case 'listing':
                    $result['country_search'] = $this->CountryService->findAll();
                    $result['city_search'] = $this->CityService->findAll();
                    $result['area_search'] = $this->AreaService->findAll();
                    $result['district'] = $this->View_CCADistrictService->getListing();
                    return view("admin.location.district.listingDistrict", $title)->with('result', $result);
                break;
                case 'view_add':
                    return view("admin.location.district.addDistrict", $title)->with('result', $result);
                break;
                case 'view_edit':
                    $result['district'] = $this->getDistrict($result['id']);
                    return view("admin.location.district.editDistrict", $title)->with('result', $result);		
                break;
                case 'add':
                    try{
                        Log::info('[result] : ' . \json_encode($result));
                        DB::beginTransaction();
                        $add_district_result = $this->add($result);
                        if(empty($add_district_result['status']) || $add_district_result['status'] == 'fail')throw new Exception("Error To Add District");
                        
                        $result['district'] = $this->getDistrict($add_district_result['response_id']);
                        $result = $this->response($result,"Success To Add District","view_edit");
                        DB::commit();
                        return view("admin.location.district.editDistrict", $title)->with('result', $result);
                    }catch(Exception $e){
                        $result = $this->throwException($result,$e->getMessage(),true);
                        return view("admin.location.district.addDistrict", $title)->with('result', $result);
                    }
                break;
                case 'edit':
                    try{
                        DB::beginTransaction();
                        $update_district_result = $this->update('id',$result);
                        if(empty($update_district_result['status']) || $update_district_result['status'] == 'fail')throw new Exception("Error To Update District");
                        $result['district'] = $this->getDistrict($result['id']);
                        $result = $this->response($result,"Success To Update District","view_edit");
                        DB::commit();
                    }catch(Exception $e){
                        $result = $this->throwException($result,$e->getMessage(),true);
                    }
                    return view("admin.location.district.editDistrict", $title)->with('result', $result);		

                break;
                case 'delete': 
                    try{
                        $delete_relative_result = $this->delete_relative($result);
                        if(empty($delete_relative_result['status']) || $delete_relative_result['status'] == 'fail')throw new Exception("Error To Delete District");
                        $result['country_search'] = $this->CountryService->findAll();
                        $result['city_search'] = $this->CityService->findAll();
                        $result['area_search'] = $result['area'];
                        $result['district'] = $this->View_CCADistrictService->getListing();
                        return view("admin.location.district.listingDistrict", $title)->with('result', $result);	
                    }catch(Exception $e){
                        $result = $this->throwException($result,$e->getMessage(),true);
                    }
                break;
            }
        }

        public function getDistrict($district_id){
            $district_array = $this->findById($district_id);
            return !empty($district_array) && sizeof($district_array) > 0 ? $district_array[0] : array();
        }

        public function delete_relative($array){
            $result = array();	
            $result['operation'] = 'delete';
            $result['label'] = $array['label'];

            try{
                DB::connection()->getPdo()->beginTransaction();
                Log::info('[DistrictService] : ' . $array['id']);
                // $countries_id = $this->View_CCADZoneService->findByColumn_Values_Return_Array('countries_id','zone_id',$request->id);
                // $cities_id_array = $this->View_CCADZoneService->findByColumn_Values_Return_Array('cities_id','cities_id',$request->id);
                // $area_id_array = $this->View_CCADZoneService->findByColumn_Values_Return_Array('cities_id','area_id',$request->id);
                // $district_id_array = $this->View_CCADZoneService->findByColumn_Values_Return_Array('cities_id','district_id',$request->id);
                $zone_id_array = $this->View_CCADZoneService->findByColumn_Values_Return_Array('cities_id','zone_id',$array['id']);
                
                
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