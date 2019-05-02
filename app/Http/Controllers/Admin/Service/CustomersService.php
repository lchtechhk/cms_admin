<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\View_CustomersService;
class CustomersService extends BaseApiService{
    private $View_CustomersService;
    function __construct(){
        $this->setTable('customers');
        $this->View_CustomersService = new View_CustomersService();

    }
    function getListing(){
        return $this->View_CustomersService->getListingWithOutStatus();
    }

    function redirect_view($result,$title){
        $result['label'] = "Customer";
        switch($result['operation']){
            case 'listing':
                $result['customers'] = $this->getListing();
                Log::info('[Customer] -- getListing : ' .json_encode($result['customers'][0]));
                return view("admin.customer.listingCustomer", $title)->with('result', $result);
            break;
            case 'add':
                // $customerData = array();
                // $message = array();
                // $errorMessage = array();
                
                // //get function from ManufacturerController controller
                // $myVar = new AddressController();
                // $customerData['countries'] = $myVar->getAllCountries();
                
                
                // $customerData['message'] = $message;
                // $customerData['errorMessage'] = $errorMessage;
        
                return view("admin.customer.addCustomer", $title)->with('result', $result);
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