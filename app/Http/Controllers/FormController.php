<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Applications;
use App\ShowApplications;
use Illuminate\Support\Facades\Mail;

use Request;

class FormController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function applyus()
    {
        if (\Auth::user()->id) {
            $application = Applications::all()->where('user_id', \Auth::user()->id)->where('status',1);
            if (isset($application[0])) {
                return 'Error already applied';
            }
            if (\Auth::user()->role != 'Commenter') {
                return 'Error already Staff';
            }
        }
        return view('form.staffapplication')->with('application', array('firstname'=>'','lastname'=>'','dob'=>'','country'=>'','email'=>'','skype'=>'','handle'=>'','references'=>'','tos'=>'', ));
    }

    public function createapply()
    {
        if (\Auth::user()->id) {
            $application = Applications::all()->where('user_id',\Auth::user()->id)->where('status',1);

            if (isset($application[0]))
            {
                return 'Error already applied';
            }
            $input = Request::all();

            $input['user_id'] = \Auth::user()->id;
            $input['status'] = 1;
            Applications::create($input);
            $recipient = \Auth::user()->email;
            Mail::send('emails.staff.application', ['name' =>$input['firstname']],
                function ($message) use ($recipient) {
                    $message->to($recipient)->subject('Staff Application!')->bcc('admin@hivemedia.net.au');
                }
            );
            return view('form.thanks');

        } else {
            return '403 Permission Denied';
        }
    }


    // Create Application Page for shows
    public function applyshow()
    {
        $application = ShowApplications::all()->where('host_id',\Auth::user()->id)->where('status',1);
        if (isset($application[0]))
        {
            return 'Error You may only apply for 1 show at a time, please wait until your current application has been processed.<br/> We are human after all.';
        }
        return view('form.showapplication')->with('application',
            array(
                'title'=>'',
                'description'=>'',
                'description_short'=>'',
                'type'=>'',
                'live'=>'',
                'existence'=>'',
                'classifications'=>'',
                'timeslot'=>'',
                'length'=>'',
                'speedtest'=>'',
                'other'=>'',
                'tos'=>'',
            )
        );
    }

    public function createapplyshow()
    {
        if (\Auth::user()->id) {
            $application = ShowApplications::all()->where('host_id',\Auth::user()->id)->where('status',1);

            if (isset($application[0]))
            {
                return 'Error You may only apply for 1 show at a time, please wait until your current application has been processed.<br/> We are human after all.';
            }
            $input = Request::all();
            $input['host_id'] = \Auth::user()->id;
            $input['status'] = 1;
            ShowApplications::create($input);
            $recipient = \Auth::user()->email;
            Mail::send('emails.show.application', ['name' =>\Auth::user()->name],
                function ($message) use ($recipient) {
                    $message->to($recipient)->subject('Show Application!')->bcc('admin@hivemedia.net.au');
                }
            );
            return view('form.thanks');

        } else {
            return '403 Permission Denied';
        }
    }
}