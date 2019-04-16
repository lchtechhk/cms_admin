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
    function getListing(){
        $countries = $this->View_CCADZoneService->findAll();
    }

    function redirect_view($result,$title){
        $result['label'] = "AddAddress";
        switch($result['operation']){
            case 'listing':
                $countries = $this->View_CCADZoneService->findAll();
                $result['countries'] = $countries;
                $customer_address = array();
                $result['customer_address'] = $customer_address;
                
                Log::info('[Addressbooking] -- getListing : ' .json_encode($countries));
                return view("admin.customer.listingCustomerAddress",$title)->with('result', $result);

            break;
            case 'add':
                $countries = $this->CountryService->findAll();
                $result['countries'] = $countries;
        
                $customer_address = array();
                $result['customer_address'] = $customer_address;	
                return view("admin.customer.addAddress",$title)->with('result', $result);
            break;
            case 'edit':
                $result['customers'] = $this->findById($result['request']->id);
                return view("admin.customer.editCustomer", $title)->with('result', $result);		
            break;
            case 'delete': 
                $result['customers'] = $this->getListing();
                return view("admin.location.listingCustomer", $title)->with('result', $result);	
            break;
        }
    }
}

?>