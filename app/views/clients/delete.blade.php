@extends("master")


@section("content")

	<div class="container form">
		<div class="form-row">
			<span class="label">
				ID  : 
			</span>
			<span class="input">
				{{ $client->id }}
			</span>
		</div>
		
		<div class="form-row">
			<span class="label">
				Name : 
			</span>
			<span class="input">
				{{ $client->name }} <br/>
			</span>
		</div>

		<div class="form-row">
			<span class="label">
				Phone : 
			</span>
			<span class="input">
				{{ $client->phone }} <br/>
			</span>
		</div>


		<div class="form-row">
			<span class="label">
				Email : 
			</span>
			<span class="input">
				{{ $client->email }} <br/>
			</span>
		</div>

		<div class="form-row">
			<span class="label">
				Login ID : 
			</span>
			<span class="input">
				{{ $client->username }} <br/>
			</span>
		</div>

	<?php 
		$urlOk = URL::action("ClientsController@deleteConfirm",array($client->id));
		$urlCancel = URL::route('clientDisplay',array($client->id));
	?>

	<div class="container">

		
		Warning : you are about to delete this record.<br/> Are you sure you wish to proceed?<br/>

	</div>
	
	<div class="container">

		<a class='button' href='{{$urlOk}}'>Delete</a>
		<a class='button' href='{{$urlCancel}}'>Cancel</a>


	</div>



@endsection