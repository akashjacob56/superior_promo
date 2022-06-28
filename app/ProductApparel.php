<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class ProductApparel extends Model
{

    public $primaryKey="id";
    protected $table="product_apparel";


public function apparel(){
    return $this->belongsTo('App\Apparel','apparel_id','id')->with('sizes');
}

}