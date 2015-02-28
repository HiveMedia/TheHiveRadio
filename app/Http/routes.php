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

Route::get('/', 'StaticController@home');
Route::get('/home', 'StaticController@home');


/*
 *  Static Pages
 */
// About us page
Route::get('/about', 'StaticController@aboutus');

// Join us page
Route::get('/join', 'StaticController@joinus');

// Staff Page
Route::get('/staff', 'StaticController@staffus');

// Chat Page
Route::get('/chat', 'StaticController@chatus');

/*
 * Dynamic Coded stuffs
 */
// Blog Post
Route::get('b/{id}', [
	'as' => 'post', 'uses'=>'Blog@post'
	])->where('id','[0-9]+');


// Blog Pages
Route::get('b', [
    'uses'=>'Blog@pageone'
]);
Route::get('b/page/', [
    'as' => 'blogpageone', 'uses'=>'Blog@pageone'
]);

Route::get('b/page/{id}', [
    'as' => 'blogpage', 'uses'=>'Blog@page'
])->where('id','[0-9]+');

// Shows
Route::get('s', [
    'uses'=>'ShowsController@index'
]);

Route::get('s/{id}', [
    'as' => 'showpage', 'uses'=>'ShowsController@show'
])->where('id','[0-9]+');

// Admin Stuff


Route::get('admin', [
    'uses'=>'Admin\AdminController@index'
]);

// Create Blog Posts
Route::get('admin/b/c', [
    'uses'=>'Admin\BlogAdminController@create'
]);
Route::get('admin/b/e/{id}', [
    'uses'=>'Admin\BlogAdminController@edit'
])->where('id','[0-9]+');

Route::post('admin/b/e/{id}', [
    'uses'=>'Admin\BlogAdminController@update'
])->where('id','[0-9]+');

Route::get('admin/b/h/{id}', [
    'uses'=>'Admin\BlogAdminController@togpublivity'
])->where('id','[0-9]+');

Route::post('admin/b/c', [
    'uses'=>'Admin\BlogAdminController@createPost'
]);
Route::get('admin/b/d/{id}', [
    'uses'=>'Admin\BlogAdminController@delete'
])->where('id','[0-9]+');
Route::get('admin/b/dc/{id}', [
    'uses'=>'Admin\BlogAdminController@DeletePost'
])->where('id','[0-9]+');




Route::get('admin/b/l', [
    'uses'=>'Admin\BlogAdminController@index'
]);


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
