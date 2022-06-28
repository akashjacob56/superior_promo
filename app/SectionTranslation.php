<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectionTranslation extends Model
{
    public $primaryKey='section_translation_id';

	public static $rules=[
	'section_name'=>'required|max:25',
	'language_id'=>'required|numeric',	  
	];


	public function language(){
		return $this->belongsTo('App\Language','language_id','language_id')->with('default_language_translation');
	}

	public function section_language(){
		return $this->belongsTo('App\LanguageTranslation','language_id','language_id');
	}

	public function section(){
		return $this->belongsTo('App\Section','section_id','section_id');
	}
}
