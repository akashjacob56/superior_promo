<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DataTables;
use Hash;
use App\City;
use App\State;
use App\Country;
use App\Address;
use Config;
use Auth;
use App\Pincode;
use App\Area;
use App\ApplicationAppearance;

use App\CountryTranslation;
use App\StateTranslation;
use App\CityTranslation;
use App\AreaTranslation;
use App\RegistrationSetting;

class SubadminController extends Controller{

	public function getAddSubadmin(){

		if(!$this->appearance->is_subadmin==1){
			return view('user.unauthorized');
		}

		if(!$this->checkPermission(Config::get('permissions.SUBADMIN_ADD'))){
			return view('user.unauthorized');
		}
		$business_id=$this->getBusinessId();

		$cities=City::where('city_id','!=',1)->where('status_id',1)->with('default_city_translation')->get();
		$states=State::where('state_id','!=',1)->where('status_id',1)->with('default_state_translation')->get();
		$countries=Country::where('country_id','!=',1)->where('status_id',1)->with('default_country_translation')->get();
		

		$country_names=CountryTranslation::where('country_id','!=',1)->pluck('country_name');
		$state_names=StateTranslation::where('state_id','!=',1)->pluck('state_name');
		$city_names=CityTranslation::where('city_id','!=',1)->pluck('city_name');
		$pincodes=Pincode::where('pincode_id','!=',1)->pluck('pincode');
		$areas=AreaTranslation::where('area_id','!=',1)->pluck('area');

		return view('subadmin.add')->with('cities',$cities)->with('states',$states)->with('countries',$countries)->with('pincodes',$pincodes)->with('areas',$areas)->with('country_names',$country_names)->with('state_names',$state_names)->with('city_names',$city_names);
	}

