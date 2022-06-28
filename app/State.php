<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
	public $primaryKey='state_id';



	public static $addRule=[
		'country_id'=>'required',
		'state_name'=>'required',
	];

	public static $edit=[
		'state_name'=> 'required',
	];

	public static $translation=[
        'state_name'=>'required|max:30',
        'language_id'=>'required|numeric',
    ];
	
	

	public function default_state_translation(){
		return $this->belongsTo('App\StateTranslation','state_translation_id','state_translation_id');
	}

	public function state_translation(){
		return $this->hasOne('App\StateTranslation','state_id','state_id');
	}

	public function country(){
		return $this->belongsTo('App\Country','country_id','country_id')->with('default_country_translation');
	}
	public function status(){
		return $this->belongsTo('App\Status','status_id','status_id');
	}
}
