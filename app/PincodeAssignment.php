<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PincodeAssignment extends Model
{
	public $primaryKey='pincode_assignments_id';

	public function pincode(){
		return $this->belongsTo('App\Pincode','pincode_id','pincode_id');
	}

	public function User(){
		return $this->belongsTo('App\User','delivery_boy_id','id');
	}

	public static $addRule=[
		"pincode"=>"required|unique:pincodes,pincode",
		"delivery_boy"=>"required"
	];
}
