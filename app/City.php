<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	public $primaryKey='city_id';

	public static $addRule=[
		'state_id'=>'required',
		'city_name'=>'required|min:1|max:40',
	];

	public static $edit=[
		'city_name'=> 'required',
	];

	public static $translation=[
        'city_name'=>'required|max:30',
        'language_id'=>'required|numeric',
    ];
	

	public function default_city_translation(){
		return $this->belongsTo('App\CityTranslation','city_translation_id','city_translation_id');
	}


	public function city_translation(){
		return $this->hasOne('App\CityTranslation','city_id','city_id');
	}

	public function state(){
		return $this->belongsTo('App\State','state_id','state_id')->with('default_state_translation');
	}
	public function status(){
		return $this->belongsTo('App\Status','status_id','status_id');
	}

}
