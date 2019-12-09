<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Exception;
use App\Http\Controllers\Admin\Service\BaseApiService;
use App\Http\Controllers\Admin\Service\View_CCADZoneService;
use App\Http\Controllers\Admin\Service\CountryService;
use App\Http\Controllers\Admin\Service\CityService;
use App\Http\Controllers\Admin\Service\AreaService;
use App\Http\Controllers\Admin\Service\DistrictService;

     class ZoneService extends BaseApiService{
        private $DistrictService;
        private $View_CCADZoneService;
        function __construct(){
            $this->setTable('zones');
            $this->companyAuth = true;
            $this->CountryService = new CountryService();
            $this->CityService = new CityService();
            $this->AreaService = new AreaService();
            $this->DistrictService = new DistrictService();
            $this->View_CCADZoneService = new View_CCADZoneService();
        }

        function getZone($zone_id){
            $zones = $this->findById($zone_id);
            return !empty($zones) && sizeof($zones) > 0 ? $zones[0] : array();


        }
        function redirect_view($result,$title){
            $result['label'] = "Zone";
            $result['districts'] = $this->DistrictService->findAll();

            switch($result['operation']){
                case 'listing':
                    $result['country_search'] = $this->CountryService->findAll();
                    $result['city_search'] = $this->CityService->findAll();
                    $result['area_search'] = $this->AreaService->findAll();
                    $result['district_search'] = $result['districts'];
                    $result['zones'] = $this->View_CCADZoneService->getListing();
                    return view("admin.location.zone.listingZone", $title)->with('result', $result);
                break;
                case 'view_add':
                    return view("admin.location.zone.addZone", $title)->with('result', $result);
                break;
                case 'view_edit':
                    $result['zone'] = $this->getZone($result['id']);
                    return view("admin.location.zone.editZone", $title)->with('result', $result);			
                break;
                case 'add':
                    try{
                        DB::beginTransaction();
                        $add_zone_result = $this->add($result);
                        if(empty($add_zone_result['status']) || $add_zone_result['status'] == 'fail')throw new Exception("Error To Add Zone");
                        $result['zone'] = $this->getZone($add_zone_result['response_id']);
                        $result = $this->response($result,"Success To Add Zone","view_edit");
                        DB::commit();
                        return view("admin.location.zone.addZone", $title)->with('result', $result);
                    }catch(Exception $e){
                        $result = $this->throwException($result,$e->getMessage(),true);
                        return view("admin.location.zone.editZone", $title)->with('result', $result);		
                    }
                break;

                case 'edit':
                    try{
                        DB::beginTransaction();
                        $update_zone_result = $this->update('id',$result);
                        if(empty($update_zone_result['status']) || $update_zone_result['status'] == 'fail')throw new Exception("Error To Update Zone");
                        $result['zone'] = $this->getZone($result['id']);
                        $result = $this->response($result,"Success To Update Zone","view_edit");
                        DB::commit();
                    }catch(Exception $e){
                        $result = $this->throwException($result,$e->getMessage(),true);
                    }
                    return view("admin.location.zone.editZone", $title)->with('result', $result);		

                break;
                case 'delete': 
                    try{
                        DB::beginTransaction();
                        $delete_zone_result = $this->delete($result['id']);
                        Log::info('delete_zone_result : '.json_encode($delete_zone_result));
                        if(empty($delete_zone_result['status']) || $delete_zone_result['status'] == 'fail')throw new Exception("Error To Delete Zone");
                        DB::commit();
                    }catch(Exception $e){
                        $result = $this->throwException($result,$e->getMessage(),true);
                    }	
                    
                        $result['country_search'] = $this->CountryService->findAll();
                        $result['city_search'] = $this->CityService->findAll();
                        $result['area_search'] = $this->AreaService->findAll();
                        $result['district_search'] = $result['districts'];
                        $result['zones'] = $this->View_CCADZoneService->getListing();
                    return view("admin.location.zone.listingZone", $title)->with('result', $result);
                break;
            }
        }
    }
?>