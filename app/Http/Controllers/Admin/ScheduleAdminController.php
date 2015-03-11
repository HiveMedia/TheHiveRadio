<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RadioShows;
use App\RadioSchedule;
use App\Services\GoogleCalendar;

use Request;

class ScheduleAdminController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $calendar = new GoogleCalendar();
        $calendarId = "thehiveradioaus@gmail.com";
        $result = $calendar->get($calendarId);
        dd($result);
        $shows = RadioShows::all();
        return view('admin.schedule.index')->with('showsdata', $shows->toArray());

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
