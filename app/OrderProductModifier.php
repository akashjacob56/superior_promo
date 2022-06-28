<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProductModifier extends Model
{
    public $primaryKey='order_product_modifier_id';

    public function modifier_category(){
    	return $this->hasOne('App\ModifierCategory','modifier_category_id','modifier_category_id');
    }

    public function modifiers(){
    	return $this->hasOne('App\Modifier','modifier_id','modifier_id');
    }

    public function product(){
		return $this->belongsTo('App\Product','product_id','product_id')->with('default_product_translation')->with('order_product_sale')->with('sku')->with('return_policy');
	}
}
