<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayUMoney extends Model
{
    public static $addRule=[
    	'account_number'=>'required',
    	'merchant_id'=>'required',
    	'merchant_key'=>'required',
    	'salt'=>'required',
    ];

    public $table="pay_u_moneys";
}
