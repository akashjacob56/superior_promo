<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	public $primaryKey='contact_id';
	protected $table="contacts";

	public static $rules=[
		'name'=>'required|max:40|min:2|regex:/^[a-zA-Z ]{2,40}$/',    
		'email'=>'required|email|max:40|regex:/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/',
		// 'contact_number'=>'required|numeric|digits_between:10,15',
		'subject' => 'required|max:255',
		'comment'=>'required|max:1000',
	];

	public static $address_rules=[
		'address' => 'required',
	];

}
