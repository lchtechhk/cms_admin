<?php
/*
Project Name: IonicEcommerce
Project URI: http://ionicecommerce.com
Author: VectorCoder Team
Author URI: http://vectorcoder.com/
*/
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Controllers\App\CategoriesController;
//use App\Http\Controllers\App\ManufacturerController;

//validator is builtin class in laravel
use Validator;
use App;
use Lang;
use DB;
//for password encryption or hash protected
use Hash;
use App\Administrator;

//for authenitcate login data
use Auth;

//for requesting a value 
use Illuminate\Http\Request;
class AdminProductsController extends Controller
{
	
	//deleteProduct
	public function deleteproduct(Request $request){
		$products_id = $request->products_id;
		
		$categories = DB::table('products_to_categories')->where('products_id',$products_id)->delete();
		$categories = DB::table('products')->where('products_id',$products_id)->delete();
		$categories = DB::table('specials')->where('products_id',$products_id)->delete();
		$categories = DB::table('products_description')->where('products_id',$products_id)->delete();
		$categories = DB::table('products_attributes')->where('products_id',$products_id)->delete();
		
		return redirect()->back()->withErrors([Lang::get("labels.ProducthasbeendeletedMessage")]);
	}
	
	//get product
	public function getProducts($language_id){
		
		$language_id     =   $language_id;		
		$products = DB::table('products_to_categories')
			->leftJoin('categories', 'categories.categories_id', '=', 'products_to_categories.categories_id')
			->leftJoin('categories_description', 'categories_description.categories_id', '=', 'products_to_categories.categories_id')
			->leftJoin('products', 'products.products_id', '=', 'products_to_categories.products_id')
			->leftJoin('products_description','products_description.products_id','=','products.products_id')
			->leftJoin('manufacturers','manufacturers.manufacturers_id','=','products.manufacturers_id')
			->leftJoin('manufacturers_info','manufacturers.manufacturers_id','=','manufacturers_info.manufacturers_id')
			->LeftJoin('specials', function ($join) {
				$join->on('specials.products_id', '=', 'products.products_id')->where('status', '=', '1');
			 })
			->select('products_to_categories.*', 'categories_description.categories_name','categories.*', 'products.*','products_description.*','manufacturers.*','manufacturers_info.manufacturers_url', 'specials.specials_id', 'specials.products_id as special_products_id', 'specials.specials_new_products_price as specials_products_price', 'specials.specials_date_added as specials_date_added', 'specials.specials_last_modified as specials_last_modified', 'specials.expires_date')
			->where('products_description.language_id','=', $language_id)
			->where('categories_description.language_id','=', $language_id)
			->orderBy('products.products_id', 'DESC')
			->get();
			
		return($products);
	}
	
	public function products(Request $request){
		$title = array('pageTitle' => Lang::get("labels.Products"));
		$language_id            				=   '1';			
		$results								= array();		
		
		//get function from other controller
		$myVar = new AdminCategoriesController();
		$subCategories = $myVar->getSubCategories($language_id);		
		
		$data = DB::table('products_to_categories')
			->leftJoin('categories as sub_categories', 'sub_categories.categories_id', '=', 'products_to_categories.categories_id')
			->leftJoin('categories_description as sub_categories_description', 'sub_categories_description.categories_id', '=', 'products_to_categories.categories_id')
			->leftJoin('products', 'products.products_id', '=', 'products_to_categories.products_id')
			->leftJoin('products_description','products_description.products_id','=','products.products_id')
			->LeftJoin('manufacturers', function ($join) {
				$join->on('manufacturers.manufacturers_id', '=', 'products.manufacturers_id');
			 })
			->LeftJoin('specials', function ($join) {
				$join->on('specials.products_id', '=', 'products.products_id')->where('status', '=', '1');
			 })
			 
			->select('products_to_categories.*', 'sub_categories_description.categories_name as categories_name','sub_categories.*', 'products.*','products_description.*', 'specials.specials_id', 'manufacturers.*', 'specials.products_id as special_products_id', 'specials.specials_new_products_price as specials_products_price', 'specials.specials_date_added as specials_date_added', 'specials.specials_last_modified as specials_last_modified', 'specials.expires_date')
			->where('products_description.language_id','=', $language_id)
			->where('sub_categories_description.language_id','=', $language_id)
			->where('sub_categories.parent_id','>', 0);
			
			if(isset($_REQUEST['categories_id']) and !empty($_REQUEST['categories_id'])){
				
				$data->where('products_to_categories.categories_id','=', $_REQUEST['categories_id']);	
				
				if(isset($_REQUEST['product']) and !empty($_REQUEST['product'])){
					$data->where('products_name', 'like', '%' . $_REQUEST['product'] . '%');
				}
				
				$products = $data->orderBy('products.products_id', 'DESC')->paginate(100);	
				
			}else{
				$products = $data->orderBy('products.products_id', 'DESC')->paginate(10);	
			}
			
		
		$results['subCategories'] = $subCategories;
		$results['products'] = $products;
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$results['currency'] = $myVar->getSetting();
		$results['units'] = $myVar->getUnits();
		
		$currentTime =  array('currentTime'=>time());
		return view("admin.products",$title)->with('results', $results);
	}
	
	public function addproduct(Request $request){
	
		$title = array('pageTitle' => Lang::get("labels.AddProduct"));
		$language_id      =   '1';
		
		$result = array();
		
		//get function from other controller
		$myVar = new AdminCategoriesController();
		$result['categories'] = $myVar->getCategories($language_id);
		
		//get function from other controller
		$myVar = new AdminManufacturerController();
		$result['manufacturer'] = $myVar->getManufacturer($language_id);
		
		//tax class
		$taxClass = DB::table('tax_class')->get();
		$result['taxClass'] = $taxClass;
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$result['languages'] = $myVar->getLanguages();		
		$result['units'] = $myVar->getUnits();
		
		return view("admin.addproduct", $title)->with('result', $result);
	}
	
