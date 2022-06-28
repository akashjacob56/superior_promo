<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model{

	public $primaryKey='order_product_id';
	
	public function user(){
		return $this->belongsTo('App\User','user_id','id')->with('sale_by_customer')->with('order_count');
	}
	
	public function product(){
		return $this->belongsTo('App\Product','product_id','product_id')->with('default_product_translation')->with('order_product_sale')->with('sku')->with('return_policy');
	}

	public function parent_variant(){
		return $this->belongsTo('App\VariantOption','parent_variant_id','variant_option_id')->with('default_variant_option_translation')->with('variant_option_translation');
	}

	public function child_variant(){
		return $this->belongsTo('App\VariantOption','child_variant_id','variant_option_id')->with('default_variant_option_translation')->with('variant_option_translation');
	}

	public function category(){
		return $this->hasOne('App\Category','category_id','category_id');
	}
	public function brand(){
		return $this->hasOne('App\Brand','brand_id','brand_id')->with('default_brand_translation');
	}
	public function order(){
		return $this->belongsTo('App\Order','order_id','order_id')->with('city')->with('country')->with('state');
	}

	public function source(){
		return $this->belongsTo('App\Source','source_id','source_id')->with('order_source');
	}
	
	public function transaction_type(){
		return $this->belongsTo('App\Transaction_type','transaction_type_id','transaction_type_id')->with('order_transaction_type');
	}
                                                                                                                                                                  
}
