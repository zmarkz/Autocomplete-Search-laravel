<?php


Route::get('/', function()
{
	return View::make('home');
});

//to search items corresponding categoryID
Route::get('/getItems', array('as' => 'getItems','uses' => 'HomeController@getItems'));
Route::get('/getItems/{parentID}', array('uses' => 'HomeController@getItems'));

//to get specific Item data (name and price)
Route::get('/getItemData/', array('as'=>'getItemData','uses' => 'HomeController@getItemData'));
Route::get('/getItemData/{itemID}', array('uses' => 'HomeController@getItemData'));

//to search categories
Route::get('/getCategories', array('as' => 'getCategories','uses' => 'HomeController@getCategories'));
