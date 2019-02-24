<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use App\Http\Controllers\Admin\Service\BaseApiService;
use App\Http\Controllers\Admin\Service\View_CCADistrictService;
use App\Http\Controllers\Admin\Service\CountryService;
use App\Http\Controllers\Admin\Service\CityService;
use App\Http\Controllers\Admin\Service\AreaService;

     class DistrictService extends BaseApiService{
        private $CountryService;
        private $CityService;
        private $AreaService;
        private $View_CCADistrictService;
        function __construct(){
            $this->setTable('district');
            $this->CountryService = new CountryService();
            $this->CityService = new CityService();
            $this->AreaService = new AreaService();
            $this->View_CCADistrictService = new View_CCADistrictService();
        }

        function redirect_view($result,$title){
            $result['label'] = "District";
            switch($result['operation']){
                case 'listing':
                    $result['country_search'] = $this->CountryService->findAll();
                    $result['city_search'] = $this->CityService->findAll();
                    $result['area_search'] = $this->AreaService->findAll();
                    $result['district'] = $this->View_CCADistrictService->getListing();
                    return view("admin.location.listingDistrict", $title)->with('result', $result);
                break;
                case 'add':
                    $result['area'] = $this->AreaService->findAll();
                    return view("admin.location.addDistrict", $title)->with('result', $result);
                break;

                case 'edit':
                    $result['district'] = $this->findById($result['request']->id);
                    $result['area'] = $this->AreaService->findAll();
                    return view("admin.location.editDistrict", $title)->with('result', $result);		
                break;
                case 'delete': 
                    $result['country_search'] = $this->CountryService->findAll();
                    $result['city_search'] = $this->CityService->findAll();
                    $result['area_search'] = $this->AreaService->findAll();
                    $result['district'] = $this->View_CCADistrictService->getListing();
                    return view("admin.location.listingDistrict", $title)->with('result', $result);	
                break;
            }
        }
    }
?>