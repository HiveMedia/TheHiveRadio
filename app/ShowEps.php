<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowEps extends Model {

	//
    protected $table = 'show_eps';
    protected $fillable = [
        'show_id',
        'title',
        'description',
        'releasedate',
        'public',
        'URL',
    ];
}
