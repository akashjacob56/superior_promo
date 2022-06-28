<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model{

	public $primaryKey='review_id';
	

	public function user(){
		return $this->hasOne('App\User','id','user_id');
	}

	
	

	public function product() {
		return $this->belongsTo('App\Product','product_id')->with('product_translation');
	}

	public function images() {
		return $this->hasMany('App\ReviewImage','review_id','review_id');
	}

	public function default_product_translation(){
		return $this->belongsTo('App\ProductTranslation','product_translation_id','product_translation_id');
	}

	public function product_translation(){
		return $this->hasOne('App\ProductTranslation','product_id','product_id');
	}

	public static $customerReview=[
        'rating'=>'required',
        'review'=>'required|max:200',
    ];
    




}
