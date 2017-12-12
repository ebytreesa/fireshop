@extends('layout.dashboard')

@section('title')
	home
@stop

@section('content')

<h1>Tilbehør</h1>

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
	@foreach($acc as $acc)
		<tr>
			<td>{{ $acc->id }}</td>
			<td><a  href="/admin/{{ $acc->name }}/listTilbehørItems">{{ $acc->name }}</a></td>
			<td><img src="/accessory/{{ $acc->image }}" style="height:50px; width:50px;"><br>
			<td>{{ $acc->updated_at }}</td>
			<td>{{ $acc->created_at }}</td>
			<td><a href="/admin/editTilbehør/{{ $acc->id  }}" class="btn btn-primary btn-xs">RET</a></td>
			<td><a href="/admin/deleteTilbehør/{{ $acc->id  }}" class="btn btn-danger btn-xs">SLET</a></td>
			
		</tr>
	@endforeach

</table>
<a href="/admin/createNyTilbehør" class="btn btn-primary">Ny tilbehør</a>

@stop