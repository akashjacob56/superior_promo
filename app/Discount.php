<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    //
    public $primaryKey='discount_id';

    public function discount_types(){
		return $this->belongsTo('App\DiscountType','discount_type_id','discount_type_id');
	}
	public function discount_apply(){
		return $this->belongsTo('App\DiscountApply','discount_apply_id','discount_apply_id');
	}
	public function discount_customer_apply(){
		return $this->belongsTo('App\DiscountCustomerApply','discount_customer_apply_id','discount_customer_apply_id');
	}


	public static $rules=[
	'discount_code'=>'required',
	'discount_type_id'=>'required',
	'discount_value'=>'required|integer',
	'applies_to_id'=>'required',
	'minimum_purchase_amount'=>'required|numeric',
	'customer_eligibility_id'=>'required',
	'start_date'=> 'required|date|date_format:Y-m-d|after:yesterday',
	'start_time'=>'required',
	'end_date'=>'required|date|date_format:Y-m-d|after_or_equal:start_date',
	'end_time'=>'required'	
	];

	public static $edit=[
	'discount_code'=>'required',
	'discount_type_id'=>'required',
	'discount_value'=>'required|integer',
	'applies_to_id'=>'required',
	'minimum_purchase_amount'=>'required|numeric',
	'customer_eligibility_id'=>'required',
	'start_date'=> 'required|date|date_format:Y-m-d|after:yesterday',
	'start_time'=>'required',
	'end_date'=>'required|date|date_format:Y-m-d|after_or_equal:start_date',
	'end_time'=>'required'	
	];


}
