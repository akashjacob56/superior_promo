<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessLanguage extends Model
{
	public $primaryKey='business_language_id';

	public function language(){
		return $this->belongsTo('App\Language','language_id','language_id');
	}		
}
