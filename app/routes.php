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

// Route::get('authors', function()
// {
// 	return "Hello world";
	
// });

// Route::get('authors', function()
// {
// 	return View::make("authors.index");

// });

Route::get('authors',array(
	'uses'=>'AuthorsController@index',
	'as' =>'getAuthors'

));

// Route::get('author/{id}',function($id) {
// 	return View::make('authors.author')->with("title","Author View")->with("id", $id);	
// });

Route::get('author/display/{id}',array(
	'uses' => "AuthorsController@displayAuthor",
	'as' =>'displayAuthor'
));

Route::get('author/edit/{id}',array(
	'uses' => "AuthorsController@editAuthor",
	'as' =>'editAuthor'
));

Route::get('author/add',array(
	'uses' => "AuthorsController@addAuthor",
	'as' =>'addAuthor'
));

Route::get('author/delete/{id}',array(
	'uses' => "AuthorsController@deleteAuthor",
	'as' =>'deleteAuthor'
));