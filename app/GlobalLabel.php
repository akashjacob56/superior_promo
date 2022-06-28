<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GlobalLabel extends Model
{
	public $primaryKey='global_label_id';

	public static $translation=[

		'continue_shopping'=>'required|max:100',  
		'no_internet_connection'=>'required|max:100',  
		'please_check_your_internet_connectivity_and_try_again'=>'required|max:100',  
		'back'=>'required|max:100',  
		'cancel'=>'required|max:100',  
		'save'=>'required|max:100',  
	];

	public function language(){
		return $this->belongsTo('App\Language','language_id','language_id')->with('default_language_translation');
	}
}
