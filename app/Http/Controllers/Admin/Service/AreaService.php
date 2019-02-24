<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use App\Http\Controllers\Admin\Service\BaseApiService;
use App\Http\Controllers\Admin\Service\View_CCAreaService;
use App\Http\Controllers\Admin\Service\CountryService;
use App\Http\Controllers\Admin\Service\CityService;

     class AreaService extends BaseApiService{
        private $CountryService;
        private $CityService;
        
        private $View_CCAreaService;
        function __construct(){
            $this->setTable('area');
            $this->CountryService = new CountryService();
            $this->CityService = new CityService();
            $this->View_CCAreaService = new View_CCAreaService();
        }

        function redirect_view($result,$title){
            $result['label'] = "Area";
            switch($result['operation']){
                case 'listing':
                    $result['country_search'] = $this->CountryService->findAll();
                    $result['city_search'] = $this->CityService->findAll();
                    $result['area'] = $this->View_CCAreaService->getListing();
                    return view("admin.location.listingArea", $title)->with('result', $result);
                break;
                case 'add':
                    $result['city'] = $this->CityService->findAll();
                    return view("admin.location.addArea", $title)->with('result', $result);
                break;

                case 'edit':
                    $result['city'] = $this->CityService->findAll(); 
                    $result['area'] = $this->findById($result['request']->id);
                    // Log::error('message : ' .json_encode($result['area']));
                    return view("admin.location.editArea", $title)->with('result', $result);		
                break;
                case 'delete': 
                    $result['country_search'] = $this->CountryService->findAll();
                    $result['city_search'] = $this->CityService->findAll();
                    $result['area'] = $this->View_CCAreaService->getListing();
                    return view("admin.location.listingArea", $title)->with('result', $result);	
                break;
            }
        }
    }
?>