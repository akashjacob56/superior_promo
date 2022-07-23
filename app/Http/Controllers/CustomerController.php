<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use DataTables;
use Hash;
use App\City;
use App\State;
use App\Country;
use App\Order;
use DB;
use Config;
use App\Address;
use App\Pincode;
use App\Area;
use App\RegistrationSetting;
use App\CountryTranslation;
use App\StateTranslation;
use App\CityTranslation;
use App\AreaTranslation;
use App\WalletTransaction;
use Auth;
use App\Toast;
use App\RedeemRequest;
use App\Vendor;

class CustomerController extends Controller{



/*user login from backend*/

public function getUserLogin(Request $request){

    $user_id=$request->id;
    $user=User::where('id',$user_id)->first();
	if($user!=""){
	Auth::login($user);
	$user=Auth::user();
	return redirect("/");
	}
	else
	{
	return redirect()->back();
	}
}



/*for vendors*/  
public function postVendor(Request $request){
     

       	if(!$this->checkPermission(Config::get('permissions.VENDOR_DETAILS'))){
			return view('user.unauthorized');
		}

        $rule=[];
		$post=$request->all();
        $vendor=User::find($request->id);
        if(isset($request['save'])){
		$post=$request->all();
        $vendor=User::find($request->id);
		$vendor->name=$request->name;
		$vendor->email=$request->email;
		$vendor->contact_number=$request->contact_number;
		$password=Hash::make($request->password);

        if($request->password!=""){
         $vendor->password=$password;	
        }
        
		$vendor->role_id=4;
		$vendor->sage_id=$request->sage_id;	
		
        }

		else if(isset($request['active'])){
			flash('Customer activated successfully');
			$vendor->status_id=1;
		}else if(isset($request['inactive'])){
			flash('Customer inactivated successfully');
			$vendor->status_id=2;	
		}

		$vendor->save();

		flash('Vendor added successfully');
		return redirect('admin/vendor/all-vendor');
	}


  public function getVendor(Request $request){

  	    if(!$this->checkPermission(Config::get('permissions.VENDOR_DETAILS'))){
			return view('user.unauthorized');
		}

		$vendor_id=$request->id;
		$vendor=User::find($vendor_id);
		return view('customer.vendordetails')->with('vendor',$vendor);

	}


public function postAddVenodor(Request $request){


	  	if(!$this->checkPermission(Config::get('permissions.VENDOR_ADD'))){
			return view('user.unauthorized');
		}

		$rule=array();
		$arr=array();
		$result=array();
		
		$post=$request->all();

/*		$this->validate($request,User::$customerRule);
		$this->validate($request,['email' => 'unique:users,email']);
		$this->validate($request,['contact_number' => 'unique:users,contact_number']);*/

        $vendor=new User();
		$vendor->name=$request->name;
		$vendor->email=$request->email;
		$vendor->contact_number=$request->contact_number;
		$password=Hash::make($request->password);
		$vendor->password=$password;	
		$vendor->role_id=4;
		$vendor->sage_id=$request->sage_id;	
		$vendor->save();

		flash('Vendor added successfully');
		return redirect('admin/vendor/all-vendor');
	}


  public function getAddVenodor(){

  		if(!$this->checkPermission(Config::get('permissions.VENDOR_ADD'))){
			return view('user.unauthorized');
		}

     return view('customer.vendoradd');

}


	public function getAllVendor(Request $request){

       	if(!$this->checkPermission(Config::get('permissions.VENDOR_ADD'))){
			return view('user.unauthorized');
		}

		return view('customer.vendorall');
	}


	public function getAllVendorData(Request $request){

		// $vendore=User::with('status')->where('role_id','=',4)->get();

		$vendore=Vendor::with('status')->get();
		return DataTables::of($vendore)->make(true); 	

	}
	/*------------------------------------------------------------------*/


	public function getCustomersOrdersData(Request $request){
		
		$post=$request->all();
		$id=$request->id;
		$language_id=1;
		
		$order=Order::where('user_id',$id);

		return DataTables::of($order)->make(true);
	}

