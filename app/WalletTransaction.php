<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model
{
    public $primaryKey="wallet_transactions_id";

    public function user(){
		return $this->belongsTo('App\User','user_id','id');
	}
}
