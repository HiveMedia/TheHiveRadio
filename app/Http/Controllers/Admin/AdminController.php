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
            return '403 Permission Denied';
        }
    }

    public function UserEdit($id)
    {
        if (\Auth::user()->IsRole('Admin')) {
            $user = User::find($id);
            return view('admin.useredit')->with('user', $user->toArray());
        } else {
            return '403 Permission Denied';
        }
    }

    public function UserUpdate($id)
    {
        if (\Auth::user()->IsRole('Admin')) {

            $input = Request::all();
            $user = User::findOrNew($id);
            $user->name = $input['name'];
            $user->email = $input['email'];
            $user->role = $input['role'];
            $user->save();
            return view('admin.success');
        } else {
            return '403 Permission Denied';
        }
    }
}