	public function getAddCustomer(){
		
		
		if(!$this->checkPermission(Config::get('permissions.CUSTOMER_ADD'))){
			return view('user.unauthorized');
		}
		
		$cities=City::where('city_id','!=',1)->where('status_id',1)->with('default_city_translation')->get();
		$states=State::where('state_id','!=',1)->where('status_id',1)->with('default_state_translation')->get();
		$countries=Country::where('country_id','!=',1)->where('status_id',1)->get();
		

		$country_names=CountryTranslation::where('country_id','!=',1)->pluck('country_name');
		$state_names=StateTranslation::where('state_id','!=',1)->pluck('state_name');
		$city_names=CityTranslation::where('city_id','!=',1)->pluck('city_name');
		

		$pincodes="[]";
		$areas="[]";
		
		
		return view('customer.add')->with('cities',$cities)->with('states',$states)->with('countries',$countries)->with('pincodes',$pincodes)->with('areas',$areas)->with('country_names',$country_names)->with('state_names',$state_names)->with('city_names',$city_names);

		}

	public function postAddCustomer(Request $request){
		if(!$this->checkPermission(Config::get('permissions.CUSTOMER_ADD'))){
			return view('user.unauthorized');
		}
		
		$rule=array();
		$arr=array();
		$result=array();
		
		$post=$request->all();
		$this->validate($request,User::$customerRule);
		$this->validate($request,['email' => 'unique:users,email']);
		$this->validate($request,['contact_number' => 'unique:users,contact_number']);
		$email="";
		$contact_number="";
		if($request->email){
			$email=$post['email'];
		}
		if($request->contact_number){
			$contact_number=$post['contact_number'];
		}
		$is_mail=1;
		$is_contact_number=1;
		if($email==""){
			$is_mail=0;
			$request->merge(['email'=>$contact_number]);
		}
		if($contact_number==""){
			$is_contact_number=0;
			$request->merge(['contact_number'=>$email]);
		}

		$customer=new User();
		
		$customer->name=$request->name;
		$customer->email=$email;
		$customer->contact_number=$contact_number;
		$customer->optional_contact_number=$request->optional_contact_number;
		$customer->DOB=$request->DOB;
		$password = Hash::make($request->password);
		$customer->password=$password;	
		$customer->role_id=6;	
		$customer->save();

		$address=new Address();
		$address->user_id=$customer->id;
		$address->address=$request->address;
		$address->name=$request->name;
		$address->email=$email;		
		$address->contact_number=$contact_number;

		$pincode_id=1;
		$city_id=1;
		$state_id=1;
		$country_id=1;
		$area_id=1;

	

		
			// $this->validate($request,User::$country_id_required);
		
			// $this->validate($request,User::$state_id_required);
		
			// $this->validate($request,User::$city_id_required);
		
			// $this->validate($request,User::$pincode_required);
		
			// $this->validate($request,User::$area_required);
	

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

		$customer->address_id=$address->address_id;
		$customer->save();

		flash('Customer added successfully');
		return redirect('admin/customer/all-Active');
	}

	public function getAllActiveCustomers(Request $request){
		if(!$this->checkPermission(Config::get('permissions.CUSTOMER_ALL'))){
			return view('user.unauthorized');
		}
		return view('customer.allActive');
	}
	public function getAllInActiveCustomers(Request $request){
		if(!$this->checkPermission(Config::get('permissions.CUSTOMER_ALL'))){
			return view('user.unauthorized');
		}
		return view('customer.allInActive');
	}

