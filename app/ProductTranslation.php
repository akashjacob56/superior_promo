<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{

	public $primaryKey='product_translation_id';
	public function language(){
		return $this->belongsTo('App\Language','language_id','language_id')->with('default_language_translation');
	}

	public function product_language(){
		return $this->belongsTo('App\LanguageTranslation','language_id','language_id');
	}

	public function product(){
		return $this->belongsTo('App\Product','product_id','product_id')->with('parent_variant')->with('child_variant')->with('sku')->with('skus')->with('reviewCount');
	}	
}
