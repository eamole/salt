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
			'name' => 'Enid Blyton' ,
			'bio' => 'This is her hard wored bio',
			'data' => $data
		))->with("title","Authors View from blade controller");
	}

	public function displayAuthor($id) {
		// use eloquest to retrieve the recvord/object from Author model and then pass it to View to render the data
		$author = Author::find($id); 

		return View::make('authors.author',array(
			'id' => $id ,
			'author' => $author
		))->with("title","Author View (singular) from blade controller");	
	}

}