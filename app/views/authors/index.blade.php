<!DOCTYPE html>
<html>
<head>
	<title>{{ $title }}</title>
</head>
<body>
	<h1>Authors View from blade controller</h1>
	the title of this page is {{ $title }}<br/>
	Name : {{ $name }}<br/>
	Bio : {{ $bio}} <br/>
	Data :
	<table>
	@foreach($data as $key => $author)	<!-- $value is a record/array of values-->
		<tr>
			<td> {{$author->id}}</td>
			<td> {{$author->name}}</td>
			<td> {{$author->bio}}</td>
			
		</tr>
	@endforeach
	</table>
</body>
</html>


