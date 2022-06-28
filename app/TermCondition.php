<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TermCondition extends Model
{   
	public $primaryKey='term_condition_id';

	public static $rules=[
		'term_condition_description'=>'required'
	];

	public static $edit=[
		'term_condition_description'=>'required'
	];

	public function default_term_condition_translation(){
		return $this->belongsTo('App\TermConditionTranslation','term_condition_translation_id','term_condition_translation_id');
	}

	public function term_condition_translation(){
		return $this->hasOne('App\TermConditionTranslation','term_condition_id','term_condition_id');
	}
	
	public function language(){
		return $this->belongsTo('App\Language','language_id','language_id')->with('default_language_translation');
	}
	
	public function status(){
		return $this->belongsTo('App\Status','status_id','status_id');
	}
	
}
