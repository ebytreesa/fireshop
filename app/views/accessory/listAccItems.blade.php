@extends('layout.dashboard')

@section('title')
	list Tilbehør Items
@stop

@section('content')

<h1>{{ $acc->name }} </h1>

<table class="table">
	<tr>
		<th>#</th>
		<th>Navn</th>
		<th>image</th>
		<th>pris</th>
		<th>Description</th>
		
		<th>Ret</th>
		<th>Slet</th>
		
	</tr>
	 @foreach($item as $item)
		<tr>
			<td>{{ $item->id }}</td>
			<td>{{ $item->name }}</td>
			<td><img src="/accessory/{{ $item->image }}" style="height:50px; width:50px;"><br>
			<td>{{ $item->pris }}</td>
			<td>{{ nl2br($item->description) }}</td>
			
			
			<td><a href="/admin/{{ $acc->name }}/editTilbehørItem/{{ $item->id }}" class="btn btn-primary btn-xs">RET</a></td>
			<td><a href="/admin/{{ $acc->name }}/deleteTilbehørItem/{{ $item->id }}" class="btn btn-danger btn-xs">SLET</a></td>
			
		</tr>
	@endforeach
 
</table>
<a href="/admin/{{ $acc->name }}/createNyTilbehørItem" class="btn btn-primary">Opret Ny</a>

@stop