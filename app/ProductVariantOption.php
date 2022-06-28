<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVariantOption extends Model{

	public $primaryKey='product_variant_option_id';

	public function variant(){
		return $this->belongsTo('App\Variant','variant_id','variant_id');
	}

	public function option(){
		return $this->belongsTo('App\Option','option_id','option_id');
	}

}
