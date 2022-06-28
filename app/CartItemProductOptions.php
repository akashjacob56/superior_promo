<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
class CartItemProductOptions extends Model{
  public $primaryKey='id';
 
    public function cartitemSubproductOptions(){
    return $this->belongsTo('App\CartitemProductSubOptions','id','cart_item_product_option_id');
    }

}