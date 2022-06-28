<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $primaryKey='country_id';

    public static $rule=[
		'country_name'=> 'required|unique:country_translations,country_name',
	];

	public static $edit=[
		'country_name'=> 'required',
	];

	public static $translation=[
        'country_name'=>'required|max:30|unique:country_translations,country_name',
        'language_id'=>'required|numeric',
    ];

    public function default_country_translation(){
		return $this->belongsTo('App\CountryTranslation','country_translation_id','country_translation_id');
	}


	public function country_translation(){
		return $this->hasOne('App\CountryTranslation','country_id','country_id');
	}
	public function status(){
		return $this->belongsTo('App\Status','status_id','status_id');
	}

	public function business_countries(){
		return $this->belongsTo('App\BusinessCountry','country_id','country_id');
	}


}
