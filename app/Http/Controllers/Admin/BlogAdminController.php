<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Posts;

use Request;

class BlogAdminController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $postsdata = Posts::all();
        return view('admin.blog.index')->with('postsdata', $postsdata->toArray());
    }


    public function edit($id)
    {
        $postdata = Posts::find($id);
        return view('admin.blog.edit')->with('postdata', $postdata->toArray());
    }
    public function update($id)
    {
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
    }

    public function create()
    {
        return view('admin.blog.create');
    }
    public function createPost()
    {
        $input = Request::all();

        $input['poster_id'] = \Auth::user()->id;
        Posts::create($input);
        return view('admin.success');
    }

    public function togpublivity($id)
    {
        $post = Posts::find($id);
            if ($post->public=='1')
            {
                $post->public=false;
            } else {
                $post->public=true;
            }
        $post->save();
        return view('admin.success');
    }

    public function delete($id)
    {
        $postdata = Posts::find($id);
        return view('admin.blog.delete')->with('postdata',$postdata->toArray());
    }

    public function DeletePost($id)
    {
        $post = Posts::find($id);
        $post->delete($id);

        return view('admin.success');
    }
}
