@extends("master")


@section("content")

	<div class="container form">

		<div class='panel'>

			<div class="form-row">
				<span class="label">
					ID  : 
				</span>
				<span class="input">
					{{ $appt->id }}
				</span>
			</div>
			
			<div class="form-row">
				<span class="label">
					Client : 
				</span>
				<span class="input">
					{{ HTML::linkRoute('clientDisplay', $client ,$appt->client_id ) }}<br/>
				</span>
			</div>


			<div class="form-row">
				<span class="label">
					Therapist : 
				</span>
				<span class="input">
					{{ HTML::linkRoute('therapistDisplay', $therapist ,$appt->therapist_id ) }}<br/>
				</span>
			</div>

		</div>

		<div class='panel'>


			<div class="form-row">
				<span class="label">
					Date : 
				</span>
				<span class="input">
					{{ $appt->date }} <br/>
				</span>
			</div>

			<div class="form-row">
				<span class="label">
					Start : 
				</span>
				<span class="input">
					{{ $appt->start }} <br/>
				</span>
			</div>


			<div class="form-row">
				<span class="label">
					Finish : 
				</span>
				<span class="input">
					{{ $appt->finish }} <br/>
				</span>
			</div>

			<?php
				if(is_null($appt->attended)) { $attended="n/a"; }
				elseif( $appt->attended) {$attended = "yes"; }
				else{ $attended="no";} 
			?>

			<div class="form-row">
				<span class="label">
					Attended : 
				</span>
				<span class="input">
					{{ $attended }} <br/>
				</span>
			</div>
		
		</div>

		<br clear='all' />

		<div class="form-row">
			<span class="label">
				Notes : 
			</span>
			<span class="input">
				{{ $appt->notes }} <br/>
			</span>
		</div>


	</div>


	<div class="menuBar">
		{{ HTML::linkRoute('apptEdit','Edit Appointment',$appt->id,  ['class' => 'button']) }}
		{{ HTML::linkRoute('apptDelete','Delete Appointment',$appt->id , ['class' => 'button']) }}
		{{ HTML::linkRoute('apptAdd','Book Another Appointment',$appt->id , ['class' => 'button']) }}
		{{ HTML::linkRoute('apptsDisplayAll','Cancel' , null , ['class' => 'button']) }}
	</div>

@endsection


