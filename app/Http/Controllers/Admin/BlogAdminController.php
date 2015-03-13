<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Posts;

use Request;

class BlogAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (\Auth::user()->IsRole('Editor')) {
            $postsdata = Posts::all();
            return view('admin.blog.index')->with('postsdata', $postsdata->toArray());
        } else {
            return '403 Permission Denied';
        }
    }


    public function edit($id)
    {
        if (\Auth::user()->IsRole('Editor')) {
            $postdata = Posts::find($id);
            return view('admin.blog.edit')->with('postdata', $postdata->toArray());
        } else {
            return '403 Permission Denied';
        }
    }

    public function update($id)
    {
        if (\Auth::user()->IsRole('Editor')) {

            $input = Request::all();
            $post = Posts::findOrNew($id);

            $post->title = $input['title'];
            $post->body = $input['body'];
            if (isset($input['public'])) {
                $post->public = $input['public'];
            } else {
                $post->public = false;
            }
            $post->image_url = $input['image_url'];

            $post->save();
            return view('admin.success');
        } else {
            return '403 Permission Denied';
        }
    }

    public function create()
    {
        if (\Auth::user()->IsRole('Editor')) {

            return view('admin.blog.create');
        } else {
            return '403 Permission Denied';
        }
    }

    public function createPost()
    {
        if (\Auth::user()->IsRole('Editor')) {
            $input = Request::all();
            $file  = Request::file('file');
            $fileName = $file->getClientOriginalName();

            $input['image_url'] = '/img/blog/'.$fileName;
            $input['poster_id'] = \Auth::user()->id;
            Posts::create($input);
            $file->move(public_path().'/img/blog/', $fileName);

            return view('admin.success');
        } else {
            return '403 Permission Denied';
        }
    }

    public function togpublivity($id)
    {
        if (\Auth::user()->IsRole('Editor')) {

            $post = Posts::find($id);
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
        if (\Auth::user()->IsRole('Editor')) {

            $postdata = Posts::find($id);
            return view('admin.blog.delete')->with('postdata', $postdata->toArray());
        } else {
            return '403 Permission Denied';
        }
    }

    public function DeletePost($id)
    {
        if (\Auth::user()->IsRole('Editor')) {

            $post = Posts::find($id);
            $post->delete($id);

            return view('admin.success');
        } else {
            return '403 Permission Denied';
        }
    }
}
