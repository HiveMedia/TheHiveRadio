var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
 // don't use the less
//    mix.less('app.less');

    mix.scripts([
        '../assets/bower/jquery/dist/jquery.js',
        '../assets/bower/angular/angular.js',
        '../assets/bower/angular-route/angular-route.js',
        '../assets/bower/angular-soundmanager2/dist/angular-soundmanager2.js',
        '../assets/bower/bootstrap/dist/js/bootstrap.js'
    ], 'public/js/vendor.js');
});
