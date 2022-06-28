<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model{
	public $primaryKey='business_id';

	public static $businessrules=[
	'version'=>'required',
	'package_name'=>'required|unique:businesses,package_name',
	'sub_domain'=>'required|unique:businesses,sub_domain',
	'domain'=>'required|unique:businesses,domain',
	'start_date'=>'required',
	'end_date'=>'required',
	'business_name'=>'required',
	'name'=>'required',
	'email'=>'required',
	'contact_number'=>'required',
	'address'=>'required',
	'product_count'=>'required',
	'password'=>'required',
	'confirm_password' => 'required|same:password',
	];

	public static $businessRefferalrules=[
	'registration_amount'=>'required|numeric|min:0|max:99999999999',
	'order_refferal_amount'=>'required|numeric|min:0|max:99999999999',
	'refferal_registration_amount'=>'required|numeric|min:0|max:99999999999',

	];



	public static $businessEditrules=[
	'version'=>'required',
	'package_name'=>'required',
	'sub_domain'=>'required',
	'domain'=>'required',
	'start_date'=>'required',
	'last_renew_date'=>'required',
	'product_count'=>'required',
	'end_date'=>'required',
	];

	public function themes(){
		return $this->belongsTo('App\Theme','theme_id','theme_id');
	}
}
