<?php


Route::get('/', function()
{
	return View::make('home');
});

Route::get('/getItems', array('as' => 'getItems','uses' => 'HomeController@getItems'));
Route::get('/getItems/{parentID}', array('uses' => 'HomeController@getItems'));


Route::get('/getCategories', array('as' => 'getCategories','uses' => 'HomeController@getCategories'));
