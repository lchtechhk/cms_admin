<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;

use App\Http\Controllers\Admin\Service\BaseApiService;
     class View_CCityService extends BaseApiService{
        function __construct(){
            $this->setTable('view_country_city');
        }

        function getListing(){
            $result = DB::table($this->getTable())
            ->where('cities_status','=','active')
            ->orderBy('countries_id','ASC')
            ->orderBY('cities_id','ASC')
            ->paginate(60);
            return $result;
        }
        function redirect_view($result,$title){
        }
    }
?>