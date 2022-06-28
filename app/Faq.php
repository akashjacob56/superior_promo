<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
      //
	public $primaryKey='faq_id';

	public function default_faq_translation(){
		return $this->belongsTo('App\FaqTranslation','faq_translation_id','faq_translation_id')->with('language');
	}

	public function faq_translation(){
		return $this->hasOne('App\FaqTranslation','faq_id','faq_id')->with('language');
	}	
}
