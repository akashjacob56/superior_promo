<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VariantOptionTranslation extends Model
{
    public $primaryKey='variant_option_translation_id';

    	public function language(){
		return $this->belongsTo('App\Language','language_id','language_id')->with('default_language_translation');
	}

	public function variant_option_language(){
		return $this->belongsTo('App\LanguageTranslation','language_id','language_id');
	}
	public function variant_option(){
		return $this->belongsTo('App\VariantOption','variant_option_id','variant_option_id');
	}
    
}
