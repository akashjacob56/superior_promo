<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model{

	protected $primaryKey="sku_id";

	public function product(){
		return $this->belongsTo('App\Product','product_id','product_id')->with('seller')->with('reviewCount')->with('gst')->with('brand')->with('skuCount')->with('status')->with('default_product_translation')->with('order_product')->with('order_product_sale')->with('order_sku_sale');
	}

	public function parent_variant(){
		return $this->belongsTo('App\VariantOption','parent_variant_id','variant_option_id')->with('default_variant_option_translation');
	}

	public function child_variant(){
		return $this->belongsTo('App\VariantOption','child_variant_id','variant_option_id')->with('default_variant_option_translation');
	}

	public function cart(){
		return $this->hasOne('App\Cart','sku_id','sku_id');
	}	

	public function wishlist(){
		return $this->hasOne('App\Wishlist','sku_id','sku_id');	
	}

	public function store_inventory(){
		return $this->belongsTo('App\StoreInventory','sku_id','sku_id');
	}
	public function order_sku_sale(){
		return $this->belongsTo('App\OrderProduct','sku_id','sku_id');
	}
	public function sale_total_sku(){
		return $this->order_sku_sale()
		->selectRaw('sku_id, sum(total_amount) as sum_total_amount, sum(quantity) as total_quantity')
		->groupBy('sku_id');
	}
}
