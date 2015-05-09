<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AutoDJ extends Model {

    //
    protected $connection = 'RadioBot';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'body',
        'subject',
        'image_url',
        'public',
        'poster_id',

    ];

    protected $table = 'AutoDJ';


}
