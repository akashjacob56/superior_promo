<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerReview extends Model
{
    
    public $primaryKey='review_id';
	

	public function user(){
		return $this->hasOne('App\User','id','user_id');
	}

	public function seller() {
		return $this->belongsTo('App\SellerDetail','seller_detail_id');
	}

	
	public function default_Seller_detail_translation(){
		return $this->belongsTo('App\SellerDetailTranslation','Seller_detail_translation_id','Seller_detail_translation_id');
	}

	public function Seller_detail_translation(){
		return $this->hasOne('App\SellerTranslation','seller_detail_id','seller_detail_id');
	}
}
