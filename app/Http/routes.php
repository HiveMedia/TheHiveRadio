<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
 *  Static Pages
 */

// About us page
Route::get('/about', 'StaticController@aboutus');

// Join us page
Route::get('/join', 'StaticController@joinus');

// Staff Page
Route::get('/staff', 'StaticController@staffus');
// Lol Jokes EFN
Route::get('/uefi', 'StaticController@staffus');
// Chat Page
Route::get('/chat', 'StaticController@chatus');


/*
 *  Static M3u
 */

// About us page
Route::get('/playlist', 'PlaylistController@index');
Route::get('/playlist/mobile.low.aac.m3u', 'PlaylistController@mla');
Route::get('/playlist/mobile.med.aac.m3u', 'PlaylistController@mma');
Route::get('/playlist/normal.mp3.m3u', 'PlaylistController@nm3');
Route::get('/playlist/normal.aac.m3u', 'PlaylistController@na');
Route::get('/playlist/high.quality.aac.m3u', 'PlaylistController@aqa');


/*
 * Dynamic Coded stuffs
 */

// Main Index
Route::get('/', 'Blog@home');
Route::get('/home', 'Blog@home');

// Blog Post
Route::get('b/{id}', [
    'as' => 'post', 'uses' => 'Blog@post'
])->where('id', '[0-9]+');


// Blog Pages
Route::get('b', [
    'uses' => 'Blog@pageone'
]);
Route::get('b/page/', [
    'as' => 'blogpageone', 'uses' => 'Blog@pageone'
]);

Route::get('b/page/{id}', [
    'as' => 'blogpage', 'uses' => 'Blog@page'
])->where('id', '[0-9]+');

// Shows
Route::get('s', [
    'uses' => 'ShowsController@index'
]);

Route::get('s/{id}', [
    'as' => 'showpage', 'uses' => 'ShowsController@show'
])->where('id', '[0-9]+');

// Admin Stuff


Route::get('admin', [
    'uses' => 'Admin\AdminController@index'
]);
/*
 *  USER ADMIN
 */
Route::get('admin/u/l', [
    'uses' => 'Admin\AdminController@UserList'
]);
// Edit User
Route::get('admin/u/e/{id}', [
    'uses' => 'Admin\AdminController@UserEdit'
])->where('id', '[0-9]+');

Route::post('admin/u/e/{id}', [
    'uses' => 'Admin\AdminController@UserUpdate'
])->where('id', '[0-9]+');


/*
 *    BLOG ADMIN
 */
// Create Blog Posts
Route::get('admin/b/c', [
    'uses' => 'Admin\BlogAdminController@create'
]);
// Edit Blog Posts
Route::get('admin/b/e/{id}', [
    'uses' => 'Admin\BlogAdminController@edit'
])->where('id', '[0-9]+');

Route::post('admin/b/e/{id}', [
    'uses' => 'Admin\BlogAdminController@update'
])->where('id', '[0-9]+');
// Change Publicity
Route::get('admin/b/h/{id}', [
    'uses' => 'Admin\BlogAdminController@togpublivity'
])->where('id', '[0-9]+');
// Create Blog Post
Route::post('admin/b/c', [
    'uses' => 'Admin\BlogAdminController@createPost'
]);
// Delete Blog Post
Route::get('admin/b/d/{id}', [
    'uses' => 'Admin\BlogAdminController@delete'
])->where('id', '[0-9]+');
Route::get('admin/b/dc/{id}', [
    'uses' => 'Admin\BlogAdminController@DeletePost'
])->where('id', '[0-9]+');
// List All Blog Posts
Route::get('admin/b/l', [
    'uses' => 'Admin\BlogAdminController@index'
]);

/*
 *  SHOW ADMIN
 */

// Create Show
Route::get('admin/s/c', [
    'uses' => 'Admin\ShowAdminController@create'
]);
// Edit Show
Route::get('admin/s/e/{id}', [
    'uses' => 'Admin\ShowAdminController@edit'
])->where('id', '[0-9]+');

Route::post('admin/s/e/{id}', [
    'uses' => 'Admin\ShowAdminController@update'
])->where('id', '[0-9]+');
// Change Publicity
Route::get('admin/s/h/{id}', [
    'uses' => 'Admin\ShowAdminController@togpublivity'
])->where('id', '[0-9]+');
// Create Show
Route::post('admin/s/c', [
    'uses' => 'Admin\ShowAdminController@createShow'
]);
// Delete Show
Route::get('admin/s/d/{id}', [
    'uses' => 'Admin\ShowAdminController@delete'
])->where('id', '[0-9]+');
Route::get('admin/s/dc/{id}', [
    'uses' => 'Admin\ShowAdminController@DeleteShow'
])->where('id', '[0-9]+');
// List All Show
Route::get('admin/s/l', [
    'uses' => 'Admin\ShowAdminController@index'
]);


/*
 *  Scheduling
 */
// Book a Slot
Route::get('admin/time/c', [
    'uses' => 'Admin\ScheduleAdminController@create'
]);

// List All Bookings
Route::get('admin/time/l', [
    'uses' => 'Admin\ScheduleAdminController@index'
]);


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

/**
 * Icebreath API Handling
 */

// Return a nice API landing page
Route::get('icebreath', 'IcebreathController@index');

// Handle module calls
Route::any('icebreath/{all}', 'IcebreathController@module')->where('all', '.*');
