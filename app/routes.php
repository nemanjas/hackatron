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
	return View::make('hello');
});


Route::post('insert', ['before' => 'oauth','uses' => 'HomeController@Insert']);

Route::get('get', ['before' => 'oauth','uses' => 'HomeController@GetData']);

Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});




