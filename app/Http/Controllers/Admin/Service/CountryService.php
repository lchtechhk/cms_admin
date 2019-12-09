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
use function GuzzleHttp\json_encode;

class CountryService extends BaseApiService{
        private $View_CCADZoneService;
        private $View_CCADistrictService;
        private $View_CCAreaService;
        private $View_CCityService;

        function __construct(){
            $this->setTable('countries');
            $this->companyAuth = true;
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
        public function delete_relative($array){
            $result = array();	
            $result['operation'] = 'delete';
            $result['label'] = $array['label'];
            try{
                DB::connection()->getPdo()->beginTransaction();
                Log::info('[CityService] : ' . $array['id']);
                // $countries_id = $this->View_CCADZoneService->findByColumn_Values_Return_Array('countries_id','zone_id',$request->id);
                $cities_id_array = $this->View_CCityService->findByColumn_Values_Return_Array('countries_id','cities_id',$array['id']);
                $area_id_array = $this->View_CCAreaService->findByColumn_Values_Return_Array('countries_id','area_id',$array['id']);
                $district_id_array = $this->View_CCADistrictService->findByColumn_Values_Return_Array('countries_id','district_id',$array['id']);
                $zone_id_array = $this->View_CCADZoneService->findByColumn_Values_Return_Array('countries_id','zone_id',$array['id']);
                
                $delete_count = $this->delete($array['id']);
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
                    return view("admin.location.country.listingCountry", $title)->with('result', $result);
                break;
                case 'view_add':
                    return view("admin.location.country.addCountry", $title)->with('result', $result);
                break;
                case 'view_edit':
                    $countries = $this->findById($result['request']->id);
                    $result['country'] = empty($countries) && sizeof($countries) > 0 ? array() : $countries[0];
                    return view("admin.location.country.editCountry", $title)->with('result', $result);	
                break;
                case 'add':
                    try{
                        DB::beginTransaction();
                        $add_country_result = $this->add($result);
                        if(empty($add_country_result['status']) || $add_country_result['status'] == 'fail')throw new Exception("Error To Add Country");
                        $result = $this->response($result,"Success To Add Country","view_edit");
                        $countries = $this->findById($add_country_result['response_id']);
                        // Log::info('[countries] --  : ' . json_encode($countries));
                        $result['country'] = empty($countries) && sizeof($countries) > 0 ? array() : $countries[0];
                        DB::commit();
                        return view("admin.location.country.editCountry", $title)->with('result', $result);
                    }catch(Exception $e){
                        $result = $this->throwException($result,$e->getMessage(),true);
                        return view("admin.location.country.addCountry", $title)->with('result', $result);
                    }	
                break;
                case 'edit':
                    try{
                        DB::beginTransaction();
                        $update_country_result = $this->update('id',$result);
                        if(empty($update_country_result['status']) || $update_country_result['status'] == 'fail')throw new Exception("Error To Update Country");
                        $countries = $this->findById($result['request']->id);
                        $result['country'] = empty($countries) && sizeof($countries) > 0 ? array() : $countries[0];
                        $result = $this->response($result,"Success To Update Country","view_edit");
                        DB::commit();
                    }catch(Exception $e){
                        $result = $this->throwException($result,$e->getMessage(),true);
                    }
                    return view("admin.location.country.editCountry", $title)->with('result', $result);
                break;
                case 'delete': 
                    try{
                        $delete_relative_result = $this->delete_relative($result);
                        if(empty($delete_relative_result['status']) || $delete_relative_result['status'] == 'fail')throw new Exception("Error To update Category");
                        $result = $this->response($result,"Success To Delete Country","view_edit");
                    }catch(Exception $e){
                        $result = $this->throwException($result,$e->getMessage(),true);
                    }
                    $result['countries'] = $this->getListing();
                    return view("admin.location.country.listingCountry", $title)->with('result', $result);	

                break;
            }
        }

    }
?>