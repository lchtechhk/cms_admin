<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\View_ManufacturerService;
use App\Http\Controllers\Admin\Service\LanguageService;
use App\Http\Controllers\Admin\Service\UploadService;
use App\Http\Controllers\Admin\Service\ManufacturerDescriptionService;
use function GuzzleHttp\json_encode;

class ManufacturerService extends BaseApiService{
    private $View_ManufacturerService;
    private $LanguageService;
    private $UploadService;
    private $ManufacturerService;


    function __construct(){
        $this->setTable('manufacturer');
        $this->companyAuth = true;
        $this->View_ManufacturerService = new View_ManufacturerService();
        $this->LanguageService = new LanguageService();
        $this->UploadService = new UploadService();
        $this->ManufacturerDescriptionService = new ManufacturerDescriptionService();

    }
    function getManufacturer($manufacturer_id){
        $manufacturers = $this->View_ManufacturerService->findByColumn_Value("manufacturer_id",$manufacturer_id);
        $manufacturer = !empty($manufacturers) && sizeof($manufacturers) > 0 ? $manufacturers[0] : array();
        $manufacturer->language_array = array();
        foreach ($manufacturers as $obj) {
            $language_id = $obj->language_id;
            $name = $obj->name;
            
            $manufacturer->language_array[$language_id] = array();
            $manufacturer->language_array[$language_id]['name'] = $name;
        }
        Log::info('[manufacturer] -- getListing : ' .json_encode($manufacturer));
        return $manufacturer;
    }
    function redirect_view($result,$title){
        $result['languages'] = $this->LanguageService->findAll();
        $result['label'] = "Manufacturer";
        switch($result['operation']){
            case 'listing':
                Log::info('[listing] --  : ' . session('company_id'));
                $result['manufacturers'] = $this->View_ManufacturerService->getListing();
                return view("admin.manufacturer.listingManufacturer", $title)->with('result', $result);
            break;
            case 'view_add':
                return view("admin.manufacturer.viewManufacturer", $title)->with('result', $result);
            break;
            case 'view_edit':
                $result['manufacturer'] = $this->getManufacturer($result['manufacturer_id']);
                return view("admin.manufacturer.viewManufacturer", $title)->with('result', $result);
            break;
            case 'add':
                try{
                    DB::beginTransaction();
                    if($image = $this->UploadService->upload_image($result['request'],'image','resources/assets/images/manufacturer/'))$result['image'] = $image;
                    if($icon = $this->UploadService->upload_image($result['request'],'icon','resources/assets/images/manufacturer/'))$result['icon'] = $icon;
                    Log::info('[add result] --  : ' . json_encode($result));
                    $add_manufacturer_result = $this->add($result);
                    if(empty($add_manufacturer_result['status']) || $add_manufacturer_result['status'] == 'fail')throw new Exception("Error To Add Manufacturer");
                    $result['manufacturer_id'] = $add_manufacturer_result['response_id'];
                    foreach ($result['language_array'] as $language_id => $name) {
                        $param = array();
                        $param['language_id'] = $language_id;
                        $param['name'] = $name;
                        $param['manufacturer_id'] = $result['manufacturer_id'];
                        $add_manufacturer_description_result = $this->ManufacturerDescriptionService->add($param);
                        if(empty($add_manufacturer_description_result['status']) || $add_manufacturer_description_result['status'] == 'fail')throw new Exception("Error To Add Manufacturer Description");
                    }
                    $result = $this->response($result,"Successful","view_edit");
                    DB::commit();
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }
                $result['manufacturer'] = $this->getManufacturer($result['manufacturer_id']);
                return view("admin.manufacturer.viewManufacturer", $title)->with('result', $result);

            break;
            case 'edit':
                try{
                    DB::beginTransaction();
                    if($image = $this->UploadService->upload_image($result['request'],'image','resources/assets/images/manufacturer/'))$result['image'] = $image;
                    if($icon = $this->UploadService->upload_image($result['request'],'icon','resources/assets/images/manufacturer/'))$result['icon'] = $icon;
                    Log::info('[edit result] --  : ' . json_encode($result));
                    $update_manufacturer_result = $this->update("manufacturer_id",$result);
                    if(empty($update_manufacturer_result['status']) || $update_manufacturer_result['status'] == 'fail')throw new Exception("Error To update Manufacturer");
                    foreach ($result['language_array'] as $language_id => $name) {
                        $param = array();
                        $param['name'] = $name;
                        $param['manufacturer_id'] = $result['manufacturer_id'];
                        $param['language_id'] = $language_id;
                        $isExisting = $this->ManufacturerDescriptionService->isExistingByMultipleKey_Value($param,array("manufacturer_id","language_id"),array($result['manufacturer_id'],$language_id));
                        if($isExisting){
                            $update_manufacturer_description_result = $this->ManufacturerDescriptionService->updateByMultipleKey_Value($param,array("manufacturer_id","language_id"),array($result['manufacturer_id'],$language_id));
                            if(empty($update_manufacturer_description_result['status']) || $update_manufacturer_description_result['status'] == 'fail')throw new Exception("Error To Update Manufacturer");
                        }else {
                            $add_manufacturer_description_result = $this->ManufacturerDescriptionService->add($param);
                            if(empty($add_manufacturer_description_result['status']) || $add_manufacturer_description_result['status'] == 'fail')throw new Exception("Error To Add Manufacturer Description");
                        }
                    }
                    $result = $this->response($result,"Successful","view_edit");
                    $result['manufacturer'] = $this->getManufacturer($result['manufacturer_id']);
                    DB::commit();
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }		
                return view("admin.manufacturer.viewManufacturer", $title)->with('result', $result);
            break;
            case 'delete': 
                try{
                    $delete_manufacturer_result = $this->deleteByKey_Value("manufacturer_id",$result['manufacturer_id']);
                    if(empty($delete_manufacturer_result['status']) || $delete_manufacturer_result['status'] == 'fail')throw new Exception("Error To Delete Manufacturer");
                    $delete_manufacturer_description_result = $this->ManufacturerDescriptionService->deleteByKey_Value("manufacturer_id",$result['manufacturer_id']);
                    if(empty($delete_manufacturer_description_result['status']) || $delete_manufacturer_description_result['status'] == 'fail')throw new Exception("Error To Delete Manufacturer");
                    $result = $this->response($result,"Success To Delete Manufacturer","listing");
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }	
                $result['manufacturers'] = $this->View_ManufacturerService->getListing();
                return view("admin.manufacturer.listingManufacturer", $title)->with('result', $result);
            break;
        }
    }
}

?>