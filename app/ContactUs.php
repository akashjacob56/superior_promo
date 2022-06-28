<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class ContactUs extends Model
{
	public $primaryKey='id';
	protected $table="contact_us";
	public $timestamps=false;

}
