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

Route::group(array('prefix' => 'api'), function()
{
	Route::group(array('prefix' => 'twitter'), function()
	{
		Route::get('game-data', 'TwitterController@getGameData');
    	Route::get('accounts/{num_accounts?}', 'TwitterController@getTopAccounts')
    	->where('num_accounts', '[0-9]+');
	});
    
});