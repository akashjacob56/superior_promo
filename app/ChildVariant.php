<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildVariant extends Model
{
	public $primaryKey="child_variant_id";


	public function default_child_variant_translation(){
		return $this->belongsTo('App\ChildVariantTranslation','child_variant_translation_id','child_variant_translation_id');
	}

	public function child_variant_translation(){
		return $this->hasOne('App\ChildVariantTranslation','child_variant_id','child_variant_id');
	}
	
	public function child_variant_translations(){
		return $this->hasMany('App\ChildVariantTranslation','child_variant_id','child_variant_id');
	}

	public static $addRule=[
		
		'child_variant_name'=> 'required',
	];
	
}
