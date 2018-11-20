<?php
	/*
	Project Name: IonicEcommerce
	Project URI: http://ionicecommerce.com
	Author: VectorCoder Team
	Author URI: http://vectorcoder.com/
	Version: 3.0
	*/
	header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin:  *');
	header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
	header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Admin controller Routes
|--------------------------------------------------------------------------
|
| This section contains all admin Routes
| 
|
*/
Route::get('/', function() { return Redirect::to("admin/login"); });

Route::group(['prefix' => 'admin'], function () {
	
	Route::group(['namespace' => 'Admin'], function () {

		Route::group(['middleware' => 'admin'], function () {
			Route::get('/dashboard/{reportBase}', 'AdminController@dashboard');
			Route::get('/post', 'AdminController@myPost');
			//show admin personal info record
			Route::get('/adminInfo', 'AdminController@adminInfo');

		/*
		|--------------------------------------------------------------------------
		| categories/Product Controller Routes
		|--------------------------------------------------------------------------
		|
		| This section contains categories/Product Controller Routes
		| 
		|
		*/
			//main listingManufacturer
			Route::get('/manufacturers', 'AdminManufacturerController@manufacturers');
			Route::get('/addmanufacturer', 'AdminManufacturerController@addmanufacturer');
			Route::post('/addnewmanufacturer', 'AdminManufacturerController@addnewmanufacturer');
			Route::get('/editmanufacturer/{id}', 'AdminManufacturerController@editmanufacturer');
			Route::post('/updatemanufacturer', 'AdminManufacturerController@updatemanufacturer');
			Route::post('/deletemanufacturer', 'AdminManufacturerController@deletemanufacturer');

			//main categories
			Route::get('/categories', 'AdminCategoriesController@categories');
			Route::get('/addcategory', 'AdminCategoriesController@addcategory');
			Route::post('/addnewcategory', 'AdminCategoriesController@addnewcategory');
			Route::get('/editcategory/{id}', 'AdminCategoriesController@editcategory');
			Route::post('/updatecategory', 'AdminCategoriesController@updatecategory');
			Route::get('/deletecategory/{id}', 'AdminCategoriesController@deletecategory');

			//sub categories
			Route::get('/subcategories', 'AdminCategoriesController@subcategories');
			Route::get('/addsubcategory', 'AdminCategoriesController@addsubcategory');
			Route::post('/addnewsubcategory', 'AdminCategoriesController@addnewsubcategory');
			Route::get('/editsubcategory/{id}', 'AdminCategoriesController@editsubcategory');
			Route::post('/updatesubcategory', 'AdminCategoriesController@updatesubcategory');
			Route::get('/deletesubcategory/{id}', 'AdminCategoriesController@deletesubcategory');
			
			Route::post('/getajaxcategories', 'AdminCategoriesController@getajaxcategories');

			//products
			Route::get('/products', 'AdminProductsController@products');
			Route::get('/addproduct', 'AdminProductsController@addproduct');
			Route::post('/addnewproduct', 'AdminProductsController@addnewproduct');

			//add attribute against newly added product
			Route::get('/addproductattribute/{id}/', 'AdminProductsController@addproductattribute');
			Route::get('/addproductimages/{id}/', 'AdminProductsController@addproductimages');
			Route::post('/addnewdefaultattribute', 'AdminProductsController@addnewdefaultattribute');
			Route::post('/addnewproductattribute', 'AdminProductsController@addnewproductattribute');
			Route::post('/updateproductattribute', 'AdminProductsController@updateproductattribute');
			Route::post('/updatedefaultattribute', 'AdminProductsController@updatedefaultattribute');
			Route::post('/deleteproduct', 'AdminProductsController@deleteproduct');
			Route::post('/deleteproductattribute', 'AdminProductsController@deleteproductattribute');
			Route::post('/addnewproductimage', 'AdminProductsController@addnewproductimage');
			Route::post('/deletedefaultattribute', 'AdminProductsController@deletedefaultattribute');
			Route::post('editproductattribute', 'AdminProductsController@editproductattribute');
			Route::post('editdefaultattribute', 'AdminProductsController@editdefaultattribute');
			Route::post('addnewproductimagemodal', 'AdminProductsController@addnewproductimagemodal');
			Route::post('deleteproductattributemodal', 'AdminProductsController@deleteproductattributemodal');
			Route::post('deletedefaultattributemodal', 'AdminProductsController@deletedefaultattributemodal');

			//product attribute
			Route::post('/addnewproductimage', 'AdminProductsController@addnewproductimage');
			Route::post('editproductimage', 'AdminProductsController@editproductimage');
			Route::post('/updateproductimage', 'AdminProductsController@updateproductimage');
			Route::post('/deleteproductimagemodal', 'AdminProductsController@deleteproductimagemodal');
			Route::post('/deleteproductimage', 'AdminProductsController@deleteproductimage');
			Route::get('/editproduct/{id}', 'AdminProductsController@editproduct');
			Route::post('/updateproduct', 'AdminProductsController@updateproduct');	
			Route::post('/getOptions', 'AdminProductsController@getOptions');	
			Route::post('/getOptionsValue', 'AdminProductsController@getOptionsValue');	


			//Attribute
			Route::get('/attributes', 'AdminProductsController@attributes');
			Route::get('/addattributes', 'AdminProductsController@addattributes');
			Route::post('/addnewattributes', 'AdminProductsController@addnewattributes');
			Route::get('/editattributes/{id}/{language_id}', 'AdminProductsController@editattributes');
			Route::post('/updateattributes/', 'AdminProductsController@updateattributes');
			Route::post('/deleteattribute', 'AdminProductsController@deleteattribute');
			Route::post('/addattributevalue', 'AdminProductsController@addattributevalue');
			Route::post('/updateattributevalue', 'AdminProductsController@updateattributevalue');
			Route::post('/checkattributeassociate', 'AdminProductsController@checkattributeassociate');
			Route::post('/checkvalueassociate', 'AdminProductsController@checkvalueassociate');
			Route::post('/deletevalue', 'AdminProductsController@deletevalue');


			//manageAppLabel
			Route::get('/listingAppLabels', 'AdminAppLabelsController@listingAppLabels');
			Route::get('/addappkey', 'AdminAppLabelsController@addappkey');
			Route::post('/addNewAppLabel', 'AdminAppLabelsController@addNewAppLabel');
			Route::get('/editAppLabel/{id}', 'AdminAppLabelsController@editAppLabel');
			Route::post('/updateAppLabel/', 'AdminAppLabelsController@updateAppLabel');
			Route::get('/applabel', 'AdminAppLabelsController@manageAppLabel');


			//customers
			Route::get('/customers', 'AdminCustomersController@customers');
			Route::get('/addcustomers', 'AdminCustomersController@addcustomers');
			Route::post('/addnewcustomers', 'AdminCustomersController@addnewcustomers');


			//add adddresses against customers
			Route::get('/addaddress/{id}/', 'AdminCustomersController@addaddress');
			Route::post('/addNewCustomerAddress', 'AdminCustomersController@addNewCustomerAddress');
			Route::post('/editAddress', 'AdminCustomersController@editAddress');
			Route::post('/updateAddress', 'AdminCustomersController@updateAddress');
			Route::post('/deleteAddress', 'AdminCustomersController@deleteAddress');
			Route::post('/getZones', 'AdminCustomersController@getZones');
			//edit customer
			Route::get('/editcustomers/{id}', 'AdminCustomersController@editcustomers');
			Route::post('/updatecustomers', 'AdminCustomersController@updatecustomers');
			Route::post('/deletecustomers', 'AdminCustomersController@deletecustomers');

			//orders
			Route::get('/orders', 'AdminOrdersController@orders');		
			Route::get('/vieworder/{id}', 'AdminOrdersController@vieworder');
			Route::post('/updateOrder', 'AdminOrdersController@updateOrder');
			Route::post('/deleteOrder', 'AdminOrdersController@deleteOrder');
			
			//alert setting
			Route::get('/alertsetting', 'AdminSiteSettingController@alertSetting');
			Route::post('/updateAlertSetting', 'AdminSiteSettingController@updateAlertSetting');
			
			//generate application key
			Route::get('/generateKey', 'AdminSiteSettingController@generateKey');

			//countries
			Route::get('/countries', 'AdminTaxController@countries');
			Route::get('/addcountry', 'AdminTaxController@addcountry');
			Route::post('/addnewcountry', 'AdminTaxController@addnewcountry');
			Route::get('/editcountry/{id}', 'AdminTaxController@editcountry');
			Route::post('/updatecountry', 'AdminTaxController@updatecountry');
			Route::post('/deletecountry', 'AdminTaxController@deletecountry');

			//zones
			Route::get('/listingZones', 'AdminTaxController@listingZones');
			Route::get('/addZone', 'AdminTaxController@addZone');
			Route::post('/addNewZone', 'AdminTaxController@addNewZone');
			Route::get('/editZone/{id}', 'AdminTaxController@editZone');
			Route::post('/updateZone', 'AdminTaxController@updateZone');
			Route::post('/deleteZone', 'AdminTaxController@deleteZone');

			//tax class
			Route::get('/taxclass', 'AdminTaxController@taxclass');
			Route::get('/addtaxclass', 'AdminTaxController@addtaxclass');
			Route::post('/addnewtaxclass', 'AdminTaxController@addnewtaxclass');
			Route::get('/edittaxclass/{id}', 'AdminTaxController@edittaxclass');
			Route::post('/updatetaxclass', 'AdminTaxController@updatetaxclass');
			Route::post('/deletetaxclass', 'AdminTaxController@deletetaxclass');

			//tax rate
			Route::get('/taxrates', 'AdminTaxController@taxrates');
			Route::get('/addtaxrate', 'AdminTaxController@addtaxrate');
			Route::post('/addnewtaxrate', 'AdminTaxController@addnewtaxrate');
			Route::get('/edittaxrate/{id}', 'AdminTaxController@edittaxrate');
			Route::post('/updatetaxrate', 'AdminTaxController@updatetaxrate');
			Route::post('/deletetaxrate', 'AdminTaxController@deletetaxrate');

			//shipping setting
			Route::get('/shippingmethods', 'AdminShippingController@shippingmethods');
			Route::get('/upsShipping', 'AdminShippingController@upsShipping');
			Route::post('/updateupsshipping', 'AdminShippingController@updateupsshipping');
			Route::get('/flateRate', 'AdminShippingController@flateRate');
			Route::post('/updateflaterate', 'AdminShippingController@updateflaterate');
			Route::post('/defaultShippingMethod', 'AdminShippingController@defaultShippingMethod');
			Route::get('/shippingDetail/{table_name}', 'AdminShippingController@shippingDetail');
			Route::post('/updateShipping', 'AdminShippingController@updateShipping');
			//Payment setting
			Route::get('/paymentsetting', 'AdminPaymentController@paymentsetting');
			Route::post('/updatePaymentSetting', 'AdminPaymentController@updatePaymentSetting');

			//orders
			Route::get('/orderstatus', 'AdminSiteSettingController@orderstatus');
			Route::get('/addorderstatus', 'AdminSiteSettingController@addorderstatus');
			Route::post('/addNewOrderStatus', 'AdminSiteSettingController@addNewOrderStatus');
			Route::get('/editorderstatus/{id}', 'AdminSiteSettingController@editorderstatus');
			Route::post('/updateOrderStatus', 'AdminSiteSettingController@updateOrderStatus');
			Route::post('/deleteOrderStatus', 'AdminSiteSettingController@deleteOrderStatus');
			
			//units
			Route::get('/units', 'AdminSiteSettingController@units');
			Route::get('/addunit', 'AdminSiteSettingController@addunit');
			Route::post('/addnewunit', 'AdminSiteSettingController@addnewunit');
			Route::get('/editunit/{id}', 'AdminSiteSettingController@editunit');
			Route::post('/updateunit', 'AdminSiteSettingController@updateunit');
			Route::post('/deleteunit', 'AdminSiteSettingController@deleteunit');
			
			//setting page
			Route::get('/setting', 'AdminSiteSettingController@setting');
			Route::post('/updateSetting', 'AdminSiteSettingController@updateSetting');
			
			Route::get('/websettings', 'AdminSiteSettingController@webSettings');	
			Route::get('/themeSettings', 'AdminSiteSettingController@themeSettings');			
			Route::get('/appsettings', 'AdminSiteSettingController@appSettings');			
			Route::get('/admobSettings', 'AdminSiteSettingController@admobSettings');		
			Route::get('/facebooksettings', 'AdminSiteSettingController@facebookSettings');
			Route::get('/googlesettings', 'AdminSiteSettingController@googleSettings');	
			Route::get('/applicationapi', 'AdminSiteSettingController@applicationApi');	
			Route::get('/webthemes', 'AdminSiteSettingController@webThemes');
			Route::get('/seo', 'AdminSiteSettingController@seo');		
			Route::get('/customstyle', 'AdminSiteSettingController@customstyle');	
			Route::post('/updateWebTheme', 'AdminSiteSettingController@updateWebTheme');			
			
			//pushNotification
			Route::get('/pushnotification', 'AdminSiteSettingController@pushNotification');	
			
			//language setting
			Route::get('/getlanguages', 'AdminSiteSettingController@getlanguages');
			Route::get('/languages', 'AdminSiteSettingController@languages');
			Route::post('/defaultlanguage', 'AdminSiteSettingController@defaultlanguage');			
			Route::get('/addlanguages', 'AdminSiteSettingController@addlanguages');
			Route::post('/addnewlanguages', 'AdminSiteSettingController@addnewlanguages');
			Route::get('/editlanguages/{id}', 'AdminSiteSettingController@editlanguages');
			Route::post('/updatelanguages', 'AdminSiteSettingController@updatelanguages');
			Route::post('/deletelanguage', 'AdminSiteSettingController@deletelanguage');

			//banners
			Route::get('/banners', 'AdminBannersController@banners');
			Route::get('/addbanner', 'AdminBannersController@addbanner');
			Route::post('/addNewBanner', 'AdminBannersController@addNewBanner');
			Route::get('/editbanner/{id}', 'AdminBannersController@editbanner');
			Route::post('/updateBanner', 'AdminBannersController@updateBanner');
			Route::post('/deleteBanner/', 'AdminBannersController@deleteBanner');
			
			//sliders
			Route::get('/sliders', 'AdminSlidersController@sliders');
			Route::get('/addsliderimage', 'AdminSlidersController@addsliderimage');
			Route::post('/addNewSlide', 'AdminSlidersController@addNewSlide');
			Route::get('/editslide/{id}', 'AdminSlidersController@editslide');
			Route::post('/updateSlide', 'AdminSlidersController@updateSlide');
			Route::post('/deleteSlider/', 'AdminSlidersController@deleteSlider');

			//profile setting
			Route::get('/adminProfile', 'AdminController@adminProfile');
			Route::post('/updateProfile', 'AdminController@updateProfile');
			Route::post('/updateAdminPassword', 'AdminController@updateAdminPassword');

			//reports 
			Route::get('/statscustomers', 'AdminReportsController@statsCustomers');
			Route::get('/statsproductspurchased', 'AdminReportsController@statsProductsPurchased');
			Route::get('/statsproductsliked', 'AdminReportsController@statsProductsLiked');
			Route::get('/productsstock', 'AdminReportsController@productsStock');
			Route::post('/productSaleReport', 'AdminReportsController@productSaleReport');

			//Devices and send notification
			Route::get('/devices', 'AdminNotificationController@devices');
			Route::get('/viewdevices/{id}', 'AdminNotificationController@viewdevices');
			Route::post('/notifyUser/', 'AdminNotificationController@notifyUser');
			Route::get('/notifications/', 'AdminNotificationController@notifications');
			Route::post('/sendNotifications/', 'AdminNotificationController@sendNotifications');
			Route::post('/customerNotification/', 'AdminNotificationController@customerNotification');
			Route::post('/singleUserNotification/', 'AdminNotificationController@singleUserNotification');
			Route::post('/deletedevice/', 'AdminNotificationController@deletedevice');

			//coupons
			Route::get('/coupons', 'AdminCouponsController@coupons');
			Route::get('/addcoupons', 'AdminCouponsController@addcoupons');
			Route::post('/addnewcoupons', 'AdminCouponsController@addnewcoupons');
			Route::get('/editcoupons/{id}', 'AdminCouponsController@editcoupons');
			Route::post('/updatecoupons', 'AdminCouponsController@updatecoupons');
			Route::post('/deletecoupon', 'AdminCouponsController@deletecoupon');
			Route::post('/couponProducts', 'AdminCouponsController@couponProducts');

			//news categories
			Route::get('/newscategories', 'AdminNewsCategoriesController@newscategories');
			Route::get('/addnewscategory', 'AdminNewsCategoriesController@addnewscategory');
			Route::post('/addnewsnewcategory', 'AdminNewsCategoriesController@addnewsnewcategory');
			Route::get('/editnewscategory/{id}', 'AdminNewsCategoriesController@editnewscategory');
			Route::post('/updatenewscategory', 'AdminNewsCategoriesController@updatenewscategory');
			Route::post('/deletenewscategory', 'AdminNewsCategoriesController@deletenewscategory');

			//news
			Route::get('/news', 'AdminNewsController@news');
			Route::get('/addnews', 'AdminNewsController@addnews');
			Route::post('/addnewnews', 'AdminNewsController@addnewnews');
			Route::get('/editnews/{id}', 'AdminNewsController@editnews');
			Route::post('/updatenews', 'AdminNewsController@updatenews');
			Route::post('/deletenews', 'AdminNewsController@deletenews');

			//app pages controller
			Route::get('/pages', 'AdminPagesController@pages');
			Route::get('/addpage', 'AdminPagesController@addpage');
			Route::post('/addnewpage', 'AdminPagesController@addnewpage');
			Route::get('/editpage/{id}', 'AdminPagesController@editpage');
			Route::post('/updatepage', 'AdminPagesController@updatepage');
			Route::get('/pageStatus', 'AdminPagesController@pageStatus');
			
			//site pages controller
			Route::get('/webpages', 'AdminPagesController@webpages');
			Route::get('/addwebpage', 'AdminPagesController@addwebpage');
			Route::post('/addnewwebpage', 'AdminPagesController@addnewwebpage');
			Route::get('/editwebpage/{id}', 'AdminPagesController@editwebpage');
			Route::post('/updatewebpage', 'AdminPagesController@updatewebpage');
			Route::get('/pageWebStatus', 'AdminPagesController@pageWebStatus');
			

			

		});

		
		//log in
		Route::get('/login', 'AdminController@login');
		Route::post('/checkLogin', 'AdminController@checkLogin');

		//log out
		Route::get('/logout', 'AdminController@logout');
});

});

/*
|--------------------------------------------------------------------------
| App Controller Routes
|--------------------------------------------------------------------------
|
| This section contains all Routes of application
| 
|
*/
	
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
