<?php

namespace App\Providers;
use DB;
use Illuminate\Support\ServiceProvider;
use Session;
use Log;
use App\Http\Controllers\Admin\Service\View_OrderService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
	 */

	function __construct(){
	}
    public function boot(){
		DB::listen(function ($query) {
			// Log::notice($query->bindings);
            // $query->sql
            // $query->bindings
            // $query->time
        });
         // Using Closure based composers...
		$result = array();
				
		$index = 0;	
		
		//new customers
		$newCustomers = DB::table('customers')
				->where('is_seen','=', 0)
				->orderBy('id','desc')
				->get();
				
		//products low in quantity
		$lowInQunatity = DB::table('product')
			->LeftJoin('product_description', 'product_description.product_id', '=', 'product.product_id')
			->whereColumn('product.quantity', '<=', 'product.low_limit')
			->where('product_description.language_id', '=', '1')
			->where('product.low_limit', '>', 0)
			//->get();
			->paginate(10);
		
		$languages = DB::table('languages')->get();
		view()->share('languages', $languages);
		
		$web_setting = DB::table('settings')->get();
		view()->share('web_setting', $web_setting);

		view()->share('unseenOrders', $result);
		view()->share('newCustomers', $newCustomers);
		view()->share('lowInQunatity', $lowInQunatity);    		
	}

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
