<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
	public $primaryKey='address_id';

	public function user(){
		return $this->belongsTo('App\User','user_id','id');
	}
	public function pincode(){
		return $this->belongsTo('App\Pincode','pincode_id','pincode_id');
	}

	public function city(){
		return $this->belongsTo('App\City','city_id','city_id')->with('default_city_translation');
	}

	public function state(){
		return $this->belongsTo('App\State','state_id','state_id')->with('default_state_translation');
	}
	
	public function country(){
		return $this->belongsTo('App\Country','country_id','country_id')->with('default_country_translation');
	}

	public function area(){
		return $this->belongsTo('App\Area','area_id','area_id')->with('default_area_translation');
	}

}
