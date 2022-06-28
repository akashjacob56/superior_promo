<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Category;
use App\SubCategory;
use Flash;
use App\Product;
use App\CategoryProduct;
use Config;
use App\Language;
use App\CategoryTranslation;

use App\CategoryHierarchy;
use App\Slider;
use App\OfferBlock;
use App\Notification;

class SubCategoryController extends Controller
{
    	public function getAddCategory(){
		if(!$this->checkPermission(Config::get('permissions.CATEGORY_ADD'))){
			return view('user.unauthorized');
		}
		
		$categories=Category::with('default_category_translation')->where('category_id','!=',1)->where('is_parent_category',1)->get();		
		return view("subcategory.add")->with('categories',$categories);
	}

	public function postAddCategory(Request $request){
		if(!$this->checkPermission(Config::get('permissions.CATEGORY_ADD'))){
			return view('user.unauthorized');
		}

		$this->validate($request,Category::$rules);
		


		$category=new Category();
		if(isset($request->category_banner_image)){
			$source=$request->category_banner_image;
			$banner_image_name=$this->addCompressImage($source,"category_banner_image");
			$category->category_banner_image=$banner_image_name;
		}


		$category->is_parent_category=0;

		$category->is_main_category=0;
		$category->category_url=str_slug($request->category_url);
		$category->save();

		$category_translation=new CategoryTranslation();
		
		$category_translation->category_id=$category->category_id;

		$category_translation->language_id=$request->language_id;
		$category_translation->category_name=$request->category_name;
		$category_translation->description=$request->description;
		
		$category_translation->meta_title=$request->meta_title;
		$category_translation->meta_keywords=$request->meta_keywords;
		$category_translation->meta_description=$request->meta_description;
		$category_translation->save();


		$category->category_translation_id=$category_translation->category_translation_id;
		$category->save();

		$child_category_id=$category->category_id;
		$category_id=$request->category_id;
		
		$category_hierarchy=CategoryHierarchy::where('parent_category_id',$category_id)->where('child_category_id',$child_category_id)->first();
		
			$category_hierarchy=new CategoryHierarchy();
			$category_hierarchy->parent_category_id=$category_id;
			$category_hierarchy->child_category_id=$child_category_id;
                        $category_hierarchy->name=$request->category_name;

			$category_hierarchy->save();

	
		flash('Sub Category added successfully');  
		return redirect('admin/sub-category/all');
	}

	//all categories
	public function getAllCategories(Request $request){
		if(!$this->checkPermission(Config::get('permissions.CATEGORY_ALL'))){
			return view('user.unauthorized');
		}
		return view('subcategory.all');
	}

	public function getAllCategoryData(){
		if(!$this->checkPermission(Config::get('permissions.CATEGORY_ALL'))){
			return view('user.unauthorized');
		}
		
		$categories=Category::where('categories.category_id','!=',1)->where('categories.is_parent_category',0)->with('default_category_translation')->with('status');
		return DataTables::of($categories)->make(true);  
	}

	//details
	public function getCategory($id){

		if(!$this->checkPermission(Config::get('permissions.CATEGORY_DETAILS'))){
			return view('user.unauthorized');
		}
		
		// current category data
		
		$category=Category::with('default_category_translation')->find($id);
		$stored_translations=CategoryTranslation::where('category_id',$id)->pluck('language_id');

		$category_hierarchy=CategoryHierarchy::where('child_category_id',$category->category_id)->first();

		$categories=Category::with('default_category_translation')->where('category_id','!=',1)->where('is_parent_category',1)->get();		

		if($category!=""){
			return view("subcategory.details")->with('category',$category)->with('categories',$categories)->with('stored_translations',$stored_translations)->with('category_hierarchy',$category_hierarchy);
		}else{
			return redirect('admin/sub-category/all');
		}
	}

