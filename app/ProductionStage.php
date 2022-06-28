<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductionStage extends Model
{
    public $primaryKey="production_stage_id";
    protected $table="production_stages";
}
