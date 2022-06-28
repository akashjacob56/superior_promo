<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplaintTypeTranslation extends Model
{
    public $primaryKey='complaint_type_translation_id';

    public function language(){
		return $this->belongsTo('App\Language','language_id','language_id');
	}

	public function complaint_type_language(){
		return $this->belongsTo('App\LanguageTranslation','language_id','language_id');
	}
}
