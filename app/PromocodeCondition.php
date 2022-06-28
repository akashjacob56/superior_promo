<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromocodeCondition extends Model
{
    public $primaryKey='promocode_condition_id';

    public static $rules=[
	'promocode_condition_name'=>'required|unique:promocode_conditions,promocode_condition_name',
	'promocode_condition_title'=>'required|max:100',		
	];

	public static $editRules=[
		'promocode_condition_name'=>'required|unique:promocode_conditions,promocode_condition_name',
	'promocode_condition_title'=>'required|max:100',	
	];
}
