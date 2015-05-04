<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ShoutIrc\Client as ShoutClient;


class ShoutBotAdminController extends Controller
{
    private $bot;

    public function __construct()
    {
        $this->middleware('auth');
        $host = ENV('ShoutIRC_HOST');
        $port = ENV('ShoutIRC_PORT');
        $username = ENV('ShoutIRC_USER');
        $password = ENV('ShoutIRC_PASS');

        $this->bot = new ShoutClient($host, $port, $username, $password);

    }

    // Completed
    // Display ShoutIRC management
    public function index()
    {
        if (\Auth::user()->IsRole('showStaff')) {
            return view('admin.shout');
        } else {
            \App::abort(403, 'Not Authorized.');
        }

    }

    // Display bot status as JSON
    public function data()
    {
        if (\Auth::user()->IsRole('showStaff')) {
            $result = array();
            $flags = $this->bot->getSourceName();
            $result['Source'] = $flags;

            $flags = $this->bot->queryStream();
            $result['Stream']['title'] = $flags->getTitle();
            $result['Stream']['dj'] = $flags->getDj();
            $result['Stream']['listeners'] = $flags->getListeners();
            $result['Stream']['peak'] = $flags->getPeak();
            $result['Stream']['max'] = $flags->getMax();
            $flags = $this->bot->getSourceSong();

            $result['SongFileName'] = $flags;

            $flags = $this->bot->getSourceStatus();
            $result['Status'] = $flags;
            if ($result['Source'] == 'autodj') {
                $flags = $this->bot->querySong();
                $result['Song']['Title'] = $flags->getTitle();
                $result['Song']['Artist'] = $flags->getArtist();
                $result['Song']['Album'] = $flags->getAlbum();
                $result['Song']['Genre'] = $flags->getGenre();

                $result['Song']['FileID'] = $flags->getFileID();
                $result['Song']['FileName'] = $flags->getFileName();
                $result['Song']['SongLength'] = $flags->getSongLength();

                $result['Song']['PlayBackLength'] = $flags->getPlayBackLength();
                $result['Song']['PlayBackPosition'] = $flags->getPlayBackPosition();
                $result['Song']['WasRequested'] = $flags->getWasRequested();
                $result['Song']['Requester'] = $flags->getRequester();
            } else {
                $result['Song']['Title'] = 'Not Playing';
                $result['Song']['Artist'] = '';
                $result['Song']['Album'] = '';
                $result['Song']['Genre'] = '';

                $result['Song']['FileID'] = '';
                $result['Song']['FileName'] = 'Not Playing';
                $result['Song']['SongLength'] = '0';

                $result['Song']['PlayBackLength'] = '0';
                $result['Song']['PlayBackPosition'] = '0';
                $result['Song']['WasRequested'] = '';
                $result['Song']['Requester'] = '';
            }
            return $result;
        } else {
            \App::abort(403, 'Not Authorized.');
        }
    }

    // Completed API
    // Skip Current Song
    public function SkipSong()
    {
        if (\Auth::user()->IsRole('Admin')) {
            $flags = $this->bot->skipSourceSong();
            if ($flags == null) {
                return array('Result' => 'Success');
            } else {
                return array('Result' => 'Error');
            }
        } else {
            \App::abort(403, 'Not Authorized.');
        }

    }

    // I stop the AutoDJ after this song
    public function AutoDJPlayOut()
    {
        if (\Auth::user()->IsRole('showHost')) {
            $flags = $this->bot->countdownSource();
            if ($flags == null) {
                return array('Result' => 'Success');
            } else {
                return array('Result' => 'Error');
            }
        } else {
            \App::abort(403, 'Not Authorized.');
        }
    }

    // I Start the AutoDJ
    public function AutoDJStart()
    {
        if (\Auth::user()->IsRole('showHost')) {
            $flags = $this->bot->forceSourceOn();
            if ($flags == null) {
                return array('Result' => 'Success');
            } else {
                return array('Result' => 'Error');
            }
        } else {
            \App::abort(403, 'Not Authorized.');
        }
    }

    // I Forcibly Stop the AutoDJ
    public function AutoDJKill()
    {
        if (\Auth::user()->IsRole('showHost')) {
            $flags = $this->bot->forceSourceOff();
            if ($flags == null) {
                return array('Result' => 'Success');
            } else {
                return array('Result' => 'Error');
            }
        } else {
            \App::abort(403, 'Not Authorized.');
        }
    }

    // I Forcibly Stop the AutoDJ
    public function AutoDJReload()
    {
        if (\Auth::user()->IsRole('Admin')) {
            $flags = $this->bot->reloadSource();
            if ($flags == null) {
                return array('Result' => 'Success');
            } else {
                return array('Result' => 'Error');
            }
        } else {
            \App::abort(403, 'Not Authorized.');
        }
    }

    // I relay the BASE64 URL/Filepath I'm given
    public function relayURL($path)
    {
        if (\Auth::user()->IsRole('showHost')) {
            $url = base64_decode($path);
            $flags = $this->bot->autodjRelay($url);
            if ($flags) {
                return array('Result' => 'Success');
            } else {
                return array('Result' => 'Error');
            }
        } else {
            \App::abort(403, 'Not Authorized.');
        }
    }


    // I restart ShoutIRC
    public function restart()
    {
        if (\Auth::user()->IsRole('Admin')) {
            $flags = $this->bot->restartBot();
            if ($flags == null) {
                return array('Result' => 'Success');
            } else {
                return array('Result' => 'Error');
            }
        } else {
            \App::abort(403, 'Not Authorized.');
        }
    }

    // I KILL ShoutIRC THIS IS UNRECOVERABLE
    public function KILL()
    {
        if (\Auth::user()->IsRole('Admin')) {
            $flags = $this->bot->killBot();
            if ($flags == null) {
                return array('Result' => 'Success');
            } else {
                return array('Result' => 'Error');
            }
        } else {
            \App::abort(403, 'Not Authorized.');
        }
    }


    // TODO: Complete this shit

    public function relay()
    {
        if (\Auth::user()->IsRole('Admin')) {
            dd($this->bot->autodjRelay('https://hiveradio.net/shows/2/upload/KoH5b2SLsLRmtnRCH76C-IBAIP-Episode-23.mp3'));
        } else {
            \App::abort(403, 'Not Authorized.');
        }

    }


    public function request($track)
    {
        if (\Auth::user()->IsRole('Admin')) {
            $flags = $this->bot->sendRequest($track);
            dd($flags);
        } else {
            \App::abort(403, 'Not Authorized.');
        }
    }

    // Rate Song
    public function rateSong($rating, $filename)
    {
        if (\Auth::user()->IsRole('Admin')) {
            $flags = $this->bot->rateSourceSong('HiveUI', $rating, $filename);
            dd($flags);
        } else {
            \App::abort(403, 'Not Authorized.');
        }

    }
}
