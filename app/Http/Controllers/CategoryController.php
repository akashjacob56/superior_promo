<?php
namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
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
use Illuminate\Support\Str;

class CategoryController extends Controller{

	public function getAddCategory(){
		
		if(!$this->checkPermission(Config::get('permissions.CATEGORY_ADD'))){
			return view('user.unauthorized');
		}

		//All Categories Start
		$language_id=1;
         $menu_categories=Category::where('status_id','1')->where('is_parent_category',1)->with('default_category_translation')->with(['category_translation'=>function($query) use ($language_id){
          $query->where('language_id',$language_id);
        }])->with(["child_categories"=>function($query) use ($language_id){
          $query->orderBy('updated_at','desc')->with(['category'=>function($query) use($language_id){
            $query->with('default_category_translation')->with(['category_translation'=>function($query) use($language_id){
              $query->where('language_id',$language_id)->orderBy('updated_at','desc');
            }]);
          }])->with(["sub_child_categories"=>function($query) use ($language_id){
            $query->orderBy('updated_at','desc')->with(['category'=>function($query) use($language_id){
              $query->with('default_category_translation')->with(['category_translation'=>function($query) use($language_id){
                $query->where('language_id',$language_id)->orderBy('updated_at','desc');
              }]);
            }]);
          }]);
        }])->where('status_id','1')->get();
        // All Categories End
		
		$categories=Category::with('default_category_translation')->where('category_id','!=',1)->get();
		return view("category.add")->with('categories',$categories)->with('menu_categories',$menu_categories);
	}



	    public function getCategoryDelete(Request $request){
	    $category_id=$request->category_id;
	    $category=Category::where('category_id',$category_id)->first();
	    $category->status_id=2;
	    $category->save();
	    return 0;
	    }


	public function postCategoryDragDrop(Request $request){

		$child_category_id=$request->child_category_id;
		$new_parent_category_id=$request->new_parent_category_id;
		$old_parent_category_id=$request->old_parent_category_id;
        
		$category_hierarchy=CategoryHierarchy::where('parent_category_id',$new_parent_category_id)->where('child_category_id',$child_category_id)->first();
		
		$category=Category::find($new_parent_category_id);
		
		
		if($category_hierarchy==""){
    
			$checkparent_category_hierarchy=CategoryHierarchy::where('child_category_id',$new_parent_category_id)->first();
            
			$category_hierarchy=new CategoryHierarchy();
			$category_hierarchy->parent_category_id=$new_parent_category_id;
			$category_hierarchy->child_category_id=$child_category_id;
			$category_hierarchy->save();
            if ($checkparent_category_hierarchy=="") {
            	$category->is_parent_category=1;
            }
			
			$category_hierarchy=1;
		}
		else{
			$is_parent=CategoryHierarchy::where('parent_category_id',$new_parent_category_id)->where('category_hierarchy_id','!=',$category_hierarchy->category_hierarchy_id)->first();
			
			if($is_parent==""){
				$category->is_parent_category=0;

			}
			$category_hierarchy->delete();
		}
		$category->save();
        
        if ($old_parent_category_id!="") {
        $old_category_hierarchy=CategoryHierarchy::where('parent_category_id',$old_parent_category_id)->where('child_category_id',$child_category_id)->delete();
        }

        $oldcategory=Category::find($child_category_id);
        $oldcategory->is_parent_category=0;
        // $oldcategory->is_main_category=0;
        $oldcategory->save();
		
		return $category_hierarchy;


	}

	public function postAddCategory(Request $request){
		if(!$this->checkPermission(Config::get('permissions.CATEGORY_ADD'))){
			return view('user.unauthorized');
		}

		$this->validate($request,Category::$rules);
		
		$category=new Category();
		
		if(isset($request->category_image)){
			$source=$request->category_image;
			$image_name=$this->addCompressImage($source,"category_image");
			$category->category_image=$image_name;
		}

		if(isset($request->category_banner_image)){
			$source=$request->category_banner_image;
			$banner_image_name=$this->addCompressImage($source,"category_banner_image");
			$category->category_banner_image=$banner_image_name;
		}

		
		$is_main_category=$request->is_main_category;
		if($is_main_category==""){
			$is_main_category=0;
		}
        $category->is_parent_category=1;
		$category->is_main_category=$is_main_category;
		$category->category_url=Str::slug($request->category_url);
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

		flash('category added successfully');  
		return redirect('admin/categories/all');
	}

	//all categories
	public function getAllCategories(Request $request){
		if(!$this->checkPermission(Config::get('permissions.CATEGORY_ALL'))){
			return view('user.unauthorized');
		}
		return view('category.all');
	}

