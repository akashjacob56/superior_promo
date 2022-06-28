<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeAbout extends Model
{
	public $primaryKey='home_about_us_id';

	public function default_aboutus_translation(){
		return $this->belongsTo('App\HomeAboutTranslation','home_about_us_translation_id','home_about_us_translation_id')->with('language');
	}

	public function aboutus_translation(){
		return $this->hasOne('App\HomeAboutTranslation','home_about_us_id','home_about_us_id')->with('language');
	}	
}
