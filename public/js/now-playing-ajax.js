if(jQuery)
{
    var updateTime = 10000;
    var default_mount = "normal.mp3";

    function isOffline(data) {
        try {
            return data.server_streams[default_mount]['online'] === false || data.server_streams[default_mount]['online'] === null;
        } catch(error) {
            return true;
        }
    }

    function updateInfo()
    {
        $.getJSON('https://hiveradio.net/api/icebreath/?func=get&mod=icecast&query=stats', function(data)
        {
            if(isOffline(data))
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
                $('.nowplaying-song').each(function() {
                    if($(this).text() !== data.server_streams[default_mount].song)
                        $(this).fadeOut(250, function () {
                            $(this).text(data.server_streams[default_mount].song).fadeIn(250);
                            $(this).attr('title', data.server_streams[default_mount].song);
                        });
                });

                $('.nowplaying-artist').each(function() {
                    if($(this).text() !== data.server_streams[default_mount].artist)
                        $(this).fadeOut(250, function () {
                            $(this).text(data.server_streams[default_mount].artist).fadeIn(250);
                            $(this).attr('title', data.server_streams[default_mount].artist);
                        });
                });

                $('.nowplaying-title').each(function() {
                    if($(this).text() !== data.server_streams[default_mount].title)
                        $(this).fadeOut(250, function () {
                            $(this).text(data.server_streams[default_mount].title).fadeIn(250);
                            $(this).attr('title', data.server_streams[default_mount].title);
                        });
                });

                $('.nowplaying-listener-count').each(function() {
                    if($(this).text() !== (data.server_listener_total == 1 ? "There is " + data.server_listener_total + " changeling listening" : "There are " + data.server_listener_total + " changelings listening"))
                        $(this).fadeOut(250, function () {
                            $(this).text((data.server_listener_total == 1 ? "There is " + data.server_listener_total + " changeling listening" : "There are " + data.server_listener_total + " changelings listening")).fadeIn(250);
                        });
                });

                $('.nowplaying-cover').each(function() {
                    if($(this).attr('data-current') !== data.server_streams[default_mount].artist)
                    {
                        $(this).attr('src', '//hiveradio.net/api/icebreath/?func=get&mod=cover&artist=' + data.server_streams[default_mount].artist);
                        $(this).attr('data-current', data.server_streams[default_mount].artist);
                    }
                });

                updateTime = 10000;
            }
        });
    }

    updateInfo();
    setInterval(function() { updateInfo(); }, updateTime);
}/**
 * Created by Kyle on 13/03/2015.
 */
