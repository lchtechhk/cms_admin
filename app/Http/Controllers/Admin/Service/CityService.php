<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use App\Http\Controllers\Admin\Service\BaseApiService;
     class CityService extends BaseApiService{
        private $CountryService;
        function __construct($table){
            $this->setTable($table);
            $this->CountryService = new CountryService('countries');

        }

        function redirect_view($result,$title){
            switch($result['operation']){
                case 'add':
                    $result['countries'] = $this->CountryService->findAll();
                    return view("admin.addCity", $title)->with('result', $result);
                break;

                case 'edit':
                    $result['city'] = $this->findById($result['request']->id);
                    $result['countries'] = $this->CountryService->findAll();
                    // Log::info('[result id] ' . json_encode($result));	

                    return view("admin.editCity", $title)->with('result', $result);		
                break;
                case 'delete': 
                    $cities = DB::table('view_county_city')
                        ->orderBy('countries_id','ASC')
                        ->paginate(60);
                    $result['cities'] = $cities;
                    return view("admin.listingCities", $title)->with('result', $result);	
                break;
            }

        }
    }
?>