<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

class CompanyDescriptionService extends BaseApiService{
    function __construct(){
        $this->setTable('company_description');
        $this->companyAuth = true;
    }
    function redirect_view($result,$title){
    }
}

?>