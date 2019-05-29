<?php

namespace App\Providers;
use DB;
use Illuminate\Support\ServiceProvider;
use Session;
use Log;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(){
		DB::listen(function ($query) {
			// Log::notice($query->bindings);
            // $query->sql
            // $query->bindings
            // $query->time
        });
         // Using Closure based composers...
		$result = array();
        $orders = DB::table('orders')
				->leftJoin('customers','customers.id','=','orders.customers_id')
				->where('orders.is_seen','=', 0)
				->orderBy('orders_id','desc')
				->get();
				
		$index = 0;	
		foreach($orders as $orders_data){
			
			array_push($result,$orders_data);			
			$orders_products = DB::table('orders_products')
				->where('orders_id', '=' ,$orders_data->orders_id)
				->get();
			
			$result[$index]->price = $orders_products;
			$result[$index]->total_products = count($orders_products);
			$index++;
		}
		
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
