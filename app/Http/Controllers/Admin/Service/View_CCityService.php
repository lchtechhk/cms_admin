<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Session;

use App\Http\Controllers\Admin\Service\BaseApiService;
     class View_CCityService extends BaseApiService{
        function __construct(){
            $this->setTable('view_country_city');
            $this->companyAuth = true;

        }

        function getListing(){
            $result = DB::table($this->getTable())
            ->where('cities_status','=','active')
            ->where('company_id','=',Session::get('default_company_id'))
            ->orderBy('countries_id','ASC')
            ->orderBY('cities_id','ASC')
            ->paginate(60);
            return $result;
        }
        function redirect_view($result,$title){
        }
    }
?>