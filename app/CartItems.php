<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
class CartItems extends Model{	
public $primaryKey='id';

public function product(){
		return $this->belongsTo('App\Product','product_id','product_id')->with('product_translation')->with('default_product_translation_full')->with('product_prices')->with('sku')->with('product_color_group');
	}
	

	public function cartitemcolor(){
		return $this->belongsTo('App\CartItemColors','id','cart_item_id');
	}


	public function cartitemimprint(){
	return $this->hasMany('App\CartItemImprints','cart_item_id','id')->with('cart_item_imprint_color')->with('cartitemimprintcolors');
	}
	//cartitemimprintcolors akshay

}
