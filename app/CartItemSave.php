<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
class CartItemSave extends Model{	
public $primaryKey='id';
protected $table="saved_cart_items";

public function cart_item(){
	return $this->belongsTo('App\CartItems','cart_item_id','id')->with('product');
}



}
