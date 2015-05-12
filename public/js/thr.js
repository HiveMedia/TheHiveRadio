/**
 * Created by kyle on 7/04/2015.
 */

var thr = angular.module('THR', ['angularSoundManager']);

thr.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
thr.controller('ShoutBot', function ($scope, $http, $interval) {
    // Declare a bunch of vars
    var spinner = '/img/spinner.gif';
    var tick = '/img/tick.png';
    var transparent = '/img/null.png';
    // Declare all of the angular stuff
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
    $scope.SkipSongIMG = transparent;
    $scope.StartBotIMG = transparent;
    $scope.StopBotIMG = transparent;
    $scope.KillAutoDJIMG = transparent;
    $scope.RehashBotIMG = transparent;
    $scope.RestartBotIMG = transparent;
    $scope.DIEBotIMG = transparent;


    $scope.Loading = false;


    // I'm called to start stuff
    $scope.init = function () {
        GetData();
    };
    $scope.init();

    // I'm used to update the page
    function GetData() {
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
                        icon: "/img/DJPanel.png",
                        dir: "ltr"
                    };
                    DeskTopNotify(options, 'AutoDJ Status Changed');
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

    // I'm here to make Desktop Notifications Easier
    function DeskTopNotify(options, msg) {
        // Show Desktop Notification
        if (Notification.permission === "granted") {
            var notify = new Notification('Hive Radio - ' + msg, options);
            setTimeout(function () {
                notify.close();
            }, 3000);
        }
        // I got permission denied, Let's ask for permissions
        if (Notification.permission !== 'denied') {
            Notification.requestPermission(function (permission) {
                if (!('permission' in Notification)) {
                    Notification.permission = permission;
                }
            });
        }
    }

    // Completed
    // I'm called to Skip Songs
    $scope.BotSkipSong = function BotSkipSong() {
        // Show Spinning Gif
        $scope.SkipSongIMG = spinner;
        // Send request
        $http.get('/admin/shout/bot/skip').
            success(function (data, status, headers, config) {

                // Show Green Tick
                $scope.SkipSongIMG = tick;
                // after 3 secs show nothing
                setTimeout(function () {
                    $scope.SkipSongIMG = transparent;
                }, 3000);

                // Build Desktop Notification
                var options = {
                    body: 'Song Skipped',
                    icon: "/img/DJPanel.png",
                    dir: "ltr"
                };
                DeskTopNotify(options, 'Song Skipped');

            });
    };
    // I'm called to make the AutoDJ stop after current song
    $scope.BotStop = function BotStop() {
        // Show Spinning Gif
        $scope.StopBotIMG = spinner;
        // Send request
        $http.get('/admin/shout/bot/stop').
            success(function (data, status, headers, config) {

                // Show Green Tick
                $scope.StopBotIMG = tick;
                // after 3 secs show nothing
                setTimeout(function () {
                    $scope.StopBotIMG = transparent;
                }, 3000);

                // Build Desktop Notification
                var options = {
                    body: 'AutoDJ Playing Out',
                    icon: "/img/DJPanel.png",
                    dir: "ltr"
                };
                DeskTopNotify(options, 'AutoDJ Playing Out');

            });
    };
    // I start the AutoDJ
    $scope.BotStart = function BotStart() {
        // Show Spinning Gif
        $scope.StartBotIMG = spinner;
        // Send request
        $http.get('/admin/shout/bot/stop').
            success(function (data, status, headers, config) {

                // Show Green Tick
                $scope.StartBotIMG = tick;
                // after 3 secs show nothing
                setTimeout(function () {
                    $scope.StartBotIMG = transparent;
                }, 3000);

                // Build Desktop Notification
                var options = {
                    body: 'AutoDJ Starting',
                    icon: "/img/DJPanel.png",
                    dir: "ltr"
                };
                DeskTopNotify(options, 'AutoDJ Starting');

            });
    };
    // I forcibly stop the AutoDJ
    $scope.BotKillDJ = function BotKillDJ() {
        // Show Spinning Gif
        $scope.KillAutoDJIMG = spinner;
        // Send request
        $http.get('/admin/shout/bot/KILL').
            success(function (data, status, headers, config) {

                // Show Green Tick
                $scope.KillAutoDJIMG = tick;
                // after 3 secs show nothing
                setTimeout(function () {
                    $scope.KillAutoDJIMG = transparent;
                }, 3000);

                // Build Desktop Notification
                var options = {
                    body: 'AutoDJ STOPPED',
                    icon: "/img/DJPanel.png",
                    dir: "ltr"
                };
                DeskTopNotify(options, 'AutoDJ STOPPED');

            });
    };

    $scope.BotRehash = function BotRehash() {
        // Show Spinning Gif
        $scope.RehashBotIMG = spinner;
        // Send request
        $http.get('/admin/shout/bot/rehash').
            success(function (data, status, headers, config) {

                // Show Green Tick
                $scope.RehashBotIMG = tick;
                // after 3 secs show nothing
                setTimeout(function () {
                    $scope.RehashBotIMG = transparent;
                }, 3000);

                // Build Desktop Notification
                var options = {
                    body: 'AutoDJ Rehashed',
                    icon: "/img/DJPanel.png",
                    dir: "ltr"
                };
                DeskTopNotify(options, 'AutoDJ Rehashed');

            });
    };

    $scope.BotRestart = function BotRestart() {
        // Show Spinning Gif
        $scope.RestartBotIMG = spinner;
        // Send request
        $http.get('/admin/shout/bot/RESTART').
            success(function (data, status, headers, config) {

                // Show Green Tick
                $scope.RestartBotIMG = tick;
                // after 3 secs show nothing
                setTimeout(function () {
                    $scope.RestartBotIMG = transparent;
                }, 3000);

                // Build Desktop Notification
                var options = {
                    body: 'AutoDJ RESTARTING',
                    icon: "/img/DJPanel.png",
                    dir: "ltr"
                };
                DeskTopNotify(options, 'AutoDJ RESTARTING');

            });
    };
    $scope.BotDIE = function BotDIE() {
        // Show Spinning Gif
        $scope.DIEBotIMG = spinner;
        // Send request
        $http.get('/admin/shout/bot/KILL').
            success(function (data, status, headers, config) {

                // Show Green Tick
                $scope.DIEBotIMG = tick;
                // after 3 secs show nothing
                setTimeout(function () {
                    $scope.DIEBotIMG = transparent;
                }, 3000);

                // Build Desktop Notification
                var options = {
                    body: 'ShoutIRC STOPPED',
                    icon: "/img/DJPanel.png",
                    dir: "ltr"
                };
                DeskTopNotify(options, 'ShoutIRC STOPPED');

            });
    };


    // Run now playing every 1 seconds
    $interval(function () {
        GetData();
    }, 1000); // the refresh interval must be in millisec
});

thr.controller('AutoDJMusicSearch', function ($scope, $http, $interval) {
    $scope.text='Nothing Now';
    $scope.songs=[];
    $scope.search = function() {
        $http.get('/admin/autodj/search/'+ $scope.query)
            .success(function (data,status){
                $scope.DATA = [];
                angular.forEach(data, function(value, key) {
                    console.log(value.ID);
                    $scope.DATA.push(value);
                });
                $scope.songs=$scope.DATA;
            }).error(function (data, status){
                $scope.text='ERROR';
            });
    }
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
                        setTimeout(function () {
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

    $scope.stream = {
        id: 'one',
        title: 'The Hive Radio',
        url: 'http://hiveradio.net/normal.mp3'
    };

    $scope.PlayerAction = "play";

    $scope.playerControlButton = function() {
        if($scope.PlayerAction == "play")
            $scope.PlayerAction = "stop";
        else
            $scope.PlayerAction = "play";
    }
});