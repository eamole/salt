<!DOCTYPE html>
<html>
<head>
	<title>{{ $title }}</title>
</head>
<body>
	<h1>{{ $title }}</h1>
	<table border="1">
	@foreach($data as $key => $author)	<!-- $value is a record/array of values-->
		<tr>
			<td> {{ HTML::linkRoute('displayAuthor',$author->id,$author->id) }}</td>
			<td> {{ HTML::linkRoute('displayAuthor',$author->name,$author->id) }}</td>
			<td> {{$author->bio}}</td>
			
		</tr>
	@endforeach
	</table>
	{{ HTML::linkRoute('addAuthor',"Add Author") }}
</body>
</html>


