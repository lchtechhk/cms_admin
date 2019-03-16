<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

class CustomersService extends BaseApiService{
    function __construct(){
        $this->setTable('customers');
    }
    function getListing(){
        $result = DB::table('customers')
        ->LeftJoin('address_book','address_book.address_book_id','=', 'customers.customers_default_address_id')
        ->LeftJoin('countries','countries.id','=', 'address_book.entry_country_id')
        ->LeftJoin('zones','zones.id','=', 'address_book.entry_zone_id')
        ->LeftJoin('customers_info','customers_info.customers_info_id','=', 'customers.customers_id')
        ->select('customers.*', 'address_book.entry_gender as entry_gender', 'address_book.entry_company as entry_company', 'address_book.entry_firstname as entry_firstname', 'address_book.entry_lastname as entry_lastname', 'address_book.entry_street_address as entry_street_address', 'address_book.entry_suburb as entry_suburb', 'address_book.entry_postcode as entry_postcode', 'address_book.entry_city as entry_city', 'address_book.entry_state as entry_state', 'countries.*', 'zones.*')
        ->orderBy('customers.customers_id','ASC')
        ->paginate(50);
        return $result;
    }

    function redirect_view($result,$title){
        $result['label'] = "Customers";
        switch($result['operation']){
            case 'listing':
                $result['customers'] = $this->getListing();
                Log::info(json_encode($result['customers']));
                return view("admin.listingCustomers", $title)->with('result', $result);
            break;
            case 'add':
                return view("admin.location.addCustomers", $title)->with('result', $result);
            break;
            case 'edit':
                $result['customers'] = $this->findById($result['request']->id);
                return view("admin.location.editCustomers", $title)->with('result', $result);		
            break;
            case 'delete': 
                $result['customers'] = $this->getListing();
                return view("admin.location.listingCustomers", $title)->with('result', $result);	
            break;
        }
    }
}

?>