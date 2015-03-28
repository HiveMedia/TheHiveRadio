<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class RadioShows extends Model {

	//
	protected $table = 'shows';
    protected $fillable = [
        'title',
        'host_id',
        'description',
        'description_short',
        'icon_url',
        'banner_url',
        'public',
    ];
    public function AddHost($user)
    {

        dd($this->id);

    }
    public function RemoveHost($user)
    {
        dd($this->id);
    }
    public function myeps()
    {
        return $this->hasMany('App\ShowEps','show_id','id');
    }
}
