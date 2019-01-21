<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use App\Http\Controllers\Admin\Service\BaseApiService;
     class ZoneService extends BaseApiService{
        private $DistrictService;
        private $View_CCADZoneService;
        function __construct(){
            $this->setTable('zones');
            $this->DistrictService = new DistrictService();
            $this->View_CCADZoneService = new View_CCADZoneService();
        }

        function redirect_view($result,$title){
            $result['label'] = "Zone";
            switch($result['operation']){
                case 'listing':
                    $result['zones'] = $this->View_CCADZoneService->getListing();
                    return view("admin.location.listingzone", $title)->with('result', $result);
                break;
                case 'add':
                    $result['district'] = $this->DistrictService->findAll();
                    return view("admin.location.addZone", $title)->with('result', $result);
                break;

                case 'edit':
                    $result['zones'] = $this->findById($result['request']->id);
                    $result['district'] = $this->DistrictService->findAll();
                    return view("admin.location.editZone", $title)->with('result', $result);		
                break;
                case 'delete': 
                    $result['zones'] = $this->View_CCADZoneService->getListing();
                    return view("admin.location.listingzones", $title)->with('result', $result);	
                break;
            }
        }
    }
?>