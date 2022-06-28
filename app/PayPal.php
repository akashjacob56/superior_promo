<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayPal extends Model
{
	public static $addRule=[
		'client_id'=>'required',
		'secret'=>'required',
		'paypal_mode'=>'required',
	];
}
