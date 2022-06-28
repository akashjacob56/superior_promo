<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Notification extends Model{
	public $primaryKey='notification_id';
	
	public static $rules=[
		'notification_title'=>'required',
		'notification_class_id'=>'required',
		'section_id'=>'required',
		'notification_image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		'notification_description'=>'required'
	];

	public static $editRule=[
		'notification_title'=>'required',
		'notification_description'=>'required'
	];

	public function notificationclass(){
		return $this->hasOne('App\NotificationClass','notification_class_id','notification_class_id');
	}

	public function category(){
		return $this->hasOne('App\Category','category_id','section_id');
	}

	public function category_translations(){
		return $this->hasOne('App\CategoryTranslation','category_translation_id','section_id');
	}

	public function product(){
		return $this->hasOne('App\Product','product_id','section_id')->with('sku');
	}

	public function product_translations(){
		return $this->hasOne('App\ProductTranslation','product_translation_id','section_id');
	}

	public function default_notification_translation(){
		return $this->belongsTo('App\NotificationTranslation','notification_translation_id','notification_translation_id');
	}

	public function notification_translation(){
		return $this->hasOne('App\NotificationTranslation','notification_id','notification_id');
	}

	public function category_section(){
		return $this->belongsTo('App\Category','section_id','category_id');
	}

	public function product_section(){
		return $this->belongsTo('App\Product','section_id','product_id');
	}
	
	public function status(){
		return $this->belongsTo('App\Status','status_id','status_id');
	}

	public function notification_read(){
		return $this->belongsTo('App\NotificationRead','notification_id','notification_id');
	}
	/*public function customer_section(){
		return $this->belongsTo('App\User','section_id','id');
	}*/
}
