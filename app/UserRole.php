<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    public $primaryKey='store_user_id';

    public function role(){
        return $this->belongsTO('App\Role','role_id','role_id');
    }
}
