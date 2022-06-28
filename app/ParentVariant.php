<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentVariant extends Model
{
	public $primaryKey="parent_variant_id";

	public function default_parent_variant_translation(){
		return $this->belongsTo('App\ParentVariantTranslation','parent_variant_translation_id','parent_variant_translation_id');
	}

	public function parent_variant_translation(){
		return $this->hasOne('App\ParentVariantTranslation','parent_variant_id','parent_variant_id');
	}


	public function parent_variant_translations(){
		return $this->hasMany('App\ParentVariantTranslation','parent_variant_id','parent_variant_id');
	}


	public static $addRule=[
		'parent_variant_name' => 'required'
	];
}
