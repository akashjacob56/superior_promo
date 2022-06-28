<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderLog extends Model
{
    public $primaryKey='order_log_id';


    public function user(){
		return $this->belongsTo('App\User','status_changed_by','id');
	}
	 public function order(){
		return $this->belongsTo('App\Order','order_id','order_id');
	}
}
