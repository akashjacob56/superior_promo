<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model{
	
	public $primaryKey='brand_id';

	public static $rules=[
	'brand_name'=>'required|max:30',
	'language_id'=>'required|numeric'
	];

	public static $edit=[
	'brand_name'=>'required|max:30'
	];

	public static $translation=[
	'brand_name'=>'required|max:30',
	'language_id'=>'required|numeric'
	];

	public function default_brand_translation(){
		return $this->belongsTo('App\BrandTranslation','brand_translation_id','brand_translation_id');
	}

	public function default_brand_translation_short(){
		return $this->default_brand_translation()
		->selectRaw('brand_translation_id,brand_id,brand_name');	
	}

	public function brand_translation(){
		return $this->hasOne('App\BrandTranslation','brand_id','brand_id');
	}

	public function product(){
		return $this->hasOne('App\Product','brand_id','brand_id');
	}


}