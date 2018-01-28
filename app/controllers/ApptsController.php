<?php

class ApptsController extends BaseController {

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
		$data = Appt::all();
		return View::make('appts.index',array(
			'data' => $data
		))->with("title","Appointments Blade View from controller.index");
	}

	public function display($id) {
		// use eloquest to retrieve the recvord/object from Appt model and then pass it to View to render the data
		$appt = Appt::find($id); 

		if(!empty($appt->therapist)) {
			$therapist = Therapist::find($appt->therapist);
			$therapist = $therapist->name;
		} else{
			$therapist='<not set>';
		}

		if(!empty($appt->client)) {
			$client = Client::find($appt->client);
			$client = $client->name;
		} else{
			$client='<not set>';
		}

		return View::make('appts.display',array(
			'appt' 		=> $appt,
			'therapist' => $therapist,
			'client' 	=> $client,
		))->with("title","Appointment Display View from controller.display");	
	}

	public function delete($id) {
		// use eloquest to retrieve the recvord/object from Appt model and then pass it to View to render the data
		$appt = Appt::find($id); 

		if(!empty($appt->therapist)) {
			$therapist = Therapist::find($appt->therapist);
			$therapist = $therapist->name;
		} else{
			$therapist='<not set>';
		}

		if(!empty($appt->client)) {
			$client = Client::find($appt->client);
			$client = $client->name;
		} else{
			$client='<not set>';
		}

		return View::make('appts.delete',array(
			'appt' 		=> $appt,
			'therapist' => $therapist,
			'client' 	=> $client,
		))->with("title","Appointment Delete View from controller.delete");	
	}


	public function edit($id) {
		// use eloquest to retrieve the recvord/object from Appt model and then pass it to View to render the data
		$appt = Appt::find($id); 

		$therapists = Therapist::lists('name','id');

		$clients = Client::lists('name','id');

		return View::make('appts.edit',array(
			'appt' 			=> $appt,
			'therapists' 	=> $therapists,
			'clients' 		=> $clients,
		))->with("title","Appointment Edit View from controller.edit");	
	}

	public function add() {
		// use eloquest to retrieve the recvord/object from Appt model and then pass it to View to render the data
		$appt = new Appt;

		$therapists = Therapist::lists('name','id');

		$clients = Client::lists('name','id');

		return View::make('appts.add',array(
			'appt'			=> $appt,
			'therapists' 	=> $therapists,
			'clients' 		=> $clients,
		))->with("title","Appointment Add View from controller.add");	
	}


	public function deleteConfirm($id) {
		// use eloquest to retrieve the recvord/object from Appt model and then pass it to View to render the data
		$appt = Appt::find($id)->delete(); 

		return Redirect::route("apptsDisplayAll");	
	}
	//need to pass in the View Route to redirect to (return) on fail
	public function save($route) {
		// the data weare saving must come from the form
		
		if($route=="apptAdd") {
			$rules = array(
				'therapist' =>'required|exists:therapists,id',	
				'client' =>'required|exists:clients,id',	
				'date' =>  'date|after:'.date('Y-m-d',time() - 60 * 60 * 24),
				'finish' =>  'after:start',
			);
		} else {
			//unique constraints not working with edit - finsing the original record!
			$rules = array(
				'therapist' =>'required|exists:therapists,id',	
				'client' =>'required|exists:clients,id',	
				'date' =>  'date|after:'.date('Y-m-d',time() - 60 * 60 * 24),
				'finish' =>  'after:start',
			);

		}
		// create a new Appt oject from inputs
		//$appt = new Appt(Input::all());
		if(!empty(Input::get('id'))) {
			$appt=Appt::find(Input::get('id'));
		}
		else {
			$appt = new Appt;
		}
		// update object with changes
		$appt->therapist	=Input::get('therapist');
		$appt->client	=Input::get('client');
		$appt->date 	=Input::get('date');
		$appt->start	=Input::get('start');
		$appt->finish	=Input::get('finish');
		// Log::info("attended.before : ".$appt->attended);
		// if(Input::has('attended')) {
		// 	Log::info("has.attended : true ");
		// } else {
		// 	Log::info("has.attended : false ");			
		// }
		$appt->attended	=Input::has('attended');
		// Log::info("attended.after : ".$appt->attended);
		$appt->notes	=Input::get('notes');
	

		Log::info("Appt data : ".$appt);
		// validate inputs - cannot pass $appt
		$validator = Validator::make(Input::all() , $rules );

		if( $validator->fails() ) {
			$this->msg("Validation failed Appt : {$appt->id}");
			// redirect to edit/add route with inputs
			return Redirect::route($route,array($appt->id))->withInput()->withErrors($validator);
			
		} else {
			$this->msg("Saving Appt : ".$appt->id);
			// write the data back to database
			$appt->save();
			$this->msg("Redirecting to Appt : ".$appt->id );
			return Redirect::route("apptDisplay",array($appt->id));
			
		}



		
	}



}