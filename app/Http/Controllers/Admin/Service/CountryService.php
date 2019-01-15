<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use App\Http\Controllers\Admin\Service\BaseApiService;
     class CountryService extends BaseApiService{
        function __construct(){
            $this->setTable('countries');
            
        }
        function getListing(){
            $result = DB::table($this->getTable())
			->orderBy('id','ASC')
            ->paginate(60);
            return $result;
        }
        function redirect_view($result,$title){
            switch($result['operation']){
                case 'listing':
                    $result['countries'] = $this->getListing();
                    return view("admin.listingCountry", $title)->with('result', $result);
                break;
                case 'add':
                    return view("admin.addCountry", $title)->with('result', $result);
                break;
                case 'edit':
                    $result['countries'] = $this->findById($result['request']->id);
                    return view("admin.editCountry", $title)->with('result', $result);		
                break;
                case 'delete': 
                    $result['countries'] = $this->getListing();
                    return view("admin.listingCountry", $title)->with('result', $result);	
                break;
            }
        }

    }
?>