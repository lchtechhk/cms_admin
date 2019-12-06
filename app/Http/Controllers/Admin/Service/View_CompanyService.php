<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;
use Session;

use App\Http\Controllers\Admin\Service\UserToCompanyService;

class View_CompanyService extends BaseApiService{

    function __construct(){
        $this->setTable('view_company');
        $this->UserToCompanyService = new UserToCompanyService();

    }

    function getListing(){
        $user_id = auth()->guard('admin')->user()->user_id;
        $company_ids = $this->UserToCompanyService->getCompanyIdsByUser($user_id);
        return $this->findByColumn_ValuesWithLanguage("company_id",$company_ids);
    }

    function getCompanyBelongOwn(){
        $user_id = auth()->guard('admin')->user()->user_id;
        $company_ids = $this->UserToCompanyService->getCompanyIdsByUser($user_id);
        Log::info('company_ids : ' . json_encode($company_ids));
        return $this->findByColumn_ValuesWithLanguage("company_id",$company_ids);
    }
    function redirect_view($result,$title){
    }
}

?>