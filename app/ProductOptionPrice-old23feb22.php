<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOptionPrice extends Model
{

    public $primaryKey='id';

    public function vendors(){
    	return $this->belongsTo('App\User','vendor_id','id');
    }
}
