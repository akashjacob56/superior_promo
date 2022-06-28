<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $deliveryboyAddRule=[
        'name'=>'required|max:40|min:2|regex:/^[a-zA-Z ]{2,40}$/',    
        'email'=>'required|max:40|regex:/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/',
        'contact_number'=>'required|numeric|digits_between:10,15',
        'optional_contact_number'=>'nullable|numeric|digits_between:10,15',
    /*'city_id'=>'required|numeric',
    'state_id'=>'required|numeric',
    'country_id'=>'required|numeric',
    'address'=>'required|max:200',
    'pincode_id'=>'required|numeric',*/
    'password' => 'required|max:20|min:6',
    'confirm_password' => 'required|max:20|same:password'
];

public static $deliveryboyEditRule=[
    'name'=>'required|max:40|min:2|regex:/^[a-zA-Z ]{2,40}$/',    
    'email'=>'required|max:40|regex:/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/',
    'contact_number'=>'required|numeric|digits_between:10,15',
    'optional_contact_number'=>'nullable|numeric|digits_between:10,15',
    /*'city_id'=>'required|numeric',
    'state_id'=>'required|numeric',
    'country_id'=>'required|numeric',
    'address'=>'required|max:200',
    'pincode_id'=>'required|numeric',*/
    'password' => 'max:20',
    'confirm_password' => 'max:20|same:password',
];

public static $adminAddRule=[
    'name'=>'required|max:40|min:2|regex:/^[a-zA-Z ]{2,40}$/',
    'business_name'=>'required|max:100',
    'email'=>'required|max:40|regex:/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/',
    'contact_number'=>'required|numeric|digits_between:10,15',
    'optional_contact_number'=>'nullable|numeric|digits_between:10,15',
    'address'=>'required|max:200',
    'password' => 'required|max:20|min:6',
    'confirm_password' => 'required|max:20|same:password'
];

public static $adminEditRule=[
    'name'=>'required|max:40|min:2|regex:/^[a-zA-Z ]{2,40}$/',
    'business_name'=>'required|max:100',
    'email'=>'required|max:40|regex:/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/',
    'contact_number'=>'required|numeric|digits_between:10,15',
    'optional_contact_number'=>'nullable|numeric|digits_between:10,15',
   /* 'address'=>'required|max:200',
   'pincode_id'=>'required|numeric',*/
   'password' => 'max:20',
   'confirm_password' => 'max:20|same:password',
   
];


public static $subadminAddRule=[
 'name'=>'required|max:40|min:2|regex:/^[a-zA-Z ]{2,40}$/',         
 'email'=>'required|max:40|regex:/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/',
 'contact_number'=>'required|numeric|digits_between:10,15',
 'optional_contact_number'=>'nullable|numeric|digits_between:10,15',
    /*'city_id'=>'required|numeric',
    'state_id'=>'required|numeric',
    'country_id'=>'required|numeric',
    'address'=>'required|max:200',
    'pincode_id'=>'required|numeric',*/
    'password' => 'required|max:20|min:6',
    'confirm_password' => 'required|max:20|same:password'
];

public static $subadminEditRule=[
    'name'=>'required|max:40|min:2|regex:/^[a-zA-Z ]{2,40}$/',           
    'email'=>'required|max:40|regex:/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/',
    'contact_number'=>'required|numeric|digits_between:10,15',

    /*'city_id'=>'required|numeric',
    'state_id'=>'required|numeric',
    'country_id'=>'required|numeric',
    'address'=>'required|max:200',
    'pincode_id'=>'required|numeric',*/
    'password' => 'max:20',
    'confirm_password' => 'max:20|same:password'
];

public static $customerRule=[
    //'name'=>'max:40|regex:/^[a-zA-Z ]$/',    
    // 'email'=>'unique:users,email|max:40',
    // 'contact_number'=>'unique:users,contact_number',
    /*  'address'=>'required|max:200',*/
    /*'city_id'=>'required|numeric',
    'state_id'=>'required|numeric',
    'country_id'=>'required|numeric',
    'pincode_id'=>'required|numeric',*/
    'password' => 'required|max:20|min:6',
    'confirm_password' => 'required|max:20|same:password',
];

