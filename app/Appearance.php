<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appearance extends Model
{
	public $primaryKey='appearance_id';
	
	public static $rule=[
		//'language_id'=>'required|numeric',
		'app_name'=>'required|max:30',
		'currency'=>'required|max:10',
		'app_logo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		'app_back_color'=>'required|max:6',
		'app_text_color'=>'required|max:6',
		'text_color'=>'required|max:6',
		'toast_back_color'=>'required|max:6',
		'toast_text_color'=>'required|max:6',
		'app_status_bar_color'=>'required|max:6',
	/*	'business_location'=>'required|max:500',*/
		'contact_number'=>'max:15',
		'theme_id'=>'required',

		'new_arrival_count'=>'required',
		'recent_view_count'=>'required',
		'max_view_count'=>'required',
		'top_categories_count'=>'required',
	];

	public function default_appearance_translation(){
		return $this->belongsTo('App\AppearanceTranslation','appearance_translation_id','appearance_translation_id');
	}

	public function appearance_translation(){
		return $this->hasOne('App\AppearanceTranslation','appearance_id','appearance_id');
	}

	public function language(){
		return $this->belongsTo('App\Language','language_id','language_id');
	}
	public function fonts(){
		return $this->belongsTo('App\Font','font_id','font_id');
	}
}
