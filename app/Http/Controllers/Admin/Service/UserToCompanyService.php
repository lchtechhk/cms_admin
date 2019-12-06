<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Session;
use App\Http\Controllers\Admin\Service\BaseApiService;
     class UserToCompanyService extends BaseApiService{
        function __construct(){
            $this->setTable('user_to_company');
        }

        function getUserIdsByCompany(){
            $user_to_company = $this->findByColumn_Value("company_id",Session::get('default_company_id'));
            $id_list = array();
            if(sizeof($user_to_company) > 0){
                foreach ($user_to_company AS $utc) {
                    $id_list[] = $utc->user_id;
                }
            }
            return $id_list;
        }
        function getCompanyIdsByUser($user_id){
            $user_to_company = $this->findByColumn_Value("user_id",$user_id);
            $id_list = array();
            if(sizeof($user_to_company) > 0){
                foreach ($user_to_company AS $utc) {
                    $id_list[] = $utc->company_id;
                }
            }
            return $id_list;
        }
        function redirect_view($result,$title){
        }
    }
?>