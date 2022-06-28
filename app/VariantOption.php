<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VariantOption extends Model
{
	public $primaryKey='variant_option_id';

	public function variant(){
		return $this->belongsTo('App\Variant','variant_id','variant_id')->with('variant_translation');
	}

	public function default_variant_option_translation(){
		return $this->belongsTo('App\VariantOptionTranslation','variant_option_translation_id','variant_option_translation_id');
	}

	public function variant_option_translation(){
		return $this->hasOne('App\VariantOptionTranslation','variant_option_id','variant_option_id');
	}
	
}
