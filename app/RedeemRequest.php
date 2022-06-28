<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RedeemRequest extends Model
{
     public $primaryKey='redeem_request_id';

     public function user(){
		return $this->belongsTo('App\User','user_id','id');
	}
}