	public function getAllActiveCustomerData(Request $request){
		if(!$this->checkPermission(Config::get('permissions.CUSTOMER_ALL'))){
			return view('user.unauthorized');
		}
		$id = $request->id;
		$contact_number = $request->contact_number;
		$email = $request->email;
		$billing_phone = $request->billing_phone;
		$company_name = $request->company_name;
		$shipping_zip_code = $request->shipping_zip_code;
		$user_name = $request->user_name;
		$from_date = $request->from_date;
		$to_date = $request->to_date;
		$frequency = $request->frequency;
		$activity = $request->activity;

		$customers=User::with('order_count')->with('referred_by')->where('status_id',1)->with('status')->where('role_id','!=',1);
		// Note : don't use order by because from_date and to_date

		if($id!="" && $id!=null && $id!= 'undefined' && $id!="[]"){
			$customers = $customers->where('id',$id);
		}

		if($contact_number!="" && $contact_number!=null && $contact_number!= 'undefined' && $contact_number!="[]"){
			$contact_number = (int) $contact_number;
			$customers = $customers->where('contact_number',$contact_number);
		}

		if($email!="" && $email!=null && $email!= 'undefined' && $email!="[]"){
			$customers = $customers->where('email',$email);
		}

		if($billing_phone!="" && $billing_phone!=null && $billing_phone!= 'undefined' && $billing_phone!="[]"){
			$customers = $customers->whereHas('user_address',function($q) use($billing_phone){
			 	$q->where('is_billing',1)->where('telephone',$billing_phone);
			});
		}

		if($company_name!="" && $company_name!=null && $company_name!= 'undefined' && $company_name!="[]"){
			
			$customers = $customers->where('company_name', 'like', '%' .$company_name. '%');
		}

		if($shipping_zip_code!="" && $shipping_zip_code!=null && $shipping_zip_code!= 'undefined' && $shipping_zip_code!="[]"){
			$customers = $customers->where('zipcode',$shipping_zip_code);
		}

		if($user_name!="" && $user_name!=null && $user_name!= 'undefined' && $user_name!="[]"){
			
			$customers = $customers->where('name','like','%'.$user_name.'%');
		}

		if($from_date!="" && $from_date!=null && $from_date!= 'undefined' && $from_date!="[]" && $to_date!="" && $to_date!=null && $to_date!= 'undefined' && $to_date!="[]" ){
			
			$customers = $customers->whereBetween('created_at',[$from_date,$to_date]);

		}elseif($from_date!="" && $from_date!=null && $from_date!= 'undefined' && $from_date!="[]" && $to_date=="" && $to_date==null){
				$current_date = date('Y-m-d');
				$customers = $customers->whereBetween('created_at',[$from_date,$current_date]);

		}elseif($from_date=="" && $from_date==null && $to_date!="" && $to_date!=null && $to_date!= 'undefined' && $to_date!="[]"){
				$customer_first_data = $customers->first();
				$customer_first_created_at = $customer_first_data->created_at;
				$customer_first_created_at = date('d-m-Y', strtotime($customer_first_created_at));
				$customers = $customers->whereBetween('created_at',[$customer_first_created_at,$to_date]);
		}

		if($frequency!="" && $frequency!=null && $frequency!="null" && $frequency!= 'undefined' && $frequency!="[]" ){
			if($frequency=="today"){
				$frequency = 1;
			}
			$customers = $customers->where('created_at', '>', now()->subDays($frequency)->endOfDay());
		}

		if($activity!="" && $activity!=null && $activity!="null" && $activity!= 'undefined'  && $activity!="[]"){
			$customers = $customers->where('status_id',$activity);
		}
		$customers = $customers;

		return DataTables::of($customers)->make(true);  
	}

