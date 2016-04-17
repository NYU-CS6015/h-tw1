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

Route::get('/', function () {
	if(!Auth::user()) {
		return view('welcome');    
	} else {
		return redirect()->action('HomeController@index');
	}
});

Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('/user/{id}', 'UserController@show');
Route::get('/follow/{id}', 'UserController@follow');
Route::get('/user/{id}/following', 'UserController@getFollowing');
Route::get('/user/{id}/followers', 'UserController@getFollowers');
Route::get('/create', 'TweetController@create');
Route::post('/create', 'TweetController@store');
