<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscountCustomerApply extends Model
{
    //
    public $primaryKey='discount_customer_apply_id';
    public function discount(){
		return $this->belongsTo('App\Discount','discount_id','discount_id');
	}
	public function customer(){
		return $this->hasOne('App\User','id','customer_id');
	}
}
