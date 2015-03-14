<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Applications;
use Illuminate\Support\Facades\Mail;

use Request;

class ApplicationAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (\Auth::user()->IsRole('Admin')) {
            $application = Applications::all();
            return view('admin.applications.index')->with('applicationsdata', $application->toArray());
        } else {
            $application = Applications::all()->where('user_id', \Auth::user()->id);
            if (isset($application[0])) {
                return view('form.staffapplication')->with('application', $application['0']->toArray())->with('read', true);
            }
            return '403 Permission Denied';
        }
    }

    public function view($id)
    {
        if (\Auth::user()->IsRole('Admin')) {
            $application = Applications::find($id);
            if ($application != null) {
                return view('form.staffapplication')->with('application', $application->toArray())->with('read', true);
            }
        } else {
            return '403 Permission Denied';
        }
    }

    public  function approve($id)
    {
        if (\Auth::user()->IsRole('Admin')) {
            $application = Applications::find($id);
            if ($application != null) {
                $application->status = '2';
                $application->save();
                $recipient = $application->email;
                Mail::send('emails.applicationapprove', ['name' =>$application->firstname],
                    function ($message) use ($recipient) {
                        $message->to($recipient)->subject('RE: Staff Application!')->bcc('admin@hivemedia.net.au');
                    }
                );
                return view('admin.success');

            } else {
                return 'ERROR NO APPLICATION';
            }
        } else {
            return '403 Permission Denied';
        }

    }

    public function deny($id)
    {
        if (\Auth::user()->IsRole('Admin')) {
            $application = Applications::find($id);
            if ($application != null) {
                $application->status = '3';
                $application->save();
                $recipient = $application->email;
                Mail::send('emails.applicationdeny', ['name' =>$application->firstname],
                    function ($message) use ($recipient) {
                        $message->to($recipient)->subject('RE: Staff Application!')->bcc('admin@hivemedia.net.au');
                    }
                );
                return view('admin.success');

            } else {
                return 'ERROR NO APPLICATION';
            }
        } else {
            return '403 Permission Denied';
        }

    }
}
