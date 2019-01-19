<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use App\Http\Controllers\Admin\Service\BaseApiService;
     class DistrictService extends BaseApiService{
        private $AreaService;
        private $View_CCADistrictService;
        function __construct(){
            $this->setTable('district');
            $this->AreaService = new AreaService();
            $this->View_CCADistrictService = new View_CCADistrictService();
        }

        function redirect_view($result,$title){
            $result['label'] = "District";
            switch($result['operation']){
                case 'listing':
                    $result['Districts'] = $this->View_CCADistrictService->getListing();
                    return view("admin.location.listingDistrict", $title)->with('result', $result);
                break;
                case 'add':
                    $result['area'] = $this->AreaService->findAll();
                    return view("admin.location.addDistrict", $title)->with('result', $result);
                break;

                case 'edit':
                    $result['Districts'] = $this->findById($result['request']->id);
                    $result['area'] = $this->AreaService->findAll();
                    return view("admin.location.editDistrict", $title)->with('result', $result);		
                break;
                case 'delete': 
                    $result['Districts'] = $this->View_CCADistrictService->getListing();
                    return view("admin.location.listingDistrict", $title)->with('result', $result);	
                break;
            }
        }
    }
?>