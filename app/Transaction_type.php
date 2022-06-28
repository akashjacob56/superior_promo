<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction_type extends Model
{
    public $primaryKey='transaction_type_id';

    public function order_product(){
		return $this->belongsTo('App\OrderProduct','transaction_type_id','transaction_type_id');
	}

	public function order_transaction_type(){
		return $this->order_product()
		->selectRaw('transaction_type_id, sum(total_amount) as sum_total_amount, sum(quantity) as total_quantity')
		->groupBy('transaction_type_id');
	}
}