	public function postAddSubadmin(Request $request){
		if(!$this->appearance->is_subadmin==1){
			return view('user.unauthorized');
		}

		if(!$this->checkPermission(Config::get('permissions.SUBADMIN_ADD'))){
			return view('user.unauthorized');
		}
		$business_id=$this->getBusinessId();
		$post=$request->all();
		$this->validate($request,User::$subadminAddRule);

		$this->validate($request,User::$subsellerAddRule);
		$this->validate($request,['email' => 'unique:users,email,NULL,id,business_id,' . $business_id]);
		$this->validate($request,['contact_number' => 'unique:users,contact_number,NULL,id,business_id,' . $business_id]);

		$subadmin= new User();
		$subadmin->business_id=$business_id;
		$subadmin->seller_id=Auth::user()->seller_id;
		$subadmin->business_name=$request->business_name;
		
		$subadmin->name=$request->name;
		$subadmin->email=$request->email;
		$subadmin->contact_number=$request->contact_number;
		$subadmin->optional_contact_number=$request->optional_contact_number;
		$subadmin->DOB=$request->DOB;

		$password = Hash::make($request->password);
		$subadmin->password=$password;
		$subadmin->gst_number=$request->gst_number;		
		//$subadmin->token=$request->token;
		$subadmin->remember_token=$request->remember_token;	
		$subadmin->role_id=3;
		$subadmin->save();



		$pincode_id=1;
		$city_id=1;
		$state_id=1;
		$country_id=1;
		$area_id=1;

		

		$registration_setting=RegistrationSetting::first();

		if($registration_setting->is_country==1){
			$this->validate($request,User::$country_id_required);
		}
		if($registration_setting->is_state==1){
			$this->validate($request,User::$state_id_required);
		}
		if($registration_setting->is_city==1){
			$this->validate($request,User::$city_id_required);
		}
		if($registration_setting->is_pincode==1){
			$this->validate($request,User::$pincode_required);
		}
		if($registration_setting->is_area==1){
			$this->validate($request,User::$area_required);
		}

		if($request->country_id){
			$country_id=$post['country_id'];
		}
		
		if($request->state_name){
			$state_name=$post['state_name'];

			$existing_state=StateTranslation::where('state_name',$state_name)->first();
			if ($existing_state=="") {
				$state = new State();
				$state->country_id=$country_id;	
				$state->business_id=$business_id;
				$state-> save();

				$state_translation= new StateTranslation();
				$state_translation->business_id=$business_id;
				$state_translation->state_id=$state->state_id;
				$state_translation->language_id=$request->language_id;
				$state_translation->state_name=$request->state_name;

				$state_translation->save();

				$state->state_translation_id=$state_translation->state_translation_id;						
				$state->save();
				$state_id=$state->state_id;
			}else{
				$state_id=$existing_state->state_id;
			}
		}

		if($request->city_name){
			$city_name=$post['city_name'];

			$existing_city=CityTranslation::where('city_name',$city_name)->first();
			if ($existing_city=="") {

				$city = new City();
				$city->business_id=$business_id;
				$city->state_id=$state_id;	
				$city-> save();

				$city_translation= new CityTranslation();
				$city_translation->business_id=$business_id;
				$city_translation->city_id=$city->city_id;
				$city_translation->language_id=$request->language_id;
				$city_translation->city_name=$request->city_name;

				$city_translation->save();

				$city->city_translation_id=$city_translation->city_translation_id;						
				$city->save();
				$city_id=$city->city_id;
			}else{
				$city_id=$existing_city->city_id;
			}
		}

		if($request->pincode){
			$pincode=$post['pincode'];

			$existing_pincode=Pincode::where('pincode',$pincode)->first();
			if ($existing_pincode=="") {
				$pincode = new Pincode();
				$pincode->business_id=$business_id;		

				$pincode->pincode=$request->pincode;
				$pincode->save();
				$pincode_id=$pincode->pincode_id;
			}else{
				$pincode_id=$existing_pincode->pincode_id;
			}
		}

		if($request->area_name){
			$area_name=$post['area_name'];

			$existing_area=AreaTranslation::where('area',$area_name)->first();
			if ($existing_area=="") {

				$pincodearea = new Area();
				$pincodearea->business_id=$business_id;	
				$pincodearea->pincode_id=$pincode_id;	
				$pincodearea-> save();

				$pincode_area_translation= new AreaTranslation();
				$pincode_area_translation->business_id=$business_id;	
				$pincode_area_translation->area_id=$pincodearea->area_id;
				$pincode_area_translation->language_id=$request->language_id;
				$pincode_area_translation->area=$request->area_name;

				$pincode_area_translation->save();

				$pincodearea->area_translation_id=$pincode_area_translation->area_translation_id;						
				$pincodearea->save();
				$area_id=$pincodearea->area_id;
			}else{
				$area_id=$existing_area->area_id;
			}
		}

		$address=new Address();
		$address->user_id=$subadmin->id;
		$address->address=$request->address;
		$address->name=$request->name;
		$address->email=$request->email;		
		$address->contact_number=$request->contact_number;
		$address->pincode_id=$pincode_id;
		$address->city_id=$city_id;
		$address->state_id=$state_id;
		$address->country_id=$country_id;
		$address->area_id=$area_id;
		$address->save();

		$subadmin->address_id=$address->address_id;
		$subadmin->save();

		flash('Sub admin added successfully');
		return redirect('admin/subadmin/all');
	}

	public function getAllSubadmins(Request $request){	
		if(!$this->appearance->is_subadmin==1){
			return view('user.unauthorized');
		}
		if(!$this->checkPermission(Config::get('permissions.SUBADMIN_ALL'))){
			return view('user.unauthorized');
		}
		return view('subadmin.all');
	}

	public function getAllSubadminData(){
		if(!$this->appearance->is_subadmin==1){
			return view('user.unauthorized');
		}
		if(!$this->checkPermission(Config::get('permissions.SUBADMIN_ALL'))){
			return view('user.unauthorized');
		}
		$business_id=$this->getBusinessId();
		
		$subadmins=User::where('role_id',3)->with('status');
		return DataTables::of($subadmins)->make(true);  
	}

