<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
class Cart extends Model{
	
	
	

	public function sku(){
		return $this->belongsTo('App\Sku','sku_id','sku_id')->with('product');
	}



	public function user(){
		return $this->belongsTo('App\User','user_id','id');
	}

	public function user_guest(){
		return $this->belongsTo('App\User','user_id','id');
	}

		public function cart_item(){
		return $this->belongsTo('App\CartItems','id','cart_id')->with('product')->with('cartitemcolor')->with('cartitemimprint');
	}

	
}
