<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationLabel extends Model
{
    

    public $primaryKey='notification_label_id';


    public static $translation=[

    'empty_notification_title'=>'required|max:40',  
    'empty_notification_description'=>'required|max:40',  
    
];

public function language(){
    return $this->belongsTo('App\Language','language_id','language_id')->with('default_language_translation');
}
}