	//addNewProduct
	public function addnewproduct(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddAttributes"));
		$language_id      =   '1';		
		$date_added	= date('Y-m-d h:i:s');
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$languages = $myVar->getLanguages();		
		$extensions = $myVar->imageType();
		
		$expiryDate = str_replace('/', '-', $request->expires_date);
		$expiryDateFormate = strtotime($expiryDate);
		
		if($request->hasFile('products_image') and in_array($request->products_image->extension(), $extensions)){
			$image = $request->products_image;
			$fileName = time().'.'.$image->getClientOriginalName();
			$image->move('resources/assets/images/product_images/', $fileName);
			$uploadImage = 'resources/assets/images/product_images/'.$fileName; 
		}else{
			$uploadImage = '';
		}	
		
		$products_id = DB::table('products')->insertGetId([
					'products_image'  		 =>   $uploadImage,
					'manufacturers_id'		 =>   $request->manufacturers_id,
					'products_quantity'		 =>   $request->products_quantity,
					'products_model'		 =>   $request->products_model,
					'products_price'		 =>   $request->products_price,
					'products_date_added'	 =>   $date_added,
					'products_weight'		 =>   $request->products_weight,
					'products_status'		 =>   $request->products_status,
					'products_tax_class_id'  =>   $request->tax_class_id,
					'products_weight_unit'	 =>	  $request->products_weight_unit,
					'low_limit'				 =>   $request->low_limit
					]);
		$slug_flag = false;
		foreach($languages as $languages_data){
			$products_name = 'products_name_'.$languages_data->languages_id;
			$products_description = 'products_description_'.$languages_data->languages_id;
			
			//slug
			if($slug_flag==false){
				$slug_flag=true;
				
				$slug = $request->$products_name;
				$old_slug = $request->$products_name;
				
				$slug_count = 0;
				do{
					if($slug_count==0){
						$currentSlug = $myVar->slugify($slug);
					}else{
						$currentSlug = $myVar->slugify($old_slug.'-'.$slug_count);
					}
					$slug = $currentSlug;
					$checkSlug = DB::table('products')->where('products_slug',$currentSlug)->get();
					$slug_count++;
				}
				while(count($checkSlug)>0);
				DB::table('products')->where('products_id',$products_id)->update([
					'products_slug'	 =>   $slug
					]);
			}
			
			
			DB::table('products_description')->insert([
					'products_name'  	     =>   $request->$products_name,
					'language_id'			 =>   $languages_data->languages_id,
					'products_id'			 =>   $products_id,
					'products_url'			 =>   $request->products_url,
					'products_description'	 =>   addslashes($request->$products_description)
					]);
		}	
		
		//special product
		if($request->isSpecial == 'yes'){
			DB::table('specials')->insert([
					'products_id'					  =>     $products_id,
					'specials_new_products_price'     =>     $request->specials_new_products_price,
					'specials_date_added'    		  =>     time(),
					'expires_date'     				  =>     $expiryDateFormate,
					'status'     					  =>     $request->status,
				]);
		}
		
		DB::table('products_to_categories')->insert([
					'products_id'   	=>     $products_id,
					'categories_id'     =>     $request->category_id
				]);
				
		DB::table('products_to_categories')->insert([
					'products_id'   	=>     $products_id,
					'categories_id'     =>     $request->sub_category_id
				]);
				
		$options = DB::table('products_options')
			->where('language_id','=', $language_id)
			->get();
		
		$result['options'] = $options;
		
		$options_value = DB::table('products_options_values')
			->where('language_id','=', $language_id)
			->get();
		
		$result['options_value'] = $options_value;
		$result['data'] = array('products_id'=>$products_id, 'language_id'=>$language_id);
		
		//notify users	
		$myVar = new AdminAlertController();
		$alertSetting = $myVar->newProductNotification($products_id);
		
		return redirect('admin/addproductattribute/'.$products_id);
	}
	
	//getOptions
	public function getOptions(Request $request){
		
		$options = DB::table('products_options')
			->where('language_id','=', $request->languages_id)
			->get();
			
		if(count($options)>0){	
			$options_name[] = "<option value=''>".Lang::get("labels.ChooseValue")."</option>";
			foreach($options as $options_data){
				$options_name[] = "<option value='".$options_data->products_options_id."'>".$options_data->products_options_name."</option>";	
			}
		}else{
			$options_name = "<option value=''>".Lang::get("labels.ChooseValue")."</option>";
		}
		print_r($options_name);
	}
	
