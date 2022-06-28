<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $table="stages";
    public $primaryKey="id";

     public function orderitem(){
		return $this->belongsTo('App\OrderItem','id','stage_id');
	}


	 
	public function order_count(){
		return $this->orderitem()->selectRaw('stage_id, count(stage_id) as total_stage')
 	       ->groupBy('stage_id');
	}
}
