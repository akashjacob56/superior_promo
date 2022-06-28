<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
	public $primaryKey='product_image_id';	

	public static $addRules=[
     'files'=>'required',
	'product_id'=>'required'
	];

	public function parent_variant(){
		return $this->belongsTo('App\VariantOption','parent_variant_id','variant_option_id')->with('default_variant_option_translation');
	}

	public function child_variant(){
		return $this->belongsTo('App\VariantOption','child_variant_id','variant_option_id')->with('default_variant_option_translation');
	}
}