	public function getAllInActiveCustomerData(Request $request){
		if(!$this->checkPermission(Config::get('permissions.CUSTOMER_ALL'))){
			return view('user.unauthorized');
		}
		// dd($request->all());
		$id = $request->id;
		$contact_number = $request->contact_number;
		$email = $request->email;
		$billing_phone = $request->billing_phone;
		$company_name = $request->company_name;
		$shipping_zip_code = $request->shipping_zip_code;
		$user_name = $request->user_name;
		$from_date = $request->from_date;
		$to_date = $request->to_date;
		$frequency = $request->frequency;
		$activity = $request->activity;

		
		$customers=User::with('order_count')->with('referred_by')->where('status_id',2)->with('status')->where('role_id','!=',1)->with('user_address');
		// Note : don't use order by because from_date and to_date

		if($id!="" && $id!=null && $id!= 'undefined' && $id!="[]"){
			$customers = $customers->where('id',$id);
		}

		if($contact_number!="" && $contact_number!=null && $contact_number!= 'undefined' && $contact_number!="[]"){
			
			$contact_number = (int) $contact_number;
			$customers = $customers->where('contact_number',$contact_number);

		}

		if($email!="" && $email!=null && $email!= 'undefined' && $email!="[]"){
			$customers = $customers->where('email',$email);
		}

		if($billing_phone!="" && $billing_phone!=null && $billing_phone!= 'undefined' && $billing_phone!="[]"){
			$customers = $customers->whereHas('user_address',function($q) use($billing_phone){
			 	$q->where('is_billing',1)->where('telephone',$billing_phone);
			});
		}

		if($company_name!="" && $company_name!=null && $company_name!= 'undefined' && $company_name!="[]"){
			$customers = $customers->where('company_name', 'like', '%' .$company_name. '%');
		}

		if($shipping_zip_code!="" && $shipping_zip_code!=null && $shipping_zip_code!= 'undefined' && $shipping_zip_code!="[]"){
			$customers = $customers->where('zipcode',$shipping_zip_code);
		}

		if($user_name!="" && $user_name!=null && $user_name!= 'undefined' && $user_name!="[]"){
			$customers = $customers->where('name','like','%'.$user_name.'%');
		}


		if($from_date!="" && $from_date!=null && $from_date!= 'undefined' && $from_date!="[]" && $to_date!="" && $to_date!=null && $to_date!= 'undefined' && $to_date!="[]"){

				$customers = $customers->whereBetween('created_at',[$from_date,$to_date]);

		}elseif($from_date!="" && $from_date!=null && $from_date!= 'undefined' && $from_date!="[]" && $to_date=="" && $to_date==null){
				$current_date = date('Y-m-d');
				$customers = $customers->whereBetween('created_at',[$from_date,$current_date]);

		}elseif($from_date=="" && $from_date==null && $to_date!="" && $to_date!=null && $to_date!= 'undefined' && $to_date!="[]"){
				$customer_first_data = $customers->first();
				$customer_first_created_at = $customer_first_data->created_at;
				$customer_first_created_at = date('d-m-Y', strtotime($customer_first_created_at));
				$customers = $customers->whereBetween('created_at',[$customer_first_created_at,$to_date]);
		}
			
		

		if($frequency!="" && $frequency!=null && $frequency!="null" && $frequency!= 'undefined' && $frequency!="[]" ){
			if($frequency=="today"){
				$frequency = 1;
			}
			$customers = $customers->where('created_at', '>', now()->subDays($frequency)->endOfDay());
		}

		if($activity!="" && $activity!=null && $activity!="null" && $activity!= 'undefined'  && $activity!="[]"){
			$customers = $customers->where('status_id',$activity);
		}
		$customers = $customers->get();
		return DataTables::of($customers)->make(true);  
	}

