<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;

use App\Http\Controllers\Admin\Service\BaseApiService;
     class UserToCompanyService extends BaseApiService{
        function __construct(){
            $this->setTable('user_to_company');
        }

        function getUserIdsByCompany($company_id){
            $user_to_company = $this->findByColumnAndId("company_id",$company_id);
            $id_list = array();
            if(sizeof($user_to_company) > 0){
                foreach ($user_to_company AS $utc) {
                    $id_list[] = $utc->id;
                }
            }
            return $id_list;
        }
        function redirect_view($result,$title){
        }
    }
?>