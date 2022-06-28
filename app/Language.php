<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
	public $primaryKey='language_id';
	
	public function default_language_translation(){
		return $this->belongsTo('App\LanguageTranslation','language_translation_id','language_translation_id');
	}

	public function business_languages(){
		return $this->belongsTo('App\BusinessLanguage','language_id','language_id');
	}

	public function language_translation(){
		return $this->hasOne('App\LanguageTranslation','language_id','language_id');
	}

	public static $editRule=[
		'language_name' => 'required|max:20',
		'language_code' => 'required|max:20'
	];
	public static $translation=[
		'language_name' => 'required|max:20',
		'language_code' => 'required|max:20'
	];
	public function status(){
		return $this->belongsTo('App\Status','status_id','status_id');
	}
}