	public function getAllCategoryData(){
		if(!$this->checkPermission(Config::get('permissions.CATEGORY_ALL'))){
			return view('user.unauthorized');
		}
		
		$categories=Category::where('categories.category_id','!=',1)->with('default_category_translation')->with('status');
		return DataTables::of($categories)->make(true);  
	}

		

		public function getAllCategoriesNew (Request $request){

        $language_id=1;
         $menu_categories= Category::where('status_id','1')->where('is_parent_category',1)->with('default_category_translation')->with(['category_translation'=>function($query) use ($language_id){
          $query->where('language_id',$language_id);

        }])->with(["child_categories"=>function($query) use ($language_id){
          $query->orderBy('updated_at','desc')->with(['category'=>function($query) use($language_id){
            $query->with('default_category_translation')->with(['category_translation'=>function($query) use($language_id){
              $query->where('language_id',$language_id)->orderBy('updated_at','desc');
            }]);

          }])->with(["sub_child_categories"=>function($query) use ($language_id){
            $query->orderBy('updated_at','desc')->with(['category'=>function($query) use($language_id){
              $query->with('default_category_translation')->with(['category_translation'=>function($query) use($language_id){
                $query->where('language_id',$language_id)->orderBy('updated_at','desc');
              }]);
            }]);
          }])->with(["sub_sub_child_categories"=>function($query) use ($language_id){
            $query->orderBy('updated_at','desc')->with(['category'=>function($query) use($language_id){
              $query->with('default_category_translation')->with(['category_translation'=>function($query) use($language_id){
                $query->where('language_id',$language_id)->orderBy('updated_at','desc');
              }]);
            }]);
          }]);
        }])->where('status_id','1')->get();

       //dd($menu_categories[23]);

        return view('categories.all')->with('menu_categories',$menu_categories);


		}

	//details
	public function getCategory($id){

		if(!$this->checkPermission(Config::get('permissions.CATEGORY_DETAILS'))){
			return view('user.unauthorized');
		}



		$language_id=1;
         $menu_categories=Category::where('status_id','1')->where('is_parent_category',1)->with('default_category_translation')->with(['category_translation'=>function($query) use ($language_id){
          $query->where('language_id',$language_id);
        }])->with(["child_categories"=>function($query) use ($language_id){
          $query->orderBy('updated_at','desc')->with(['category'=>function($query) use($language_id){
            $query->with('default_category_translation')->with(['category_translation'=>function($query) use($language_id){
              $query->where('language_id',$language_id)->orderBy('updated_at','desc');
            }]);
          }])->with(["sub_child_categories"=>function($query) use ($language_id){
            $query->orderBy('updated_at','desc')->with(['category'=>function($query) use($language_id){
              $query->with('default_category_translation')->with(['category_translation'=>function($query) use($language_id){
                $query->where('language_id',$language_id)->orderBy('updated_at','desc');
              }]);
            }]);
          }]);
        }])->where('status_id','1')->get();


		
		// current category data
		$category=Category::with('default_category_translation')->find($id);
		
		$stored_translations=CategoryTranslation::where('category_id',$id)->pluck('language_id');

		if($category!=""){
			return view("category.details")->with('detail_category',$category)->with('stored_translations',$stored_translations)->with('menu_categories',$menu_categories);
		}else{
			return redirect('admin/categories/all');
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

				$category_url=Str::slug($request->category_url);
				$request->merge(['category_url' => $category_url]);

				// $this->validate($request,['category_url' => 'unique:categories,category_url,NULL,id,category_id' .$category->category_id]);

				

				$category_translation_id=$category->category_translation_id;

				$category_translation=CategoryTranslation::find($category_translation_id);
				$category_translation->category_name=$request->category_name;
				
				$category_translation->description=$request->description;
				$category_translation->meta_title=$request->meta_title;
				$category_translation->meta_keywords=$request->meta_keywords;
				$category_translation->meta_description=$request->meta_description;
				$category_translation->save();

				$category_image=$category->category_image;



				if(isset($request->category_image)){

					if ($category_image!="") {
						$category_image_name=substr($category_image, strrpos($category_image, '/') + 1);
					if(file_exists(storage_path("app/category_image/".$category_image_name))){
							unlink(storage_path("app/category_image/".$category_image_name));
						}
					}
					$source=$request->category_image;
					$image_name=$this->addCompressImage($source,"category_image");
					$category->category_image=$image_name;
				}

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
				
				$is_main_category=$request->is_main_category;
				if($is_main_category==""){
					$is_main_category=0;
				}
				$category->category_url=Str::slug($request->category_url);
				$category->is_main_category=$is_main_category;
				flash('category updated successfully');
			}else{
				return redirect('category/all');
			}
		}else if(isset($request['active'])){
			flash('category activated successfully');
			$category->status_id=1;
			
		}else if(isset($request['inactive'])){
			flash('category inactivated successfully');
			$category->status_id=2;
			Slider::where("notification_class_id",2)->where('section_id',$id)->update(['status_id' => 2]);
			OfferBlock::where("notification_class_id",2)->where('section_id',$id)->update(['status_id' => 2]);
			Notification::where("notification_class_id",2)->where('section_id',$id)->update(['status_id' => 2]);
		}
		$category->save();

