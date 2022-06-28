<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paytm extends Model
{
    //

     public static $addRule=[
    	
    	'merchant_id'=>'required',
    	'merchant_key'=>'required',
    	
    ];
}
