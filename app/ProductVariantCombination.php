<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVariantCombination extends Model
{
	protected $primaryKey="product_variant_combination_id";

	public function sku(){
		return $this->belongsTo('App\Sku','sku_id','sku_id');
	}
}
