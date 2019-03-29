<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;

use App\Http\Controllers\Admin\Service\BaseApiService;
     class View_CustomersService extends BaseApiService{
        function __construct(){
            $this->setTable('view_customer');
        }

        function getListing(){
            $result = DB::table($this->getTable())
            ->where('status','=','active')
            ->orderBy('countries_id','ASC')
            ->orderBY('zones_id','ASC')
            ->paginate(60);
            Log::info('[View_CustomersService] -- getListing : ] '. json_encode($result, JSON_UNESCAPED_UNICODE));
            return $result;
        }
        function redirect_view($result,$title){
        }
    }
?>