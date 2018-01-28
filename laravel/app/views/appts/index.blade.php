@extends("master")


@section("content")


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
			@foreach($data as $key => $appt)	<!-- $value is a record/array of values-->
				<?php 
					$url = URL::route('apptDisplay',$appt->id);

					if(!empty($appt->client_id)) {
						$client=Client::find($appt->client_id);
						$client=$client->name;
					} else {
						$client='<not set>';
					}

					if(!empty($appt->therapist_id)) {
						$therapist=Therapist::find($appt->therapist_id);
						$therapist=$therapist->name;
					} else {
						$therapist='<not set>';
					}

					if(is_null($appt->attended)) { $attended="n/a"; }
					elseif( $appt->attended) {$attended = "yes"; }
					else{ $attended="no";} 
				?>
				<tr>
					<td> {{ HTML::linkRoute('apptDisplay', $appt->id 	, $appt->id) }}</td>
					<td> {{ HTML::linkRoute('apptDisplay', $client 		, $appt->id) }}</td>
					<td> {{ HTML::linkRoute('apptDisplay', $therapist 	, $appt->id) }}</td>
					<td> {{ HTML::linkRoute('apptDisplay', $appt->date 	, $appt->id) }}</td>
					<td> {{ HTML::linkRoute('apptDisplay', $appt->start , $appt->id) }}</td>
					<td> {{ HTML::linkRoute('apptDisplay', $appt->finish , $appt->id) }}</td>
					<td> {{ HTML::linkRoute('apptDisplay', $attended , $appt->id) }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>


	<div class="menuBar">

		{{ HTML::linkRoute('apptAdd',"Add Appointment" , null , ['class' => 'button']) }}

	</div>
	
@endsection
