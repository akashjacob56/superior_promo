<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model{

	public $primaryKey='complaint_id';

	public static $rules=[
	'user_id'=>'required',
	'complaint_type_id'=>'required',   
	'description'=>'required',	  
	];


	public static $addcomment=[
	'comment'=>'required',	
	];

	public function user(){
		return $this->hasOne('App\User','id','user_id');
	}
	
	public function complaint_type(){
		return $this->hasOne('App\ComplaintType','complaint_type_id','complaint_type_id')->with('default_complaint_type_translation');
	}

	public function complaint_status(){
		return $this->hasOne('App\ComplaintStatus','complaint_status_id','complaint_status_id')->with('default_complaint_status_translation');;
	}
	public function complaint_status_translations(){
		return $this->hasOne('App\ComplaintStatusTranslation','complaint_status_translation_id','complaint_status_translation_id');
	}
}
