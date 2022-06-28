<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVendor extends Model
{
    protected $table="product_vendors";
    public $primaryKey="id";

    public function vendors(){
    	return $this->belongsTo('App\User','vendor_id','id');
    }
}