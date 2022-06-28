<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
	public $primaryKey='cart_id';

	public function order_product(){
		return $this->belongsTo('App\OrderProduct','source_id','source_id');
	}

	public function order_source(){
		return $this->order_product()
		->selectRaw('source_id,product_id, sum(total_amount) as sum_total_amount, sum(quantity) as total_quantity')
		->groupBy('source_id','product_id');
	}
}
