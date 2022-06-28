<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PromocodeCondition;
use App\Promocode;

class Promocode extends Model
{
	public $primaryKey='promocode_id';

	public static $rules=[
	'promocode_name'=>'required|unique:promocodes,promocode_name',
	'promocode_condition_id'=>'required',	
	'max_amount'=>'required|numeric|between:0,9999.99',
	'min_amount'=>'required|numeric|between:0,9999.99',
	'limit'=>'required|numeric|min:0|max:999',
	'start_date'=>'required',
	'end_date'=>'required',
	
	];

   	public function promocode_condition(){
		return $this->belongsTo('App\PromocodeCondition','promocode_condition_id','promocode_condition_id');
	}
}
