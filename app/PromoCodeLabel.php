<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromoCodeLabel extends Model
{
    public $primaryKey='promocode_label_id';


    public static $translation=[

    'apply'=>'required|max:100',  
    'add_new'=>'required|max:100',
    'promocode'=>'required|max:100',

    
];

public function language(){
    return $this->belongsTo('App\Language','language_id','language_id')->with('default_language_translation');
}
}
