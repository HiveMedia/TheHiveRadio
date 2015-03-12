<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RadioShows;

use Request;

class ShowAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (\Auth::user()->IsRole('showHost')) {
            $postsdata = RadioShows::all();
            return view('admin.show.index')->with('postsdata', $postsdata->toArray());
        } else {
            return '403 Permission Denied';
        }
    }


    public function edit($id)
    {
        if (\Auth::user()->IsRole('showHost')) {
            $postdata = RadioShows::find($id);
            return view('admin.show.edit')->with('postdata', $postdata->toArray());
        } else {
            return '403 Permission Denied';
        }
    }

    public function update($id)
    {
        if (\Auth::user()->IsRole('showHost')) {

            $input = Request::all();
            $post = RadioShows::findOrNew($id);

            $post->title = $input['title'];
            $post->description = $input['description'];
            $post->description_short = $input['description_short'];
            if (isset($input['public'])) {
                $post->public = $input['public'];
            } else {
                $post->public = false;
            }
            $post->icon_url = $input['icon_url'];
            $post->banner_url = $input['banner_url'];

            $post->save();
            return view('admin.success');
        } else {
            return '403 Permission Denied';
        }
    }

    public function create()
    {
        if (\Auth::user()->IsRole('Admin')) {
            return view('admin.show.create');
        } else {
            return '403 Permission Denied';
        }
    }

    public function createShow()
    {
        if (\Auth::user()->IsRole('Admin')) {
            $input = Request::all();
            $input['poster_id'] = \Auth::user()->id;
            //   dd($input);
            RadioShows::create($input);
            return view('admin.success');
        } else {
            return '403 Permission Denied';
        }
    }

    public function togpublivity($id)
    {
        if (\Auth::user()->IsRole('Admin')) {
            $post = RadioShows::find($id);
            if ($post->public == '1') {
                $post->public = false;
            } else {
                $post->public = true;
            }
            $post->save();
            return view('admin.success');
        } else {
            return '403 Permission Denied';
        }
    }

    public function delete($id)
    {
        if (\Auth::user()->IsRole('Admin')) {
            $postdata = RadioShows::find($id);
            return view('admin.show.delete')->with('postdata', $postdata->toArray());
        } else {
            return '403 Permission Denied';
        }
    }

    public function DeleteShow($id)
    {
        if (\Auth::user()->IsRole('Admin')) {
            $post = RadioShows::find($id);
            $post->delete($id);
            return view('admin.success');
        } else {
            return '403 Permission Denied';
        }
    }
}
