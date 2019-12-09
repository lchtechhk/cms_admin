<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\BaseApiService;
use App\Http\Controllers\Admin\Service\CountryService;
use App\Http\Controllers\Admin\Service\View_AddressBookService;
use App\Http\Controllers\Admin\Service\View_CCADistrictService;
use function GuzzleHttp\json_encode;

class AddressBookService extends BaseApiService{
    private $CountryService;
    private $View_CCADistrictService;
    private $View_AddressBookService;

    function __construct(){
        $this->setTable('address_book');
        $this->companyAuth = true;
        $this->CountryService = new CountryService();
        $this->View_CCADistrictService = new View_CCADistrictService();
        $this->View_AddressBookService = new View_AddressBookService();

    }
    function getListing($result){
        $customer_id = $result['customer_id'];
        $customer_address = $this->View_AddressBookService->findByColumn_Value('customer_id',$customer_id);
        $result['customer_address'] = $customer_address;
        $result['customer_id'] = $customer_id;
        // Log::info('[Addressbooking] -- getListing : ' .json_encode($result));
        return $result;
    }
    function combine_full_address($district_id){
        $full_address_obj = $this->View_CCADistrictService->getCCADistrictNameById($district_id);
        Log::info('full_address_obj : '.json_encode($full_address_obj));
        return $full_address_obj;

    }
    
    function redirect_view($result,$title){
        $result['label'] = "AddAddress";
        $district = $this->View_CCADistrictService->findAll();
        $result['districts'] = $district;
        switch($result['operation']){
            case 'listing':
                $result = $this->getListing($result);
                return view("admin.addressbook.listingAddress",$title)->with('result', $result);
            break;
            case 'view_add':
                return view("admin.addressbook.addressDialog")->with('result', $result);
            break;
            case 'view_edit':
                $id = $result['id'];
                $result['address'] = array();
                $result_array = $this->findById($id);
                $result['address'] = $result_array[0];
                // Log::info('edit'.json_encode($result));
                return view("admin.addressbook.addressDialog")->with('result', $result);
            break;
            case 'add':
                try{
                    $add_addressbook_result = $this->add($result);
                    if(empty($add_addressbook_result['status']) || $add_addressbook_result['status'] == 'fail')throw new Exception("Error To Delete Category");
                    $result = $this->getListing($result);
                    $result = $this->response($result,"Success To Add Address Book","listing");
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }	
                return view("admin.addressbook.listingAddress",$title)->with('result', $result);
            break;
            case 'edit':
                    // $full_address_obj = $this->combine_full_address($result['district_id']);
                    // $result['address_ch'] = $full_address_obj['ch'] . $result['estate'] . $result['building'] . $result['room']."室";
                    // $result['address_en'] = $full_address_obj['en'] . $result['estate'] . $result['building'] . $result['room']."室";
                try{
                    DB::beginTransaction();
                    $update_addressbook_result = $this->update("id",$result);
                    if(empty($update_addressbook_result['status']) || $update_addressbook_result['status'] == 'fail')throw new Exception("Error To Delete Category");
                    $result = $this->getListing($result);
                    $result = $this->response($result,"Success To Update Address Book","listing");
                    DB::commit();
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }	
                           
                return view("admin.addressbook.listingAddress",$title)->with('result', $result);
            break;
            case 'delete':
                // Log::info('delete'.json_encode($result));
                try{
                    $id = $result['id'];
                    $delete_address_book_result = $this->delete($id);
                    if(empty($delete_address_book_result['status']) || $delete_address_book_result['status'] == 'fail')throw new Exception("Error To Delete Category");
                    $result = $this->getListing($result);
                    $result = $this->response($result,"Success To Delete Address Book","listing");
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                    return view("admin.addressbook.listingAddress",$title)->with('result', $result);
                }	      
                return view("admin.addressbook.listingAddress",$title)->with('result', $result);
            break;
        }
    }
}

?>