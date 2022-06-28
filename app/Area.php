<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
		public $primaryKey='area_id';

		public static $rules=[
		'pincode_id'=>'required',	
		'area'=>'required|min:1|max:40',	
	];

	public static $editRules=[
		'pincode_id'=>'required',	
		'area'=>'required|min:1|max:40',
	];

	public static $translation=[
        'country_name'=>'required|max:30',
        'language_id'=>'required|numeric',
    ];

	public function pincode(){
		return $this->belongsTo('App\Pincode','pincode_id','pincode_id');

	}

	public function default_area_translation(){
		return $this->belongsTo('App\AreaTranslation','area_translation_id','area_translation_id');
	}

	public function area_translation(){
		return $this->hasOne('App\AreaTranslation','area_id','area_id');
	}
	
	public function language(){
		return $this->belongsTo('App\Language','language_id','language_id')->with('default_language_translation');
	}

	public function parent_variant_language(){
		return $this->belongsTo('App\LanguageTranslation','language_id','language_id');
	}

	public function status(){
		return $this->belongsTo('App\Status','status_id','status_id');
	}
	
}
