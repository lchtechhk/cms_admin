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
    function getListing($result,$title){
        $customer_id = $result['customer_id'];
        $zones = $this->View_CCADZoneService->findAll();
        $result['zones'] = $zones;
        $customer_address = $this->findByColumnAndId('customer_id',$customer_id);
        $result['customer_address'] = $customer_address;
        $result['customer_id'] = $customer_id;
        // Log::info('[Addressbooking] -- getListing : ' .json_encode($result));
        return $result;
    }
    function redirect_view($result,$title){
        $result['label'] = "AddAddress";
        switch($result['operation']){
            case 'listing':
                $result = $this->getListing($result,$title);
                return view("admin.addressbook.listingAddress",$title)->with('result', $result);
            break;
            case 'view_add':
                $zones = $this->View_CCADZoneService->findAll();
                $result['zones'] = $zones;
                // Log::info('add'.json_encode($result['address']));
                return view("admin.addressbook.addressDialog")->with('result', $result);
            break;
            case 'view_edit':
                $id = $result['id'];
                $zones = $this->View_CCADZoneService->findAll();
                $result['address'] = array();
                $result_array = $this->findById($id);
                $result['address'] = $result_array[0];
                $result['zones'] = $zones;
                // Log::info('edit'.json_encode($result));
                return view("admin.addressbook.addressDialog")->with('result', $result);
            break;
            case 'add':
                $add_addressbook_result = $this->add($result,"labels.AddressAddedMessage","labels.AddressAddedMessageFail");
                $address_book_array = $this->getListing($result,$title);
                $result = array_merge($add_addressbook_result,$address_book_array);
                return view("admin.addressbook.listingAddress",$title)->with('result', $result);
            break;
            case 'edit':
                $update_addressbook_result = $this->update("id",$result,"labels.AddressDeletedMessage","labels.AddressDeletedMessageFail");
                $address_book_array = $this->getListing($result,$title);
                $result = array_merge($update_addressbook_result,$address_book_array);           
                return view("admin.addressbook.listingAddress",$title)->with('result', $result);
            break;
            case 'delete':
                $id = $result['id'];
                $delete_address_book_result = $this->delete($id,"labels.AddressDeletedMessage","labels.AddressDeletedMessageFail");
                $address_book_array = $this->getListing($result,$title);
                $result = array_merge($delete_address_book_result,$address_book_array);           
                return view("admin.addressbook.listingAddress",$title)->with('result', $result);
            break;
        }
    }
}

?>