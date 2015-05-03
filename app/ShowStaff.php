<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowStaff extends Model {

    //
    protected $table = 'show_staff';
    public $timestamps = false;

    protected $fillable = [
        'show_id',
        'user_id',
    ];
}
