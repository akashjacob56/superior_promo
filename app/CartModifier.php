<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartModifier extends Model
{
    public $primaryKey='cart_modifier_id';
	
	public function cart(){
		return $this->belongsTo('App\Cart','cart_id','cart_id');
	}
	public function modifier(){
		return $this->belongsTo('App\Modifier','modifier_id','modifier_id');
	}
}
