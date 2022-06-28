<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
class CartItemSizeGroups extends Model{	
public $primaryKey='id';
protected $table="cart_item_size_groups";

	public function cartitemsize(){
		return $this->belongsTo('App\CartItemSizes','id','cart_item_size_group_id');
	}

}

