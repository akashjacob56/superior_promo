<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DataTables;
use App\City;
use App\State;
use App\Country;
use App\Area;
use App\Pincode;
use Config;

class UserController extends Controller{

	/*public function getDashboard(){
		
		return view('user.dashboard');
	}*/

	public function redirectHome($url){
		
		return redirect('admin/analytics/dashboard');
	}

	public function getAddUser(){
		if(!$this->checkPermission(Config::get('permissions.SUBSELLER_DETAILS'))){
			return view('user.unauthorized');
		}
		$business_id=$this->getBusinessId();
		$cities=City::where('city_id','!=',1)->where('status_id',1)->with('default_city_translation')->get();
		$states=State::where('state_id','!=',1)->where('status_id',1)->with('default_state_translation')->get();
		$countries=Country::where('country_id','!=',1)->where('status_id',1)->with('default_country_translation')->get();
		$pincodes=Pincode::where('pincode_id','!=',1)->get();   
		$areas=Area::where('area_id','!=',1)->with('default_area_translation')->get();
		return view('user.add')->with('cities',$cities)->with('states',$states)->with('countries',$countries)->with('pincodes',$pincodes)->with('areas',$areas);
	}

	public function postAddUser(Request $request){
		if(!$this->checkPermission(Config::get('permissions.SUBSELLER_DETAILS'))){
			return view('user.unauthorized');
		}
		$business_id=$this->getBusinessId();
		$this->validate($request,User::$rule);
		$this->validate($request,['email' => 'unique:users,email,NULL,id,business_id,' . $business_id]);

		$user = new User();	
		$user->business_id=$business_id;	
		$user->role_id=2;
		$user->name=$request->name;
		$user->email=$request->email;
		$user->password=$request->password;
		$user->contact_number=$request->contact_number;
		$user->address=$request->address;
		$user->pincode=$request->pincode;

		if(isset($request->dob)){
			$user->dob=$request->dob;

		}
		$city_name=$request->city_name;
		$state_name=$request->state_name;
		$country_name=$request->country_name;
		
		if($city_name!=""){
			$city=City::where('city_name',$city_name)->first();
			if($city==""){
				$city=new City();
				$city->city_name=$city_name;
				$city->business_id=$business_id;
				$city->save();
				$city_id=$city->city_id;
			}else{
				$city_id=$city->city_id;
			}
		}

		if($state_name!=""){
			$state=State::where('state_name',$state_name)->first();
			if($state==""){
				$state=new State();
				$state->state_name=$state_name;
				$state->business_id=$business_id;
				$state->save();
				$state_id=$state->state_id;
			}else{
				$state_id=$state->state_id;
			}
		}

		if($country_name!=""){
			$country=Country::where('country_name',$country_name)->first();
			if($country==""){
				$country=new Country();
				$country->country_name=$country_name;
				$country->save();
				$country_id=$country->country_id;
			}else{
				$country_id=$country->country_id;
			}
		}
		$user->city_id=$city_id;
		$user->state_id=$state_id;
		$user->country_id=$country_id;
		$user->save();
		flash('User added successfully...'); 
		return redirect('user/all'); 

		
	}
	public function getAllUser(Request $request){
		if(!$this->checkPermission(Config::get('permissions.SUBSELLER_DETAILS'))){
			return view('user.unauthorized');
		}
		return view::make('user.all');
	}

	public function getAllUserData(Request $request){
		if(!$this->checkPermission(Config::get('permissions.SUBSELLER_DETAILS'))){
			return view('user.unauthorized');
		}
		$business_id=$this->getBusinessId();
		$user=User::get();
		return DataTables::of($user)->make(true);
	}

	public function getUser($id){
		if(!$this->checkPermission(Config::get('permissions.SUBSELLER_DETAILS'))){
			return view('user.unauthorized');
		}
		$business_id=$this->getBusinessId();
		$user=User::find($id);
		if($user!=""){
			return view("user.details")->with('user',$user);
		}else{
			return redirect('user/all');
		}
	}

	public function postUser(Request $request){
		if(!$this->checkPermission(Config::get('permissions.SUBSELLER_DETAILS'))){
			return view('user.unauthorized');
		}
		$business_id=$this->getBusinessId();
		
		$this->validate($request,User::$rules);
		$id=$request->id;
		$user=User::find($id);
		$this->validate($request,['email' => 'unique:users,email,NULL,id,business_id,id' . $business_id.$id]);
		
		if(isset($request['save'])){
			if($user!=""){

				$user->name=$request->name;
				$user->email=$request->email;
				$user->password=$request->password;
				$user->contact_number=$request->contact_number;
				$user->address=$request->address;
				$user->pincode=$request->pincode;				
				flash('User updated successfully');
			}else{
				return redirect('user/all');
			}
			$user->save();
			return redirect("user/all");
		}

	}
}
