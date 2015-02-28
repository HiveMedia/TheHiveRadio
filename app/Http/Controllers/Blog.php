<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class Blog extends Controller {

	//
	public function posts ($page) {
	  echo 'hi';
	  $posts= Posts::all();
	}

}
