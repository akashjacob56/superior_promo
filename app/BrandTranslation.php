<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandTranslation extends Model
{
	public $primaryKey='brand_translation_id';

	public static $rules=[
	'brand_name'=>'required',
	'language_id'=>'required|numeric'
	];
	

    public function language(){
		return $this->belongsTo('App\Language','language_id','language_id');
	}

	public function brand_language(){
		return $this->belongsTo('App\LanguageTranslation','language_id','language_id');
	}

}
