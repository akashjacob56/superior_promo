<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class ProductColorGroup extends Model
{
    public $primaryKey='id';

/*    public function product_color(){
        return $this->belongsTo('App\ProductColor','id','product_color_group_id');
    }*/

    public function product_colors(){
        return $this->hasMany('App\ProductColor','product_color_group_id','id')->with('color');
    }
}
