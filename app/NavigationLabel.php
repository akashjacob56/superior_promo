<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NavigationLabel extends Model{

    public $primaryKey='navigation_label_id';

   

    public static $translation=[

        'login'=>'required|max:40',  
        'home'=>'required|max:40',  
        'welcome'=>'required|max:40',  
        'more'=>'required|max:40',    
        'notifications'=>'required|max:40',  
        'my_wishlist'=>'required|max:40',  
        'my_cart'=>'required|max:40',  
        'my_orders'=>'required|max:40',  
        'my_wallet'=>'required|max:40',  
        'my_account'=>'required|max:40',  
        'share'=>'required|max:40',  
        'language_label'=>'required|max:40',  
        'support'=>'required|max:40',  
        'about_us'=>'required|max:40',  
        'policy'=>'required|max:40',  
        'logout'=>'required|max:40',          
    ];

   

    public function language(){
        return $this->belongsTo('App\Language','language_id','language_id')->with('default_language_translation');
    }
}
