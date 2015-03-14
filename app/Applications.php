<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Applications extends Model {

	//
    protected $table = 'applications';
    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'dob',
        'country',
        'email',
        'skype',
        'handle',
        'references',
        'tos',
        'status',
        'email',
        ];
}
