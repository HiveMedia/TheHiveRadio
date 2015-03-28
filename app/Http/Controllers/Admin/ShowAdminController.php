<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RadioShows;
use App\ShowEps;

use Request;
use DB;

class ShowAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (\Auth::user()->IsRole('showHost')) {
            if (\Auth::user()->IsRole('Admin')) {
                $postsdata = RadioShows::all();
            } else {
                $postsdata = RadioShows::all()->where('host_id', \Auth::user()->id);
            }
            return view('admin.show.index')->with('postsdata', $postsdata->toArray());
        } else {
            return '403 Permission Denied';
        }
    }


    public function edit($id)
    {
        if (\Auth::user()->IsRole('showHost')) {
            $postdata = RadioShows::find($id);
            if ($postdata->host_id == \Auth::user()->id) {
                return view('admin.show.edit')->with('postdata', $postdata->toArray());
            }
            if (\Auth::user()->IsRole('Admin')) {
                return view('admin.show.edit')->with('postdata', $postdata->toArray());
            }
        } else {
            return '403 Permission Denied';
        }
    }

    public function update($id)
    {
        if (\Auth::user()->IsRole('showHost')) {
            $input = Request::all();
            $icon = Request::file('icon');
            $banner = Request::file('banner');

            $post = RadioShows::findOrNew($id);
            if ($post->host_id != \Auth::user()->id) {
                if (\Auth::user()->IsRole('Admin') != true) {
                    return '403 Permission Denied';

                }
            }
            $post->title = $input['title'];
            $post->description = $input['description'];
            $post->description_short = $input['description_short'];
            if (isset($input['public'])) {
                $post->public = $input['public'];
            } else {
                $post->public = false;
            }

            if ($icon) {
                $iconName = $icon->getClientOriginalName();
                $post->icon_url = '/img/show/icon/' . $iconName;
                $icon->move(public_path() . '/img/show/icon/', $iconName);
            } else {
                $post->icon_url = $input['icon_url'];
            }
            if ($banner) {
                $bannerName = $banner->getClientOriginalName();
                $post->banner_url = '/img/show/banner/' . $bannerName;
                $banner->move(public_path() . '/img/show/banner/', $bannerName);
            } else {
                $post->banner_url = $input['banner_url'];
            }

            $post->save();
            return view('admin.success');
        } else {
            return '403 Permission Denied';
        }
    }

    public function listshoweps($id)
    {
        if (\Auth::user()->IsRole('Admin')) {
            $show = RadioShows::find($id);
            $eps = $show->myeps()->getResults()->all();
            //$eps = ShowEps::all()->where('show_id',$id);
            //$eps = $eps[0]->toArray();
            $eps_array = array();
            foreach ($eps as $ep)
            {
//                dd($ep->toArray());
                $eps_array[]=$ep->toArray();
            }
            return view('admin.show.eps')->with('show', $show)->with('eps',$eps_array);
        } else {
            return '403 Permission Denied';
        }
    }

    public function uploadshow($id)
    {
        if (\Auth::user()->IsRole('showHost')) {
            $show = RadioShows::find($id);
            $user = DB::table('show_staff')->where('user_id', \Auth::user()->id)->lists('show_id');
            if (is_array($user) && $show) {
                if (in_array($show->id, $user)) {
                    return view('admin.show.upload')->with('show', $show);
                }
            }
        }
        if (\Auth::user()->IsRole('Admin')) {
            $show = RadioShows::find($id);
            if ($show) {
                return view('admin.show.upload')->with('show', $show);
            }
        } else {
            return '403 Permission Denied';
        }
    }

    public function uploadshowfiles()
    {
        $input = Request::all();
        $ep = Request::file('ep');
        $epName = $ep->getClientOriginalName();
        $newFileName = str_random(20) . '-' . $epName;

        if (\Auth::user()->IsRole('showHost')) {
            $show = RadioShows::find($input['show_id']);
            $user = DB::table('show_staff')->where('user_id', \Auth::user()->id)->lists('show_id');
            if (is_array($user) && $show) {
                if (in_array($show->id, $user)) {
                    $input->URL = '/shows/' . $input['show_id'] . '/upload/' . $newFileName;
                    $ep->move(public_path() . '/shows/' . $input['show_id'] . '/upload/', $newFileName);
                    ShowEps::create($input);
                    return view('admin.success');
                }
            }
        }

        if (\Auth::user()->IsRole('Admin')) {
            $input['URL'] = '/shows/' . $input['show_id'] . '/upload/' . $newFileName;
            $ep->move(public_path() . '/shows/' . $input['show_id'] . '/upload/', $newFileName);
            ShowEps::create($input);
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
            $icon = Request::file('icon');
            $banner = Request::file('banner');
            $input = Request::all();
            $iconName = $icon->getClientOriginalName();
            $input['icon_url'] = '/img/show/icon/' . $iconName;
            $bannerName = $banner->getClientOriginalName();
            $input['banner_url'] = '/img/show/banner/' . $bannerName;


            // $input['poster_id'] = \Auth::user()->id;
            RadioShows::create($input);
            $icon->move(public_path() . '/img/show/icon/', $iconName);
            $banner->move(public_path() . '/img/show/banner/', $bannerName);

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
