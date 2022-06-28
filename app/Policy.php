<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model{
	public $primaryKey='policy_id';
	
	public static $rules=[
	'language_id'=>'required|numeric'

	];

	public static $edit=[
	];

	public function default_policy_translation(){
		return $this->belongsTo('App\PolicyTranslation','policy_translation_id','policy_translation_id')->with('language');
	}

	public function policy_translation(){
		return $this->hasOne('App\PolicyTranslation','policy_id','policy_id')->with('language');
	}	
}
