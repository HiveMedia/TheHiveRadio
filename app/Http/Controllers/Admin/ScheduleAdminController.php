<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RadioShows;
use App\RadioSchedule;
use App\Services\GoogleCalendar;

use Request;

class ScheduleAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (\Auth::user()->IsRole('showHost')) {
            $calendar = new GoogleCalendar();
            $calendarId = "thehiveradioaus@gmail.com";
            $result = $calendar->get($calendarId);
            dd($result);
            $shows = RadioShows::all();
            return view('admin.schedule.index')->with('showsdata', $shows->toArray());
        } else {
            return '403 Permission Denied';
        }
    }


    public function edit($id)
    {
        if (\Auth::user()->IsRole('showHost')) {
        } else {
            return '403 Permission Denied';
        }
    }

    public function update($id)
    {
        if (\Auth::user()->IsRole('showHost')) {
        } else {
            return '403 Permission Denied';
        }
    }

    public function create()
    {
        if (\Auth::user()->IsRole('Admin')) {
        } else {
            return '403 Permission Denied';
        }
    }

    public function createShow()
    {
        if (\Auth::user()->IsRole('Admin')) {
        } else {
            return '403 Permission Denied';
        }
    }

    public function togpublivity($id)
    {
        if (\Auth::user()->IsRole('Admin')) {
        } else {
            return '403 Permission Denied';
        }
    }

    public function delete($id)
    {
        if (\Auth::user()->IsRole('Admin')) {
        } else {
            return '403 Permission Denied';
        }
    }

    public function DeleteShow($id)
    {
        if (\Auth::user()->IsRole('Admin')) {
        } else {
            return '403 Permission Denied';
        }
    }
}
