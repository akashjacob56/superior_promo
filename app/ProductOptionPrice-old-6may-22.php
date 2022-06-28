<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class ProductOptionPrice extends Model
{

    public $primaryKey='id';

    public function vendors(){
        return $this->belongsTo('App\User','vendor_id','id');
    }

    public function option_prices(){
    return $this->belongsTo('App\ProductOption','product_option_id','id');
    }


}
