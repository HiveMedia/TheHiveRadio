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
        $host = ENV('ShoutIRC_HOST');
        $port = ENV('ShoutIRC_PORT');
        $username = ENV('ShoutIRC_USER');
        $password = ENV('ShoutIRC_PASS');

        $this->bot = new ShoutClient($host, $port, $username, $password);

    }

    public function index()
    {
        return view('admin.shout');

    }
    public function data()
    {
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

        $result['SongFileName']=$flags;

        $flags = $this->bot->getSourceStatus();
        $result['Status']=$flags;

        $flags = $this->bot->querySong();
        $result['Song']['Title']=$flags->getTitle();
        $result['Song']['Artist']=$flags->getArtist();
        $result['Song']['Album']=$flags->getAlbum();
        $result['Song']['Genre']=$flags->getGenre();

        $result['Song']['FileID']=$flags->getFileID();
        $result['Song']['FileName']=$flags->getFileName();
        $result['Song']['SongLength']=$flags->getSongLength();

        $result['Song']['PlayBackLength']=$flags->getPlayBackLength();
        $result['Song']['PlayBackPosition']=$flags->getPlayBackPosition();
        $result['Song']['WasRequested']=$flags->getWasRequested();
        $result['Song']['Requester']=$flags->getRequester();
        return $result;
    }

    // Completed API
    public function SkipSong()
    {
        $flags = $this->bot->skipSourceSong();
        if ($flags == null)
        {
            return array('Result'=>'Success');
        } else {
            return array('Result'=>'Error');
        }

    }
    //TODO: Fix this
    public function relay()
    {
        dd($this->bot->autodjRelay('https://hiveradio.net/shows/2/upload/KoH5b2SLsLRmtnRCH76C-IBAIP-Episode-23.mp3'));


    }
    public function relayURL($path)
    {
        $url = base64_decode($path);
        dd($this->bot->autodjRelay($url));
    }



    // TODO: Complete this shit
    // God Powers
    public function restart()
    {
        $flags = $this->bot->restartBot();
        dd($flags);
    }

    public function kill()
    {
        $flags = $this->bot->killBot();
        dd($flags);

    }


    // AutoDJ
    public function AutoDJPlayOut()
    {
        $flags = $this->bot->countdownSource();
        dd($flags);
    }
    public function AutoDJKill()
    {
        $flags = $this->bot->forceSourceOff();
        dd($flags);
    }
    public function AutoDJStart()
    {
        $flags = $this->bot->forceSourceOn();
        dd($flags);
    }
    public function AutoDJReload()
    {
        $flags = $this->bot->reloadSource();
        dd($flags);
    }

    public function request($track)
    {
        $flags = $this->bot->sendRequest($track);
        dd($flags);
    }

    public function NowPlaying()
    {
        $flags = $this->bot->getSourceSong();
        dd($flags);
    }
    public function AutoDJRelay($path)
    {
        $flags = $this->bot->autodjRelay($path);
        dd($flags);
    }

    public function Status()
    {
        $flags = $this->bot->getSourceStatus();
        dd($flags);
    }

    // Rate Song
    public function rateSong($rating, $filename)
    {
        $flags = $this->bot->rateSourceSong('HiveUI',$rating,$filename);
        dd($flags);

    }
}
