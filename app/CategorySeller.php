<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorySeller extends Model
{
    public $primaryKey='seller_detail_id';

    public function category(){
		return $this->belongsTo('App\Category','category_id','category_id')->with('default_category_translation');	
	}
}
