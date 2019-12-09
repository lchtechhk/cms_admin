<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Session;

use App\Http\Controllers\Admin\Service\BaseApiService;
     class View_CustomersService extends BaseApiService{
        function __construct(){
            $this->setTable('view_customer');
            $this->companyAuth = true;
        }

        function getListingWithOutStatus(){
            $result = DB::table($this->getTable())
            ->where("company_id",Session::get('default_company_id'))
            // ->orderBy('countries_id','ASC')
            // ->orderBY('zones_id','ASC')
            ->paginate(60);
            Log::info('[View_CustomersService] -- getListing : ] '. json_encode($result, JSON_UNESCAPED_UNICODE));
            return $result;
        }

        function getListing(){
            $result = DB::table($this->getTable())
            ->where('status','=','active')
            ->where("company_id",Session::get('default_company_id'))
            // ->orderBy('countries_id','ASC')
            // ->orderBY('zones_id','ASC')
            ->paginate(60);
            Log::info('[View_CustomersService] -- getListing : ] '. json_encode($result, JSON_UNESCAPED_UNICODE));
            return $result;
        }
        function findByEmail($email){
            $result = DB::table($this->getTable())
            ->where('email','=',$email);
            Log::info('[View_CustomersService] -- findByEmail : ] '. json_encode($result, JSON_UNESCAPED_UNICODE));
            return $result;
        }
        function getCountByEmailAndId($email,$id){
            $result = DB::table($this->getTable())
            ->where('email','=',$email)
            ->where('id','=',$id)
            ->count();
            Log::info('[View_CustomersService] -- getCountByEmailAndId : ] '. $result);
            return $result;
        }
        function getCountByEmail($email){
            $result = DB::table($this->getTable())
            ->where('email','=',$email)
            ->count();
            Log::info('[View_CustomersService] -- getCountByEmail : ] '. $result);
            return $result;
        }
        function redirect_view($result,$title){
        }
    }
?>