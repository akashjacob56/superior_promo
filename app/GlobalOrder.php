<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GlobalOrder extends Model
{
    public $primaryKey='global_order_id';

    public function order(){
		return $this->hasMany('App\Order','global_order_id','global_order_id');
	}

	// public function user(){
	// 	return $this->belongsTo('App\User','user_id','id');
	// }

	/*public function transaction(){
		return
	}*/

}
