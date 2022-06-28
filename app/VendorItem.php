<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorItem extends Model
{
    public $primaryKey='vendor_item_id';

  public function item(){
    return $this->belongsTo('App\Item','item_id','item_id');
  }

  public function vendorcall(){
    return $this->belongsTo('App\VendorCall','vendor_call_id','vendor_call_id');
  }
}
