<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtWork extends Model
{
    public $primaryKey='art_work_id';
    protected $table="art_works";
}
