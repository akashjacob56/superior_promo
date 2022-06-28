<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorCall extends Model
{
	public $primaryKey='vendor_call_id';


    public static $add=[
		 'name'=> 'required',
		 'contact_number'=>'required|numeric|digits_between:10,15',
		 'area_id'=> 'required',
		 'item_id'=> 'required',
	];

	public static $edit=[
		  'name'=> 'required',
		  'contact_number'=>'required|numeric|digits_between:10,15',
		  'area_id'=> 'required',
		  'item_id'=> 'required',
	];
}
