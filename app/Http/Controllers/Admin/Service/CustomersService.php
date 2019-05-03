<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\View_CustomersService;
use App\Http\Controllers\Admin\Service\AddressBookService;

class CustomersService extends BaseApiService{
    private $View_CustomersService;
    private $AddressBookService;

    function __construct(){
        $this->setTable('customers');
        $this->View_CustomersService = new View_CustomersService();
        $this->AddressBookService = new AddressBookService();

    }
    function getListing(){
        return $this->View_CustomersService->getListingWithOutStatus();
    }

    public function deleteCustomer($result){
        $customer_id = $result['customer_id'];
        try{
			DB::beginTransaction();
			$delete_customer_result = $this->delete($customer_id,"labels.CustomersDeletedMessage","labels.CustomersDeletedMessageFail");
			if(!empty($delete_customer_result) && $delete_customer_result['status']  != 'success')throw new Exception ($delete_customer_result['message']);
			$delete_addressbook_result = $this->AddressBookService->deleteByKey_Value('customer_id',$customer_id,"labels.AddressDeletedMessage","labels.AddressDeletedMessageFail");
			if(!empty($delete_addressbook_result) && $delete_addressbook_result['status']  != 'success')throw new Exception ($delete_addressbook_result['message']);
            
            $result['status'] = 'success';
            $result['message'] = 'labels.DeletedCustomersAndAddressBookSuccess';
            DB::commit();
		}catch(Exception $e){
            $result = $this->throwException($result,$e->getMessage(),true);
        }
        $result['operation'] = 'delete';
        return $result;
    }
    function redirect_view($result,$title){
        $result['label'] = "Customer";
        switch($result['operation']){
            case 'delete': 
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
        }
    }
}

?>