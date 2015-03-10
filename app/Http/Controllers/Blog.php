<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Posts;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class Blog extends Controller {

	//
	public function post ($page) {

	    $postdata = Posts::find($page);
        if ($postdata->public == '0')
        {
            return view('blog.post')->with('postdata',$postdata->toArray());
        }
        return 404;
	}

    public function pageone (){
        $postdata = Posts::all()->sortByDesc('id')->where('public','=',false);
        return view('blog.posts')->with('postsdata',$postdata->toArray());
    }
    public function page ($page) {
        //Add pagination logic later
        $postdata = Posts::all()->sortByDesc('id')->where('public','=',false);
        return view('blog.posts')->with('postsdata',$postdata->toArray());
    }


    public function home ()
    {

        $postsdata = Posts::all()->sortByDesc('id')->where('public', '=', false);
        $count = $postsdata->count();
        $postsdata = $postsdata->toArray();

        $postsdat = array();
        for ($x = 0; $x <= 2; $x++) {
            $now = $count - $x;
            if (isset($postsdata[$now])) {
                $postsdat[$x] = $postsdata[$now];
            }
        }

        return view('blog.home')->with('postsdata',$postsdat);


    }
}
