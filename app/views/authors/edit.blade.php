<!DOCTYPE html>
<html>
<head>
	<title>{{ $title }}</title>
</head>
<body>

	{{ Form::model( $author ) }}
	
		{{ Form::label('id','ID  :') }}
		 	{{ Form::text('id' , $author->id ) }} <br/>
		
		{{ Form::label('name','Name :') }}
		 	{{ Form::text('name',$author->name) }} <br/>
		
		{{ Form::label('bio' , 'Bio : ') }}
			{{ Form::textarea('bio',$author->bio) }} <br/>
	
	{{ Form::close() }}


</body>
</html>


