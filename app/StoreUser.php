<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\StoreUser;

class StoreUser extends Model
{	
	public $primaryKey='store_user_id';

	public function user(){
		return $this->belongsTo('App\User','user_id','id');
	}

	public static $addRule=[
	'name' => 'required',
	'seller_id' => 'required',
	'role_id' =>'required',
	'contact_number'=>'required|',
	'email' => 'required',
	'password' => 'required|max:20|min:6',
	'confirm_password' => 'required|max:20|same:password'
	];

	public static $editRule=[
	'name' => 'required',
	'seller_id' => 'required',
	'contact_number'=>'required',
	'email' => 'required',
	'password' => 'max:20',
	'confirm_password' => 'max:20|same:password'
	];

	public static $assgnUser=[
	'user_id'=>'required',
	];

	public function store(){
        return $this->belongsTO('App\Store','store_id','store_id');
    }
}
