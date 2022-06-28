<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Config;
use App\Language;
use App\Brand;
use App\BrandTranslation;

class BrandController extends Controller{

	public function getAddBrand(){
		if(!$this->checkPermission(Config::get('permissions.BRAND_ADD'))){
			return view('user.unauthorized');
		}

		
		return view('brand.add');
	}

	public function postAddBrand(Request $request){
		if(!$this->checkPermission(Config::get('permissions.BRAND_ADD'))){
			return view('user.unauthorized');
		}
		
		$this->validate($request,Brand::$rules);

		
		
		$brand=new Brand();
		$is_featured_brand=$request->is_featured_brand;
		if($is_featured_brand==""){
			$is_featured_brand=0;
		}
		$brand->is_featured_brand=$is_featured_brand;
		
		$brand->save();

		
		$brand_translation=new BrandTranslation();
		$brand_translation->language_id=$request->language_id;
		$brand_translation->brand_id=$brand->brand_id;
		
		$brand_translation->brand_name=$request->brand_name;
		
		if(isset($request->brand_image)){
			$source=$request->brand_image;
			$image_name=$this->addCompressImage($source,"brand-image");
			$brand_translation->brand_image=$image_name;
		}


		$brand_translation->save();
		$brand->brand_translation_id=$brand_translation->brand_translation_id;
		$brand->save();
		flash('Brand added successfully');
		return redirect('admin/brand/all');
	}

	public function getAllBrand(){
		if(!$this->checkPermission(Config::get('permissions.BRAND_ALL'))){
			return view('user.unauthorized');
		}
		return view('brand.all');
	}

	public function getAllBrandData(){
		if(!$this->checkPermission(Config::get('permissions.BRAND_ALL'))){
			return view('user.unauthorized');
		}
		
		$brand=Brand::with('default_brand_translation')->where('brands.brand_id','!=',1);
		return DataTables::of($brand)->make(true);
	}

	public function getBrand($id){
		if(!$this->checkPermission(Config::get('permissions.BRAND_DETAILS'))){

			return view('user.unauthorized');
		}
		
		$brand=Brand::with('default_brand_translation')->find($id);
		$stored_translations=BrandTranslation::where('brand_id',$id)->pluck('language_id');
		if($brand!=""){
			return view('brand.details')->with('brand',$brand)->with('stored_translations',$stored_translations);	
		}
		return redirect('admin/brand/all');
	}

	public function postBrand(Request $request){
		if(!$this->checkPermission(Config::get('permissions.BRAND_UPDATE'))){
			return view('user.unauthorized');
		}
		

		$brand_id=$request->id;
		$brand=Brand::find($brand_id);
		
		if($brand!=""){
			if(isset($request['save'])){
				$this->validate($request,Brand::$edit);
				$this->validate($request,['brand_name' => 'unique:brand_translations,brand_name,NULL,id,brand_id' .$brand->brand_id]);

				$brand_translation_id=$brand->brand_translation_id;
				$brand_translation=BrandTranslation::find($brand_translation_id);

				$brand_translation->brand_name=$request->brand_name;

				$brand_image=$brand_translation->brand_image;

				

				

				if(isset($request->brand_image)){
					if($brand_image!=""){
						$brand_image_name=substr($brand_image, strrpos($brand_image, '/') + 1);
					if(file_exists(storage_path("app/brand-image/".$brand_image_name))){
							unlink(storage_path("app/brand-image/".$brand_image_name));
						}
					}
					$source=$request->brand_image;
					$image_name=$this->addCompressImage($source,"brand-image");
					$brand_translation->brand_image=$image_name;


				}
				
				$brand_translation->save();
				$is_featured_brand=$request->is_featured_brand;
				if($is_featured_brand==""){
					$is_featured_brand=0;
				}
				$brand->is_featured_brand=$is_featured_brand;
				$brand->save();
				flash('Brand updated successfully');  

			}else if(isset($request['active'])){
				$brand->status_id=1;
				$brand->save();
				flash('Brand activated successfully');
			}else if(isset($request['inactive'])){
				$brand->status_id=0;
				$brand->save();
				flash('Brand activated successfully');
			}
			return redirect('admin/brand/all');
		}else{
			return redirect('admin/brand/all');
		}
	}


	

}
