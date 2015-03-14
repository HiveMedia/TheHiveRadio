<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RadioSchedule extends Model {

	//
    //
    protected $fillable = [
        'showid',
        'start',
        'length',
        'public',
    ];

}