	public function getCustomer(Request $request){
		if(!$this->checkPermission(Config::get('permissions.CUSTOMER_DETAILS'))){
			return view('user.unauthorized');
		}
		
		$customer_id=$request->id;
		if($customer_id!=1){
			$customer=User::with('city')->with('state')->with('country')->find($customer_id);

			$address=Address::find($customer_id);
			if($customer!=""){

				$cities=City::where('city_id','!=',1)->where('status_id',1)->with('default_city_translation')->get();
				$states=State::where('state_id','!=',1)->where('status_id',1)->with('default_state_translation')->get();
				$countries=Country::where('country_id','!=',1)->where('status_id',1)->get();

				$country_names=CountryTranslation::where('country_id','!=',1)->pluck('country_name');
				$state_names=StateTranslation::where('state_id','!=',1)->pluck('state_name');
				$city_names=CityTranslation::where('city_id','!=',1)->pluck('city_name');
				$pincodes="[]";
				$areas="[]";

				$addresses=Address::where('user_id',$customer_id)->get();

				$billing_addresses = Address::where("user_id",$customer_id)->where('is_billing',1)->with('city')->with('state')->with('country')->with('user')->get();
      			$shipping_addresses=Address::where("user_id",$customer_id)->where('is_billing',0)->with('city')->with('state')->with('country')->with('user')->get();
      			 // use is shipping
			    $user_address=Address::where('user_id',$customer_id)->where("is_shipping",1)->where("is_billing",0)->with('city')->with('state')->with('country')->with('user')->first();
			    if($user_address==""){
			        $user_address=Address::where('user_id',$customer_id)->where("is_default_add",1)->where("is_billing",0)->with('city')->with('state')->with('country')->with('user')->first();
			    }

			    $Allstates=StateTranslation::whereHas('state',function($query){
			    	$query->where('country_id',190);
			    })->get();
      			$Allcity=CityTranslation::get();

      			
			    $data=array("Allstates"=>$Allstates,"Allcity"=>$Allcity);
				return view('customer.details')->with('customer',$customer)->with('cities',$cities)->with('states',$states)->with('countries',$countries)->with('pincodes',$pincodes)->with('areas',$areas)->with('country_names',$country_names)->with('state_names',$state_names)->with('city_names',$city_names)->with('addresses',$addresses)->with('address',$address)->with('billing_addresses',$billing_addresses)->with('shipping_addresses',$shipping_addresses)->with('user_address',$user_address)->with('data',$data);
			}else{
				return redirect('admin/customer/all');
			}
		}else{
			return redirect('admin/customer/all-Active');
		}
	}

	public function postCustomer(Request $request){
		if(!$this->checkPermission(Config::get('permissions.CUSTOMER_UPDATE'))){
			return view('user.unauthorized');
		}
		
		$rule=[];

		$customer_id=$request->id;
		$customer=User::find($customer_id);
		$post=$request->all();

       $mbno=str_replace('-',' ',$request->contact_number);

		if(isset($request['save'])){

			$post=$request->all();
			/*$this->validate($request,User::$customerRule);*/
			// $this->validate($request,['email' => 'unique:users,email,NULL,id,id' . $customer->id]);
			// $this->validate($request,['contact_number' => 'unique:users,contact_number,NULL,id,id' . $customer->id]);
			$this->validate($request,User::$editCustomerRule);

			if($customer!=""){
				
				$customer->name=$request->name;
				$customer->business_name=$request->business_name;
				$customer->email=$request->email;
				if($request->password!="" && $request->confirm_password!=""){
					$this->validate($request,['password'=>'max:20|min:6']);
					$password = Hash::make($request->password);
					$customer->password=$password;
				}	
     
				$customer->contact_number=$mbno;
				$customer->optional_contact_number=$request->optional_contact_number;
				$customer->DOB=$request->dob;
				$customer->gst_number=$request->gst_number;
				//$customer->token=$request->token;
				$customer->remember_token=$request->remember_token;
				$customer->save();

				$post=$request->all();

				$pincode_id=1;
				$city_id=1;
				$state_id=1;
				$country_id=1;
				$area_id=1;



				

				
					// $this->validate($request,User::$country_id_required);
				
					// $this->validate($request,User::$state_id_required);
				
					// $this->validate($request,User::$city_id_required);
			
					// $this->validate($request,User::$pincode_required);
				
					// $this->validate($request,User::$area_required);
				

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

				$address=Address::where('user_id',$customer_id)->first();

				if ($address!="") {

				//$address->user_id=$admin->id;
					$address->user_id=$customer->id;
					$address->address=$request->address;
					$address->name=$request->name;
					$address->email=$request->email;		
					$address->contact_number=$mbno;
					$address->pincode_id=$pincode_id;
					$address->city_id=$city_id;
					$address->state_id=$state_id;
					$address->country_id=$country_id;
					$address->area_id=$area_id;
					$address->save();



					$customer->address_id=$address->address_id;
				}

				flash('Customer updated successfully');	
			}else{
				return redirect('admin/customer/all-Active');
			}
		}else if(isset($request['active'])){

			flash('Customer activated successfully');
			$customer->status_id=1;
		}else if(isset($request['inactive'])){
			flash('Customer inactivated successfully');
			$customer->status_id=2;	
			$customer->remember_token="";
		}
		$customer->save();
		if ($customer->status_id==1) {
			return redirect('admin/customer/all-Active');
		}else{
			return redirect('admin/customer/all-InActive');
		}
		
	}

