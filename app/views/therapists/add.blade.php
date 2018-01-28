@extends("master")


@section("content")

	<!-- onSubmit go to therapistSave,and pass in the route to this form (for errors) -->
	{{ Form::model( $therapist , array('route' => array('therapistSave' , 'therapistAdd' ))) }}
	
<!-- 		{{ Form::label('id','ID  :') }}
		 	{{ Form::text('id' , $therapist->id ) }} <br/> 
 -->		
		{{ Form::label('name','Name :') }}
		 	{{ Form::text('name',$therapist->name) }} <br/>
		
		{{ Form::label('phone' , 'Phone : ') }}
			{{ Form::text('phone',$therapist->phone) }} <br/>

		{{ Form::label('email' , 'Email : ') }}
			{{ Form::email('email',$therapist->email) }} <br/>

		{{ Form::label('username' , 'Login ID : ') }}
			{{ Form::text('username',$therapist->username) }} <br/>

		{{ Form::label('password' , 'Password : ') }}
			{{ Form::password('password',$therapist->password) }} <br/>

		{{ Form::label('password_confirmation' , 'Confirm : ') }}
			{{ Form::password('password_confirmation') }} <br/>

		<?php 
			$urlCancel = URL::route('therapistsDisplayAll');
		?>

		<span class="menuBar">

			{{ Form::submit("Save Therapist") }}
			<a class='button' href='{{$urlCancel}}'>Cancel</a>

		</span>

	{{ Form::close() }}

@endsection


