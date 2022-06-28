<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AUth;
use App\User;
use Hash;
use Session;
use App\Business;
use App\ShippingCharge;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $request = app(\Illuminate\Http\Request::class);
        $host = $request->getHttpHost();
        $this->host=$host;


       

        

      
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
     //Chnage Password
    public function getChangePassword(){
        
        $loginUserId=Auth::user();
        return view('auth.passwords.changePassword')->with('user',$loginUserId);
    }

    public function barcode(){
        
        return view('barcode');
    }

    public function postChangePassword(Request $request){

        $this->validate($request,User::$changePassword);

        $user=Auth::user();
        $data=$request->all();
        $currentPassword=$data['password'];
        $newPassword=$data['new_password'];
        $confirmPassword=$data['confirm_password'];
        $loginUserPassword=$user->password;
        if (Hash::check($currentPassword, $loginUserPassword)){ 
            $updatePassword=Hash::make($newPassword);
            $user->password=$updatePassword;
            $user->save();
            flash('Password changed successfully');
        }
        else
        {
            flash('Current password doen not match');
        }
        return redirect('profile');
    }
public function getShippingCharge(Request $request){

    $shipping_charge=ShippingCharge::first();
   
    return view('setting.shipping')->with('shipping_charge',$shipping_charge);

    }

    public function postShippingCharge(Request $request){

    $shipping_charge=ShippingCharge::first();
    $shipping_charge->greater_amount_shipping=$request->greater_amount_shipping;
     $shipping_charge->shipping_order_amount=$request->shipping_order_amount;
      $shipping_charge->smaller_amount_shipping=$request->smaller_amount_shipping;
     $shipping_charge->save();

    return redirect()->back();

    }
}
