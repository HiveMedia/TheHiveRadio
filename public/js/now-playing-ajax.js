if(jQuery)
{
    var updateTime = 10000;
    var default_mount = "/normal.mp3";
    var icecast_icebreath_uri = "/icebreath/icecast/stats";
    var covers_icebreath_uri = "/icebreath/covers/";

    //Do NOT touch
    var host = window.location.protocol + "//" + window.location.host;

    function isOffline(data, mount) {
        try {
            if(data.status == "error")
                return true;

            if(data.response.server_streams == null || getMountPointData(mount, data) == null)
                return true;

            if(!getMountPointData(mount, data).stream_online)
                return true;

            return false;
        } catch(error) {
            return true;
        }
    }

    function getMountPointData(mount, data) {
        for(var i = 0; i < data.response.server_streams.length; i++) {
            if(data.response.server_streams[i].stream_name == mount) {
                return data.response.server_streams[i];
            }
        }

        return null;
    }

    function updateInfo()
    {
        $.getJSON(host + icecast_icebreath_uri, function(data)
        {
            if(isOffline(data, default_mount))
            {
                $('.nowplaying-song').each(function() {
                    $(this).fadeOut(250, function () {
                        $(this).text("Radio offline!").fadeIn(250);
                    })
                });

                $('.nowplaying-artist').each(function() {
                    $(this).fadeOut(250, function () {
                        $(this).text("Radio offline!").fadeIn(250);
                    })
                });

                $('.nowplaying-dj-title').each(function() {
                    $(this).fadeOut(250, function () {
                        $(this).text("Radio offline!").fadeIn(250);
                    })
                });

                $('.nowplaying-dj-description').each(function() {
                    $(this).fadeOut(250, function () {
                        $(this).text("Failed to update, will continue connection attempts every minute!").fadeIn(250);
                    })
                });

                updateTime = 60000;
            }
            else
            {
                var stream_data = getMountPointData(default_mount, data);

                $('.nowplaying-song').each(function() {
                    if($(this).text() !== stream_data.stream_nowplaying.song)
                        $(this).fadeOut(250, function() {
                            $(this).text(stream_data.stream_nowplaying.song).fadeIn(250);
                        });
                });

                $('.nowplaying-artist').each(function() {
                    if($(this).text() !== stream_data.stream_nowplaying.artist)
                        $(this).fadeOut(250, function() {
                            $(this).text(stream_data.stream_nowplaying.artist).fadeIn(250);
                        });
                });

                $('.nowplaying-title').each(function() {
                    if($(this).text() !== stream_data.stream_nowplaying.text)
                        $(this).fadeOut(250, function() {
                            $(this).text(stream_data.stream_nowplaying.text).fadeIn(250);
                        });
                });

                $('.nowplaying-listener-count').each(function() {
                    if($(this).text() != data.response.server_listeners_unique)
                        $(this).fadeOut(250, function() {
                            $(this).text(data.response.server_listeners_unique).fadeIn(250);
                        });
                });

                $('.nowplaying-cover').each(function() {
                    if($(this).attr('data-artist') !== stream_data.stream_nowplaying.artist)
                    {
                        $(this).attr('src', host + covers_icebreath_uri + stream_data.stream_nowplaying.artist);
                        $(this).attr('data-artist', stream_data.stream_nowplaying.artist);
                    }
                });

                updateTime = 10000;
            }
        });
    }

    updateInfo();
    setInterval(function() { updateInfo(); }, updateTime);
}
