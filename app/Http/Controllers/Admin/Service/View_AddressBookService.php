<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;

use App\Http\Controllers\Admin\Service\BaseApiService;
     class View_AddressBookService extends BaseApiService{
        function __construct(){
            $this->setTable('view_address_book');
            $this->companyAuth = true;
        }

        function redirect_view($result,$title){
        }
       
    }
?>