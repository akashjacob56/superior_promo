<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderProduct extends Model
{
  
    public $primaryKey='purchase_order_product_id';


    public function skus(){
		return $this->belongsTo('App\Sku','sku_id','sku_id')->with('parent_variant')->with('child_variant')->with('product');
	}

	 public function vendor(){
		return $this->belongsTo('App\Vendor','vendor_id','vendor_id');
	}
    
}
