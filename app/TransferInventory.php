<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferInventory extends Model
{
    public function product(){
		return $this->belongsTo('App\Product','product_id','product_id')->with('seller')->with('reviewCount')->with('gst')->with('brand')->with('skuCount')->with('status')->with('default_product_translation');
	}

	public function sku(){
		return $this->belongsTo('App\Sku','sku_id','sku_id')->with('parent_variant')->with('child_variant');
	}

	public function user(){
		return $this->belongsTo('App\User','added_by','id');
	}
}