	//getOptions
	public function getOptionsValue(Request $request){
				
		$value = DB::table('products_options_values_to_products_options')
			->leftJoin('products_options_values','products_options_values.products_options_values_id','=','products_options_values_to_products_options.products_options_values_id')
			->where('products_options_values.language_id','=', $request->language_id)
			->where('products_options_values_to_products_options.products_options_id','=', $request->option_id)
			->get();
			
		if(count($value)>0){	
			foreach($value as $value_data){
				$value_name[] = "<option value='".$value_data->products_options_values_id."'>".$value_data->products_options_values_name."</option>";	
			}
		}else{
			$value_name = "<option value=''>".Lang::get("labels.ChooseValue")."</option>";
		}
		print_r($value_name);
	}
	
	
	//addproductattribute
	public function addproductattribute(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddAttributes"));
		//$language_id      =   '1';	
		$products_id      =   $request->id;	
		$subcategory_id   =   $request->subcategory_id;	
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$result['languages'] = $myVar->getLanguages();
		
		$options = DB::table('products_options')
			//->where('language_id','=', $language_id)
			->get();
		
		$result['options'] = $options;
		$result['subcategory_id'] = $subcategory_id;
		
		$options_value = DB::table('products_options_values')
			//->where('language_id','=', $language_id)
			->get();
		
		$result['options_value'] = $options_value;
		$result['data'] = array('products_id'=>$products_id);
		
		$products_attributes = DB::table('products_attributes')
			->join('products_options', 'products_options.products_options_id', '=', 'products_attributes.options_id')
			->join('products_options_values', 'products_options_values.products_options_values_id', '=', 'products_attributes.options_values_id')
			->select('products_attributes.*', 'products_options.products_options_name', 'products_options.language_id', 'products_options_values.products_options_values_name' )
			->where('products_attributes.products_id','=', $products_id)
			->orderBy('products_attributes_id', 'DESC')
			->get();
		
		$result['products_attributes'] = $products_attributes;
		return view("admin.addproductattribute", $title)->with('result', $result);
	}
	
	//addproductImages
	public function addproductimages(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddImages"));
		//$language_id      =   '1';	
		$products_id      =   $request->id;	
		$result['data'] = array('products_id'=>$products_id);
		
		$products_images = DB::table('products_images')			
			->where('products_id','=', $products_id)
			->orderBy('sort_order', 'ASC')
			->get();
	
		$result['products_images'] = $products_images;
		
		return view("admin.addproductimages", $title)->with('result', $result);
	}
	
	public function addnewproductattribute(Request $request){
		 $checkRecord = DB::table('products_attributes')->where([
				'options_id'  			=>   $request->products_options_id,
				'options_values_id'  	=>   $request->products_options_values_id,
			 	'products_id'  			=> 	 $request->products_id			 
				])->get();
		
		if(count($checkRecord)>0){
			$products_attributes = array();
		}else{
			
		$products_attributes_id = DB::table('products_attributes')->insertGetId([
				'products_id'   		=>   $request->products_id,
				'options_id'  			=>   $request->products_options_id,
				'options_values_id'  	=>   $request->products_options_values_id,
				'options_values_price'  =>   $request->options_values_price,
				'price_prefix'  		=>   $request->price_prefix,
				'is_default'			=>	 $request->is_default
				]);
		
		$products_attributes = DB::table('products_attributes')
			->join('products_options', 'products_options.products_options_id', '=', 'products_attributes.options_id')
			->join('products_options_values', 'products_options_values.products_options_values_id', '=', 'products_attributes.options_values_id')
			
			->select('products_attributes.*', 'products_options.products_options_name', 'products_options.language_id', 'products_options_values.products_options_values_name' )
			->where('products_attributes.products_id','=', $request->products_id)
			->where('products_attributes.is_default','=', '0')
			->orderBy('products_attributes_id', 'DESC')
			->get();
		}
		return($products_attributes);
	}
	
	//addNewDefaultAttribute
	public function addnewdefaultattribute(Request $request){
		 $checkRecord = DB::table('products_attributes')->where([
				'options_id'  					=>   $request->products_options_id,
			 	'products_id'  					=> 	 $request->products_id,	
				'options_values_id'  			=> 	 $request->products_options_values_id,	
				])->get();
		
		if(count($checkRecord)>0){
			$products_attributes = array();
		}else{
		$products_attributes_id = DB::table('products_attributes')->insertGetId([
				'products_id'   		=>   $request->products_id,
				'options_id'  			=>   $request->products_options_id,
				'options_values_id'  	=>   $request->products_options_values_id,
				//'options_values_price'  =>   $request->options_values_price
				'options_values_price'  =>   '0',
				'price_prefix'  		=>   '+',
				'is_default'			=>	 $request->is_default
				]);
		
		$products_attributes = DB::table('products_attributes')
			->join('products_options', 'products_options.products_options_id', '=', 'products_attributes.options_id')
			->join('products_options_values', 'products_options_values.products_options_values_id', '=', 'products_attributes.options_values_id')
			
			->select('products_attributes.*', 'products_options.products_options_name', 'products_options.language_id', 'products_options_values.products_options_values_name' )
			->where('products_attributes.products_id','=', $request->products_id)
			->where('products_attributes.is_default','=', '1')
			->orderBy('products_attributes_id', 'DESC')
			->get();
		}
		return($products_attributes);
	}
	
	public function updateproductattribute(Request $request){
		
		 $checkRecord = DB::table('products_attributes')->where([
				'options_id'  			=>   $request->products_options_id,
				'options_values_id'  	=>   $request->products_options_values_id,
			 	'products_id'  			=> 	 $request->products_id			 
				])->get();
		
				
		DB::table('products_attributes')->where('products_attributes_id', '=', $request->products_attributes_id)->update([
				'options_id'  			=>   $request->products_options_id,
				'options_values_id'  	=>   $request->products_options_values_id,
				'options_values_price'  =>   $request->options_values_price,
				'price_prefix'  		=>   $request->price_prefix,
				]);
			
		$products_attributes = DB::table('products_attributes')
			->join('products_options', 'products_options.products_options_id', '=', 'products_attributes.options_id')
			->join('products_options_values', 'products_options_values.products_options_values_id', '=', 'products_attributes.options_values_id')
			
			->select('products_attributes.*', 'products_options.products_options_name', 'products_options.language_id', 'products_options_values.products_options_values_name' )
			->where('products_attributes.products_id','=', $request->products_id)
			->where('products_attributes.is_default','=', '0')
			->orderBy('products_attributes_id', 'DESC')
			->get();
			
		return($products_attributes);
	}
	
