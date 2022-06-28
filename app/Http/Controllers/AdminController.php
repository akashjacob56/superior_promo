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
use App\SellerAppearance;
use App\Pincode;
use App\Area;
use Auth;
use App\CountryTranslation;
use App\StateTranslation;
use App\CityTranslation;
use App\AreaTranslation;
use App\RegistrationSetting;
use Mail;
use App\NewsLetter;
class AdminController extends Controller
{


public function getAdminLogin(){
return view('auth.adminlogin');

}
	public function getAddAdmin(){
		if(!$this->checkPermission(Config::get('permissions.ADMIN_ADD'))){
			return view('user.unauthorized');
		}
		
		$cities=City::where('city_id','!=',1)->where('status_id',1)->with('default_city_translation')->get();
		$states=State::where('state_id','!=',1)->where('status_id',1)->with('default_state_translation')->get();
		$countries=Country::where('country_id','!=',1)->where('status_id',1)->with('default_country_translation')->get();
		

		$country_names=CountryTranslation::where('country_id','!=',1)->pluck('country_name');
		$state_names=StateTranslation::where('state_id','!=',1)->pluck('state_name');
		$city_names=CityTranslation::where('city_id','!=',1)->pluck('city_name');
		$pincodes=Pincode::where('pincode_id','!=',1)->pluck('pincode');
		$areas=AreaTranslation::where('area_id','!=',1)->pluck('area');


		return view('admin.add')->with('cities',$cities)->with('states',$states)->with('countries',$countries)->with('pincodes',$pincodes)->with('areas',$areas)->with('country_names',$country_names)->with('state_names',$state_names)->with('city_names',$city_names);
	}

       public function getAllNewsletter(){
		if(!$this->checkPermission(Config::get('permissions.CONTACT_US'))){
			return view('user.unauthorized');
		}
		return view('newsletter.all');
	}

	public function getAllNewsletterDetail(){
		
		$newsletter=NewsLetter::all();
		return DataTables::of($newsletter)->make(true);
	}
          

	public function postAddAdmin(Request $request){

		
		if(!$this->checkPermission(Config::get('permissions.ADMIN_ADD'))){
			return view('user.unauthorized');
		}
		

		$this->validate($request,User::$adminAddRule);
		$this->validate($request,['email' => 'unique:users']);
		$this->validate($request,['contact_number' => 'unique:users,contact_number']);

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
				$state->country_id=$country_id;	
					
				$state-> save();

				$state_translation= new StateTranslation();
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
					
				$city-> save();

				$city_translation= new CityTranslation();
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
				$pincodearea->pincode_id=$pincode_id;
					
				$pincodearea-> save();

				$pincode_area_translation= new AreaTranslation();
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
		
		
		$admin_id=Auth::user()->id;

		$admin=User::find($admin_id);
		
		$admin=new User();
		$this->validate($request,User::$adminAddRule);
		
		
		$admin->seller_id=2;
		$admin->name=$request->name;
		$admin->email=$request->email;
		$admin->contact_number=$request->contact_number;
		$admin->optional_contact_number=$request->optional_contact_number;
		$admin->DOB=$request->DOB;

		$password = Hash::make($request->password);
		$admin->password=$password;
		$admin->gst_number=$request->gst_number;		
		//$admin->token=$request->token;
		$admin->remember_token=$request->remember_token;
		$admin->role_id=2;		
		$admin->save();


		

		$address=new Address();
		$address->user_id=$admin->id;
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

		$admin->address_id=$address->address_id;

		
		$admin->save();

		flash('Admin added successfully');
		return redirect('admin/admin/all');
	}

	public function getAllAdmins(Request $request){	
		if(!$this->checkPermission(Config::get('permissions.ADMIN_ALL'))){
			return view('user.unauthorized');
		}
		return view('admin.all');
	}

	public function getAllAdminData(){
		if(!$this->checkPermission(Config::get('permissions.ADMIN_ALL'))){
			return view('user.unauthorized');
		}
		

		$admins=User::where('role_id',1)->with('status');
		return DataTables::of($admins)->make(true);  
	}

