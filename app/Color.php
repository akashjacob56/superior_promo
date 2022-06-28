<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table="colors";
    public $primaryKey="id";


    public function status(){
    return $this->belongsTo('App\Status','status_id','status_id');
 }

}

