<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imprint extends Model
{
    protected $table="imprints";
    public $primaryKey="id";

    public function imprint_colors(){
    	return $this->hasMany('App\ImprintColor','imprint_id','id')->with('colors');
    }

    public function imprint_price(){
    	return $this->hasMany('App\ImprintPrice','imprint_id','id');
    }
}
