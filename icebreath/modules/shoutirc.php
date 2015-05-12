<?php namespace Icebreath\Modules;

use Icebreath\Module;
use Icebreath\Response;
use ShoutIrc\Client as ShoutClient;

class shoutirc extends Module {

    private $VERSION = "0.1";
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
    /**
     * Asks the module to handle a PUT (Create) request
     *
     * @param $view
     * @param $args
     * @return Response
     */
    protected function handlePut($view, $args)
    {
        return new Response(null, 404, "This module doesn't support this HTTP method");
    }

    /**
     * Asks the module to handle a POST (Update) request
     *
     * @param $view
     * @param $args
     * @return Response
     */
    protected function handlePost($view, $args)
    {
        return new Response(null, 404, "This module doesn't support this HTTP method");
    }

    /**
     * Asks the module to handle a DELETE (Well duh, Delete) request
     *
     * @param $view
     * @param $args
     * @return Response
     */
    protected function handleDelete($view, $args)
    {
        return new Response(null, 404, "This module doesn't support this HTTP method");
    }

    /************************************* REAL CODE ***********************************/

    /**
     * Asks the module to handle a GET (Read) request
     *
     * @param $view
     * @param $args
     * @return Response
     */
    protected function handleGet($view, $args)
    {
        if(!isset($view))
            return new Response(array(
                'message' => "ShoutIRC module version $this->VERSION for Icebreath",
                'usage' => 'ShoutIRC/[Module]'
            ));
        else {
            if(count($args) >= 1) {
                return $this->getStats($args[0]);
            } else {
                return $this->getStats();
            }
        }
    }



    /**
     * Gets the current nowplaying stats from Icecast server
     * and formats in JSON for easy access
     *
     * @param string $mount_point_name
     * @return Response
     */
    private function getStats($mount_point_name="")
    {
        $data = null;
        try {
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
        } catch(\RuntimeException $ex) {
            return new Response(null, 500, $ex->getMessage());
        }

        $shoutirc_data = new ShoutOut();

        $shoutirc_data->title =  $result['Song']['Title'];
        $shoutirc_data->artist =  $result['Song']['Artist'];
        $shoutirc_data->album =  $result['Song']['Album'];
        $shoutirc_data->genre =  $result['Song']['Genre'];
        $shoutirc_data->songlength =  $result['Song']['SongLength'];
        $shoutirc_data->playbacklength =  $result['Song']['PlayBackPosition'];

        return $this->generateResponse($shoutirc_data);
    }

    /**
     * Takes the data structures built by getStats() and
     * builds an array out of the information to return
     * to Icebreath
     *
     * @param $server_data
     * @return Response
     */
    private function generateResponse($server_data)
    {
        $response["result"] = $server_data;

        return new Response($response);
    }
}

class ShoutOut {
    public $title;
    public $artist;
    public $album;
    public $genre;
    public $songlength;
    public $playbacklength;

}
