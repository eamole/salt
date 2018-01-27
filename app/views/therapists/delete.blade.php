@extends("master")


@section("content")

	<div class="container form">
		<div class="form-row">
			<span class="label">
				ID  : 
			</span>
			<span class="input">
				{{ $therapist->id }}
			</span>
		</div>
		
		<div class="form-row">
			<span class="label">
				Name : 
			</span>
			<span class="input">
				{{ $therapist->name }} <br/>
			</span>
		</div>

		<div class="form-row">
			<span class="label">
				Phone : 
			</span>
			<span class="input">
				{{ $therapist->phone }} <br/>
			</span>
		</div>


		<div class="form-row">
			<span class="label">
				Email : 
			</span>
			<span class="input">
				{{ $therapist->email }} <br/>
			</span>
		</div>

		<div class="form-row">
			<span class="label">
				Login ID : 
			</span>
			<span class="input">
				{{ $therapist->username }} <br/>
			</span>
		</div>

	<?php 
		$urlOk = URL::action("TherapistsController@deleteConfirm",array($therapist->id));
		$urlCancel = URL::route('therapistDisplay',array($therapist->id));
	?>

	<div class="container">

		
		Warning : you are about to delete this record.<br/> Are you sure you wish to proceed?<br/>

	</div>
	
	<div class="container">

		<a class='button' href='{{$urlOk}}'>Delete</a>
		<a class='button' href='{{$urlCancel}}'>Cancel</a>


	</div>



@endsection