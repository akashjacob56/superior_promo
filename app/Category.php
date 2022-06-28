<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
 {
	public $primaryKey='category_id';
	
	public static $rules=[
	'category_name'=>'required|min:3|max:25',
	'category_image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
	'category_url'=>'required|min:3',
	];

	public static $editRules=[
	'category_name'=>'required',
	'category_image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
	];


/*	public function parent_category_link(){
		return $this->belongsTo('App\CategoryHierarchy','category_id','parent_category_id')->with('default_category_translation');*/
	

	public function parent_category(){
		return $this->belongsTo('App\CategoryHierarchy','parent_category_id','category_id');
	}


	public function default_category_translation(){
		return $this->belongsTo('App\CategoryTranslation','category_translation_id','category_translation_id');
	}

	public function category_translation(){
		return $this->hasOne('App\CategoryTranslation','category_id','category_id');
	}


	public function child_category(){
		return $this->hasOne('App\CategoryHierarchy','child_category_id','category_id');
	}

	public function child_categories(){
		return $this->hasMany('App\CategoryHierarchy','parent_category_id','category_id')->with('category')->with('sub_child_categories');
	}

	public function status(){
		return $this->belongsTo('App\Status','status_id','status_id');
	}

	public function category_products(){
		return $this->belongsTo('App\CategoryProduct','category_id','category_id');
	}



	public function category_product(){
		return $this->belongsTo('App\CategoryProduct','category_id','category_id');
	}
	public function product_count(){
		return $this->category_product()->selectRaw('category_id ,count(category_id) as total_product')->groupBy('category_id');
	}


}
