<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.index');
    }

    
    public function UserList()
    {
        if (\Auth::user()->IsRole('Admin')) {

            $users = User::all();
            return view('admin.users')->with('usersdata', $users->toArray());
        } else {
            return redirect('admin/u/e/'.\Auth::user()->id);
        }
    }

    public function UserEdit($id)
    {
        if (\Auth::user()->IsRole('Admin')) {
            $user = User::find($id);
            return view('admin.useredit')->with('user', $user->toArray());
        } else {
            if (\Auth::user()->id == $id) {
                $user = User::find($id);
                return view('admin.useredit')->with('user', $user->toArray());
            }
            return '403 Permission Denied';
        }
    }

    public function UserUpdate($id)
    {
        if (\Auth::user()->IsRole('Admin') || \Auth::user()->id == $id) {
            $file  = Request::file('image');
            $input = Request::all();
            $user = User::findOrNew($id);

            if ($file)
            {
                $fileName = $file->getClientOriginalName();
                $input['avatar'] = '/img/avatar/'.$fileName;
                $file->move(public_path().'/img/avatar/', $fileName);
            } else {
                $input['avatar'] = $input['avatar'];
            }
            if (isset($input['public'])) {
                $user->public = $input['public'];
            } else {
                $user->public = false;
            }
            if (isset($input['public_email'])) {
                $user->public_email = $input['public_email'];
            } else {
                $user->public_email = false;
            }

            $user->name = $input['name'];
            $user->email = $input['email'];
            $user->avatar = $input['avatar'];

            if (\Auth::user()->IsRole('Admin'))
            {
                $user->role = $input['role'];
                $user->title = $input['title'];
                $user->job = $input['job'];

            }
            $user->save();
            return view('admin.success');
        } else {
            return '403 Permission Denied';
        }
    }
}
