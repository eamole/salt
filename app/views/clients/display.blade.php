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
				Address : 
			</span>
			<span class="input">
				{{ $client->address }} <br/>
			</span>
		</div>


		<div class="form-row">
			<span class="label">
				PPS : 
			</span>
			<span class="input">
				{{ $client->pps }} <br/>
			</span>
		</div>


		<div class="form-row">
			<span class="label">
				Date of Birth : 
			</span>
			<span class="input">
				{{ $client->dob }} <br/>
			</span>
		</div>

		<div class="form-row">
			<span class="label">
				Therapist : 
			</span>
			<span class="input">
				{{ $client->therapist }} <br/>
			</span>
		</div>


		<div class="form-row">
			<span class="label">
				Notes : 
			</span>
			<span class="input">
				{{ $client->notes }} <br/>
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



	</div>


	<div class="container">
		{{ HTML::linkRoute('clientEdit','Edit Client',$client->id,  ['class' => 'button']) }}
		{{ HTML::linkRoute('clientDelete','Delete Client',$client->id , ['class' => 'button']) }}
		{{ HTML::linkRoute('clientsDisplayAll','Cancel' , null , ['class' => 'button']) }}
	</div>

@endsection


