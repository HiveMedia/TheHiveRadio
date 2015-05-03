@extends('app')

@section('content')
    <div class="full-content site-dashboard" ng-app="THR" ng-controller="ShoutBot" >
        <h1 style="text-align: center;">Shout Dashboard</h1>
        <h2>Status Stuff</h2>
            <u>Source:</u> <%Source%><br />
            <u>Status:</u> <%Status%><br />
            <u>Stream:</u><br />
            <ul>
                <li><u>Title:</u> <%StreamTitle%></li>
                <li><u>DJ:</u> <%StreamDJ%></li>
            </ul>
        <u>ChrissyBot:</u><br />
        <ul>
            <li><u>Title:</u> <%SongTitle%></li>
            <li><u>Artist:</u> <%SongArtist%></li>
            <li><u>Album:</u> <%SongAlbum%></li>
            <li><u>Genre:</u> <%SongGenre%></li>
            <hr />
            <li><u>File ID:</u> <%SongFileID%></li>
            <li><u>File Name:</u> <%SongFileName%></li>
            <hr />
            <li><u>Song Length (s):</u> <%SongLength%></li>
            <li><u>Play Back Length (ms):</u> <%SongPlayBackLength%></li>
            <li><u>Play Back Position:</u> <%SongPlayBackPosition%></li>
            <hr />
            <li><u>Was Requested:</u> <%SongRequested%></li>
            <li><u>Requester:</u> <%SongRequester%></li>
        </ul>
        <hr>
        <div ng-click="BotStart()">Start Bot</div><br/>
        <div ng-click="BotStop()">Stop Bot</div><br/>
        <div ng-click="BotSkipSong()">Skip Song</div><img src="<%SkipSongIMG%>"/><br/>

        <hr>
        Rate Song<br />

        <hr>
        Queue Song : Dropdown of all Songs<br />
        <div ng-click="BotRelay()">Relay Bot</div><br/>
        <hr>
        <div ng-click="BotRehash()">Reload Bot</div><br/>
        <div ng-click="BotKillDJ()">Kill AutoDJ</div><br/>

        <div ng-click="BotRestart()">Restart Bot - <b>WARNING</b></div><br/>
        <div ng-click="BotDIE()">Kill Bot - <b>WARNING</b></div><br/>

    </div>
@endsection
