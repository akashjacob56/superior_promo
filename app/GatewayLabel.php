<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GatewayLabel extends Model
{
    public $primaryKey='gateway_label_id';


     public static $translation=[

    'payment_options'=>'required|max:100',  
    'pay_u_money'=>'required|max:100',  
    'pay_pal'=>'required|max:100',  
    'paytm'=>'required|max:100',    
    'mobi_kwik'=>'required|max:100',  
    'c_c_avenue'=>'required|max:100',  
];

public function language(){
    return $this->belongsTo('App\Language','language_id','language_id')->with('default_language_translation');
}
    
}
