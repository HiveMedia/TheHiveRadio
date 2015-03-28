<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ShowApplications;
use App\RadioShows;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

use Request;

class ShowApplicationAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (\Auth::user()->IsRole('Admin')) {
            $application = ShowApplications::all();
            return view('admin.applications.show.index')->with('applicationsdata', $application->toArray());
        } else {
            $application = ShowApplications::all()->sortByDesc('id')->where('host_id', \Auth::user()->id);

            if (isset($application[1])) {
                return view('admin.applications.show.indexpub')->with('applicationsdata', $application->toArray());
            }
            \App::abort(403, 'Not Authorized.');
        }
    }

    public function view($id)
    {
        if (\Auth::user()->IsRole('Admin')) {
            $application = ShowApplications::find($id);
            if ($application != null) {
                return view('form.showapplication')->with('application', $application->toArray())->with('read', true);
            }
        } else {
            if (\Auth::user()->id == ShowApplications::find($id)->host_id) {
                $application = ShowApplications::find($id);
                return view('form.showapplication')->with('application', $application->toArray())->with('read', true);
            }
            \App::abort(403, 'Not Authorized.');
        }
    }

    public  function approve($id)
    {
        // Is user Logged in?
        if (\Auth::user()->IsRole('Admin')) {
            // Find Application
            $application = ShowApplications::find($id);
            if ($application != null) {
                // Set to Approved
                $application->status = '2';
                $application->save();

                // Set us up the Show
                $show['title']= $application->title;
                $show['description']= $application->description;
                $show['description_short']= $application->description_short;
                $show['public'] = 1;
                $show['host_id'] = $application->host_id;
                $show_created = RadioShows::create($show);

                // Add Host to Show Staff
                DB::table('show_staff')->insert(
                    ['show_id' => $show_created->id, 'user_id' =>  $application->host_id]
                );
                $user = User::find($application->host_id);
                if ( $user->role != 'showHost' && $user->role != 'Admin' )
                {
                    $user->role = 'showHost';
                    $user->save();
                }


                // Send Congrats Email
                $recipient = $user->email;
                Mail::send('emails.show.applicationapprove', ['name' =>$user->name],
                    function ($message) use ($recipient) {
                        $message->to($recipient)->subject('RE: Show Application!')->bcc('admin@hivemedia.net.au');
                    }
                );
                return view('admin.success');

            } else {
                return 'ERROR NO APPLICATION';
            }
        } else {
            \App::abort(403, 'Not Authorized.');
        }

    }

    public function deny($id)
    {
        if (\Auth::user()->IsRole('Admin')) {
            $application = ShowApplications::find($id);
            if ($application != null) {
                $application->status = '3';
                $application->save();

                $user = User::find($application->host_id);
                $recipient = $user->email;
                Mail::send('emails.show.applicationdeny', ['name' =>$user->name],
                    function ($message) use ($recipient) {
                        $message->to($recipient)->subject('RE: Show Application!')->bcc('admin@hivemedia.net.au');
                    }
                );
                return view('admin.success');

            } else {
                return 'ERROR NO APPLICATION';
            }
        } else {
            \App::abort(403, 'Not Authorized.');
        }

    }
}
