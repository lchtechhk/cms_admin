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
        Log::info('[Addressbooking] -- getListing : ' .json_encode($result));
        return $result;
    }
    function redirect_view($result,$title){
        $result['label'] = "AddAddress";
        switch($result['operation']){
            case 'add':
            case 'edit':
            case 'listing':
                $result = $this->getListing($result,$title);
                return view("admin.addressbook.listingAddress",$title)->with('result', $result);
            break;
            case 'view_add':
                $zones = $this->View_CCADZoneService->findAll();
                $result['zones'] = $zones;
                // Log::info('add'.json_encode($result['address']));
                return view("admin.customer.addressDialog")->with('result', $result);
            break;
            case 'view_edit':
                $id = $result['id'];
                $zones = $this->View_CCADZoneService->findAll();
                $result['address'] = array();
                $result_array = $this->findById($id);
                $result['address'] = $result_array[0];
                $result['zones'] = $zones;
                // Log::info('edit'.json_encode($result));
                return view("admin.customer.addressDialog")->with('result', $result);

            break;
            case 'delete': 
                $result = $this->getListing($result,$title);
                return view("admin.location.listingCustomerAddress", $title)->with('result', $result);	
            break;
        }
    }
}

?>