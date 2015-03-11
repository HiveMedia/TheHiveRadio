<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class RadioShows extends Model {

	//
	protected $table = 'shows';
    protected $fillable = [
        'title',
        'description',
        'description_short',
        'icon_url',
        'banner_url',
        'public',
    ];

}