	public function getCustomerWallet(Request $request){

		$post=$request->all();
		$id=$request->id;
		$language_id=1;
		

		$user=User::find($id);
		$wallet_transaction=WalletTransaction::where('user_id',$id)->orderBy('created_at','desc');
		return DataTables::of($wallet_transaction)->make(true);  
		
	}

	public function getAddWalletMoney(Request $request){
		$post=$request->all();
		$id=$request->id;
		$language_id=1;
		
		$customer=User::find($id);
		return view('customerwallet.addMoney')->with('customer',$customer);

	}


	public function postAddWalletMoney(Request $request){

		$post=$request->all();
		$id=$request->id;
		$sender_id=Auth::user()->id;
		$language_id=1;
		
		$amount=$post['amount'];
		$transaction_title="Admin added amount to wallet";
		$narration=$post['narration'];



		$sender=User::find($sender_id);

		$redeem_request=RedeemRequest::where('user_id',$id)->where('is_redeemed',0)->where('amount',$amount)->first();

		if ($redeem_request!="") {
			$is_redeemed=1;
			$redeem_request->is_redeemed=$is_redeemed;

			$redeem_request->save();

		}


		$receiver_id=$id;

		$sender_old_wallet=$sender->wallet;
		$sender_new_wallet=$sender_old_wallet-$amount;
		$receiver=User::find($id);
		$receiver_old_wallet=$receiver->wallet;
		$receiver_new_wallet=$receiver_old_wallet+$amount;

		if($sender->wallet<$amount){
			$you_just_rupee=Toast::where('language_id',$language_id)->first()->you_just_rupee;
			$can_transfer=Toast::where('language_id',$language_id)->first()->can_transfer;
			$msg="You"." ".$can_transfer." "."just"." ".$sender->wallet;
			flash($msg);
			return redirect('admin/customer/'.$id);		
		}



		$sender_name=$sender->name;
		$receiver_name=$receiver->name;


		$this->validate($request,User::$user_wallet);

			//reciever

		$wallet_transaction=new WalletTransaction();
		$wallet_transaction->user_id=$receiver_id;
		$wallet_transaction->transaction_against=$sender_id;
		$narrationText="From : ".$sender_name;
		if ($narration!="") {
			$narrationText=$narrationText." (".$narration.")";
		}

		$wallet_transaction->narration=$narrationText;
		$wallet_transaction->transaction_title=$transaction_title;
		$wallet_transaction->amount=$amount;
		$wallet_transaction->old_wallet=$receiver_old_wallet;
		$wallet_transaction->new_wallet=$receiver_new_wallet;
		$wallet_transaction->transaction_type=3;
		$wallet_transaction->save();

		$user=User::find($id);
		$user->wallet=$receiver_new_wallet;
		$user->save();

		$wallet_transaction->wallet_status=1;
		$wallet_transaction->save();


			//sender
		$sender_wallet_transaction=new WalletTransaction();
		$sender_wallet_transaction->user_id=$sender->id;
		$sender_wallet_transaction->transaction_against=$receiver->id;
		$narrationText="To : ".$receiver_name;
		if ($narration!="") {
			$narrationText=$narrationText." (".$narration.")";
		}

		$sender_wallet_transaction->narration=$narrationText;
		$sender_wallet_transaction->transaction_title="Transferred to customer wallet";
		$sender_wallet_transaction->amount=$amount;
		$sender_wallet_transaction->old_wallet=$sender_old_wallet;
		$sender_wallet_transaction->new_wallet=$sender_new_wallet;
		$sender_wallet_transaction->transaction_type=4;
		$sender_wallet_transaction->save();

		$sender->wallet=$sender_new_wallet;
		$sender->save();

		$sender_wallet_transaction->wallet_status=1;
		$sender_wallet_transaction->save();


		flash('Money added to wallet successfully');
		return redirect('admin/customer/'.$id);

	}

