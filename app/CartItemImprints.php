<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
class CartItemImprints extends Model{
  public $primaryKey='id';

  	public function cart_item_imprint_color(){
		return $this->hasMany('App\CartItemImprintColors','cart_item_imprint_id','id');
	}

	public function cartitemimprintcolors(){
  	return $this->hasMany('App\CartItemImprintColors','cart_item_imprint_id','id');
  }
  
}

