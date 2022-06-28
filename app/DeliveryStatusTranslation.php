<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryStatusTranslation extends Model
{
    public $primaryKey='delivery_status_translation_id';

    public function language(){
		return $this->belongsTo('App\Language','language_id','language_id');
	}

	public function delivery_status_language(){
		return $this->belongsTo('App\LanguageTranslation','language_id','language_id');
	}
}
