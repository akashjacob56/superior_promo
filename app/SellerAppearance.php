<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerAppearance extends Model
{
	public $primaryKey='seller_appearances_id';
	
	public function seller(){
		return $this->hasOne('App\User','id','seller_id');	
	}
	
}
