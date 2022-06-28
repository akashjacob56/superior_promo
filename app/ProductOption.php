<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class ProductOption extends Model
{

    public $primaryKey = "id";

    public function product_option_prices(){
    return $this->hasMany('App\ProductOptionPrice','product_option_id','id')->with('vendors');
    }

    public function option_prices(){
    return $this->hasMany('App\ProductOptionPrice','product_option_id','id');
    }


   public function product_sub_option(){
    return $this->hasMany('App\ProductSubOption','product_option_id','id')->with('product_sub_option_prices');
    }


}
