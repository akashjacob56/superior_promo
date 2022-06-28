<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    public $primaryKey='id';


    public function color(){
        return $this->belongsTo('App\Color','color_id','id');
    }

    public function color_group(){
        return $this->belongsTo('App\ProductColorGroup','product_color_group_id','id');
    }
    
}
