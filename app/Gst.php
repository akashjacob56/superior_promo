<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gst extends Model
{
	public $primaryKey='gst_id';

	public static $rules=[
	'gst'=>'required|numeric|between:1,99|unique:gsts,gst',
	];

	public static $editRules=[
	'gst'=>'required|numeric|between:1,99',
	];
	public function status(){
		return $this->belongsTo('App\Status','status_id','status_id');
	}
}
