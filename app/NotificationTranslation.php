<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationTranslation extends Model{
	
    public $primaryKey='notification_translation_id';

    public function language(){
		return $this->belongsTo('App\Language','language_id','language_id')->with('default_language_translation');
	}

	public function child_variant_language(){
		return $this->belongsTo('App\LanguageTranslation','language_id','language_id');
	}
	
}
