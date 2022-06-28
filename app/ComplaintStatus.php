<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplaintStatus extends Model
{
	public $primaryKey='complaint_status_id';

	public static $rules=[
		'complaint_status_name'=>'required|max:20|unique:complaint_status_translations,complaint_status_name',
		'complaint_status_color'=>'required|max:6',
		'language_id'=>'required|numeric',
	];

	public static $editRules=[
		'complaint_status_name'=>'required|max:20',
		'complaint_status_color'=>'required|max:6',		
	];

	public static $translation=[
		'complaint_status_name'=>'required|max:20|unique:complaint_status_translations,complaint_status_name',
		'language_id'=>'required|numeric',
	];


	public function default_complaint_status_translation(){
		return $this->belongsTo('App\ComplaintStatusTranslation','complaint_status_translation_id','complaint_status_translation_id');
	}

	public function complaint_status_translation(){
		return $this->hasOne('App\ComplaintStatusTranslation','complaint_status_id','complaint_status_id');
	}

	public function status(){
		return $this->belongsTo('App\Status','status_id','status_id');
	}

	
}