<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Posts;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class Blog extends Controller {

	//
	public function post ($page) {

	    $postdata = Posts::find($page);
        return view('blog.post')->with('postdata',$postdata->toArray());
	}

    public function pageone (){
        $postdata = Posts::all()->sortByDesc('id');
        return view('blog.posts')->with('postsdata',$postdata->toArray());
    }
    public function page ($page) {
        //Add pagination logic later
        $postdata = Posts::all()->sortByDesc('id');

        return view('blog.posts')->with('postsdata',$postdata->toArray());
    }
}
