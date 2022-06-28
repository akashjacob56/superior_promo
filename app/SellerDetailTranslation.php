<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerDetailTranslation extends Model
{
     public $primaryKey='seller_detail_translation_id';
	
	public function seller_detail_translation(){
		return $this->belongsTo('App\SellerDetailTranslation','seller_detail_id','seller_detail_id');	
	}

	public function seller(){
		return $this->belongsTo('App\SellerDetail','seller_detail_id','seller_detail_id')->with('reviewCount');
	}	
}
