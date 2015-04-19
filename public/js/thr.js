/**
 * Created by kyle on 7/04/2015.
 */

var thr = angular.module('THR', []);

thr.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
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
    }
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

})