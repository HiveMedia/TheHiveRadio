<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model {

	//
    protected $fillable = [
        'title',
        'body',
        'subject',
        'image_url',
        'public',
    ];

    protected $table = 'posts';


}
