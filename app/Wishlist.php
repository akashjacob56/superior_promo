<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
	public $primaryKey='wishlist_id';

	public function sku(){
		return $this->belongsTo('App\Sku','sku_id','sku_id');
	}

	public function user(){
		return $this->belongsTo('App\User','user','id');
	}

	public function user_guest(){
		return $this->belongsTo('App\User','user','id');
	}

	public function product(){
		return $this->belongsTo('App\Product','product_id','product_id')->with('default_product_translation_full')->with('product_prices')->with('sku')->with('product_color_group');
	}
}
