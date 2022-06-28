<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{

    public $primaryKey = "id";
    public function product_option_prices(){
	return $this->hasMany('App\ProductOptionPrice','product_option_id','id')->with('vendors');
    }
}
