<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerDetail extends Model
{
    public $primaryKey='seller_detail_id';
	
	public function user(){
		return $this->belongsTo('App\User','user_id','id')->with('status')->with('city')->with('state')->with('country')->with('area');	
	}

	public function seller(){
		return $this->belongsTo('App\User','user_id','id')->with('product');	
	}

	
	public function default_seller_detail_translation(){
		return $this->belongsTo('App\SellerDetailTranslation','seller_detail_translation_id','seller_detail_translation_id');	
	}

	public function seller_detail_translation(){
		return $this->hasOne('App\SellerDetailTranslation','seller_detail_id','seller_detail_id');	
	}

public function seller_category(){
		return $this->hasOne('App\CategorySeller','seller_detail_id','seller_detail_id')->with('category');	
	}

	public function review(){
		return $this->hasOne('App\SellerReview','seller_detail_id','seller_detail_id');
	}


	public function reviewCount(){
		return $this->review()
		->selectRaw('seller_detail_id, count(*) as rating_count, avg(rating) as rating')
		->groupBy('seller_detail_id');
	}


}
