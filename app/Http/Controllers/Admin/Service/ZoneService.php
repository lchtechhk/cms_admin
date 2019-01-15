<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use App\Http\Controllers\Admin\Service\BaseApiService;
     class ZoneService extends BaseApiService{
        private $CityService;
        private $View_CCityService;
        function __construct(){
            $this->setTable('zones');
            $this->CityService = new CityService('cities');
            $this->View_CCityService = new View_CCityService();
        }

        function redirect_view($result,$title){
            switch($result['operation']){
                case 'listing':
                    $result['cities'] = $this->View_CCityService->getListing();
                    return view("admin.listingCities", $title)->with('result', $result);
                break;
                case 'add':
                    $result['countries'] = $this->CountryService->findAll();
                    return view("admin.addCity", $title)->with('result', $result);
                break;

                case 'edit':
                    $result['city'] = $this->findById($result['request']->id);
                    $result['countries'] = $this->CountryService->findAll();
                    return view("admin.editCity", $title)->with('result', $result);		
                break;
                case 'delete': 
                    $result['cities'] = $this->View_CCityService->getListing();
                    return view("admin.listingCities", $title)->with('result', $result);	
                break;
            }
        }
    }
?>