<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class ProductSubOption extends Model
{

    public $primaryKey = "id";
    protected $table="product_sub_options";


    public function product_sub_option_prices(){
    return $this->hasMany('App\ProductSubOptionPrices','product_sub_option_id','id');
    }

}
