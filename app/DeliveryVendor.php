<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryVendor extends Model
{

	public $primaryKey='delivery_vendor_id';
	public static $deliveryVendorAddRule=[
		'name'=>'required|max:40|unique:delivery_vendors,delivery_vendor_name|min:2|regex:/^[a-zA-Z ]{2,40}$/',    
		'email'=>'email|max:40|nullable|regex:/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/',
		'contact_number'=>'numeric|digits_between:10,15|nullable',
	];
}
