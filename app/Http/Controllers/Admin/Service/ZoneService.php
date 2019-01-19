<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use App\Http\Controllers\Admin\Service\BaseApiService;
     class ZoneService extends BaseApiService{
        private $AreaService;
        private $View_CCAZoneService;
        function __construct(){
            $this->setTable('zones');
            $this->AreaService = new AreaService();
            $this->View_CCAZoneService = new View_CCAZoneService();
        }

        function redirect_view($result,$title){
            $result['label'] = "Zone";
            switch($result['operation']){
                case 'listing':
                    $result['zones'] = $this->View_CCAZoneService->getListing();
                    return view("admin.location.listingzones", $title)->with('result', $result);
                break;
                case 'add':
                    $result['area'] = $this->AreaService->findAll();
                    return view("admin.location.addZone", $title)->with('result', $result);
                break;

                case 'edit':
                    $result['zones'] = $this->findById($result['request']->id);
                    $result['area'] = $this->AreaService->findAll();
                    return view("admin.location.editZone", $title)->with('result', $result);		
                break;
                case 'delete': 
                    $result['zones'] = $this->View_CCAZoneService->getListing();
                    return view("admin.location.listingzones", $title)->with('result', $result);	
                break;
            }
        }
    }
?>