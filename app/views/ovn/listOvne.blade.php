@extends('layout.dashboard')

@section('title')
	home
@stop

@section('content')

<h1>Ovne liste </h1>

<table class="table">
	<tr>
		<th>#</th>
		<th>Navn</th>
		<th>image</th>
		<th>Opdateret</th>
		<th>Oprettet</th>
		<th>Ret</th>
		<th>Slet</th>
		
	</tr>
	@foreach($ovne as $ovne)
		<tr>
			<td>{{ $ovne->id }}</td>
			<td><a  href="/admin/{{ $ovne->name }}/list">{{ $ovne->name }}</a></td>
			<td><img src="/ovn/{{ $ovne->pic }}" style="height:50px; width:50px;"><br>
			<td>{{ $ovne->updated_at }}</td>
			<td>{{ $ovne->created_at }}</td>
			<td><a href="/admin/editOvn/{{ $ovne->id  }}" class="btn btn-primary btn-xs">RET</a></td>
			<td><a href="/admin/deleteOvn/{{ $ovne->id  }}" class="btn btn-danger btn-xs">SLET</a></td>
			
		</tr>
	@endforeach

</table>
<a href="/admin/createNyOvn" class="btn btn-primary">Ny Ovn</a>

@stop