<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowApplications extends Model {

	//
    protected $table = 'show_applications';
    protected $fillable = [
        'host_id',
        'title',
        'description',
        'description_short',
        'type',
        'live',
        'existence',
        'classifications',
        'timeslot',
        'length',
        'speedtest',
        'other',
        'tos',
        'status',
    ];

}
