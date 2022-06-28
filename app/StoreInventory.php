<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreInventory extends Model
{
	public $primaryKey='store_inventory_id';

    public function product(){
		return $this->belongsTo('App\Product','product_id','product_id')->with('seller')->with('reviewCount')->with('gst')->with('brand')->with('skuCount')->with('status')->with('default_product_translation');
	}

	public function sku(){
		return $this->belongsTo('App\Sku','sku_id','sku_id')->with('parent_variant')->with('child_variant');
	}
}
