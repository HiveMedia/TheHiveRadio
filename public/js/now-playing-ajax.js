if(jQuery)
{
    //var updateTime = 10000;
    //var default_mount = "/normal.mp3";
    //var icecast_icebreath_uri = "/icebreath/icecast/stats";
    //var covers_icebreath_uri = "/icebreath/covers/";
    //
    ////Do NOT touch
    //var host = window.location.protocol + "//" + window.location.host;
    //
    //function isOffline(data, mount) {
    //    try {
    //        if(data.status == "error")
    //            return true;
    //
    //        if(data.result.server_streams == null || getMountPointData(mount, data) == null)
    //            return true;
    //
    //        if(!getMountPointData(mount, data).stream_online)
    //            return true;
    //
    //        return false;
    //    } catch(error) {
    //        return true;
    //    }
    //}
    //
    //function getMountPointData(mount, data) {
    //    for(var i = 0; i < data.result.server_streams.length; i++) {
    //        if(data.result.server_streams[i].stream_name == mount) {
    //            return data.result.server_streams[i];
    //        }
    //    }
    //
    //    return null;
    //}
    //
    //function updateInfo()
    //{
    //    $.getJSON(host + icecast_icebreath_uri, function(data)
    //    {
    //        if(isOffline(data, default_mount))
    //        {
    //            $('.nowplaying-song').each(function() {
    //                $(this).fadeOut(250, function () {
    //                    $(this).text("Radio offline!").fadeIn(250);
    //                })
    //            });
    //
    //            $('.nowplaying-artist').each(function() {
    //                $(this).fadeOut(250, function () {
    //                    $(this).text("Radio offline!").fadeIn(250);
    //                })
    //            });
    //
    //            $('.nowplaying-dj-title').each(function() {
    //                $(this).fadeOut(250, function () {
    //                    $(this).text("Radio offline!").fadeIn(250);
    //                })
    //            });
    //
    //            $('.nowplaying-dj-description').each(function() {
    //                $(this).fadeOut(250, function () {
    //                    $(this).text("Failed to update, will continue connection attempts every minute!").fadeIn(250);
    //                })
    //            });
    //
    //            updateTime = 60000;
    //        }
    //        else
    //        {
    //            var stream_data = getMountPointData(default_mount, data);
    //
    //            $('.nowplaying-song').each(function() {
    //                if($(this).text() !== stream_data.stream_nowplaying.song)
    //                    $(this).fadeOut(250, function() {
    //                        $(this).text(stream_data.stream_nowplaying.song).fadeIn(250);
    //                    });
    //            });
    //
    //            $('.nowplaying-artist').each(function() {
    //                if($(this).text() !== stream_data.stream_nowplaying.artist)
    //                    $(this).fadeOut(250, function() {
    //                        $(this).text(stream_data.stream_nowplaying.artist).fadeIn(250);
    //                    });
    //            });
    //
    //            $('.nowplaying-title').each(function() {
    //                if($(this).text() !== stream_data.stream_nowplaying.text)
    //                    $(this).fadeOut(250, function() {
    //                        $(this).text(stream_data.stream_nowplaying.text).fadeIn(250);
    //                    });
    //            });
    //
    //            $('.nowplaying-listener-count').each(function() {
    //                if($(this).text() != data.result.server_listeners_unique)
    //                    $(this).fadeOut(250, function() {
    //                        $(this).text(data.result.server_listeners_unique).fadeIn(250);
    //                    });
    //            });
    //
    //            $('.nowplaying-cover').each(function() {
    //                if($(this).attr('data-artist') !== stream_data.stream_nowplaying.artist)
    //                {
    //                    $(this).attr('src', host + covers_icebreath_uri + stream_data.stream_nowplaying.artist);
    //                    $(this).attr('data-artist', stream_data.stream_nowplaying.artist);
    //                }
    //            });
    //
    //            updateTime = 10000;
    //        }
    //    });
    //}
    //
    //updateInfo();
    //setInterval(function() { updateInfo(); }, updateTime);

    $('.player-container-player .volume-bar').click(function(e) {
        var posX = $(this).offset().left, volume = (e.pageX - posX) / $(this).width();

        $('.player-container-player #player')[0].volume = volume;
        $('.player-container-player .volume-bar .bar-value').css('width', volume * 100 + '%');
    });

    $('.player-container-player .player-button').click(function(e) {
        if($(this).attr('data-state') == "play") {

            $(this).find('i').removeClass('fa-play-circle');
            $(this).find('i').addClass('fa-stop');
            $(this).find('span').text('Stop');

            $('.player-container-player #player')[0].load();
            $('.player-container-player #player')[0].play();

            $(this).attr('data-state', 'stop');
        } else {
            $(this).find('i').removeClass('fa-stop');
            $(this).find('i').addClass('fa-play-circle');
            $(this).find('span').text('Play');

            $('.player-container-player #player')[0].pause();

            $(this).attr('data-state', 'play');
        }
    });
}
