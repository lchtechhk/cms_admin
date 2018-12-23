<?php
namespace App\Http\Controllers\Admin\Service;
use Log;

use App\Http\Controllers\Admin\Service\BaseApiService;
     class CountryService extends BaseApiService{
        function __construct($table){
            $this->setTable($table);
            
        }

        function redirect_view($result,$title){
            switch($result['operation']){
                case 'add':
                    // $result['countries'] = $this->CountryService->findAll();
                    // return view("admin.addCity", $title)->with('result', $result['countries']);
                break;

                case 'edit':
                    // $city = $this->CountryService->findById($request->id);
                    // $countries = $this->MainController->findAll('countries');
                    // $countryData['countries'] = $countries;
                    // $result['city'] = $city;			
                break;
            }
        }

    }
?>