<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pincode extends Model{
	public $primaryKey='pincode_id';
	protected $table = "pincodes";
	
	
	public static $rules=[
		'pincode'=>'required|numeric|digits:6',
	];

	public static $editRules=[
		'pincode'=>'required|numeric|digits:6',
	];

	public function status(){
		return $this->belongsTo('App\Status','status_id','status_id');
	}
}
