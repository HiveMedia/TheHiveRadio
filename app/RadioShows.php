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
        $this->myStaff()->create(['user_id'=>$user]);

    }
    public function RemoveHost($user)
    {
        dd($this->id);
    }
    public function myeps()
    {
        return $this->hasMany('App\ShowEps','show_id','id');
    }
    public function myStaff()
    {
        return $this->hasMany('App\Show_staff','show_id','id');
    }
}
