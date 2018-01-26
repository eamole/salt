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
			<td> {{ HTML::linkRoute('authorDisplay',$author->id,$author->id) }}</td>
			<td> {{ HTML::linkRoute('authorDisplay',$author->name,$author->id) }}</td>
			<td> {{$author->bio}}</td>
			
		</tr>
	@endforeach
	</table>
	{{ HTML::linkRoute('authorAdd',"Add Author") }}
</body>
</html>


