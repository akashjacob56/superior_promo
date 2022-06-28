<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentVariantTranslation extends Model{

	public $primaryKey='parent_variant_translation_id';

	public function language(){
		return $this->belongsTo('App\Language','language_id','language_id')->with('default_language_translation');
	}

	public function parent_variant_language(){
		return $this->belongsTo('App\LanguageTranslation','language_id','language_id');
	}
	public function parent_variant(){
		return $this->belongsTo('App\ParentVariant','parent_variant_id','parent_variant_id');
	}
}
