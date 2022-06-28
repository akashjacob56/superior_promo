<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsLetter extends Model
{
    public $primaryKey='news_letter_id';

    public static $news_letter=[
		'news_letter_email'=>'required',
		
	];
}