	public function updatedefaultattribute(Request $request){
		
		 $checkRecord = DB::table('products_attributes')->where([
				'options_id'  			=>   $request->products_options_id,
				'options_values_id'  	=>   $request->products_options_values_id,
			 	'products_id'  			=> 	 $request->products_id			 
				])->get();
		
	
			
		DB::table('products_attributes')->where('products_attributes_id', '=', $request->products_attributes_id)->update([
				'options_id'  			=>   $request->products_options_id,
				'options_values_id'  	=>   $request->products_options_values_id,
				]);
		
		$products_attributes = DB::table('products_attributes')
			->join('products_options', 'products_options.products_options_id', '=', 'products_attributes.options_id')
			->join('products_options_values', 'products_options_values.products_options_values_id', '=', 'products_attributes.options_values_id')
			
			->select('products_attributes.*', 'products_options.products_options_name', 'products_options.language_id', 'products_options_values.products_options_values_name' )
			->where('products_attributes.products_id','=', $request->products_id)
			->where('products_attributes.is_default','=', '1')
			->orderBy('products_attributes_id', 'DESC')
			->get();
			
		return($products_attributes);
	}
	
	//editProduct
	public function editproduct(Request $request){
		$title = array('pageTitle' => Lang::get("labels.EditProduct"));
		$language_id      =   '1';	
		$products_id      =   $request->id;	
		$category_id	  =	  '0';
		
		$result = array();
		
		//get categories from CategoriesController controller
		$myVar = new AdminCategoriesController();
		$result['categories'] = $myVar->getCategories($language_id);
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$result['languages'] = $myVar->getLanguages();
		$result['units'] = $myVar->getUnits();
				
		//tax class
		$taxClass = DB::table('tax_class')->get();
		$result['taxClass'] = $taxClass;
		
		//get all sub categories
		$subCategories = DB::table('categories')
		->leftJoin('categories_description','categories_description.categories_id', '=', 'categories.categories_id')
		->select('categories.categories_id as id', 'categories_description.categories_name as name')
		->where('parent_id','!=', '0')->where('categories_description.language_id', $language_id)->get();
		$result['subCategories'] = $subCategories;
		
		//get function from ManufacturerController controller
		$myVar = new AdminManufacturerController();
		$result['manufacturer'] = $myVar->getManufacturer($language_id);
						
		$product = DB::table('products')
			->where('products.products_id','=', $products_id)
			->get();
		
		$description_data = array();		
		foreach($result['languages'] as $languages_data){
			
			$description = DB::table('products_description')->where([
					['language_id', '=', $languages_data->languages_id],
					['products_id', '=', $products_id],
				])->get();
				
			if(count($description)>0){								
				$description_data[$languages_data->languages_id]['products_name'] = $description[0]->products_name;
				$description_data[$languages_data->languages_id]['products_description'] = $description[0]->products_description;
				$description_data[$languages_data->languages_id]['language_name'] = $languages_data->name;
				$description_data[$languages_data->languages_id]['languages_id'] = $languages_data->languages_id;										
			}else{
				$description_data[$languages_data->languages_id]['products_name'] = '';
				$description_data[$languages_data->languages_id]['products_description'] = '';
				$description_data[$languages_data->languages_id]['language_name'] = $languages_data->name;
				$description_data[$languages_data->languages_id]['languages_id'] = $languages_data->languages_id;	
			}
		}
		
		$result['description'] = $description_data;		
		$result['product'] = $product;
		
		//get product sub category id
		$productsCategory = DB::table('products_to_categories')
				->leftJoin('categories','categories.categories_id','=','products_to_categories.categories_id')
				->where('products_id','=', $products_id)
				->where('categories.parent_id','!=', 0)
				->get();
		$result['subCategoryId'] = $productsCategory;
						
		$getSpecialProduct = DB::table('specials')->where('products_id',$products_id)->orderby('specials_id', 'desc')->limit(1)->get();
		
		if(count($getSpecialProduct)>0){
			$specialProduct = $getSpecialProduct;			
		}else{
			$specialProduct[0] = (object) array('specials_id'=>'', 'products_id'=>'', 'specials_new_products_price'=>'', 'status'=>'', 'expires_date' => '');
		}
		
		$result['specialProduct'] = $specialProduct;
		
		$Categories = DB::table('categories')
		->leftJoin('categories_description','categories_description.categories_id', '=', 'categories.categories_id')
		->select('categories.categories_id as id', 'categories_description.categories_name as name', 'categories.parent_id' )
		->where('categories.categories_id','=', $result['subCategoryId'][0]->categories_id)->get();
		$result['mainCategories'] = $Categories;
		
		
		return view("admin.editproduct", $title)->with('result', $result);		
	}
	
	
	//updateProduct
	public function updateproduct(Request $request){
		
		$language_id      =   '1';	
		$products_id      =   $request->id;	
		$products_last_modified	= date('Y-m-d h:i:s');
		
		$expiryDate = str_replace('/', '-', $request->expires_date);
		$expiryDateFormate = strtotime($expiryDate);
				
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$languages = $myVar->getLanguages();		
		$extensions = $myVar->imageType();
		
		//check slug
		if($request->old_slug!=$request->slug ){
			
			$slug = $request->slug;
			$slug_count = 0;
			do{
				if($slug_count==0){
					$currentSlug = $myVar->slugify($request->slug);
				}else{
					$currentSlug = $myVar->slugify($request->slug.'-'.$slug_count);
				}
				$slug = $currentSlug;
				$checkSlug = DB::table('products')->where('products_slug',$currentSlug)->where('products_id','!=',$products_id)->get();
				$slug_count++;
			}
			
			while(count($checkSlug)>0);		
			
		}else{
			$slug = $request->slug;
		}
		
		if($request->hasFile('products_image') and in_array($request->products_image->extension(), $extensions)){
			$image = $request->products_image;
			$fileName = time().'.'.$image->getClientOriginalName();
			$image->move('resources/assets/images/product_images/', $fileName);
			$uploadImage = 'resources/assets/images/product_images/'.$fileName; 
		}else{
			$uploadImage = $request->oldImage;
		}	
		
		DB::table('products')->where('products_id','=',$products_id)->update([
					'products_image'  		 =>   $uploadImage,
					'manufacturers_id'		 =>   $request->manufacturers_id,
					'products_quantity'		 =>   $request->products_quantity,
					'products_model'		 =>   $request->products_model,
					'products_price'		 =>   $request->products_price,
					'products_last_modified' =>   $products_last_modified,
					'products_weight'		 =>   $request->products_weight,
					'products_status'		 =>   $request->products_status,
					'products_tax_class_id'  =>   $request->tax_class_id,
					'products_weight_unit'	 =>	  $request->products_weight_unit,
					'low_limit'				 =>   $request->low_limit,
					'products_slug'			 =>   $slug
					]);
				
		foreach($languages as $languages_data){			
			$products_name = 'products_name_'.$languages_data->languages_id;
			$products_description = 'products_description_'.$languages_data->languages_id;			
			$checkExist = DB::table('products_description')->where('products_id','=',$products_id)->where('language_id','=',$languages_data->languages_id)->get();			
			if(count($checkExist)>0){
				DB::table('products_description')->where('products_id','=',$products_id)->where('language_id','=',$languages_data->languages_id)->update([
					'products_name'  	     =>   $request->$products_name,
					'products_url'			 =>   $request->products_url,
					'products_description'	 =>   addslashes($request->$products_description)
					]);
			}else{
				DB::table('products_description')->insert([
						'products_name'  	     =>   $request->$products_name,
						'language_id'			 =>   $languages_data->languages_id,
						'products_id'			 =>   $products_id,
						'products_url'			 =>   $request->products_url,
						'products_description'	 =>   addslashes($request->$products_description) 
						]);	
			}
		}
		
		//delete categories
		DB::table('products_to_categories')->where([
				'products_id'  	=>   $products_id,
			 	'categories_id' => 	 $request->old_category_id			 
				])->delete();
		
		DB::table('products_to_categories')->where([
				'products_id'  	=>   $products_id,
			 	'categories_id'	=> 	 $request->old_sub_category_id			 
				])->delete();
		
		DB::table('products_to_categories')->insert([
					'products_id'   	=>     $products_id,
					'categories_id'     =>     $request->category_id
				]);
				
		DB::table('products_to_categories')->insert([
					'products_id'   	=>     $products_id,
					'categories_id'     =>     $request->sub_category_id
				]);
		
		//special product
		if($request->isSpecial == 'yes'){
			DB::table('specials')->where('products_id','=',$products_id)->update([
					'specials_last_modified'    	  =>    time(),
					'date_status_change'			  =>	time(),
					'status'     					  =>    0,
				]);
				
			DB::table('specials')->insert([
					'products_id'					  =>     $products_id,
					'specials_new_products_price'     =>     $request->specials_new_products_price,
					'specials_date_added'    		  =>     time(),
					'expires_date'     				  =>     $expiryDateFormate,
					'status'     					  =>     $request->status,
				]);
				
		}else if($request->isSpecial == 'no'){
			DB::table('specials')->where('products_id','=',$products_id)->update([
					'status'     					  =>    0,
				]);
		}
		
		$options = DB::table('products_options')
			->where('language_id','=', $language_id)
			->get();
		
		$result['options'] = $options;
		
		$options_value = DB::table('products_options_values')
			->where('language_id','=', $language_id)
			->get();
		
		$result['options_value'] = $options_value;
		$result['data'] = array('products_id'=>$products_id, 'language_id'=>$language_id);
				
		return redirect('admin/addproductattribute/'.$products_id);		
	}
	
