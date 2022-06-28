<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
	public $primaryKey='variant_id';

	  public static $rule=[
		'variant_name'=> 'required|unique:variant_translations,variant_name',
	];

	public static $edit=[
		'variant_name'=> 'required',
	];

	public static $translation=[
        'variant_name'=>'required|max:30|unique:variant_translations,variant_name',
        'language_id'=>'required|numeric',
    ];

	public function size(){
		return $this->hasOne('App\Size','size_id','size_id');
	}

	public function color(){
		return $this->hasOne('App\Color','color_id','color_id');
	}

	public function product(){
		return $this->hasOne('App\Product','product_id','product_id')->with('gst');
	}

	public function default_variant_translation(){
		return $this->belongsTo('App\VariantTranslation','variant_translation_id','variant_translation_id');
	}
	public function variant_translation(){
		return $this->hasOne('App\VariantTranslation','variant_id','variant_id');
	}
	public function status(){
		return $this->belongsTo('App\Status','status_id','status_id');
	}
	
}
