<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', function()
{
	return Redirect::to('/exercise/index');
});

/* User Stuff */
Route::get('/signup', 'UserController@getSignup');
Route::post('/signup', 'UserController@postSignup');
Route::get('/login', 'UserController@getLogin');
Route::post('/login', 'UserController@postLogin');

/* Logged in users only */
Route::group(array('before' => 'auth'), function()
{
	Route::get('/logout', 'UserController@getLogout');

	/* exercise stuff */
	Route::controller('exercise', 'ExerciseController');

	/* category stuff */
	Route::controller('category', 'CategoryController');

	/* Results Stuff */
	Route::controller('result', 'ResultController');

});

