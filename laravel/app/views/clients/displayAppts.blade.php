@extends("master")


@section("content")

	<div class="container form">

		<div class='panel'>

<!-- 			<div class="form-row">
				<span class="label">
					ID  : 
				</span>
				<span class="input">
					{{ $client->id }}
				</span>
			</div>
 -->			
			<div class="form-row">
				<span class="label">
					Name : 
				</span>
				<span class="input">
					{{ $client->name }} <br/>
				</span>
			</div>
		</div>

		<div class='panel'>

			<div class="form-row">
				<span class="label">
					Therapist : 
				</span>
				<span class="input">
					{{ HTML::linkRoute('therapistDisplay', $therapist ,$client->therapist_id ) }}<br/>
				</span>
			</div>

		</div>

		<br clear='all' />

		<div class="form-row">
			<span class="label">
				Notes : 
			</span>
			<span class="input">
				{{ $client->notes }} <br/>
			</span>
		</div>



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

						if(!empty($appt->client_id)) {
							$cli=Client::find($appt->client_id);
							$cli=$cli->name;
						} else {
							$cli='<not set>';
						}

						if(!empty($appt->therapist_id)) {
							$thera=Therapist::find($appt->therapist_id);
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
						<td> {{ HTML::linkRoute('apptDisplay', $cli 		, $appt->id) }}</td>
						<td> {{ HTML::linkRoute('apptDisplay', $thera 		, $appt->id) }}</td>
						<td> {{ HTML::linkRoute('apptDisplay', $appt->date 	, $appt->id) }}</td>
						<td> {{ HTML::linkRoute('apptDisplay', $appt->start , $appt->id) }}</td>
						<td> {{ HTML::linkRoute('apptDisplay', $appt->finish , $appt->id) }}</td>
						<td> {{ HTML::linkRoute('apptDisplay', $attended , $appt->id) }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>	


	<div class="menuBar">
		{{ HTML::linkRoute('clientEdit','Edit Client',$client->id,  ['class' => 'button']) }}
		{{ HTML::linkRoute('clientDelete','Delete Client',$client->id , ['class' => 'button']) }}
		{{ HTML::linkRoute('clientDisplay','Cancel' , $client->id , ['class' => 'button']) }}
	</div>

@endsection


