<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutUsTranslation extends Model
{
    //
     public $primaryKey='about_us_translation_id';

    public function language(){
		return $this->belongsTo('App\Language','language_id','language_id');
	}

	public function policy_language(){
		return $this->belongsTo('App\LanguageTranslation','language_id','language_id');
	}
}