	public function getDeductWalletMoney(Request $request){
		$post=$request->all();
		$id=$request->id;
		$language_id=1;
		
		$customer=User::find($id);
		return view('customerwallet.deductMoney')->with('customer',$customer);

	}
	public function postDeductWalletMoney(Request $request){

		$post=$request->all();
		$id=$request->id;
		$sender_id=Auth::user()->id;
		$language_id=1;
		
		$amount=$post['amount'];
		$transaction_title="Admin deducted amount from wallet";
		$narration=$post['narration'];



		$sender=User::find($sender_id);

		$receiver_id=$id;

		$sender_old_wallet=$sender->wallet;
		$sender_new_wallet=$sender_old_wallet+$amount;
		$receiver=User::find($id);
		$receiver_old_wallet=$receiver->wallet;
		$receiver_new_wallet=$receiver_old_wallet-$amount;

		if($receiver->wallet<$amount){
			$you_just_rupee=Toast::where('language_id',$language_id)->first()->you_just_rupee;
			$can_transfer=Toast::where('language_id',$language_id)->first()->can_transfer;
			$msg="You"." ".$can_transfer." "."just"." ".$receiver->wallet;
			flash($msg);
			return redirect('admin/customer/'.$id);		
		}



		$sender_name=$sender->name;
		$receiver_name=$receiver->name;


		$this->validate($request,User::$user_wallet);

			//reciever

		$wallet_transaction=new WalletTransaction();
		$wallet_transaction->user_id=$receiver_id;
		$wallet_transaction->transaction_against=$sender_id;
		$narrationText="From : ".$sender_name;
		if ($narration!="") {
			$narrationText=$narrationText." (".$narration.")";
		}

		$wallet_transaction->narration=$narrationText;
		$wallet_transaction->transaction_title=$transaction_title;
		$wallet_transaction->amount=$amount;
		$wallet_transaction->old_wallet=$receiver_old_wallet;
		$wallet_transaction->new_wallet=$receiver_new_wallet;
		if ($receiver_old_wallet>$receiver_new_wallet) {
			$wallet_transaction->transaction_type=4;
		}else{
			$wallet_transaction->transaction_type=3;
		}
		
		$wallet_transaction->save();

		$user=User::find($id);
		$user->wallet=$receiver_new_wallet;
		$user->save();

		$wallet_transaction->wallet_status=1;
		$wallet_transaction->save();


			//sender
		$sender_wallet_transaction=new WalletTransaction();
		$sender_wallet_transaction->user_id=$sender->id;
		$sender_wallet_transaction->transaction_against=$receiver->id;
		$narrationText="To : ".$receiver_name;
		if ($narration!="") {
			$narrationText=$narrationText." (".$narration.")";
		}

		$sender_wallet_transaction->narration=$narrationText;
		$sender_wallet_transaction->transaction_title="Deducted From customer wallet";
		$sender_wallet_transaction->amount=$amount;
		$sender_wallet_transaction->old_wallet=$sender_old_wallet;
		$sender_wallet_transaction->new_wallet=$sender_new_wallet;
		if ($sender_old_wallet>$sender_new_wallet) {
			$sender_wallet_transaction->transaction_type=4;
		}else{
			$sender_wallet_transaction->transaction_type=3;
		}
		
		$sender_wallet_transaction->save();

		$sender->wallet=$sender_new_wallet;
		$sender->save();

		$sender_wallet_transaction->wallet_status=1;
		$sender_wallet_transaction->save();


		flash('Money deducted from wallet successfully');
		return redirect('admin/customer/'.$id);

	}
}