	public function getAdmin(Request $request){
		if(!$this->checkPermission(Config::get('permissions.ADMIN_DETAILS'))){
			return view('user.unauthorized');
		}

		
		$admin_id=$request->id;

		$admin=User::with('city')->with('state')->with('country')->with('pincode')->with('area')->find($admin_id);
		$address=Address::where('user_id',$admin_id)->first();
		if($admin!=""){
			$cities=City::where('city_id','!=',1)->where('status_id',1)->with('default_city_translation')->get();
			$states=State::where('state_id','!=',1)->where('status_id',1)->with('default_state_translation')->get();
			$countries=Country::where('country_id','!=',1)->where('status_id',1)->with('default_country_translation')->get();


			$country_names=CountryTranslation::where('country_id','!=',1)->pluck('country_name');
			$state_names=StateTranslation::where('state_id','!=',1)->pluck('state_name');
			$city_names=CityTranslation::where('city_id','!=',1)->pluck('city_name');
			$pincodes=Pincode::where('pincode_id','!=',1)->pluck('pincode');
			$areas=AreaTranslation::where('area_id','!=',1)->pluck('area');
			return view('admin.details')->with('cities',$cities)->with('states',$states)->with('countries',$countries)->with('pincodes',$pincodes)->with('areas',$areas)->with('country_names',$country_names)->with('state_names',$state_names)->with('city_names',$city_names)->with('admin',$admin)->with('address',$address);
		}else{
			return redirect('admin/admin/all');
		}
	}

	public function postAdmin(Request $request){
		if(!$this->checkPermission(Config::get('permissions.ADMIN_UPDATE'))){
			return view('user.unauthorized');
		}

		
		$admin_id=$request->id;
		$admin=User::find($admin_id);
		$post=$request->all();

		if(isset($request['save'])){

			// $this->validate($request,['email' => 'unique:users,email,NULL,id,business_id,id' . $admin_id]);
			// $this->validate($request,['contact_number' => 'unique:users,contact_number,NULL,id,business_id,id' . $admin_id]);

			$this->validate($request,User::$adminEditRule);

			
			

			if($admin!=""){

				$admin->name=$request->name;
				
				$admin->email=$request->email;
				if($request->password!="" && $request->confirm_password!=""){
					$this->validate($request,['password'=>'max:20|min:6']);
					$password = Hash::make($request->password);
					$admin->password=$password;
				}	
				$admin->contact_number=$request->contact_number;
				$admin->optional_contact_number=$request->optional_contact_number;

				$admin->DOB=$request->DOB;
				$admin->wallet=$request->wallet;
				$admin->gst_number=$request->gst_number;
				//$admin->token=$request->token;
				$admin->remember_token=$request->remember_token;
				$admin->save();
				
				

				$address=Address::where('user_id',$admin_id)->first();
				//$address->user_id=$admin->id;
				$address->user_id=$admin->id;
				$address->address=$request->address;
				$address->name=$request->name;
				$address->email=$request->email;		
				$address->contact_number=$request->contact_number;

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
						
						$state-> save();

						$state_translation= new StateTranslation();
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
						
						$city-> save();

						$city_translation= new CityTranslation();
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
						
						$pincodearea->pincode_id=$pincode_id;	
						$pincodearea-> save();

						$pincode_area_translation= new AreaTranslation();
						
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

				$address->pincode_id=$pincode_id;
				$address->city_id=$city_id;
				$address->state_id=$state_id;
				$address->country_id=$country_id;
				$address->area_id=$area_id;
				$address->save();
				
				$admin->address_id=$address->address_id;
				flash('Admin updated successfully');	
			}else{
				return redirect('admin/admin/all');
			}
		}else if(isset($request['active'])){
			flash('Admin activated successfully');
			$admin->status_id=1;
		}else if(isset($request['inactive'])){
			flash('Admin inactivated successfully');
			$admin->status_id=2;	
		}

		$admin->save();
		
		return redirect('admin/admin/all');
	}

	
}
