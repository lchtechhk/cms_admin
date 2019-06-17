<?php
/*
Project Name: IonicEcommerce
Project URI: http://ionicecommerce.com
Author: VectorCoder Team
Author URI: http://vectorcoder.com/
Version: 2.8
*/
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

//validator is builtin class in laravel
use Validator;

//to send an email use Mail class in laravel
use Mail;
use App\User;

use App;
use Lang;

use DB;
//for password encryption or hash protected

use Hash;
use App\Administrator;

//for authenitcate login data
use Auth;
//for redirect
use Illuminate\Support\Facades\Redirect;
//use Illuminate\Foundation\Auth\ThrottlesLogins;
//use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

//for requesting a value 
use Illuminate\Http\Request;
//use Illuminate\Routing\Controller;

class AdminOrdersController extends Controller
{
	//add listingOrders
	public function orders(){
		$title = array('pageTitle' => Lang::get("labels.ListingOrders"));
		//$language_id            				=   $request->language_id;
		$language_id            				=   '1';			
		
		$message = array();
		$errorMessage = array();
		
		$orders = DB::table('orders')->orderBy('date_purchased','DESC')->paginate(40);	
		
		$index = 0;
		$total_price = array();
		
		foreach($orders as $orders_data){
			$orders_products = DB::table('orders_products')
				->select('final_price', DB::raw('SUM(final_price) as total_price'))
				->where('orders_id', '=' ,$orders_data->orders_id)
				->get();
				
			$orders[$index]->total_price = $orders_products[0]->total_price;		
			
			$orders_status_history = DB::table('orders_status_history')
				->LeftJoin('orders_status', 'orders_status.orders_status_id', '=', 'orders_status_history.orders_status_id')
				->select('orders_status.orders_status_name', 'orders_status.orders_status_id')
				->where('orders_id', '=', $orders_data->orders_id)->orderby('orders_status_history.date_added', 'DESC')->limit(1)->get();
				
			//print_r($orders_status_history);
			$orders[$index]->orders_status_id = $orders_status_history[0]->orders_status_id;
			$orders[$index]->orders_status = $orders_status_history[0]->orders_status_name;
			$index++;
		
		}
		
		$ordersData['message'] = $message;
		$ordersData['errorMessage'] = $errorMessage;
		$ordersData['orders'] = $orders;
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$ordersData['currency'] = $myVar->getSetting();
		
		return view("admin.orders",$title)->with('listingOrders', $ordersData);
	}
	
	
	//view order detail
	public function vieworder(Request $request){
		$title = array('pageTitle' => Lang::get("labels.ViewOrder"));
		$language_id             =   '1';	
		$orders_id        	 	 =   $request->id;			
		
		$message = array();
		$errorMessage = array();
		
		DB::table('orders')->where('orders_id', '=', $orders_id)->update(['is_seen' => 1 ]);
		
		$order = DB::table('orders')
				->LeftJoin('orders_status_history', 'orders_status_history.orders_id', '=', 'orders.orders_id')
				->LeftJoin('orders_status', 'orders_status.orders_status_id', '=' ,'orders_status_history.orders_status_id')
				->where('orders.orders_id', '=', $orders_id)->orderby('orders_status_history.date_added', 'DESC')->get();
			
		//foreach
		foreach($order as $data){
			$orders_id	 = $data->orders_id;
			
			$orders_products = DB::table('orders_products')
				->join('product', 'products.products_id','=', 'orders_products.products_id')
				->select('orders_products.*', 'products.products_image as image')
				->where('orders_products.orders_id', '=', $orders_id)->get();
				$i = 0;
				$total_price  = 0;
				$total_tax	  = 0;
				$product = array();
				$subtotal = 0;
				foreach($orders_products as $orders_products_data){
					$product_attribute = DB::table('orders_products_attributes')
						->where([
							['orders_products_id', '=', $orders_products_data->orders_products_id],
							['orders_id', '=', $orders_products_data->orders_id],
						])
						->get();
						
					$orders_products_data->attribute = $product_attribute;
					$product[$i] = $orders_products_data;
					$total_price = $total_price+$orders_products[$i]->final_price;
					
					$subtotal += $orders_products[$i]->final_price;
					
					$i++;
				}
			$data->data = $product;
			$orders_data[] = $data;
		}
		
		$orders_status_history = DB::table('orders_status_history')
			->LeftJoin('orders_status', 'orders_status.orders_status_id', '=' ,'orders_status_history.orders_status_id')
			->orderBy('orders_status_history.date_added', 'desc')
			->where('orders_id', '=', $orders_id)->get();
				
		$orders_status = DB::table('orders_status')->get();
				
		$ordersData['message'] 					=	$message;
		$ordersData['errorMessage']				=	$errorMessage;
		$ordersData['orders_data']		 	 	=	$orders_data;
		$ordersData['total_price']  			=	$total_price;
		$ordersData['orders_status']			=	$orders_status;
		$ordersData['orders_status_history']    =	$orders_status_history;
		$ordersData['subtotal']    				=	$subtotal;
		
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$ordersData['currency'] = $myVar->getSetting();
		
		return view("admin.vieworder", $title)->with('data', $ordersData);
	}
	
	
	//update order
	public function updateOrder(Request $request){
		 $orders_status 		=	 $request->orders_status;
		 $comments 	 			=	 $request->comments;
		 $orders_id 			= 	 $request->orders_id;
		 $old_orders_status 	= 	 $request->old_orders_status;
		 $date_added			=    date('Y-m-d h:i:s');
		 
		 //get function from other controller
		 $myVar = new AdminSiteSettingController();
		 $setting = $myVar->getSetting();
		 
		 $status = DB::table('orders_status')->where('orders_status_id', '=', $orders_status)->get();
		
		
		 if($old_orders_status==$orders_status){
			 return redirect()->back()->with('error', Lang::get("labels.StatusChangeError"));
		 }else{
		 
		 //orders status history
		 $orders_history_id = DB::table('orders_status_history')->insertGetId(
			[	 'orders_id'  => $orders_id,
				 'orders_status_id' => $orders_status,
				 'date_added'  => $date_added,
				 'customer_notified' =>'1',
				 'comments'  =>  $comments
			]);
		
			if($orders_status=='2'){
				
				$orders_products = DB::table('orders_products')->where('orders_id', '=', $orders_id)->get();
				
				foreach($orders_products as $products_data){
					DB::table('product')->where('products_id', $products_data->products_id)->update([
						'product_quantity' => DB::raw('product_quantity - "'.$products_data->products_quantity.'"'),
						'product_ordered'  => DB::raw('product_ordered + 1')
						]);
				}
			}
		
		$orders = DB::table('orders')->where('orders_id', '=', $orders_id)->get();
		
		$data = array();
		$data['customers_id'] = $orders[0]->customers_id;
		$data['orders_id'] = $orders_id;
		$data['status'] = $status[0]->orders_status_name;
		
		//notify user		
		$myVar = new AdminAlertController();
		$myVar->orderStatusChange($data);
						
		return redirect()->back()->with('message', Lang::get("labels.OrderStatusChangedMessage"));
		
		}
		
	}
	
	//deleteorders
	public function deleteOrder(Request $request){
		DB::table('orders')->where('orders_id', $request->orders_id)->delete();
		DB::table('orders_products')->where('orders_id', $request->orders_id)->delete();
		return redirect()->back()->withErrors([Lang::get("labels.OrderDeletedMessage")]);
	}
	
}
