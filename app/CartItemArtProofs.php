<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
class CartItemArtProofs extends Model{
public $primaryKey='id';

	public function cartitem(){
		return $this->belongsTo('App\CartItems','cart_item_id','id')->with('product');
	}

}
