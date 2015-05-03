/**
 * Created by kyle on 7/04/2015.
 */

var thr = angular.module('THR', []);

thr.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
thr.controller('ShoutBot', function ($scope, $http, $interval){
    $scope.Source = 'My Source ...';
    $scope.Status = 'My Status ...';
    $scope.StreamTitle = 'Stream Title ...';
    $scope.StreamDJ = 'Online DJ ...';
    $scope.SongTitle = 'Song Playing ...';
    $scope.SongArtist = 'Song Playing Made by ...';
    $scope.SongAlbum = 'Song Album ...';
    $scope.SongFileID = 'File ID ...';
    $scope.SongFileName = 'File Name ...';
    $scope.SongLength = 'Song Length ...';
    $scope.SongPlayBackLength = 'Song Playback Length ...';
    $scope.SongPlayBackPosition = 'Song Playback POS ...';
    $scope.SongRequested = 'Song Requested? ...';
    $scope.SongRequester = 'Song Requested By ...';
    $scope.SkipSongIMG = '';

    $scope.Loading = false;

    $scope.init = function () {
        GetData();

    };
    $scope.init();

    // Completed
    $scope.BotSkipSong = function BotSkipSong(){
        $scope.SkipSongIMG = '/img/spinner.gif';
        $http.get('/admin/shout/bot/skip').
            success(function (data, status, headers, config) {
                var options = {
                    body: 'Song Skipped',
                    icon: "/img/DJPanel.png",
                    dir: "ltr"
                };
                console.log('Notification Status: ' + Notification.permission);
                $scope.SkipSongIMG = '/img/tick.png';
                setTimeout(function(){
                    $scope.SkipSongIMG = '';
                }, 3000);
                if (Notification.permission === "granted") {
                    var notify = new Notification('Hive Radio - Skipping Song', options);
                    setTimeout(function(){
                        notify.close();
                    }, 3000);
                }
                if (Notification.permission !== 'denied') {
                    Notification.requestPermission(function (permission) {
                        if (!('permission' in Notification)) {
                            Notification.permission = permission;
                        }
                    });
                }
            });
    };

    $scope.BotStart = function BotStart(){
        alert('lol');
    };
    $scope.BotStop = function BotStop(){
        alert('lol');
    };

    $scope.BotRehash = function BotRehash(){
        alert('lol');
    };
    $scope.BotKillDJ = function BotKillDJ(){
        alert('lol');
    };
    $scope.BotRestart = function BotRestart(){
        alert('lol');
    };
    $scope.BotDIE = function BotDIE(){
        alert('lol');
    };
    function GetData(){
        $scope.Loading = true;
        $http.get('/admin/shout/d').
            success(function (data, status, headers, config) {
                console.log('I got data from API:' + data);
                $scope.Source = data.Source;
                $scope.Status = data.Status;
                $scope.StreamTitle = data.Stream.title;
                $scope.StreamDJ = data.Stream.dj;
                $scope.SongTitle = data.Song.Title;
                $scope.SongArtist = data.Song.Artist;
                $scope.SongAlbum = data.Song.Album;
                $scope.SongGenre = data.Song.Genre;
                $scope.SongFileID = data.Song.FileID;
                $scope.SongFileName = data.Song.FileName;
                $scope.SongLength = data.Song.SongLength;
                $scope.SongPlayBackLength = data.Song.PlayBackLength;
                $scope.SongPlayBackPosition = data.Song.PlayBackPosition;
                $scope.SongRequested = data.Song.WasRequested;
                $scope.SongRequester = data.Song.Requester;
                $scope.loading = false;

                if ($scope.LastStatus != data.Status) {
                    $scope.LastStatus = data.Status;

                    var options = {
                        body: data.Status,
                        icon: "/icebreath/covers/lolNotLegit",
                        dir: "ltr"
                    };
                    if (Notification.permission === "granted") {
                        var notify = new Notification('Hive Radio - Now Playing', options);
                        setTimeout(function(){
                            notify.close();
                        }, 3000);
                    }
                }
                if (Notification.permission !== 'denied') {
                    Notification.requestPermission(function (permission) {
                        if (!('permission' in Notification)) {
                            Notification.permission = permission;
                        }
                    });
                }
            });
    }

    // Run now playing every 1 seconds
    $interval(function () {
        GetData();
    }, 1000); // the refresh interval must be in millisec
});

thr.controller('nowPlayingController', function ($scope, $http, $interval) {
    $scope.Song = 'Loading station data ...';
    $scope.Artist = 'Please wait';
    $scope.ListenerCount = 0;

    $scope.Loading = false;
    $scope.LastPlayed = '';
    // init function
    $scope.init = function () {
        NowPlaying();

    };
    $scope.init();

    // Talk to IceBreath, get now playing
    function NowPlaying() {
        $scope.Loading = true;
        // Note to future Neko, this should be set by system config
        $http.get('/icebreath/icecast/stats').
            success(function (data, status, headers, config) {
                console.log('I got data from API:' + data.result.server_streams[0].stream_nowplaying.song);
                $scope.Song = data.result.server_streams[0].stream_nowplaying.song;
                $scope.Artist = data.result.server_streams[0].stream_nowplaying.artist;
                $scope.ListenerCount = data.result.server_listeners_unique;
                $scope.loading = false;

                if ($scope.LastPlayed != data.result.server_streams[0].stream_nowplaying.text) {
                    $scope.LastPlayed = data.result.server_streams[0].stream_nowplaying.text;

                    var options = {
                        body: data.result.server_streams[0].stream_nowplaying.text,
                        icon: "/icebreath/covers/" + $scope.Artist,
                        dir: "ltr"
                    };
                    if (Notification.permission === "granted") {
                        var notify = new Notification('Hive Radio - Now Playing', options);
                        setTimeout(function(){
                            notify.close();
                        }, 3000);
                    }
                }
                if (Notification.permission !== 'denied') {
                    Notification.requestPermission(function (permission) {
                        if (!('permission' in Notification)) {
                            Notification.permission = permission;
                        }
                    });
                }
            });
    }

    // Run now playing every 10 seconds
    $interval(function () {
        NowPlaying();
    }, 10000); // the refresh interval must be in millisec

});