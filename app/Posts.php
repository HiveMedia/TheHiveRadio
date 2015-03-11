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
        'poster_id',

    ];

    protected $table = 'posts';


}
