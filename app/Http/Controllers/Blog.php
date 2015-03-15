<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Posts;
use App\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class Blog extends Controller
{

    //
    public function post($page)
    {

        $postdata = Posts::find($page);
        $poster = User::find($postdata['poster_id']);

        if (isset($poster)) {
            $postdata['poster_name'] = $poster->name;
        } else {
            return 'INTERNAL ERROR: 1';
        }

        if ($postdata->public == '0') {
            return view('blog.post')->with('post', $postdata);
        }
        return 404;
    }

    public function pageone()
    {
        $postsdata = Posts::all()->sortByDesc('id')->where('public', '=', false);
        $count = $postsdata->count();
        $postsdata = $postsdata->toArray();

        $postsdat = array();
        for ($x = 0; $x <= 2; $x++) {
            $now = $count - $x;
            if (isset($postsdata[$now])) {
                $postsdat[$x] = $postsdata[$now];
                $poster = User::find($postsdat[$x]['poster_id']);

                if (isset($poster)) {
                    $postsdat[$x]['poster_name'] = User::find($postsdat[$x]['poster_id'])->name;
                } else {
                    return 'INTERNAL ERROR: 1';
                }
            }
        }

        return view('blog.posts')->with('postsdata', $postsdat);
    }

    public function page($page)
    {
        //Add pagination logic later
        $postdata = Posts::all()->sortByDesc('id')->where('public', '=', false);
        return view('blog.posts')->with('postsdata', $postdata->toArray());
    }


    public function home()
    {

        $postsdata = Posts::all()->sortByDesc('id')->where('public', '=', false);
        $count = $postsdata->count();
        $postsdata = $postsdata->toArray();

        $postsdat = array();
        for ($x = 0; $x <= 2; $x++) {
            $now = $count - $x;
            if (isset($postsdata[$now])) {
                $postsdat[$x] = $postsdata[$now];
                $poster = User::find($postsdat[$x]['poster_id']);

                if (isset($poster)) {
                    $postsdat[$x]['poster_name'] = User::find($postsdat[$x]['poster_id'])->name;
                } else {
                    return 'INTERNAL ERROR: 1';
                }
            }
        }

        return view('blog.home')->with('postsdata', $postsdat);


    }
}
