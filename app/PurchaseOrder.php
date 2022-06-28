<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    //
	public $primaryKey='purchase_order_id';

	public function user(){
		return $this->belongsTo('App\User','created_by','id');
	}

	public function vendor(){
		return $this->belongsTo('App\Vendor','vendor_id','vendor_id');
	}
	
}
