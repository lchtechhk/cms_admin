<?php
namespace App\Http\Controllers\App;

use Validator;

use DB;
use Hash;
use App\Administrator;

use Auth;

//for requesting a value 
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class CategoriesController extends Controller
{
	public function getMainCategories($language_id){
		//$language_id     =   $language_id;
		
		$getCategories = DB::table('categories')
		->leftJoin('categories_description','categories_description.categories_id', '=', 'categories.categories_id')
		->select('categories.categories_id as id', 'categories.categories_image as image',  'categories.date_added as date_added', 'categories.last_modified as last_modified', 'categories_description.categories_name as name')
		->where('parent_id', '0')->where('categories_description.language_id', $language_id)->get();
		return($getCategories) ;
	}
	
	public function getCategories(Request $request){
		$language_id 	 = '1';
		
		if(empty($request->category_id)){
			$category_id	= '0';
		}else{
			$category_id	=   $request->category_id;
		}
		
		$getCategories = DB::table('categories')
		->leftJoin('categories_description','categories_description.categories_id', '=', 'categories.categories_id')
		->select('categories.categories_id as id', 'categories.categories_image as image',  'categories.date_added as date_added', 'categories.last_modified as last_modified', 'categories_description.categories_name as name')
		->where('parent_id', $category_id)->where('categories_description.language_id', $language_id)->get();
		return($getCategories) ;
	}

}