	//deleteproductattributemodal
	public function deleteproductmodal(Request $request){
		
		$products_id = $request->products_id;		
		return view("admin/deleteproductattributemodal")->with('result', $result);
	}
		
	//editProductAttribute
	public function editproductattribute(Request $request){
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$languages = $myVar->getLanguages();		
		$extensions = $myVar->imageType();
		
		$products_id = $request->products_id;
		$products_attributes_id = $request->products_attributes_id;
		$language_id = $request->language_id;
		$options_id = $request->options_id;
		
		$options = DB::table('products_options')
			->where('language_id','=', $language_id)
			->get();
		
		$result['options'] = $options;
		
		$options_value = DB::table('products_options_values_to_products_options')
			->leftJoin('products_options_values','products_options_values.products_options_values_id','=','products_options_values_to_products_options.products_options_values_id')
			->where('products_options_values_to_products_options.products_options_id','=',$options_id)
			->where('products_options_values.language_id','=', $language_id)
			->get();
						
		$result['options_value'] = $options_value;
		
		$result['data'] = array('products_id'=>$request->products_id, 'products_attributes_id'=>$products_attributes_id, 'language_id'=>$language_id);
		
		$products_attributes = DB::table('products_attributes')
			->join('products_options', 'products_options.products_options_id', '=', 'products_attributes.options_id')
			->join('products_options_values', 'products_options_values.products_options_values_id', '=', 'products_attributes.options_values_id')
			->select('products_attributes.*', 'products_options.products_options_name', 'products_options.language_id', 'products_options_values.products_options_values_name' )
			->where('products_attributes.products_attributes_id','=', $products_attributes_id)
			->get();
		
		$result['products_attributes'] = $products_attributes;
		$result['languages'] = $languages;
		
		return view("admin/editproductattributeform")->with('result', $result);
	}
	