public static $forgotcustomerRule=[
    //'name'=>'max:40|regex:/^[a-zA-Z ]$/',    
    // 'email'=>'unique:users,email|max:40',
    // 'contact_number'=>'unique:users,contact_number',
    /*  'address'=>'required|max:200',*/
    /*'city_id'=>'required|numeric',
    'state_id'=>'required|numeric',
    'country_id'=>'required|numeric',
    'pincode_id'=>'required|numeric',*/
    'new_password' => 'required|max:20|min:6',
    'confirm_password' => 'required|max:20|same:new_password',
];

public static $editCustomerRule=[
    /* 'name'=>'max:40|min:2|regex:/^[a-zA-Z ]{2,40}$/',*/
    'email'=>'max:40|regex:/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/',
    /*'contact_number'=>'numeric|digits_between:10,15',*/
    /* 'optional_contact_number'=>'nullable|numeric|digits_between:10,15',*/
    /* 'address'=>'required|max:200',*/
    /*'pincode'=>'required|digits:6',*/
    'password' => 'max:20',
    'confirm_password' => 'max:20|same:password'
];

public static $changePassword=[
    'password' => 'required|max:20|min:1',
    'confirm_password' => 'required|max:20|same:new_password'
];

public static $sellerAddRule=[
    'name'=>'required|max:40|min:2|regex:/^[a-zA-Z ]{2,40}$/',    
    'seller_name'=>'required|max:40',
    'email'=>'required|max:40|regex:/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/',
    'contact_number'=>'required|numeric|digits_between:10,15',
    'optional_contact_number'=>'nullable|numeric|digits_between:10,15',
    'seller_url'=>'required',
    'location'=>'required',
    'seller_image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    'cancelled_check_copy'=>'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    'local_id_registration_certificate'=>'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    'tax_registration_certificate'=>'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    'adhar_certificate'=>'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    'pan_card'=>'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    'food_licence'=>'image|mimes:jpeg,png,jpg,gif,svg|max:1024',

    /*'category'=>'required',*/
    /*'city_id'=>'required|numeric',
    'state_id'=>'required|numeric',
    'country_id'=>'required|numeric',
    'address'=>'required|max:200',
    'pincode_id'=>'required|numeric',*/
    'password' => 'required|max:20|min:6',
    'confirm_password' => 'required|max:20|same:password'
];

public static $sellerEditRule=[
    'name'=>'required|max:40|min:2|regex:/^[a-zA-Z ]{2,40}$/',   
    'seller_name'=>'required|max:40', 
    'email'=>'required|max:40|regex:/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/',
    'contact_number'=>'required|numeric|digits_between:10,15',
    'optional_contact_number'=>'nullable|numeric|digits_between:10,15',
    'seller_image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    'cancelled_check_copy'=>'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    'local_id_registration_certificate'=>'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    'tax_registration_certificate'=>'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    'adhar_certificate'=>'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    'pan_card'=>'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    'food_licence'=>'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    
    /*'city_id'=>'required|numeric',
    'state_id'=>'required|numeric',
    'country_id'=>'required|numeric',
    'address'=>'required|max:200',
    'pincode_id'=>'required|numeric',*/
    'password' => 'max:20',
    'confirm_password' => 'max:20|same:password',
];

public static $subsellerAddRule=[
    'name'=>'required|max:40|min:2|regex:/^[a-zA-Z ]{2,40}$/',         
    'email'=>'required|max:40|regex:/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/',
    'contact_number'=>'required|numeric|digits_between:10,15',
    'optional_contact_number'=>'nullable|numeric|digits_between:10,15',
    /*'city_id'=>'required|numeric',
    'state_id'=>'required|numeric',
    'country_id'=>'required|numeric',
    'address'=>'required|max:200',
    'pincode_id'=>'required|numeric',*/
    'password' => 'required|max:20|min:6',
    'confirm_password' => 'required|max:20|same:password'
];

