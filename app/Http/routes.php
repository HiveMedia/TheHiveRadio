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

/*
 *  Static Pages
 */
// About us page
Route::get('/about', 'StaticController@aboutus');

// Join us page
Route::get('/join', 'StaticController@joinus');

// Staff Page
Route::get('/staff', 'StaticController@staffus');

/*
 * Dynamic Coded stuffs
 */
//Blog Post
Route::get('b/{id}', [
	'as' => 'post', 'uses'=>'Blog@post'
	])->where('id','[0-9]+');


//Blog Pages
Route::get('b', [
    'uses'=>'Blog@pageone'
]);
Route::get('b/page/', [
    'as' => 'blogpageone', 'uses'=>'Blog@pageone'
]);

Route::get('b/page/{id}', [
    'as' => 'blogpage', 'uses'=>'Blog@page'
])->where('id','[0-9]+');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
