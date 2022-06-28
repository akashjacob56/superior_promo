<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $redirectTo ="admin/home";


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->redirectTo=url()->previous();
    }


    public function socialLogin($social){
    
      return Socialite::driver('google')->redirect();

   }


   public function handleProviderCallback($provider)
   {
     

     $request = app(\Illuminate\Http\Request::class);

      if (!$request->has('code') || $request->has('denied')) {
            return redirect('/');
        }

    $user = Socialite::driver($provider)->stateless()->user();
    
    $authUser = $this->findOrCreateUser($user, $provider);

    Auth::loginUsingId($authUser->id);
    return redirect($this->redirectTo);
  }

  public function findOrCreateUser($user, $provider)
  {

    $authUser = User::where('email', $user->email)->first();
    if ($authUser) {
        $authUser->is_varified=1;
        $authUser->save();
      
      return $authUser;
    }else{
      
      $new_user=new User();
     
      $new_user->is_varified=1;
      $new_user->name=$user->name;
      $new_user->email=$user->email;
      if($user->email!=""){
        $new_user->contact_number=$user->email;
      }
      $new_user->role_id=3;
      $password = $this->RandomStringGenerator(8);
      $hashPassword=Hash::make($password);
      $new_user->password=$hashPassword;
      $new_user->save();

      $pincode_id=1;
      $city_id=1;
      $state_id=1;
      $country_id=1;
      $area_id=1;

      $addresses=new Address();
      $addresses->user_id=$new_user->id;

      $addresses->name=$user->name;
      if($user->email!="" ){
        $addresses->contact_number=$user->email;
        $addresses->email=$user->email;
      }
      
      $addresses->contact_number=$user->email;
      $addresses->pincode_id=$pincode_id;
      $addresses->country_id=$country_id;
      $addresses->state_id=$state_id;
      $addresses->city_id=$city_id;
      $addresses->area_id=$area_id;
      $addresses->save();

      $new_user->address_id=$addresses->address_id;
      $new_user->save();

      return $new_user;
    }

}


}