	//editdefaultattributemodal
	public function editdefaultattribute(Request $request){
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$languages = $myVar->getLanguages();		
		$extensions = $myVar->imageType();
		
		$products_id = $request->products_id;
		$products_attributes_id = $request->products_attributes_id;
		$language_id = $request->language_id;
		$options_id = $request->options_id;
		
		$options = DB::table('products_options')
			->where('language_id','=', $language_id)
			->get();
		
		$result['options'] = $options;
		
		$options_value = DB::table('products_options_values_to_products_options')
			->leftJoin('products_options_values','products_options_values.products_options_values_id','=','products_options_values_to_products_options.products_options_values_id')
			->where('products_options_values_to_products_options.products_options_id','=',$options_id)
			->where('products_options_values.language_id','=', $language_id)
			->get();
		
		/*$options_value = DB::table('products_options_values')
			->where('language_id','=', $language_id)
			->get();*/
				
		$result['options_value'] = $options_value;
		
		$result['data'] = array('products_id'=>$request->products_id, 'products_attributes_id'=>$products_attributes_id, 'language_id'=>$language_id);
		
		$products_attributes = DB::table('products_attributes')
			->join('products_options', 'products_options.products_options_id', '=', 'products_attributes.options_id')
			->join('products_options_values', 'products_options_values.products_options_values_id', '=', 'products_attributes.options_values_id')
			->select('products_attributes.*', 'products_options.products_options_name', 'products_options.language_id', 'products_options_values.products_options_values_name' )
			->where('products_attributes.products_attributes_id','=', $products_attributes_id)
			->get();
		
		$result['products_attributes'] = $products_attributes;
		$result['languages'] = $languages;
		
		return view("admin/editdefaultattributeform")->with('result', $result);
	}
	
	//deleteproductattributemodal
	public function deleteproductattributemodal(Request $request){
		
		$products_id = $request->products_id;
		$products_attributes_id = $request->products_attributes_id;
		
		$result['data'] = array('products_id'=>$products_id, 'products_attributes_id'=>$products_attributes_id);
		
		return view("admin/deleteproductattributemodal")->with('result', $result);
	}
	
	//deletedefaultattributemodal
	public function deletedefaultattributemodal(Request $request){		
		$products_id = $request->products_id;
		$products_attributes_id = $request->products_attributes_id;		
		$result['data'] = array('products_id'=>$products_id, 'products_attributes_id'=>$products_attributes_id);		
		return view("admin/deletedefaultattributemodal")->with('result', $result);
	}
	
	//deleteproductattribute
	public function deleteproductattribute(Request $request){
		
		$language_id      =   '1';
		
		$checkRecord = DB::table('products_attributes')->where([
				'products_attributes_id'  	=>   $request->products_attributes_id,
			 	'products_id'  				=> 	 $request->products_id			 
				])->delete();
		
		$products_attributes = DB::table('products_attributes')
			->join('products_options', 'products_options.products_options_id', '=', 'products_attributes.options_id')
			->join('products_options_values', 'products_options_values.products_options_values_id', '=', 'products_attributes.options_values_id')
			
			->select('products_attributes.*', 'products_options.products_options_name', 'products_options.language_id', 'products_options_values.products_options_values_name' )
			->where('products_options.language_id','=', $language_id)
			->where('products_options_values.language_id','=', $language_id)
			->where('products_attributes.products_id','=', $request->products_id)
			->where('products_attributes.is_default','=', '0')
			->orderBy('products_attributes_id', 'DESC')
			->get();
		
		return($products_attributes);
	}
	
	//deleteproductattribute
	public function deletedefaultattribute(Request $request){
		
		$language_id      =   '1';
		
		$checkRecord = DB::table('products_attributes')->where([
				'products_attributes_id'  	=>   $request->products_attributes_id,
			 	'products_id'  				=> 	 $request->products_id			 
				])->delete();
		
		$products_attributes = DB::table('products_attributes')
			->join('products_options', 'products_options.products_options_id', '=', 'products_attributes.options_id')
			->join('products_options_values', 'products_options_values.products_options_values_id', '=', 'products_attributes.options_values_id')
			
			->select('products_attributes.*', 'products_options.products_options_name', 'products_options.language_id', 'products_options_values.products_options_values_name' )
			->where('products_options.language_id','=', $language_id)
			->where('products_options_values.language_id','=', $language_id)
			->where('products_attributes.products_id','=', $request->products_id)
			->where('products_attributes.is_default','=', '1')
			->orderBy('products_attributes_id', 'DESC')
			->get();
		
		return($products_attributes);
	}
	
	
	//addnewproductimage
	public function addnewproductimage(Request $request){
		$myVar = new AdminSiteSettingController();
		$languages = $myVar->getLanguages();		
		$extensions = $myVar->imageType();
		
		if($request->hasFile('newImage') and in_array($request->newImage->extension(), $extensions)){
						
			$image = $request->newImage;
			$fileName = time().'.'.$image->getClientOriginalName();
			$image->move('resources/assets/images/product_images/', $fileName);
			$uploadImage = 'resources/assets/images/product_images/'.$fileName; 
			
			DB::table('products_images')->insert([
				'products_id'   =>   $request->products_id,
				'image'  	=>   $uploadImage,
				'htmlcontent'  	=>   $request->htmlcontent,
				'sort_order'  	=>   $request->sort_order,
				]);
			
			$products_images = DB::table('products_images')			
				->where('products_id','=', $request->products_id)
				->orderBy('sort_order', 'ASC')
				->get();

		}else{
			$products_images = '';
		}		
		return($products_images);		
	}
	
