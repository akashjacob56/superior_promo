<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProcess extends Model
{
    public $primaryKey="order_process_id";
    protected $table = "order_processes";
}
