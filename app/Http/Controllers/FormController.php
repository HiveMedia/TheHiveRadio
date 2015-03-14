<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Applications;
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
            if ($application) {
                return 'Error already applied';
            }
        }
        return view('form.staffapplication')->with('application', array('firstname'=>'','lastname'=>'','dob'=>'','country'=>'','email'=>'','skype'=>'','handle'=>'','references'=>'','tos'=>'', ));
    }

    public function createapply()
    {
        if (\Auth::user()->id) {
            $application = Applications::all()->where('user_id',\Auth::user()->id)->where('status',1);
            if ($application)
            {
                return 'Error already applied';
            }
            $input = Request::all();

            $input['user_id'] = \Auth::user()->id;
            $input['status'] = 1;
            Applications::create($input);
            $recipient = \Auth::user()->email;
            Mail::send('emails.application', ['name' =>$input['firstname']],
                function ($message) use ($recipient) {
                    $message->to($recipient)->subject('Staff Application!')->bcc('admin@hivemedia.net.au');
                }
            );
            return view('form.thanks');

        } else {
            return '403 Permission Denied';
        }
    }
}