	public function editproductimage(Request $request){
		
		$products_images = DB::table('products_images')			
			->where('id','=', $request->id)
			->get();
		
		return view("admin/editproductimageform")->with('result', $products_images);
	}
	
	//updateproductimage
	public function updateproductimage(Request $request){
		$myVar = new AdminSiteSettingController();
		$languages = $myVar->getLanguages();		
		$extensions = $myVar->imageType();
		
		if($request->hasFile('newImage') and in_array($request->newImage->extension(), $extensions)){
			$image = $request->newImage;
			$fileName = time().'.'.$image->getClientOriginalName();
			$image->move('resources/assets/images/product_images/', $fileName);
			$uploadImage = 'resources/assets/images/product_images/'.$fileName; 
		}else{
			$uploadImage = $request->oldImage;
		}			
			
		DB::table('products_images')->where('products_id', '=', $request->products_id)->where('id', '=', $request->id)
			->update([
			'image'  		=>   $uploadImage,
			'htmlcontent'  	=>   $request->htmlcontent,
			'sort_order'  	=>   $request->sort_order,
			]);

		$products_images = DB::table('products_images')			
			->where('products_id','=', $request->products_id)
			->orderBy('sort_order', 'ASC')
			->get();		
		
		return($products_images);
	}
	
	//deleteproductimagemodal
	public function deleteproductimagemodal(Request $request){
		
		$products_id = $request->products_id;
		$id = $request->id;
		
		$result['data'] = array('products_id'=>$products_id, 'id'=>$id);
		
		return view("admin/deleteproductimagemodal")->with('result', $result);
	}
	
	//deleteproductimage
	public function deleteproductimage(Request $request){		
		
		DB::table('products_images')->where([
				'products_id'  	=>   $request->products_id,
			 	'id'  			=> 	 $request->id			 
				])->delete();
		

		$products_images = DB::table('products_images')			
			->where('products_id','=', $request->products_id)
			->orderBy('sort_order', 'ASC')
			->get();		
		
		return($products_images);
	}
	
	//productsAttributes
	public function attributes(Request $request){
		$title = array('pageTitle' => Lang::get("labels.attributes"));
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$languages = $myVar->getLanguages();		
		$extensions = $myVar->imageType();
		
		$result = array();
		$result2 = array();
		
		
		$attributes = DB::table('products_options')
			->Join('languages','languages.languages_id','=','products_options.language_id')
			->orderby('session_regenerate_id','ASC')->paginate(10);
		
		$result['attributes'] = $attributes;
				
		$index = 0;
		foreach($attributes as $attributes_data){
			
			array_push($result2, $attributes_data);
			
			$attributes = DB::table('products_options_values_to_products_options')
			->leftJoin('products_options_values', 'products_options_values.products_options_values_id','=', 'products_options_values_to_products_options.products_options_values_id')
			->where('products_options_values_to_products_options.products_options_id','=',$attributes_data->products_options_id)->get();	
			
			$result2[$index]->values =$attributes;
			$index++;
		}
		
		$result['data'] = $result2;
		
		return view("admin.attributes",$title)->with('result', $result);
	}
	
	//common controller to show attributes
	public function displayattributes(){
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$resutls['languages'] = $myVar->getLanguages();
		$defaultLanguage_id = $resutls['languages'][0]->languages_id;
		
		foreach($resutls['languages'] as $languages){
			
			if(!empty($languages->languages_id)){
				$language_id = $languages->languages_id;
			}else{
				$language_id = $defaultLanguage_id;
			}
			
			$attributeOptions = DB::table('products_options')->where('products_options.language_id','=', $language_id)->get();
			$resutls['attributeOptions_'.$languages->languages_id] = $attributeOptions;
		}
		
		return $resutls;
		
	}
	
	
	//addAttributes
	public function addattributes(Request $request){
		
		$title = array('pageTitle' => Lang::get("labels.AddAttributes"));
		$language_id      =   '1';		
		//$language_id = $request->language_id;
		$resutls = array();	
		$message = array();
		$errorMessage = array();
		
		// get attributes from display attributes
		$resutls = $this->displayattributes();
		
		$resutls['message'] = $message;
		$resutls['errorMessage'] = $errorMessage;
		
		return view("admin.addattributes",$title)->with('resutls', $resutls);
	}
	
