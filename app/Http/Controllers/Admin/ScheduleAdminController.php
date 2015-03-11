<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RadioShows;
use App\RadioSchedule;

use Request;

class ScheduleAdminController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
    }


    public function edit($id)
    {

    }
    public function update($id)
    {

    }

    public function create()
    {

    }
    public function createShow()
    {

    }

    public function togpublivity($id)
    {

    }

    public function delete($id)
    {

    }

    public function DeleteShow($id)
    {

    }
}
