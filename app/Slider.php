<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{

	public $primaryKey='slider_id';

	public static $rules=[
		'slider_image'=>'required|image|mimes:jpg,png,jpeg|max:1024',
		'title'=> 'required',
		'notification_class_id'=>'required',
		'section_id'=>'required'

	];

	public static $edit=[
		'title'=> 'required',
		'notification_class_id'=>'required',
		'section_id'=>'required'

		// 'slider_image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
	];

	public static $translation=[
		'title'=>'required|max:30|unique:state_translations,state_name',
		'language_id'=>'required|numeric',
		'slider_image'=>'image|mimes:jpg,png,jpeg,gif,svg|max:1024',
	];
	public function default_slider_translation(){
		return $this->belongsTo('App\SliderTranslation','slider_translation_id','slider_translation_id');
	}


	public function slider_translation(){
		return $this->hasOne('App\SliderTranslation','slider_id','slider_id');

	}

	public function notification(){
		return $this->belongsTo('App\NotificationClass','notification_class_id','notification_class_id');
	}

	public function category(){
		return $this->hasOne('App\Category','category_id','section_id');
	}

	public function product(){
		return $this->hasOne('App\Product','product_id','section_id')->with('sku');
	}

	public function seller(){
		return $this->hasOne('App\SellerDetail','seller_detail_id','section_id');
	}
	public function status(){
		return $this->belongsTo('App\Status','status_id','status_id');
	}




}
