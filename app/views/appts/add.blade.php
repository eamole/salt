@extends("master")


@section("content")

	<!-- onSubmit go to apptSave,and pass in the route to this form (for errors) -->
	{{ Form::model( $appt , array('route' => array('apptSave' , 'apptAdd' ))) }}
	
<!-- 		{{ Form::label('id','ID  :') }}
		 	{{ Form::text('id' , $appt->id ) }} <br/> 
 -->		

		<div class='panel' >

			{{ Form::label('client' , 'Client : ') }}
				{{ Form::select('client',$clients,$appt->client) }} <br/>

			{{ Form::label('therapist' , 'Therapist : ') }}
				{{ Form::select('therapist',$therapists,$appt->therapist) }} <br/>

		</div>

		<div class='panel' >


			{{ Form::label('date' , 'Date  : ') }}
				{{ Form::input('date','date',$appt->date) }} <br/>

			{{ Form::label('start' , 'Start  : ') }}
				{{ Form::input('time','start',$appt->start) }} <br/>

			{{ Form::label('finish' , 'Finish  : ') }}
				{{ Form::input('time','finish',$appt->finish) }} <br/>

			{{ Form::label('attended' , 'Attended  : ') }}
				{{ Form::checkbox('attended',$appt->attended) }} <br/>

		</div>

		<br clear='all' />

		{{ Form::label('notes' , 'Notes : ') }}
			{{ Form::textarea('notes', $appt->notes,[ 'class' => 'notes' ]) }} <br/>		
			

		<?php 
			$urlCancel = URL::route('apptsDisplayAll');
		?>

		<div class="menuBar">

			{{ Form::submit("Save Appointment") }}
			<a class='button' href='{{$urlCancel}}'>Cancel</a>

		</div>

	{{ Form::close() }}

@endsection