	public function getSubadmin(Request $request){
		if(!$this->appearance->is_subadmin==1){
			return view('user.unauthorized');
		}
		if(!$this->checkPermission(Config::get('permissions.SUBADMIN_DETAILS'))){
			return view('user.unauthorized');
		}
		$business_id=$this->getBusinessId();
		$subadmin_id=$request->id;
		$subadmin=User::with('city')->with('state')->with('country')->find($subadmin_id);
		$address=Address::where('user_id',$subadmin_id)->first();
		if($subadmin!=""){
			
			$cities=City::where('city_id','!=',1)->where('status_id',1)->with('default_city_translation')->get();
			$states=State::where('state_id','!=',1)->where('status_id',1)->with('default_state_translation')->get();
			$countries=Country::where('country_id','!=',1)->where('status_id',1)->with('default_country_translation')->get();


			$country_names=CountryTranslation::where('country_id','!=',1)->pluck('country_name');
			$state_names=StateTranslation::where('state_id','!=',1)->pluck('state_name');
			$city_names=CityTranslation::where('city_id','!=',1)->pluck('city_name');
			$pincodes=Pincode::where('pincode_id','!=',1)->pluck('pincode');
			$areas=AreaTranslation::where('area_id','!=',1)->pluck('area');
			return view('subadmin.details')->with('subadmin',$subadmin)->with('cities',$cities)->with('states',$states)->with('countries',$countries)->with('pincodes',$pincodes)->with('areas',$areas)->with('country_names',$country_names)->with('state_names',$state_names)->with('city_names',$city_names)->with('address',$address);
		}else{
			return redirect('admin/subadmin/all');
		}
	}

