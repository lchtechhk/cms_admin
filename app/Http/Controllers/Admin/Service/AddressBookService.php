<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\CountryService;
use App\Http\Controllers\Admin\Service\View_CCADZoneService;
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
        Log::info('[Addressbooking] -- getListing : ' .json_encode($result));
        return $result;
    }
    function redirect_view($result,$title){
        $result['label'] = "AddAddress";
        switch($result['operation']){
            case 'listing':
                $result = $this->getListing($result,$title);
                return view("admin.customer.listingCustomerAddress",$title)->with('result', $result);

            break;
            case 'add':
                $result = $this->getListing($result,$title);
                return view("admin.customer.listingCustomerAddress",$title)->with('result', $result);
            break;
            case 'edit':
                $customers_id = $result['customers_id'];
                $id = $result['id'];
                $result['address'] = array();
                $result_array = $this->findById($id);
                $result['address'] = $result_array[0];
                return view("admin/customer/addressDialog")->with('result', $result);
            break;
            case 'delete': 
                $result['customers'] = $this->getListing();
                return view("admin.location.listingCustomerAddress", $title)->with('result', $result);	
            break;
        }
    }
}

?>