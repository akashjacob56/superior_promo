<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaTranslation extends Model
{
   public  $primaryKey= 'area_translation_id';

   public function language(){
		return $this->belongsTo('App\Language','language_id','language_id')->with('default_language_translation');
	}

	public function area_language(){
		return $this->belongsTo('App\LanguageTranslation','language_id','language_id');
	}
}
