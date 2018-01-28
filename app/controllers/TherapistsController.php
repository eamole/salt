<?php

class TherapistsController extends BaseController {

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
		$data = Therapist::all();
		return View::make('therapists.index',array(
			'data' => $data
		))->with("title","Therapists Blade View from controller.index");
	}

	public function display($id) {
		// use eloquest to retrieve the recvord/object from Therapist model and then pass it to View to render the data
		$therapist = Therapist::find($id); 

		return View::make('therapists.display',array(
			'therapist' => $therapist
		))->with("title","Therapist Display View from controller.display");	
	}

	public function edit($id) {
		// use eloquest to retrieve the recvord/object from Therapist model and then pass it to View to render the data
		$therapist = Therapist::find($id); 

		return View::make('therapists.edit',array(
			'therapist' => $therapist
		))->with("title","Therapist Edit View from controller.edit");	
	}

	public function add() {
		// use eloquest to retrieve the recvord/object from Therapist model and then pass it to View to render the data
		$therapist = new Therapist;
		return View::make('therapists.add',array(
			'therapist'=> $therapist
		))->with("title","Therapist Add View from controller.add");	
	}

	public function delete($id) {
		// use eloquest to retrieve the recvord/object from Therapist model and then pass it to View to render the data
		$therapist = Therapist::find($id); 

		return View::make('therapists.delete',array(
			'therapist' => $therapist
		))->with("title","Therapist Delete View from controller.delete");	
	}

	public function deleteConfirm($id) {
		// use eloquest to retrieve the recvord/object from Therapist model and then pass it to View to render the data
		$therapist = Therapist::find($id)->delete(); 

		return Redirect::route("therapistsDisplayAll");	
	}
	//need to pass in the View Route to redirect to (return) on fail
	public function save($route) {
		// the data weare saving must come from the form
		
		if($route=="therapistAdd") {
			$rules = array(
				'name' => 'required|min:5' ,
				'phone' => 'required|min:5:unique:therapists',
				'email' => 'required|email|unique:therapists',
				'username' => 'required|unique:therapists',
				'password' => 'required|min:8|confirmed'
			);
		} else {
			//unique constraints not working with edit - finsing the original record!
			$rules = array(
				'name' => 'required|min:5' ,
				'phone' => 'required|min:5',
				'email' => 'required|email',
				'username' => 'required',
				'password' => 'required|min:8|confirmed'
			);

		}
		// create a new Therapist oject from inputs
		//$therapist = new Therapist(Input::all());
		if(!empty(Input::get('id'))) {
			$therapist=Therapist::find(Input::get('id'));
		}
		else {
			$therapist = new Therapist;
		}
		// update object with changes
		$therapist->name	=Input::get('name');
		$therapist->phone	=Input::get('phone');
		$therapist->email	=Input::get('email');
		$therapist->username=Input::get('username');
		$therapist->password=Input::get('password');
	

		Log::info("Therapist data : ".$therapist);
		// validate inputs - cannot pass $therapist
		$validator = Validator::make(Input::all() , $rules );

		if( $validator->fails() ) {
			$this->msg("Validation failed Therapist : {$therapist->id}");
			// redirect to edit/add route with inputs
			return Redirect::route($route,array($therapist->id))->withInput()->withErrors($validator);
			
		} else {
			$this->msg("Saving Therapist : ".$therapist->id);
			// write the data back to database
			$therapist->save();
			$this->msg("Redirecting to Therapist : ".$therapist->id );
			return Redirect::route("therapistDisplay",array($therapist->id));
			
		}



		
	}



}