<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Razorpay extends Model
{
    //

     public static $addRule=[
    	'account_number'=>'required',
    	'merchant_id'=>'required',
    	'merchant_key'=>'required',
    	
    ];
}
