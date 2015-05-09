<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AutoDJ;

use Illuminate\Http\Request;

class AutoDJAdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        return view('admin.auto.index');
    }
    public function SongDB()
    {
        //
        return view('admin.auto.songdb');
    }
    public function songsSingle()
    {
        return $this->Songs(0);
    }
    public function Songs ($page)
    {
        if (is_null($page))
        {
            $page=0;
        }
        $music = AutoDJ::all()->sortBy('Artist');
        return $music->forPage($page,30);
    }

    public function Song($id)
    {
        $music = AutoDJ::find($id);
        return $music;
    }
}
