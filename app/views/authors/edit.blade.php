<!DOCTYPE html>
<html>
<head>
	<title>{{ $title }}</title>
</head>
<body>

	{{ Form::model( 'Author' ) }}
	{{ Form::open() }}
	
		{{ Form::label('id','ID  :') }}
		 	{{ Form::text('id' , $author->id ) }} <br/>
		
		{{ Form::label('name','Name :') }}
		 	{{ Form::text('name',$author->name) }} <br/>
		
		{{ Form::label('bio' , 'Bio : ') }}
			{{ Form::textarea('bio',$author->bio) }} <br/>
	
	{{ Form::close() }}

	{{ HTML::linkRoute('editAuthor','Edit Author',$author->id) }}
	{{ HTML::linkRoute('deleteAuthor','Delete Author',$author->id) }}
</body>
</html>


