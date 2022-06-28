<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplaintLabel extends Model
{
    public $primaryKey='complaint_label_id';


    public static $translation=[

    'add_complaint'=>'required|max:100',  
    'select_complaint_type'=>'required|max:100',  
    'complaint_description'=>'required|max:100',  
    'do_you_have_any_query'=>'required|max:100',    
    'complaint_list_empty'=>'required|max:100',  
    'transaction_list_empty'=>'required|max:100',  
    'online_payment'=>'required|max:100',  
    'please_type_your_query'=>'required|max:100',  
    'please_select_complaint_type'=>'required|max:100',  
];

public function language(){
    return $this->belongsTo('App\Language','language_id','language_id')->with('default_language_translation');
}
}
