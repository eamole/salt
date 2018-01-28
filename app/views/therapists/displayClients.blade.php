@extends("master")


@section("content")

	<div class="container form">

		<div class="form-row">
			<span class="label">
				Name : 
			</span>
			<span class="input">
				{{ $therapist->name }} <br/>
			</span>
		</div>

		<h3>Clients</h3>
		<table>
			<thead>
				<tr>
					<th class='id'>ID</th>
					<th class='name'>Name</th>
					<th class='phone'>Phone</th>
					<th class='email'>Email</th>
					
					
				</tr>
			</thead>
			<tbody>
				@foreach($clients as $key => $client)	<!-- $value is a record/array of values-->
					<?php 
						$url = URL::route('clientDisplay',$client->id);
					?>
					<tr>
						<td> {{ HTML::linkRoute('clientDisplay', $client->id 	, $client->id) }}</td>
						<td> {{ HTML::linkRoute('clientDisplay', $client->name 	, $client->id) }}</td>
						<td> {{ HTML::linkRoute('clientDisplay', $client->phone , $client->id) }}</td>
						<td> {{ HTML::linkRoute('clientDisplay', $client->email , $client->id) }}</td>
							
			
					</tr>
				@endforeach
			</tbody>
		</table>


<!-- 		<div class="menuBar">

			{{ HTML::linkRoute('clientAdd',"Add Client" , null , ['class' => 'button']) }}

		</div>
 -->




	</div>


	<div class="menuBar">
		{{ HTML::linkRoute('therapistEdit','Edit Therapist',$therapist->id,  ['class' => 'button']) }}
		{{ HTML::linkRoute('therapistDelete','Delete Therapist',$therapist->id , ['class' => 'button']) }}
		{{ HTML::linkRoute('therapistDisplay','Cancel' , $therapist->id , ['class' => 'button']) }}
	</div>

@endsection


