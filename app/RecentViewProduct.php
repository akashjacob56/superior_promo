<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecentViewProduct extends Model
{
   public $primaryKey='recent_view_product_id';

   public function product(){
		return $this->belongsTo('App\Product','product_id','product_id');
	}
}