public static $subsellerEditRule=[
    'name'=>'required|max:40|min:2|regex:/^[a-zA-Z ]{2,40}$/',           
    'email'=>'required|max:40|regex:/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/',
    'contact_number'=>'required|numeric|digits_between:10,15',
    'optional_contact_number'=>'nullable|numeric|digits_between:10,15',
    /*'city_id'=>'required|numeric',
    'state_id'=>'required|numeric',
    'country_id'=>'required|numeric',
    'address'=>'required|max:200',
    'pincode_id'=>'required|numeric',*/
    'password' => 'max:20',
    'confirm_password' => 'max:20|same:password',
];


public static $loginRule=[
    'name'=>'required|max:40|min:2|regex:/^[a-zA-Z ]{2,40}$/',           
    'email'=>'required|max:40|regex:/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/',
    'contact_number'=>'required|numeric|digits_between:10,15',
    'optional_contact_number'=>'nullable|numeric|digits_between:10,15',
    'password' => 'max:20|min:6',
    'confirm_password' => 'max:20|same:password',
    //'app_logo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
];

public static $updateProfile=[
    'name'=>'max:40|min:2|regex:/^[a-zA-Z ]{2,40}$/',           
    'contact_number'=>'required',
    /* 'address'=>'required|max:200',*/
    'email'=>'max:40|regex:/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/'

];

public static $addDeliveryAddress=[
    'name'=>'required',           
    'contact_number'=>'required',
    'address'=>'required|max:200',
];

public static $country_id_required=[
    'country_id'=>'required'
];
public static $state_id_required=[
    'state_id'=>'required'
];
public static $city_id_required=[
    'city_name'=>'required'
];
public static $pincode_required=[
    'pincode'=>'required'
];
public static $area_required=[
    'area_name'=>'required'
];

public static $user_wallet=[
    'amount'=> 'required|numeric|min:1|max:99999999999',
];


public function city(){
    return $this->belongsTo('App\City','city_id','city_id')->with('default_state_translation')->with('default_city_translation');
}

public function state(){
    return $this->belongsTo('App\State','state_id','state_id')->with('default_state_translation');
}

public function country(){
    return $this->belongsTo('App\Country','country_id','country_id')->with('default_country_translation');
}

public function area(){
    return $this->belongsTo('App\Area','area_id','area_id');
}

public function order(){
    return $this->hasOne('App\Order','user_id','id');
}

public function pincode(){
    return $this->hasOne('App\Pincode','pincode_id','pincode_id');
}


public function order_count(){
    return $this->order()
    ->selectRaw('user_id, count(*) as order_count, max(updated_at) as order_date')
    ->groupBy('user_id');
}

public function address(){
    return $this->hasOne('App\Address','address_id','address_id')->with('pincode')->with('city')->with('state')->with('country')->with('area');
}

public function user_address(){
    return $this->hasOne('App\Address','address_id','address_id');
}

public static $profileEditRule=[
    'name'=>'required|max:40|min:2|regex:/^[a-zA-Z ]{2,40}$/',
    'business_name'=>'required|max:100',
    'email'=>'required|max:40|regex:/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/',
    'contact_number'=>'required|numeric|digits_between:10,15',    
    'pincode'=>'required|numeric|digits:6',
    'password' => 'max:20',
    'confirm_password' => 'max:20|same:password'
];

public function status(){
    return $this->belongsTo('App\Status','status_id','status_id');
}

public function seller(){
    return $this->hasOne('App\User','seller_id','seller_id');
}

public function referred_by(){
    return $this->hasOne('App\User','id','reffered_by');
}

public static $rules=[
    'name' => 'required', 
    'contact_number'=>'required',
    'email' => 'required',
];

public function store_user(){
    return $this->hasMany('App\StoreUser','user_id','id')->with('store');
}

public function customer_order_sale(){
    return $this->belongsTo('App\OrderProduct','id','user_id');
}


public function product(){
    return $this->belongsTo('App\Product','seller_id','seller_id');
}





public function sale_by_customer(){
    return $this->customer_order_sale()
    ->selectRaw('user_id, sum(total_amount) as sum_total_amount, sum(quantity) as total_quantity,count(order_id) as total_order, count(*) as order_count, max(updated_at) as order_date')
    ->groupBy('user_id');
}




public function user_role(){
    return $this->belongsTO('App\Role','role_id','role_id');
}
}
