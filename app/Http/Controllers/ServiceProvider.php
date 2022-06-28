<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Address;

class ServiceProvider extends Controller
{
    public static function getViewAdress() {
        $user_id=Auth::user()->id;

$all_address=Address::where('user_id',$user_id)->where("is_billing",0)->orderBy('address_id','desc')->first();


return $all_address;
    }
}