<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildVariantTranslation extends Model
{
	public $primaryKey='child_variant_translation_id';

	public function language(){
		return $this->belongsTo('App\Language','language_id','language_id')->with('default_language_translation');
	}

	public function child_variant_language(){
		return $this->belongsTo('App\LanguageTranslation','language_id','language_id');
	}
	public function child_variant(){
		return $this->belongsTo('App\ChildVariant','child_variant_id','child_variant_id');
	}
}