		return redirect("admin/categories/all");
	}


	public function getAllCategoryHierarchyData(Request $request){
		$category_id= $request->category_id;
		

		$category_hierarchy=CategoryHierarchy::where('child_category_id',$category_id)->pluck('parent_category_id');

		$allow_categories=Category::with("status")->with(['child_category'=>function($query) use ($category_id){
			$query->where('parent_category_id',$category_id);
		}])->whereNotIn('categories.category_id',$category_hierarchy)->with('default_category_translation')->where('categories.category_id','!=',$category_id)->where('categories.category_id','!=',1)->get();

		/*$allow_categories=Category::with('default_category_translation')->where('categories.category_id','!=',$category_id)->where('categories.category_id','!=',1);
*/
		return DataTables::of($allow_categories)->make(true);  
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


	public function postAddCategoryHierarchy(Request $request){
		$child_category_id=$request->id;
		$category_id=$request->category_id;
		
		$category_hierarchy=CategoryHierarchy::where('parent_category_id',$category_id)->where('child_category_id',$child_category_id)->first();
		$category=Category::find($category_id);
		if($category_hierarchy==""){
			$category_hierarchy=new CategoryHierarchy();
			$category_hierarchy->parent_category_id=$category_id;
			$category_hierarchy->child_category_id=$child_category_id;
			$category_hierarchy->save();

			$category->is_parent_category=1;
			$category_hierarchy=1;
		}
		else{
			$is_parent=CategoryHierarchy::where('parent_category_id',$category_id)->where('category_hierarchy_id','!=',$category_hierarchy->category_hierarchy_id)->first();

			if($is_parent==""){
				$category->is_parent_category=0;

			}
			$category_hierarchy->delete();
		}
		$category->save();
		return $category_hierarchy;
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

	public function getCategoryTranslation($category_id,$language_code){
		
		
		
		$language=Language::where('language_code',$language_code)->with('default_language_translation')->first();
		$category=Category::with('default_category_translation')->find($category_id);

		if($language!="" && $category!=""){
			$category_translation=CategoryTranslation::where('language_id',$language->language_id)->where('category_id',$category_id)->first();
			$stored_translations=CategoryTranslation::where('category_id',$category_id)->pluck('language_id');
			
			return view('category.language')->with('category_translation',$category_translation)->with('language',$language)->with('category',$category)->with('stored_translations',$stored_translations);
		}
		return redirect('admin/categories/all');
	}


	public function postCategoryTranslation(Request $request){
		
		$this->validate($request,CategoryTranslation::$rules);
		$post=$request->all();
		$language_id=$post['language_id'];
		$category_name=$post['category_name'];
		$description=$request->description;
		$category_id=$post['category_id'];
		
		$language=Language::find($language_id);
		$category_translation=CategoryTranslation::where('language_id',$language_id)->where('category_id',$category_id)->first();
		if($category_translation!=""){
			$category_translation->category_name=$category_name;
			$category_translation->description=$description;
			
			$category_translation->meta_title=$request->meta_title;
			$category_translation->meta_keywords=$request->meta_keywords;
			$category_translation->meta_description=$request->meta_description;
			/*	$category_translation->category_url=Str::slug($request->category_name);*/

			$category_translation->save();
			flash('category name updated successfully');
		}
		else{
			$category_translation=new CategoryTranslation();
			
			$category_translation->language_id=$language_id;
			$category_translation->category_name=$category_name;
			$category_translation->description=$description;
			$category_translation->category_id=$category_id;
			$category_translation->meta_title=$request->meta_title;
			$category_translation->meta_keywords=$request->meta_keywords;
			$category_translation->meta_description=$request->meta_description;

			/*	$category_translation->category_url=Str::slug($request->category_name);*/

			$category_translation->save();
			flash('category details added for new language');
		}
		return redirect('admin/categories/'.$category_id.'/'.$language->language_code);

	}

}
