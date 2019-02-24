<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use App\Http\Controllers\Admin\Service\BaseApiService;
     class AreaService extends BaseApiService{
        private $CityService;
        private $View_CCAreaService;
        function __construct(){
            $this->setTable('area');
            $this->CityService = new CityService('cities');
            $this->View_CCAreaService = new View_CCAreaService();
        }

        function redirect_view($result,$title){
            $result['label'] = "Area";
            switch($result['operation']){
                case 'listing':
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
                    $result['area'] = $this->View_CCAreaService->getListing();
                    return view("admin.location.listingArea", $title)->with('result', $result);	
                break;
            }
        }
    }
?>