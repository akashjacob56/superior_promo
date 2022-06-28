<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackingInformation extends Model
{
    public $primaryKey='id';
    protected $table="tracking_informations";
    public function order_item(){
		return $this->belongsTo('App\OrderItem','order_item_id','id');
	}

		
}
