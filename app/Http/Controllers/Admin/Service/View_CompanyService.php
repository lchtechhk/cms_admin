<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;
use App\Http\Controllers\Admin\Service\UserToCompanyService;

class View_CompanyService extends BaseApiService{

    function __construct(){
        $this->setTable('view_company');
        $this->UserToCompanyService = new UserToCompanyService();

    }

    function getListing(){
        return $this->findAllByLanguage(session('language_id') );
    }

    function getCompanyBelongOwn($user_id){
        $company_ids = $this->UserToCompanyService->getCompanyIdsByUser($user_id);
        return $this->findByColumn_ValuesWithLanguage("company_id",$company_ids);
    }
    function redirect_view($result,$title){
    }
}

?>