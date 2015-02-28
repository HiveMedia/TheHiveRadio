<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class StaticController extends Controller {

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
}