	//addnewattributes
	public function addnewattributes(Request $request){
		
		$title = array('pageTitle' => Lang::get("labels.AddAttributes"));
		
		$attributes = array();	
		$message = array();
		$errorMessage = array();
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$languages = $myVar->getLanguages();		
		$extensions = $myVar->imageType();
		
		$products_options_id = DB::table('products_options')->insertGetId([
						'products_options_name'  =>   $request->new_option,
						'language_id'			 =>   $request->language_id,
						'session_regenerate_id'	 =>	  time()
						]);
			
		$message = array('success'=> Lang::get("labels.OptionsAddedMessage"));	
			
		// get attributes from display attributes
		$results = $this->displayattributes();
		
		$results['message'] = $message;
		$results['errorMessage'] = $errorMessage;	
		
		return redirect()->back()->withErrors([Lang::get("labels.OptionhasbeenaddedMessage")]);
		
	}
	
	
	//editattributes
	public function editattributes(Request $request){
		
		$title = array('pageTitle' => Lang::get("labels.EditAttributes"));
		
		$attributes = array();	
		$message = array();
		$errorMessage = array();		
		
		
		$options = DB::table('products_options')->where('products_options.products_options_id','=',$request->id)->get();
		$attributes['options'] = $options;
		$attributes['message'] = $message;
		$attributes['errorMessage'] = $errorMessage;
		
		return view("admin.editattributes",$title)->with('attributes', $attributes);
	}
	
	//updateattributes
	public function updateattributes(Request $request){
		
		$title = array('pageTitle' => Lang::get("labels.EditAttributes"));
		
		$attributes = array();	
		$message = array();
		$errorMessage = array();	
		
		//update product option value
		DB::table('products_options')
			->where('products_options_id','=',$request->products_options_id)
			->update(['products_options_name' =>  $request->products_options_name]);
		
		return redirect()->back()->withErrors([Lang::get("labels.optionhasbeenupdatedMessage")]);
	}
	
	//addattributevalue
	public function addattributevalue(Request $request){
				
		$attributes = array();	
		$message = array();
		$errorMessage = array();	
		
		//add value
		$products_options_values_id = DB::table('products_options_values')->insertGetId([
						'products_options_values_name'  =>   $request->products_options_values_name,
						'language_id'			 		=>   $request->language_id,
						]);
								
		DB::table('products_options_values_to_products_options')->insertGetId([
						'products_options_id'  				=>   $request->products_options_id,
						'products_options_values_id'		=>   $products_options_values_id,
						]);
		
		
		$attributes = DB::table('products_options_values_to_products_options')
			->leftJoin('products_options_values', 'products_options_values.products_options_values_id','=', 'products_options_values_to_products_options.products_options_values_id')
			->where('products_options_values_to_products_options.products_options_id','=',$request->products_options_id)->where('products_options_values.language_id','=',$request->language_id)->get();
			
		return view("admin.attributesTable")->with('attributes', $attributes);
	}
	
	//updateattributevalue
	public function updateattributevalue(Request $request){
				
		$attributes = array();	
		$message = array();
		$errorMessage = array();	
								
		DB::table('products_options_values')
			->where('products_options_values_id','=',$request->products_options_values_id)
			->update(['products_options_values_name' =>  $request->products_options_values_name]);
			
		$attributes = DB::table('products_options_values_to_products_options')
			->leftJoin('products_options_values', 'products_options_values.products_options_values_id','=', 'products_options_values_to_products_options.products_options_values_id')
			->where('products_options_values_to_products_options.products_options_id','=',$request->products_options_id)->where('products_options_values.language_id','=',$request->language_id)->get();
			
		//attributesTable
		return view("admin.attributesTable")->with('attributes', $attributes);
	}
	
	//check association of attribute with products
	public function checkattributeassociate(Request $request){
		$option_id = $request->option_id;
		$products = DB::table('products_attributes')
				->join('products','products.products_id','=','products_attributes.products_id')
				->join('products_description','products_description.products_id','=','products.products_id')
				->where('options_id','=',$option_id)
				->groupBy('products_attributes.products_id')
				->get();
				
		if(count($products)>0){
			foreach($products as $products_data){
				print ("<li style='display:inline-block; width: 30%'>".$products_data->products_name."</li>");
			}
		}else{
		}
	}
	
	//deleteattribute
	public function deleteattribute(Request $request){
		$option_id = $request->option_id;
		DB::table('products_options')->where('products_options_id','=',$option_id)->delete();
		$getValuesId = DB::table('products_options_values_to_products_options')->where('products_options_id','=',$option_id)->get();
		
		foreach($getValuesId as $getValuesIdData){
			DB::table('products_options_values')->where('products_options_values_id','=',$getValuesIdData->products_options_values_id)->delete();
		}
		DB::table('products_options_values_to_products_options')->where('products_options_id','=',$option_id)->delete();
		
		return redirect()->back()->withErrors([Lang::get("labels.OptionhasbeenupdatedMessage")]);
	}
	
	//check association of attribute/option value with products
	public function checkvalueassociate(Request $request){
		$value_id = $request->value_id;
		$products = DB::table('products_attributes')
				->join('products','products.products_id','=','products_attributes.products_id')
				->join('products_description','products_description.products_id','=','products.products_id')
				->where('options_values_id','=',$value_id)
				->get();
				
		if(count($products)>0){
			foreach($products as $products_data){
				print ("<li style='display:inline-block; width: 30%'>".$products_data->products_name."</li>");
			}
		}
		
	}
	
	//deleteattributeValue
	public function deletevalue(Request $request){
		$value_id = $request->value_id;
		DB::table('products_options_values')->where('products_options_values_id','=',$value_id)->delete();
		$getValuesId = DB::table('products_options_values_to_products_options')->where('products_options_values_id','=',$value_id)->delete();
		
		$attributes = DB::table('products_options_values_to_products_options')
			->leftJoin('products_options_values', 'products_options_values.products_options_values_id','=', 'products_options_values_to_products_options.products_options_values_id')
			->where('products_options_values_to_products_options.products_options_id','=',$request->delete_products_options_id)->where('products_options_values.language_id','=',$request->delete_language_id)->get();
			
		//attributesTable
		return view("admin.attributestable")->with('attributes', $attributes);
	}
	
	
}
