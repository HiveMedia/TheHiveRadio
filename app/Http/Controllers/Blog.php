<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Posts;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use SebastianBergmann\Comparator\ArrayComparatorTest;

class Blog extends Controller
{

    // Display Single Post
    public function post($id)
    {

        $postdata = Posts::find($id);
        $poster = User::find($postdata['poster_id']);

        if (isset($poster)) {
            $postdata['poster_name'] = $poster->name;
        } else {
            // Well this get triggered if No Post lol
            \App::abort(404, 'Not Found.');
        }

        if ($postdata->public == '0') {
            return view('blog.post')->with('post', $postdata);
        }
        \App::abort(404, 'Not Found.');
    }

    // Display first page of pagination
    public function pageone()
    {
        $postsdata = Posts::all()->sortBy('id')->where('public', '=', false)->forPage(1, 5);
        foreach ($postsdata as $post) {
            $postsdat[$post['id']] = $post;
            $poster = User::find($post['poster_id']);

            if (isset($poster)) {
                $postsdat[$post['id']]['poster_name'] = $poster->name;
            } else {
                return 'INTERNAL ERROR: 1';
            }
        }
        return view('blog.posts')->with('postsdata', $postsdat)->with('pagination', Array('Last'=>'0','Next'=>'2'));
    }

    // Display Page from Pagination
    public function page($page)
    {
        $postsdata = Posts::all()->sortBy('id')->where('public', '=', false)->forPage($page, 5);
        foreach ($postsdata as $post) {
            $postsdat[$post['id']] = $post;
            $poster = User::find($post['poster_id']);

            if (isset($poster)) {
                $postsdat[$post['id']]['poster_name'] = $poster->name;
            } else {
                return 'INTERNAL ERROR: 1';
            }
        }
        $lastPage = $page - 1;
        if (count($postsdat) == 5)
        {
            $nextPage = $page + 1;
        } else {
            $nextPage = '';
        }
        return view('blog.posts')->with('postsdata', $postsdat)->with('pagination', Array('Last'=>$lastPage,'Next'=>$nextPage));
    }


    public function home()
    {

        $postsdata = Posts::all()->sortByDesc('id')->where('public', '=', false);
        $count = $postsdata->count();
        $postsdata = $postsdata->toArray();

        $postsdat = array();
        for ($x = 0; $x <= 3; $x++) {
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
