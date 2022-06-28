<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplaintType extends Model{

	public $primaryKey='complaint_type_id';
	
	public static $rules=[
	'complaint_type_name'=>'required|max:40|unique:complaint_type_translations,complaint_type_name',
	'language_id'=>'required|numeric',
	];

	public static $editRules=[
	'complaint_type_name'=>'required|max:40',
	];

	public static $translation=[
        'complaint_type_name'=>'required|max:40|unique:complaint_type_translations,complaint_type_name',
        'language_id'=>'required|numeric',
    ];

	public function default_complaint_type_translation(){
		return $this->belongsTo('App\ComplaintTypeTranslation','complaint_type_translation_id','complaint_type_translation_id');
	}

	public function complaint_type_translation(){
		return $this->hasOne('App\ComplaintTypeTranslation','complaint_type_id','complaint_type_id');
	}

	public function status(){
		return $this->belongsTo('App\Status','status_id','status_id');
	}

}
