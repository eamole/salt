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

		<h3>Appointments</h3>
		<table>
			<thead>
				<tr>
					<th class='id'>ID</th>
					<th class='client'>Client</th>
					<th class='patient'>Therapist</th>
					<th class='start'>Date</th>
					<th class='start'>Start</th>
					<th class='finish'>Finish</th>
					<th class='attended'>Attended</th>
					
					
				</tr>
			</thead>
			<tbody>
				@foreach($appts as $key => $appt)	<!-- $value is a record/array of values-->
					<?php 
						$url = URL::route('apptDisplay',$appt->id);

						if(!empty($appt->client)) {
							$client=Client::find($appt->client);
							$client=$client->name;
						} else {
							$client='<not set>';
						}

						if(!empty($appt->therapist)) {
							$thera=Therapist::find($appt->therapist);
							$thera=$thera->name;
						} else {
							$thera='<not set>';
						}

						if(is_null($appt->attended)) { $attended="n/a"; }
						elseif( $appt->attended) {$attended = "yes"; }
						else{ $attended="no";} 
					?>
					<tr>
						<td> {{ HTML::linkRoute('apptDisplay', $appt->id 	, $appt->id) }}</td>
						<td> {{ HTML::linkRoute('apptDisplay', $client 		, $appt->id) }}</td>
						<td> {{ HTML::linkRoute('apptDisplay', $thera 		, $appt->id) }}</td>
						<td> {{ HTML::linkRoute('apptDisplay', $appt->date 	, $appt->id) }}</td>
						<td> {{ HTML::linkRoute('apptDisplay', $appt->start , $appt->id) }}</td>
						<td> {{ HTML::linkRoute('apptDisplay', $appt->finish , $appt->id) }}</td>
						<td> {{ HTML::linkRoute('apptDisplay', $attended , $appt->id) }}</td>
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
		{{ HTML::linkRoute('therapistDisplayClients','Cancel' , $therapist->id , ['class' => 'button']) }}
	</div>

@endsection


