<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TermConditionTranslation extends Model
{
   public $primaryKey='term_condition_translation_id';

   public function language(){
		return $this->belongsTo('App\Language','language_id','language_id')->with('default_language_translation');
	}

	public function parent_variant_language(){
		return $this->belongsTo('App\LanguageTranslation','language_id','language_id');
	}
}
