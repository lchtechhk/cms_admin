<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\View_CustomersService;
use App\Http\Controllers\Admin\Service\AddressBookService;
use App\Http\Controllers\Admin\Service\UploadService;

class CustomersService extends BaseApiService{
    private $View_CustomersService;
    private $AddressBookService;
	private $UploadService;

    function __construct(){
        $this->setTable('customers');
        $this->View_CustomersService = new View_CustomersService();
        $this->AddressBookService = new AddressBookService();
		$this->UploadService = new UploadService();

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
            case 'listing':
                $result['customers'] = $this->getListing();
                Log::info('[Customer] -- getListing : ' .json_encode($result['customers'][0]));
                return view("admin.customer.listingCustomer", $title)->with('result', $result);
            break;
            case 'view_add':
                return view("admin.customer.addCustomer", $title)->with('result', $result);
            break;
            case 'view_edit':
                $customers = $this->findById($result['request']->id);
                $result['customer'] = !empty($customers) && \sizeof($customers)>0? $customers[0] : array();
                return view("admin.customer.editCustomer", $title)->with('result', $result);	
            break;
            case 'add':
                $email = $result['email'];
                $own_email_count = $this->View_CustomersService->getCountByEmail($email);
                Log::info('own_email_count : ' . $own_email_count);
                if($own_email_count > 0 ){
                    $result['status'] = 'fail';
                    $result['message'] =  'Update Error, The Email Is Duplicate In DB';
                    return view("admin.customer.addCustomer", $title)->with('result', $result);
                }        
                $result['customers_picture'] = $this->UploadService->upload_image($result['request'],'newImage','resources/assets/images/user_profile/');
                $add_customer_result = $this->add($result,"labels.AreaAddedMessage","labels.AreaAddedMessageFail");
                $customers = $this->findById($add_customer_result['response_id']);
                $result['customer'] = !empty($customers) && \sizeof($customers)>0? $customers[0] : array();
                return view("admin.customer.editCustomer", $title)->with('result', $result);
            break;
            case 'edit':
                $customers = $this->findById($result['request']->id);
                $email = $result['email'];
                $id = $result['id'];
                $own_email_count = $this->View_CustomersService->getCountByEmailAndId($email,$id);
                $duplicate_email_count = $this->View_CustomersService->getCountForEmailExisting($email,$id);
                if($own_email_count > 1 ){
                    unset($result['email']);
                }else if($own_email_count == 0 && $duplicate_email_count > 0){
                    $result['operation'] = 'edit';
                    $result['status'] = 'fail';
                    $result['message'] =  'Update Error, The Email Is Duplicate In DB';
                    $result['customer'] = !empty($customers) && \sizeof($customers)>0? $customers[0] : array();
                    return view("admin.customer.editCustomer", $title)->with('result', $result);
                }
                $result['customers_picture'] = $this->UploadService->upload_image($result['request'],'newImage','resources/assets/images/user_profile/');
                $update_customer_result = $this->update('id',$result,"labels.CustomerAddedMessage","labels.CustomerAddedMessageFail");
                Log::info('resultresultresult : ' . json_encode($result));
                $update_customer_result['customer'] = !empty($customers) && \sizeof($customers)>0? $customers[0] : array();
                return view("admin.customer.editCustomer", $title)->with('result', $update_customer_result);		
            break;
            case 'delete':
                $delete_customer_result = $this->deleteByKey_Value("id",$result['id'],"labels.CountryDeletedTax","labels.CountryDeletedTaxFail");
                $delete_customer_result['label'] = $result['label'];
                $delete_customer_result['customers'] = $this->getListing();
                return view("admin.customer.listingCustomer", $title)->with('result', $delete_customer_result);
            break;
        }
    }
}

?>