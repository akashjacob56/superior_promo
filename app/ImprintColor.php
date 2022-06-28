<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImprintColor extends Model
{
    protected $table="imprint_colors";
    public $primaryKey="id";

    public function colors(){
    	return $this->belongsTo('App\Color','color_id','id');
    }
}
