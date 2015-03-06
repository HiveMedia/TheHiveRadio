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
    ],

];
