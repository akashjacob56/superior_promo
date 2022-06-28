<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturnPolicy extends Model
{
    //

    public $primaryKey='return_policy_id';

	public function default_return_policy_translation(){
		return $this->belongsTo('App\ReturnPolicyTranslation','return_policy_translation_id','return_policy_translation_id')->with('language');
	}

	public function return_policy_translation(){
		return $this->hasOne('App\ReturnPolicyTranslation','return_policy_id','return_policy_id')->with('language');
	}	
	public static $rules=[
		'return_policy_title'=>'required',
		'return_policy_description'=>'required',
		'return_days'=> 'numeric|min:0|max:99999999999',

	];
}
