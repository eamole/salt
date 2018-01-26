<!DOCTYPE html>
<html>
<head>
	<title>{{ $title }}</title>
</head>
<body>

	ID  : {{ $author->id }} <br/>
	Name : {{ $author->name }} <br/>
	Bio : {{ $author->bio }} <br/>

	{{ HTML::linkRoute('authorEdit','Edit Author',$author->id) }}
	{{ HTML::linkRoute('authorDelete','Delete Author',$author->id) }}
</body>
</html>


