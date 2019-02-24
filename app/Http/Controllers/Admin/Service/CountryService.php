<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;
use App\Http\Controllers\Admin\Service\BaseApiService;
use App\Http\Controllers\Admin\Service\View_CCADZoneService;
use App\Http\Controllers\Admin\Service\View_CCADistrictService;
use App\Http\Controllers\Admin\Service\View_CCAreaService;
use App\Http\Controllers\Admin\Service\View_CCityService;

     class CountryService extends BaseApiService{
        private $View_CCADZoneService;
        private $View_CCADistrictService;
        private $View_CCAreaService;
        private $View_CCityService;

        function __construct(){
            $this->setTable('countries');
            $this->View_CCADZoneService = new View_CCADZoneService();
            $this->View_CCADistrictService = new View_CCADistrictService();
            $this->View_CCAreaService = new View_CCAreaService();
            $this->View_CCityService = new View_CCityService();

        }
        function getListing(){
            $result = DB::table($this->getTable())
			->orderBy('id','ASC')
            ->paginate(60);
            return $result;
        }
        public function delete_relative($request,$success_msg,$fail_msg){
            $result = array();	
            $result['operation'] = 'delete';
            try{
                DB::connection()->getPdo()->beginTransaction();
                Log::info('[CityService] : ' . $request->id);
                // $countries_id = $this->View_CCADZoneService->findByColumn_IdArray('countries_id','zone_id',$request->id);
                $cities_id_array = $this->View_CCityService->findByColumn_IdArray('countries_id','cities_id',$request->id);
                $area_id_array = $this->View_CCAreaService->findByColumn_IdArray('countries_id','area_id',$request->id);
                $district_id_array = $this->View_CCADistrictService->findByColumn_IdArray('countries_id','district_id',$request->id);
                $zone_id_array = $this->View_CCADZoneService->findByColumn_IdArray('countries_id','zone_id',$request->id);
                
                $delete_count = $this->delete($request,$success_msg,$fail_msg);
                if($delete_count == 0) throw new Exception("Error To Delete Country", 1);

                if(is_array($cities_id_array) && sizeof($cities_id_array) > 0){
                    $delete_count = $this->customMultipleDelete('cities',$cities_id_array);
                    if($delete_count == 0) throw new Exception("Error To Delete City", 1);
                }

                if(is_array($area_id_array) && sizeof($area_id_array) > 0){
                    $delete_count = $this->customMultipleDelete('area',$area_id_array);
                    if($delete_count == 0) throw new Exception("Error To Delete Area", 1);
                }
                
                if(is_array($district_id_array) && sizeof($district_id_array) > 0){
                    $delete_count = $this->customMultipleDelete('district',$district_id_array);
                    if($delete_count == 0) throw new Exception("Error To Delete District", 1);
                }

                if(is_array($zone_id_array) && sizeof($zone_id_array) > 0){
                    $delete_count = $this->customMultipleDelete('zones',$zone_id_array);
                    if($delete_count == 0) throw new Exception("Error To Delete Zones", 1);
                }
                DB::connection()->getPdo()->commit();
                $result['status'] = 'success';
				$result['message'] =  Lang::get($success_msg);
            }catch (Exception $e){
                $result = $this->throwException($result,$e->getMessage(),true);
            }
            return $result;
        }

        function redirect_view($result,$title){
            $result['label'] = "Country";
            switch($result['operation']){
                case 'listing':
                    $result['countries'] = $this->getListing();
                    return view("admin.location.listingCountry", $title)->with('result', $result);
                break;
                case 'add':
                    return view("admin.location.addCountry", $title)->with('result', $result);
                break;
                case 'edit':
                    $result['countries'] = $this->findById($result['request']->id);
                    return view("admin.location.editCountry", $title)->with('result', $result);		
                break;
                case 'delete': 
                    $result['countries'] = $this->getListing();
                    return view("admin.location.listingCountry", $title)->with('result', $result);	
                break;
            }
        }

    }
?>