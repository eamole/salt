<!DOCTYPE html>
<html>
<head>
	<title>{{ $title }}</title>
</head>
<body>

	ID  : {{ $author->id }} <br/>
	Name : {{ $author->name }} <br/>
	Bio : {{ $author->bio }} <br/>

	{{ HTML::linkRoute('editAuthor','Edit Author',$author->id) }}
	{{ HTML::linkRoute('deleteAuthor','Delete Author',$author->id) }}
</body>
</html>


