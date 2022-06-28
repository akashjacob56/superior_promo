<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderLabel extends Model
{
    
    public $primaryKey='order_label_id';

	public static $translation=[

		'delivery_details'=>'required|max:100',  
		'select_delivery_address'=>'required|max:100', 
		'new_address'=>'required|max:100',  
		'name'=>'required|max:100',  
		'mobile_number'=>'required|max:100',  
		'email'=>'required|max:100',  
		'password'=>'required|max:100',  
		'address'=>'required|max:100',  
		'pincode'=>'required|max:100',  
		'gst_number'=>'required|max:100',  
		'DOB'=>'required|max:100', 
		'amount'=>'required|max:100',  
		'cash_on_delivery'=>'required|max:100',  
		'pay_now'=>'required|max:100',  
		'order_id'=>'required|max:100',  
		'order_detail'=>'required|max:100',   
		'cancel_order'=>'required|max:100', 
		'need_help'=>'required|max:100',
		'shipping_details'=>'required|max:100',
		'item_count'=>'required|max:100',
		'payment_mode'=>'required|max:100',
		'order_cancel_msg'=>'required|max:100',
		'confirm'=>'required|max:100',
		'ordered'=>'required|max:100',
		'gst'=>'required|max:100',
		'order_failed'=>'required|max:100',
		'order_failed_msg'=>'required|max:100',
		'order_success'=>'required|max:100',
		'order_success_msg'=>'required|max:100',
		'empty_order_title'=>'required|max:100',
		'empty_order_description'=>'required|max:100',
		'place_order'=>'required|max:100',
		'total_amount_to_be_pay'=>'required|max:100',
		'change_delivery_details'=>'required|max:100',
		'yes'=>'required|max:100',
		'no'=>'required|max:100',
		'confirm_your_order'=>'required|max:100',
		'select'=>'required|max:100',
		'please_enter_new_delivery_details'=>'required|max:100',
		'please_provide_rating'=>'required|max:100',
		'change'=>'required|max:100',
		'add_new_address'=>'required|max:100',
		'select_country'=>'required|max:100',
		'select_state'=>'required|max:100',
		'select_city'=>'required|max:100',
		'select_pincode'=>'required|max:100',
		'select_area'=>'required|max:100',
		'change_pincode'=>'required|max:100',

		'please_select_country_from_list'=>'required|max:100',
		'please_select_state_from_list'=>'required|max:100',
		'please_select_city_from_list'=>'required|max:100',
		'please_select_pincode_from_list'=>'required|max:100',
		'please_select_area_from_list'=>'required|max:100',
		'continue_with'=>'required|max:100',
		'enter_delivery_pincode'=>'required|max:100',
		'enter_pincode'=>'required|max:100',

	];

	public function language(){
		return $this->belongsTo('App\Language','language_id','language_id')->with('default_language_translation');
	}
}
