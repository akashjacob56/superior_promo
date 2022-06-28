<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
	
	public $primaryKey='store_id';

	public function seller(){
		return $this->hasOne('App\User','seller_id','seller_id');
	}

	public function storeuser(){
		return $this->hasMany('App\StoreUser','store_id','store_id')->with('user');
	}

	
	public function status(){
		return $this->belongsTo('App\Status','status_id','status_id');
	}

	public static $rules=[
		'store_name' => 'required', 
		'contact_number'=>'required',
		'email' => 'required|email|unique:stores',
		'address'=>'required',
		'seller_id'=>'required',
		'branch_name'=>'required'
	];

	public static $editRules=[
		'store_name' => 'required', 
		'contact_number'=>'required',
		'email' => 'required',
		'address'=>'required',
		'seller_id'=>'required',
		'branch_name'=>'required'
	];

}
