<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\CountryService;
use App\Http\Controllers\Admin\Service\View_CCADZoneService;
use function GuzzleHttp\json_encode;

class AddressBookService extends BaseApiService{
    private $CountryService;
    private $View_CCADZoneService;

    function __construct(){
        $this->setTable('address_book');
        $this->CountryService = new CountryService();
        $this->View_CCADZoneService = new View_CCADZoneService();
    }
    function getListing($result){
        $customer_id = $result['customer_id'];
        $customer_address = $this->findByColumnAndId('customer_id',$customer_id);
        $result['customer_address'] = $customer_address;
        $result['customer_id'] = $customer_id;
        // Log::info('[Addressbooking] -- getListing : ' .json_encode($result));
        return $result;
    }
    function redirect_view($result){
        $result['label'] = "AddAddress";
        $zones = $this->View_CCADZoneService->findAll();
        $result['zones'] = $zones;
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
                $zones = $this->View_CCADZoneService->findAll();
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
                try{
                    $update_addressbook_result = $this->update("id",$result);
                    if(empty($update_addressbook_result['status']) || $update_addressbook_result['status'] == 'fail')throw new Exception("Error To Delete Category");
                    $result = $this->getListing($result);
                    $result = $this->response($result,"Success To Update Address Book","listing");
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }	
                           
                return view("admin.addressbook.listingAddress",$title)->with('result', $result);
            break;
            case 'delete':
                Log::info('delete'.json_encode($result));
                try{
                    $id = $result['id'];
                    $delete_address_book_result = $this->delete($id);
                    if(empty($delete_address_book_result['status']) || $delete_address_book_result['status'] == 'fail')throw new Exception("Error To Delete Category");
                    $result = $this->getListing($result);
                    $result = $this->response($result,"Success To Delete Address Book","listing");
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }	      
                return view("admin.addressbook.listingAddress",$title)->with('result', $result);
            break;
        }
    }
}

?>