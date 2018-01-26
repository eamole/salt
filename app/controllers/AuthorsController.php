<?php

class AuthorsController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{	
		// $data = array( "var1" => "value 1","var2" => "value 2");
		$data = Author::all();
		return View::make('authors.index',array(
			'data' => $data
		))->with("title","Authors Blade View from controller.index");
	}

	public function displayAuthor($id) {
		// use eloquest to retrieve the recvord/object from Author model and then pass it to View to render the data
		$author = Author::find($id); 

		return View::make('authors.display',array(
			'author' => $author
		))->with("title","Author Display View from controller.display");	
	}

	public function editAuthor($id) {
		// use eloquest to retrieve the recvord/object from Author model and then pass it to View to render the data
		$author = Author::find($id); 

		return View::make('authors.edit',array(
			'author' => $author
		))->with("title","Author Edit  View from controller.edit");	
	}

	public function addAuthor() {
		// use eloquest to retrieve the recvord/object from Author model and then pass it to View to render the data

		return View::make('authors.add',array(
		))->with("title","Author Edit  View from controller.edit");	
	}

	public function deleteAuthor($id) {
		// use eloquest to retrieve the recvord/object from Author model and then pass it to View to render the data
		$author = Author::find($id); 

		return View::make('authors.delete',array(
			'author' => $author
		))->with("title","Author Delete View from controller.delete");	
	}



}