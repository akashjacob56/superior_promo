<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
  public $primaryKey='vendor_id';
 
  protected $table="vendors";

  public function city(){
    return $this->belongsTo('App\City','city_id','city_id')->with('default_state_translation');
  }

  public function state(){
    return $this->belongsTo('App\State','state_id','state_id');
  }

  public function country(){
    return $this->belongsTo('App\Country','country_id','country_id');
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


public function status(){
    return $this->belongsTo('App\Status','status_id','status_id');
}


  public static $rules=[
  'company_name' => 'required', 
  'contact_number'=>'required',
  'contact_person_name'=>'required',
 /* 'email' => 'required',*/
  'pincode'=>'nullable|numeric|digits_between:5,10'
  ];
}
