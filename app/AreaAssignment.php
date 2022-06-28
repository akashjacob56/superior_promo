<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaAssignment extends Model
{
   public $primaryKey='area_assignment_id';

   public function area(){
		return $this->belongsTo('App\AreaTranslation','area_id','area_translation_id');
	}
	 public function User(){
		return $this->belongsTo('App\User','delivery_boy_id','id');
	}

	public static $addRule=[

		"area_id"=>"required",
		"delivery_boy_id"=>"required"

	];

	public static $editRule=[

		"area_id"=>"required",
		"delivery_boy_id"=>"required"

	];
}
