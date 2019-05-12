<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
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
            $this->CountryService = new CountryService();
            $this->CityService = new CityService();
            $this->AreaService = new AreaService();
            $this->DistrictService = new DistrictService();
            $this->View_CCADZoneService = new View_CCADZoneService();
        }

        function redirect_view($result,$title){
            $result['label'] = "Zone";
            switch($result['operation']){
                case 'listing':
                    $result['country_search'] = $this->CountryService->findAll();
                    $result['city_search'] = $this->CityService->findAll();
                    $result['area_search'] = $this->AreaService->findAll();
                    $result['district_search'] = $this->DistrictService->findAll();
                    $result['zones'] = $this->View_CCADZoneService->getListing();
                    return view("admin.location.zone.listingZone", $title)->with('result', $result);
                break;
                case 'view_add':
                    $result['district'] = $this->DistrictService->findAll();
                    return view("admin.location.zone.addZone", $title)->with('result', $result);
                break;
                case 'view_edit':
                    $result['zones'] = $this->findById($result['request']->id);
                    $result['district'] = $this->DistrictService->findAll();
                    return view("admin.location.zone.editZone", $title)->with('result', $result);			
                break;
                case 'add':
                    $add_zone_result = $this->add($result,"labels.ZoneAddedMessage","labels.ZoneAddedMessageFail");
                    $add_zone_result['district'] = $this->DistrictService->findAll();
                    return view("admin.location.zone.addZone", $title)->with('result', $add_zone_result);
                break;

                case 'edit':
                    $update_zone_result = $this->update($result,"labels.ZoneAddedMessage","labels.ZoneAddedMessageFail");
                    $update_zone_result['zones'] = $this->findById($result['request']->id);
                    $update_zone_result['district'] = $this->DistrictService->findAll();
                    return view("admin.location.zone.editZone", $title)->with('result', $update_zone_result);		
                break;
                case 'delete': 
                    $delete_zone_result = $this->delete($result['id'],"labels.ZoneDeleted","labels.ZoneDeletedFail");
                    $delete_zone_result['country_search'] = $this->CountryService->findAll();
                    $delete_zone_result['city_search'] = $this->CityService->findAll();
                    $delete_zone_result['area_search'] = $this->AreaService->findAll();
                    $delete_zone_result['district_search'] = $this->DistrictService->findAll();
                    $delete_zone_result['zones'] = $this->View_CCADZoneService->getListing();
                    $delete_zone_result['label'] = $result['label'];
                    return view("admin.location.zone.listingZone", $title)->with('result', $delete_zone_result);	
                break;
            }
        }
    }
?>