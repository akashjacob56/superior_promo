<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscountApply extends Model
{
    //

     public $primaryKey='discount_apply_id';

     public function discount(){
		return $this->belongsTo('App\Discount','discount_id','discount_id');
	}
	public function product(){
		return $this->hasOne('App\Product','product_id','applies_on_id')->with('default_product_translation');
	}

	public function category(){
		return $this->hasOne('App\Category','category_id','applies_on_id')->with('default_category_translation');
	}
}
