<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Apparel extends Model
{

    public $primaryKey="id";
    protected $table="apparel";

    public static $Addrule=[
        'apparel_name'=>'required|max:1024',
    ];


public function status(){
    return $this->belongsTo('App\Status','status_id','status_id');
}

public function sizes(){
    return $this->belongsTo('App\SizeGroup','size_group_id','id');
}


}