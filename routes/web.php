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
Route::group(['namespace' => 'Admin', 'prefix'=>'admin'], function () {

	// Route::group(['middleware' => 'user'], function () {
	// 	Route::get('/dashboard/{reportBase}', 'AdminController@dashboard');
	// });

	// Route::group(['middleware' => 'admin'], function () {
	Route::group(['middleware' => 'admin', 'middleware' => 'company'], function () {
		//orders API
		Route::get('/getAPI/{customer_id}', 'AdminOrderController@findAddressByCustomerId');
		Route::post('/findAddressByCustomerId', 'AdminOrderController@findAddressByCustomerId');
		Route::post('/findAddressByAddressId', 'AdminOrderController@findAddressByAddressId');
		Route::post('/createOrder', 'AdminOrderController@createOrder');

		Route::get('/dashboard/{reportBase}', 'AdminController@dashboard');
		Route::get('/post', 'AdminController@myPost');
		//show admin personal info record
		Route::get('/adminInfo', 'AdminController@adminInfo');

		//Jamie Manufacturer
		Route::get('/listingManufacturer', 'AdminManufacturerController@listingManufacturer');
		Route::get('/view_addManufacturer', 'AdminManufacturerController@view_addManufacturer');
		Route::get('/view_editManufacturer/{manufacturer_id}', 'AdminManufacturerController@view_editManufacturer');
		Route::post('/addManufacturer', 'AdminManufacturerController@addManufacturer');
		Route::post('/updateManufacturer', 'AdminManufacturerController@updateManufacturer');
		Route::post('/deleteManufacturer', 'AdminManufacturerController@deleteManufacturer');


		//Jamie Categories
		Route::get('/listingCategory', 'AdminCategoryController@listingCategory');
		Route::get('/view_addCategory', 'AdminCategoryController@view_addCategory');
		Route::get('/view_editCategory/{category_id}', 'AdminCategoryController@view_editCategory');
		Route::post('/addCategory', 'AdminCategoryController@addCategory');
		Route::post('/updateCategory', 'AdminCategoryController@updateCategory');
		Route::post('/deleteCategory', 'AdminCategoryController@deleteCategory');

		//Jamie Sub Category
		Route::get('/listingSubCategory', 'AdminSubCategoryController@listingSubCategory');
		Route::get('/view_addSubCategory', 'AdminSubCategoryController@view_addSubCategory');
		Route::get('/view_editSubCategory/{sub_category_id}', 'AdminSubCategoryController@view_editSubCategory');
		Route::post('/addSubCategory', 'AdminSubCategoryController@addSubCategory');
		Route::post('/updateSubCategory', 'AdminSubCategoryController@updateSubCategory');
		Route::post('/deleteSubCategory', 'AdminSubCategoryController@deleteSubCategory');


		//manageAppLabel
		Route::get('/listingAppLabels', 'AdminAppLabelsController@listingAppLabels');
		Route::get('/addappkey', 'AdminAppLabelsController@addappkey');
		Route::post('/addNewAppLabel', 'AdminAppLabelsController@addNewAppLabel');
		Route::get('/editAppLabel/{id}', 'AdminAppLabelsController@editAppLabel');
		Route::post('/updateAppLabel/', 'AdminAppLabelsController@updateAppLabel');
		Route::get('/applabel', 'AdminAppLabelsController@manageAppLabel');

		//alert setting
		Route::get('/alertsetting', 'AdminSiteSettingController@alertSetting');
		Route::post('/updateAlertSetting', 'AdminSiteSettingController@updateAlertSetting');
		
		//Jamie User
		Route::get('/listingUser', 'AdminUserController@listingUser');
		Route::get('/view_addUser', 'AdminUserController@view_addUser');
		Route::get('/view_editUser/{user_id}', 'AdminUserController@view_editUser');
		Route::post('/addUser', 'AdminUserController@addUser');
		Route::post('/updateUser', 'AdminUserController@updateUser');
		Route::post('/deleteUser', 'AdminUserController@deleteUser');
		Route::post('/changeDefaultCompany', 'AdminUserController@changeDefaultCompany');

		//Jamie Company
		Route::get('/listingCompany', 'AdminCompanyController@listingCompany');
		Route::get('/view_addCompany', 'AdminCompanyController@view_addCompany');
		Route::get('/view_editCompany/{company_id}', 'AdminCompanyController@view_editCompany');
		Route::post('/addCompany', 'AdminCompanyController@addCompany');
		Route::post('/updateCompany', 'AdminCompanyController@updateCompany');
		Route::post('/deleteCompany', 'AdminCompanyController@deleteCompany');

		Route::get('/listingStaff/{company_id}', 'AdminCompanyController@listingStaff');

		//Jamie product
		Route::get('/listingProduct', 'AdminProductController@listingProduct');
		Route::get('/view_addProduct', 'AdminProductController@view_addProduct');
		Route::get('/view_editProduct/{product_id}', 'AdminProductController@view_editProduct');
		Route::post('/addProduct', 'AdminProductController@addProduct');
		Route::post('/updateProduct', 'AdminProductController@updateProduct');
		Route::post('/deleteProduct', 'AdminProductController@deleteProduct');

		//Jamie product Attribute
		Route::get('/listingProductAttribute/{product_id}/', 'AdminProductAttributeController@listingProductAttribute');
		Route::post('/view_addProductAttribute', 'AdminProductAttributeController@view_addProductAttribute');
		Route::post('/view_editProductAttribute', 'AdminProductAttributeController@view_editProductAttribute');
		Route::post('/addProductAttribute', 'AdminProductAttributeController@addProductAttribute');
		Route::post('/updateProductAttribute', 'AdminProductAttributeController@updateProductAttribute');
		Route::post('/deleteProductAttribute1', 'AdminProductAttributeController@deleteProductAttribute');

		//Product Image
		Route::get('/listingProductImage/{product_id}/', 'AdminProductImageController@listingProductImage');
		Route::post('/view_addProductImage', 'AdminProductImageController@view_addProductImage');
		Route::post('/view_editProductImage', 'AdminProductImageController@view_editProductImage');
		Route::post('/addProductImage', 'AdminProductImageController@addProductImage');
		Route::post('/updateProductImage', 'AdminProductImageController@updateProductImage');
		Route::post('/deleteProductImage', 'AdminProductImageController@deleteProductImage');

		//Product Option
		Route::get('/listingProductOption', 'AdminProductOptionController@listingProductOption');
		Route::get('/view_addProductOption', 'AdminProductOptionController@view_addProductOption');
		Route::get('/view_editProductOption/{product_option_id}/', 'AdminProductOptionController@view_editProductOption');
		Route::post('/addProductOption', 'AdminProductOptionController@addProductOption');
		Route::post('/updateProductOption', 'AdminProductOptionController@updateProductOption');
		Route::post('/deleteProductOption', 'AdminProductOptionController@deleteProductOption');

		//Product Option Value
		Route::get('/listingProductOptionValue', 'AdminProductOptionValueController@listingProductOptionValue');
		Route::get('/view_addProductOptionValue', 'AdminProductOptionValueController@view_addProductOptionValue');
		Route::get('/view_editProductOptionValue/{product_option_value_id}/', 'AdminProductOptionValueController@view_editProductOptionValue');
		Route::post('/addProductOptionValue', 'AdminProductOptionValueController@addProductOptionValue');
		Route::post('/updateProductOptionValue', 'AdminProductOptionValueController@updateProductOptionValue');
		Route::post('/deleteProductOptionValue', 'AdminProductOptionValueController@deleteProductOptionValue');

		//Customer
		Route::get('/listingCustomer', 'AdminCustomersController@listingCustomer');
		Route::get('/view_addCustomer', 'AdminCustomersController@view_addCustomer');
		Route::get('/view_editCustomer/{id}', 'AdminCustomersController@view_editCustomer');
		Route::post('/addCustomer', 'AdminCustomersController@addCustomer');
		Route::post('/updateCustomer', 'AdminCustomersController@updateCustomer');
		Route::post('/deleteCustomer', 'AdminCustomersController@deleteCustomer');

		//Address Book 
		Route::get('/listingAddressBook/{customer_id}/', 'AdminAddressBookController@listingAddressBook');
		Route::post('/view_addAddressBook', 'AdminAddressBookController@view_addAddressBook');
		Route::post('/view_editAddressBook', 'AdminAddressBookController@view_editAddressBook');

		Route::post('/addAddressBook/{customer_id}', 'AdminAddressBookController@addAddressBook');
		Route::post('/updateAddressBook/{address_book_id}/', 'AdminAddressBookController@updateAddressBook');
		Route::post('/deleteAddressBook', 'AdminAddressBookController@deleteAddressBook');

		//Country
		Route::get('/listingCountry', 'AdminCountryController@listingCountry');
		Route::get('/view_addCountry', 'AdminCountryController@view_addCountry');
		Route::get('/view_editCountry/{id}', 'AdminCountryController@view_editCountry');
		Route::post('/addCountry', 'AdminCountryController@addCountry');
		Route::post('/updateCountry/{id}', 'AdminCountryController@updateCountry');
		Route::post('/deleteCountry','AdminCountryController@deleteCountry');

		//City
		Route::get('/listingCity', 'AdminCityController@listingCity');
		Route::get('/view_addCity', 'AdminCityController@view_addCity');
		Route::get('/view_editCity/{id}', 'AdminCityController@view_editCity');
		Route::post('/addCity', 'AdminCityController@addCity');
		Route::post('/updateCity/{id}', 'AdminCityController@updateCity');
		Route::post('/deleteCity','AdminCityController@deleteCity');

		//Area
		Route::get('/listingArea', 'AdminAreaController@listingArea');
		Route::get('/view_addArea', 'AdminAreaController@view_addArea');
		Route::get('/view_editArea/{id}', 'AdminAreaController@view_editArea');
		Route::post('/addArea', 'AdminAreaController@addArea');
		Route::post('/updateArea/{id}', 'AdminAreaController@updateArea');
		Route::post('/deleteArea','AdminAreaController@deleteArea');

		//District
		Route::get('/listingDistrict', 'AdminDistrictController@listingDistrict');
		Route::get('/view_addDistrict', 'AdminDistrictController@view_addDistrict');
		Route::get('/view_editDistrict/{id}', 'AdminDistrictController@view_editDistrict');
		Route::post('/addDistrict', 'AdminDistrictController@addDistrict');
		Route::post('/updateDistrict/{id}', 'AdminDistrictController@updateDistrict');
		Route::post('/deleteDistrict','AdminDistrictController@deleteDistrict');

		//zones
		Route::get('/listingZone', 'AdminZoneController@listingZone');
		Route::get('/view_addZone', 'AdminZoneController@view_addZone');
		Route::get('/view_editZone/{id}', 'AdminZoneController@view_editZone');
		Route::post('/addZone', 'AdminZoneController@addZone');
		Route::post('/updateZone/{id}', 'AdminZoneController@updateZone');
		Route::post('/deleteZone','AdminZoneController@deleteZone');

		//orders
		Route::get('/listingOrder', 'AdminOrderController@listingOrder');
		Route::get('/view_addOrder', 'AdminOrderController@view_addOrder');
		Route::get('/view_editOrder/{order_id}', 'AdminOrderController@view_editOrder');
		Route::get('/view_editOrder/{order_id}/{order_status}', 'AdminOrderController@view_editOrder');
		Route::post('/addOrder', 'AdminOrderController@addOrder');
		Route::post('/updateOrder', 'AdminOrderController@updateOrder');
		Route::post('/updateOrderProduct', 'AdminOrderController@updateOrderProduct');
		Route::post('/addOrderProduct', 'AdminOrderController@addOrderProduct');
		Route::post('/deleteOrder', 'AdminOrderController@deleteOrder');
		Route::post('/deleteOrderProduct', 'AdminOrderController@deleteOrderProduct');

		Route::post('/part_customer_address', 'AdminOrderController@part_customer_address');
		Route::post('/part_edit_product', 'AdminOrderController@part_edit_product');

		//orders API
		Route::get('/findAddressByCustomerId/{customer_id}', 'AdminOrderController@findAddressByCustomerId');

		//generate application key
		Route::get('/generateKey', 'AdminSiteSettingController@generateKey');

		//orderstatus
		Route::get('/orderstatus', 'AdminSiteSettingController@orderstatus');
		Route::get('/addorderstatus', 'AdminSiteSettingController@addorderstatus');
		Route::post('/addNewOrderStatus', 'AdminSiteSettingController@addNewOrderStatus');
		Route::get('/editorderstatus/{id}', 'AdminSiteSettingController@editorderstatus');
		Route::post('/updateOrderStatus', 'AdminSiteSettingController@updateOrderStatus');
		Route::post('/deleteOrderStatus', 'AdminSiteSettingController@deleteOrderStatus');

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
		// Route::get('/statscustomers', 'AdminReportsController@statsCustomers');
		// Route::get('/statsproductspurchased', 'AdminReportsController@statsProductsPurchased');
		// Route::get('/statsproductsliked', 'AdminReportsController@statsProductsLiked');
		// Route::get('/productsstock', 'AdminReportsController@productsStock');
		// Route::post('/productSaleReport', 'AdminReportsController@productSaleReport');

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

/*
|--------------------------------------------------------------------------
| App Controller Routes
|--------------------------------------------------------------------------
|
| This section contains all Routes of application
| 
|
*/

