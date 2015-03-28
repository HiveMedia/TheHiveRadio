<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;

class StaticController extends Controller
{

    /*
    |-------------------------------------------------
    | Static Pages Controller
    |-------------------------------------------------
    |
    | This controller renders the most of the static
    | pages, e.g. Home, About, etc.
    |
    */

    /**
     * Returns the front page of the website
     *
     * @return Response
     */
    public function home()
    {
        return view('static.home');
    }

    public function aboutus()
    {
        return view('static.about');
    }

    public function chatus()
    {
        return view('static.chat');
    }

    public function joinus()
    {
        return view('static.join');
    }

    public function staffus()
    {
        $Admin = User::all()->where('role','Admin');
        $Admin = $Admin->where('public',0);

        $SH = User::all()->where('role','showHost');
        $SH = $SH->where('public',0);
        $staff=array_merge($Admin->toArray(), $SH->toArray());

        return view('static.staff')->with('staff', $staff);
    }


    public function abp()
    {
        return view('static.abp');
    }

}