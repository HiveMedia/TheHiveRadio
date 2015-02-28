<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RadioSchedule extends Model {

	//
    //
    protected $table = 'shows';
    protected $fillable = [
        'showid',
        'start',
        'length',
        'public',
    ];

}
