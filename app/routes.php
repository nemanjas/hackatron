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

Route::get('/', function () { return View::make('hello'); });


Route::get('admin/index',  ['uses' => 'AdminController@index']);


Route::post('authenticate', ['uses' => 'AdminController@authenticate']);

Route::post('insert', ['before' => 'oauth','uses' => 'HomeController@Insert']);

Route::post('update', ['before' => 'oauth','uses' => 'HomeController@Update']);

Route::get('get', ['before' => 'oauth','uses' => 'HomeController@GetData']);

Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});

Route::get('passmaker', function () { echo Hash::make('nemanjas'); });


Route::get('admin/getall',  ['uses' => 'AdminController@getall']);




