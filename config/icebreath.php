<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Icecast Module Configuration
    |--------------------------------------------------------------------------
    |
    | Provides the Icecast module for Icebreath with information like, server
    | address, port, username and password.
    |
    */

    'icecast' => [

        /*
         |-----------------------------------------------------
         | Icecast server address
         |-----------------------------------------------------
         |
         | The hostname or IP address of the Icecast server to
         | pull information from.
         |
         */

        'hostname' => env('ICECAST_HOST'),

        /*
         |-----------------------------------------------------
         | Icecast server port
         |-----------------------------------------------------
         |
         | Tells the module on which port the Icecast server is
         | is bound to.
         |
         */

        'port' => env('ICECAST_PORT'),

        /*
         |-----------------------------------------------------
         | Icecast admin username
         |-----------------------------------------------------
         |
         | The Icecast module requires the admin username to pull
         | nowplaying, and other, information from the server in
         | XML format
         |
         */

        'username' => env('ICECAST_USER'),

        /*
         |-----------------------------------------------------
         | Icecast admin password
         |-----------------------------------------------------
         |
         | The password that goes with the admin username
         |
         */

        'password' => env('ICECAST_PASS'),

        /*
         |-----------------------------------------------------
         | Icecast server location
         |-----------------------------------------------------
         |
         | This settings is not required but allows the API requester
         | know where the radio station originates from
         |
         */

        'location' => env('ICECAST_LOCATION'),

        /*
         |-----------------------------------------------------
         | Custom Stream Base URL
         |-----------------------------------------------------
         |
         | For replacing the base URL for for stream_url, the
         | module shall replace the stream_url with the custom
         | built with URL based on the custom URL and mount point
         |
         | Set this option to null to disable the feature
         |
         */

        'custom_stream_url_base' => 'https://hiveradio.net/mounts',
        
    ],

    /*
     |---------------------------------------------------------
     | The Hive Radio's Cover API
     |---------------------------------------------------------
     |
     | These are the settings for The Hive Radio's Youtube Cover
     | API, e.g. Youtube API key, not found image, cache timeout, etc.
     |
     */
    'covers' => [

        /*
         |-----------------------------------------------------
         | Youtube API Key
         |-----------------------------------------------------
         |
         | Google/Youtube API key used to pull youtube cover images
         |
         */
        'youtube_api_key' => env('COVERS_API_KEY'),

        /*
         |-----------------------------------------------------
         | Cover Not Found Image
         |-----------------------------------------------------
         |
         | Image used when a cover is not found
         |
         */
        'not_found_img' => env('COVERS_NF_IMG'),

        /*
         |-----------------------------------------------------
         | Cover Cache Time
         |-----------------------------------------------------
         |
         | How long to hold onto a cover image before getting
         | a new copy
         |
         */
        'cache_time' => env('COVERS_CACHE_TIME'),
    ],

];
