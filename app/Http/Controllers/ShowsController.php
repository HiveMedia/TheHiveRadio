<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\RadioShows;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\User;
use Illuminate\Http\Request;

class ShowsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $showsdata = RadioShows::all()->where('public', '=', false);
        return view('shows.index')->with('showsdata',$showsdata->toArray());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
    {
        //
        $showdata = RadioShows::find($id);
        if ($showdata->public) {
            \App::abort(404, 'Not Found.');
        }
        $peeps = DB::select('select * from show_staff where show_id = ?', [$id]);
        foreach($peeps as $peep)
        {
            $people=array();
            $tmp = User::find($peep->user_id);
            if (!$tmp->public) {
                $people[] = $tmp;
            }
        }
        return view('shows.show')->with('showdata',$showdata->toArray())->with('people',$people);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
