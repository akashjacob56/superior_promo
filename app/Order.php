<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model{
	public $primaryKey='id';

	public function orderitems(){
		return $this->hasMany('App\OrderItem','order_id','id')->with('product')->with('artproofs')->with('cart_item')->with('vendor')->with('stage')->with('order_item_stage')->with('stage')->with('order_notes')->with('user_note')->with('tracking_informations');
	}

	public function orderitem(){
		return $this->belongsTo('App\OrderItem','id','order_id')->with('product')->with('stage')->with('artproofs')->with('reorder_show')->with('cart_item');
	}
	
	public function user(){
		return $this->belongsTo('App\User','user_id','id');
	}

	public function cart(){
		return $this->belongsTo('App\Cart','order_id','order_id')->with('cart_item');
	}

	public function delivery_status(){
		return $this->belongsTo('App\DeliveryStatus','delivery_status_id','delivery_status_id')->with('default_delivery_status_translation');
	}

	public function payment_status(){
		return $this->belongsTo('App\PaymentStatus','payment_status_id','payment_status_id');
	}

	public function order_products(){
		return $this->hasMany('App\OrderProduct','order_id','order_id')->with('product');
	}

	// public function order_product(){
	// 	return $this->hasOne('App\OrderProduct','order_id','order_id')->with('product');
	// }

	public function order_item(){
		return $this->hasOne('App\OrderItem','order_id','id')->with('product');
	}

	public function order_amount(){
		return $this->order_product()
		->selectRaw('order_id, sum(total_amount) as total_amount, sum(gst_amount) as total_gst, sum(subtotal_amount) as subtotal_amount')
		->groupBy('order_id');
	}

	public function store(){
		return $this->hasOne('App\Store','store_id','store_id');
	}

	public function delivery_address(){
		return $this->hasOne('App\Store','store_id','delivery_address');
	}
	public function seller(){
		return $this->belongsTo('App\User','seller_id','id')->with('sale_by_seller');
	}
	public function city(){
		return $this->belongsTo('App\City','city_id','city_id')->with('default_city_translation');
	}
	public function state(){
		return $this->belongsTo('App\State','state_id','state_id')->with('default_state_translation');
	}
	public function country(){
		return $this->belongsTo('App\Country','country_id','country_id')->with('default_country_translation');
	}
	public function pincode(){
		return $this->belongsTo('App\Pincode','pincode_id','pincode_id');
	}

	public function order_by_seller(){
		return $this->belongsTo('App\OrderProduct','order_id','order_id');
	}

	public function sale_by_order(){
		return $this->order_by_seller()
		->selectRaw('order_id, sum(total_amount) as sum_total_amount, sum(quantity) as total_quantity')
		->groupBy('order_id');
	}

	public function order_attachment(){
		return $this->hasMany('App\OrderAttachment','global_order_id','global_order_id');
		
	}
	public function delivery_vendor(){
		return $this->belongsTo('App\DeliveryVendor','delivery_vendor_id','delivery_vendor_id');
	}

	public function global_order(){

		return $this->belongsTo('App\GlobalOrder','global_order_id','global_order_id');
	}

	//17feb22
	public function cartitem(){
		return $this->belongsTo('App\CartItems','cart_id','cart_id')->with('cartitemcolor');
	}

	
}

