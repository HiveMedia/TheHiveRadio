<?php namespace App\Http\Controllers;

use Illuminate\Http\Response;

class PlaylistController extends Controller {

    public function index()
    {
        $domain = 'https://hiveradio.net/playlist';
        $domain = './playlist';
        $content ='<a href="'.$domain.'/mobile.low.aac.m3u">Mobile Low</a><br />';
        $content.='<a href="'.$domain.'/mobile.med.aac.m3u">Mobile Medium</a><br />';
        $content.='<a href="'.$domain.'/normal.mp3.m3u">Normal mp3</a><br />';
        $content.='<a href="'.$domain.'/normal.aac.m3u">Normal aac</a><br />';
        $content.='<a href="'.$domain.'/high.quality.aac.m3u">HQ </a><br />';

        return response($content, 200);
    }

    public function mla()
    {
        $content='https://hiveradio.net/mobile.low.aac';
        return response($content, 200)
            ->header('Content-Type', 'audio/mpegurl');
    }

    public function mma()
    {
        $content='https://hiveradio.net/mobile.med.aac';
        return response($content, 200)
            ->header('Content-Type', 'audio/mpegurl');
    }
    public function nm3()
    {
        $content='https://hiveradio.net/normal.mp3';
        return response($content, 200)
            ->header('Content-Type', 'audio/mpegurl');
    }

    public function na()
    {
        $content='https://hiveradio.net/normal.aac';
        return response($content, 200)
            ->header('Content-Type', 'audio/mpegurl');
    }

	public function aqa()
	{
        $content='https://hiveradio.net/high.quality.aac';
        return response($content, 200)
            ->header('Content-Type', 'audio/mpegurl');
	}

}
