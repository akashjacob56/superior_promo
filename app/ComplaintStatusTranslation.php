<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplaintStatusTranslation extends Model
{
    public $primaryKey='complaint_status_translation_id';

     public static $rules=[
	'complaint_status_name'=>'required|max:20',
	'language_id'=>'required|numeric',
	];

    public function language(){
		return $this->belongsTo('App\Language','language_id','language_id');
	}

	public function complaint_status_language(){
		return $this->belongsTo('App\LanguageTranslation','language_id','language_id');
	}
}
