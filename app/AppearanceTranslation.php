<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppearanceTranslation extends Model
{
	public $primaryKey="appearance_translation_id";
	
	public static $rule=[
	'appearance_id'=>'required|numeric',
	'language_id'=>'required|numeric',
	'app_name'=>'required|max:20',
	'currency'=>'required|max:40'
	];
	
	public function language(){
		return $this->belongsTo('App\Language','language_id','language_id');
	}


}
