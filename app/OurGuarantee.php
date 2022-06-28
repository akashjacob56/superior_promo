<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class OurGuarantee extends Model
{
	public $primaryKey='id';
	protected $table="our_guarantee";
	public $timestamps=false;


	public function status(){
	    return $this->belongsTo('App\Status','status_id','status_id');
	 }

}
