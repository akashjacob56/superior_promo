<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryStatus extends Model
{
	public $primaryKey='delivery_status_id';

	public static $rules=[
	'delivery_status_name'=>'required|max:20|unique:delivery_status_translations,delivery_status_name',
	'delivery_status_color'=>'required|max:6',
    'language_id'=>'required|numeric',
	];

	public static $editRules=[
	'delivery_status_name'=>'required|max:20',
	'delivery_status_color'=>'required|max:6',
	];

    public static $translation=[
        'delivery_status_name'=>'required|max:20|unique:delivery_status_translations,delivery_status_name',
        'language_id'=>'required|numeric',
    ];

	public static $deliveryboyAddRule=[
    'name'=>'required|max:40',    
    'email'=>'required|email|unique:users,email|max:40',
    'contact_number'=>'required|unique:users,contact_number|max:15|min:10',
    'optional_contact_number'=>'',
    'city_name'=>'required|min:4|max:40',
    'state_name'=>'required|min:4|max:40',
    'country_name'=>'required|min:4|max:400',
    'address'=>'required|max:200',
    'pincode'=>'required|numeric|digits:6',
    'password' => 'required|max:20',
    'confirm_password' => 'required|max:20|same:password'
    ];

    public static $deliveryboyEditRule=[
    'name'=>'required|max:40',    
    'email'=>'required|email|max:40',
    'contact_number'=>'required|max:15|min:10',
    'optional_contact_number'=>'',
    'password' => 'max:20',
    'confirm_password' => 'max:20|same:password',
    'city_name'=>'required|min:4|max:40',
    'state_name'=>'required|min:4|max:40',
    'country_name'=>'required|min:4|max:40',
    'address'=>'required|max:200',
    'pincode'=>'required|numeric|digits:6'
    
    ];

	public function default_delivery_status_translation(){
		return $this->belongsTo('App\DeliveryStatusTranslation','delivery_status_translation_id','delivery_status_translation_id');
	}

	public function delivery_status_translation(){
		return $this->hasOne('App\DeliveryStatusTranslation','delivery_status_id','delivery_status_id');
	}
    public function status(){
        return $this->belongsTo('App\Status','status_id','status_id');
    }


}