	public function postCategory(Request $request){
		if(!$this->checkPermission(Config::get('permissions.CATEGORY_UPDATE'))){
			return view('user.unauthorized');
		}
		
		$id=$request->id;
		
		$category=Category::find($id);


		if(isset($request['save'])){
			if($category!=""){
				$this->validate($request,Category::$editRules);

				$category_url=str_slug($request->category_url);
				$request->merge(['category_url' => $category_url]);

				$this->validate($request,['category_url'=>'unique:categories,category_url,'.$category->category_id.',category_id']);

				

				$category_translation_id=$category->category_translation_id;

				$category_translation=CategoryTranslation::find($category_translation_id);
				$category_translation->category_name=$request->category_name;
				
				$category_translation->description=$request->description;
				$category_translation->meta_title=$request->meta_title;
				$category_translation->meta_keywords=$request->meta_keywords;
				$category_translation->meta_description=$request->meta_description;
				$category_translation->save();

			        $child_category_id=$category->category_id;
		        $get_category_id=$request->category_id;



				$category_hierarchy=CategoryHierarchy::where('parent_category_id',$request->old_category_id)->where('child_category_id',$child_category_id)->first();

				$new_category_hierarchy=CategoryHierarchy::where('parent_category_id',$get_category_id)->where('child_category_id',$child_category_id)->first();
				if ($new_category_hierarchy!=$category_hierarchy) {
					$category_hierarchy->parent_category_id=$get_category_id;
			$category_hierarchy->child_category_id=$child_category_id;
                        $category_hierarchy->name=$request->category_name;

			$category_hierarchy->save();
				}
			
				
				
				$category->category_url=str_slug($request->category_url);

				$category_banner_image=$category->category_banner_image;

				
				if(isset($request->category_banner_image)){

					if ($category_banner_image!="") {
						$category_banner_image_name=substr($category_banner_image, strrpos($category_banner_image, '/') + 1);
					if(file_exists(storage_path("app/category_banner_image/".$category_banner_image_name))){
							unlink(storage_path("app/category_banner_image/".$category_banner_image_name));
						}

					}
					
					$source=$request->category_banner_image;
					$banner_image_name=$this->addCompressImage($source,"category_banner_image");
					$category->category_banner_image=$banner_image_name;
				}
				
				flash('Sub Category updated successfully');
			}else{
				return redirect('sub-category/all');
			}
		}else if(isset($request['active'])){
			flash('Sub Category activated successfully');
			$category->status_id=1;
			
		}else if(isset($request['inactive'])){
			flash('Sub Category inactivated successfully');
			$category->status_id=2;
			Slider::where("notification_class_id",2)->where('section_id',$id)->update(['status_id' => 2]);
			OfferBlock::where("notification_class_id",2)->where('section_id',$id)->update(['status_id' => 2]);
			Notification::where("notification_class_id",2)->where('section_id',$id)->update(['status_id' => 2]);
		}

		$category->save();

		return redirect("admin/sub-category/all");
	}




	public function getAllCategoryProductData(Request $request){
		
		$category_id=$request->category_id;
		$products=Product::with(['product_category'=> function($query) use ($category_id){
			$query->where('category_id',$category_id);
		}])->with('seller')->with('default_product_translation')->with('status');
		return DataTables::of($products)->make(true);  
	}

	public function postAddCategoryProduct(Request $request){
		$product_id=$request->id;
		$category_id=$request->category_id;
		
		$category_product=CategoryProduct::where('category_id',$category_id)->where('product_id',$product_id)->first();

		if($category_product==""){
			$category_product=new CategoryProduct();
			$category_product->product_id=$product_id;
			$category_product->category_id=$category_id;
			$category_product->save();
			$category_ids=CategoryProduct::where('product_id',$product_id)->pluck('category_id');

			$categories=Category::whereIn('category_id',$category_ids)->with('default_category_translation')->get();
		}else{
			$category_product->delete();
			$categories=1;	
		}

		return $categories;
	}




	//remove product from category
	public function postRemoveCategoryProduct(Request $request){
		$product_id=$request->id;
		$category_id=$request->category_id;
		
		$category_product=CategoryProduct::where('category_id',$category_id)->where('product_id',$product_id)->first();

		if($category_product!=""){
			$category_product->delete();
		}

		$category_ids=CategoryProduct::where('product_id',$product_id)->pluck('category_id');

		$categories=Category::whereIn('category_id',$category_ids)->with('default_category_translation')->get();

		return $categories;
	}

}
