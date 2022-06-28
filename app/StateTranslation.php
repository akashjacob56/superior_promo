<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StateTranslation extends Model
{
    public $primaryKey='state_translation_id';

	public function state(){
    	return $this->belongsTo('App\State','state_id','state_id');
    }
}
