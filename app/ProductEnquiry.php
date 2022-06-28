<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductEnquiry extends Model
{

	public $primaryKey='product_enquiry_id';

	public function user(){
		return $this->belongsTo('App\User','user_id','id');
	}	
	public function product(){
		return $this->belongsTo('App\Product','product_id','product_id')->with('default_product_translation_full');
	}		
}
