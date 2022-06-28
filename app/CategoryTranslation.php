<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
	public $primaryKey='category_translation_id';

	public static $rules=[
	'category_name'=>'required|max:25',
	'category_id'=>'required|numeric',   
	'language_id'=>'required|numeric',	  
	];


	public function language(){
		return $this->belongsTo('App\Language','language_id','language_id')->with('default_language_translation');
	}

	public function category_language(){
		return $this->belongsTo('App\LanguageTranslation','language_id','language_id');
	}

	public function category(){
		return $this->belongsTo('App\Category','category_id','category_id');
	}
	

	public function category_product(){
		return $this->hasMany('App\CategoryProduct','category_id','category_id');
	}

}
