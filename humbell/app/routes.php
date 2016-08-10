<?php


Route::get('/', function()
{
	return View::make('home');
});

Route::get('/getItems', array('as' => 'getItems','uses' => 'HomeController@getItems'));
Route::get('/getItems/{parentID}', array('uses' => 'HomeController@getItems'));

Route::get('/getItemData/', array('as'=>'getItemData','uses' => 'HomeController@getItemData'));
Route::get('/getItemData/{itemID}', array('uses' => 'HomeController@getItemData'));



Route::get('/getCategories', array('as' => 'getCategories','uses' => 'HomeController@getCategories'));
