<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     // return $request->user();
//     return 'API';
// });


Route::group(['namespace' => 'App', 'prefix'=>'app'], function () {
	
	Route::post('/getcategories', 'CategoriesController@getcategories');

	//registration url
	Route::post('/registerdevices', 'CustomersController@registerdevices');

	//registration url
	Route::post('/processregistration', 'CustomersController@processregistration');

	//update customer info url
	Route::post('/updatecustomerinfo', 'CustomersController@updatecustomerinfo');

	// login url
	Route::post('/processlogin', 'CustomersController@processlogin');

	//social login
	Route::post('/facebookregistration', 'CustomersController@facebookregistration');
	Route::post('/googleregistration', 'CustomersController@googleregistration');
	
	//push notification setting
	Route::post('/notify_me', 'CustomersController@notify_me');

	// forgot password url
	Route::post('/processforgotpassword', 'CustomersController@processforgotpassword');


	/*
	|--------------------------------------------------------------------------
	| Location Controller Routes
	|--------------------------------------------------------------------------
	|
	| This section contains countries shipping detail
	| This section contains links of affiliated to address
	|
	*/

	//get country url
	Route::post('/getcountries', 'LocationController@getcountries');

	//get zone url
	Route::post('/getzones', 'LocationController@getzones');

	//get all address url
	Route::post('/getalladdress', 'LocationController@getalladdress');

	//address url
	Route::post('/addshippingaddress', 'LocationController@addshippingaddress');

	//update address url
	Route::post('/updateshippingaddress', 'LocationController@updateshippingaddress');

	//update default address url
	Route::post('/updatedefaultaddress', 'LocationController@updatedefaultaddress');

	//delete address url
	Route::post('/deleteshippingaddress', 'LocationController@deleteshippingaddress');


	/*
	|--------------------------------------------------------------------------
	| Product Controller Routes
	|--------------------------------------------------------------------------
	|
	| This section contains product data
	| Such as:
	| top seller, Deals, Liked, categroy wise or category individually and detail of every product.
	*/

	//get categories
	Route::post('/allcategories', 'MyProductController@allcategories');

	//getAllProducts
	Route::post('/getallproducts', 'MyProductController@getallproducts');

	//like products
	Route::post('/likeproduct', 'MyProductController@likeproduct');

	//unlike products
	Route::post('/unlikeproduct', 'MyProductController@unlikeproduct');

	//get filters
	Route::post('/getfilters', 'MyProductController@getfilters');

	//get getFilterproducts
	Route::post('/getfilterproducts', 'MyProductController@getfilterproducts');

	//get getWishList
	Route::post('/getsearchdata', 'MyProductController@getsearchdata');


	/*
	|--------------------------------------------------------------------------
	| News Controller Routes
	|--------------------------------------------------------------------------
	|
	| This section contains news data
	| Such as:
	| top news or category individually and detail of every news.
	*/

	//get categories
	Route::post('/allnewscategories', 'NewsController@allnewscategories');

	//getAllProducts
	Route::post('/getallnews', 'NewsController@getallnews');

	/*
	|--------------------------------------------------------------------------
	| Cart Controller Routes
	|--------------------------------------------------------------------------
	|
	| This section contains customer orders
	| 
	*/


	//generateBraintreeToken
	Route::get('/generatebraintreetoken', 'OrderController@generatebraintreetoken');
	
	//generateBraintreeToken
	Route::get('/instamojotoken', 'OrderController@instamojotoken');

	//add To order
	Route::post('/addtoorder', 'OrderController@addtoorder');

	//get all orders
	Route::post('/getorders', 'OrderController@getorders');

	//get default payment method
	Route::post('/getpaymentmethods', 'OrderController@getpaymentmethods');

	//get shipping / tax Rate
	Route::post('/getrate', 'OrderController@getrate');

	//get Coupon
	Route::post('/getcoupon', 'OrderController@getcoupon');


	/*
	|--------------------------------------------------------------------------
	| Banner Controller Routes
	|--------------------------------------------------------------------------
	|
	| This section contains banners, banner history
	| 
	*/


	//get banners
	Route::get('/getbanners', 'BannersController@getbanners');

	//banners history
	Route::post('/bannerhistory', 'BannersController@bannerhistory');



	/*
	|--------------------------------------------------------------------------
	| App setting Controller Routes
	|--------------------------------------------------------------------------
	|
	| This section contains app  languages
	| 
	*/
	

	Route::get('/sitesetting', 'AppSettingController@sitesetting');
	//old app label
	Route::post('/applabels', 'AppSettingController@applabels');
	//new app label
	Route::get('/applabels3', 'AppSettingController@applabels3');

	Route::post('/contactus', 'AppSettingController@contactus');
	
	Route::get('/getlanguages', 'AppSettingController@getlanguages');

	
	/*
	|--------------------------------------------------------------------------
	| Page Controller Routes
	|--------------------------------------------------------------------------
	|
	| This section contains news data
	| Such as:
	| top Page individually and detail of every Page.
	*/
	

	//getAllPages
	Route::post('/getallpages', 'PagesController@getallpages');
	
});