	public function postSubadmin(Request $request){

		if(!$this->appearance->is_subadmin==1){
			return view('user.unauthorized');
		}
		if(!$this->checkPermission(Config::get('permissions.SUBADMIN_UPDATE'))){
			return view('user.unauthorized');
		}
		$business_id=$this->getBusinessId();
		$subadmin_id=$request->id;
		$subadmin=User::find($subadmin_id);

		if(isset($request['save'])){

			$this->validate($request,User::$subadminEditRule);

			$this->validate($request,['email' => 'unique:users,email,NULL,id,business_id,id' . $business_id.$subadmin_id]);
			$this->validate($request,['contact_number' => 'unique:users,contact_number,NULL,id,business_id,id' . $business_id.$subadmin_id]);

			if($subadmin!=""){

				$subadmin->name=$request->name;

				$subadmin->business_name=$request->business_name;
				$subadmin->email=$request->email;
				if($request->password!="" && $request->confirm_password!=""){
					$this->validate($request,['password'=>'max:20|min:6']);
					$password = Hash::make($request->password);
					$subadmin->password=$password;
				}	
				$subadmin->contact_number=$request->contact_number;
				$subadmin->optional_contact_number=$request->optional_contact_number;

				$subadmin->DOB=$request->DOB;
				$subadmin->gst_number=$request->gst_number;
				//$subadmin->token=$request->token;
				$subadmin->remember_token=$request->remember_token;
				$subadmin->save();

				$post=$request->all();
				$pincode_id=1;
				$city_id=1;
				$state_id=1;
				$country_id=1;
				$area_id=1;

				$registration_setting=RegistrationSetting::first();

				if($registration_setting->is_country==1){
					$this->validate($request,User::$country_id_required);
				}
				if($registration_setting->is_state==1){
					$this->validate($request,User::$state_id_required);
				}
				if($registration_setting->is_city==1){
					$this->validate($request,User::$city_id_required);
				}
				if($registration_setting->is_pincode==1){
					$this->validate($request,User::$pincode_required);
				}
				if($registration_setting->is_area==1){
					$this->validate($request,User::$area_required);
				}

				if($request->country_id){
					$country_id=$post['country_id'];
				}

				if($request->state_name){
					$state_name=$post['state_name'];

					$existing_state=StateTranslation::where('state_name',$state_name)->first();
					if ($existing_state=="") {
						$state = new State();
						$state->business_id=$business_id;
						$state->country_id=$country_id;	
						$state-> save();

						$state_translation= new StateTranslation();
						$state_translation->business_id=$business_id;
						$state_translation->state_id=$state->state_id;
						$state_translation->language_id=$request->language_id;
						$state_translation->state_name=$request->state_name;

						$state_translation->save();

						$state->state_translation_id=$state_translation->state_translation_id;						
						$state->save();
						$state_id=$state->state_id;
					}else{
						$state_id=$existing_state->state_id;
					}
				}

				if($request->city_name){
					$city_name=$post['city_name'];

					$existing_city=CityTranslation::where('city_name',$city_name)->first();
					if ($existing_city=="") {

						$city = new City();
						$city->state_id=$state_id;
						$city->business_id=$business_id;	
						$city-> save();

						$city_translation= new CityTranslation();
						$city_translation->business_id=$business_id;
						$city_translation->city_id=$city->city_id;
						$city_translation->language_id=$request->language_id;
						$city_translation->city_name=$request->city_name;

						$city_translation->save();

						$city->city_translation_id=$city_translation->city_translation_id;						
						$city->save();
						$city_id=$city->city_id;
					}else{
						$city_id=$existing_city->city_id;
					}
				}

				if($request->pincode){
					$pincode=$post['pincode'];

					$existing_pincode=Pincode::where('pincode',$pincode)->first();
					if ($existing_pincode=="") {
						$pincode = new Pincode();+
						$pincode->business_id=$business_id;		

						$pincode->pincode=$request->pincode;
						$pincode->save();
						$pincode_id=$pincode->pincode_id;
					}else{
						$pincode_id=$existing_pincode->pincode_id;
					}
				}

				if($request->area_name){
					$area_name=$post['area_name'];

					$existing_area=AreaTranslation::where('area',$area_name)->first();
					if ($existing_area=="") {

						$pincodearea = new Area();
						$pincodearea->business_id=$business_id;	
						$pincodearea->pincode_id=$pincode_id;	
						$pincodearea-> save();

						$pincode_area_translation= new AreaTranslation();
						$pincode_area_translation->business_id=$business_id;	
						$pincode_area_translation->area_id=$pincodearea->area_id;
						$pincode_area_translation->language_id=$request->language_id;
						$pincode_area_translation->area=$request->area_name;

						$pincode_area_translation->save();

						$pincodearea->area_translation_id=$pincode_area_translation->area_translation_id;						
						$pincodearea->save();
						$area_id=$pincodearea->area_id;
					}else{
						$area_id=$existing_area->area_id;
					}
				}

				$address=Address::where('user_id',$subadmin_id)->first();
				//$address->user_id=$admin->id;
				$address->user_id=$subadmin->id;
				$address->address=$request->address;
				$address->name=$request->name;
				$address->email=$request->email;		
				$address->contact_number=$request->contact_number;
				$address->pincode_id=$pincode_id;
				$address->city_id=$city_id;
				$address->state_id=$state_id;
				$address->country_id=$country_id;
				$address->area_id=$area_id;
				$address->save();
				
				flash('Sub admin updated successfully');	
			}else{
				return redirect('admin/subadmin/all');
			}
		}else if(isset($request['active'])){
			flash('Sub admin activated successfully');
			$subadmin->status_id=1;
		}else if(isset($request['inactive'])){
			flash('Sub admin inactivated successfully');
			$subadmin->status_id=2;	
		}

		$subadmin->save();	

		return redirect('admin/subadmin/all');
	}
}
