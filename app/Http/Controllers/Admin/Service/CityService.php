<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use App\Http\Controllers\Admin\Service\BaseApiService;
use App\Http\Controllers\Admin\Service\View_CCityService;
use App\Http\Controllers\Admin\Service\CountryService;

     class CityService extends BaseApiService{
        private $CountryService;
        private $View_CCityService;
        function __construct(){
            $this->setTable('cities');
            $this->CountryService = new CountryService();
            $this->View_CCityService = new View_CCityService();
        }
        function redirect_view($result,$title){
            $result['label'] = "City";
            switch($result['operation']){
                case 'listing':
                    $result['country_search'] = $this->CountryService->findAll();
                    $result['cities'] = $this->View_CCityService->getListing();
                    return view("admin.location.listingCity", $title)->with('result', $result);
                break;
                case 'add':
                    $result['countries'] = $this->CountryService->findAll();
                    return view("admin.location.addCity", $title)->with('result', $result);
                break;

                case 'edit':
                    $result['city'] = $this->findById($result['request']->id);
                    $result['countries'] = $this->CountryService->findAll();
                    return view("admin.location.editCity", $title)->with('result', $result);		
                break;
                case 'delete': 
                    $result['country_search'] = $this->CountryService->findAll();
                    $result['cities'] = $this->View_CCityService->getListing();
                    return view("admin.location.listingCity", $title)->with('result', $result);	
                break;
            }
        }
    }
?>