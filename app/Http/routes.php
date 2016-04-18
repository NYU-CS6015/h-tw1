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

/*
 * Handle timeline display
 */
Route::get('/home', 'HomeController@index')->name('user.timeline');

/*
 * Handle user info + tweets display
 */
Route::get('/user/{user}', 'UserController@index')->name('user.index');

/*
 * Handle user search
 */
Route::post('/user/search', 'UserController@search')->name('user.search');

/*
 * Handle user profile
 */
Route::get('user/{user}/profile', 'ProfileController@index')->name('user.profile');
Route::get('user/{user}/profile/edit', 'ProfileController@create')->name('user.edit.profile');
Route::post('user/{user}/profile', 'ProfileController@store')->name('user.save.profile');

/*
 * Handle user follow and unfollow
 */
Route::get('/user/{user}/follow', 'UserController@follow')->name('user.follow');
Route::get('/user/{user}/unfollow', 'UserController@unfollow')->name('user.unfollow');

/*
 * Handle fetching following and followers
 */
Route::get('/user/{id}/following', 'UserController@getFollowing');
Route::get('/user/{id}/followers', 'UserController@getFollowers');

/*
 * Handle creation of tweets
 */
Route::post('/create', 'TweetController@store')->name('user.create.tweet');
Route::post('/create/first', 'TweetController@store')->name('user.create.first.tweet');



