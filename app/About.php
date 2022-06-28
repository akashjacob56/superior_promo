<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{

    //
    public $primaryKey='about_us_id';

    public function default_aboutus_translation(){
		return $this->belongsTo('App\AboutUsTranslation','about_us_translation_id','about_us_translation_id')->with('language');
	}

	public function aboutus_translation(){
		return $this->hasOne('App\AboutUsTranslation','about_us_id','about_us_id')->with('language');
	}	
}
