@extends('layout.dashboard')

@section('title')
	List Tibud
@stop

@section('content')

<h1>List Tilbud</h1>
<hr>
<a href="/admin/createTilbud" class="btn btn-primary">Opret Ny</a>
<table class="table">
	<tr>
		<th>#</th>
		<th>Navn</th>
		<th>image</th>
		<th>Pris</th>
		<th>Ny Pris</th>
		<th>Start Dato</th>
		<th>Slut Dato</th>
		<th>Ret</th>
		<th>Slet</th>
		
		
		
	</tr>
	@foreach($tilbud as $tilbud)
		<tr>

			<td>{{ $tilbud->id }}</td>
			<?php $ovnId = OvnItem::where('id', $tilbud->item_id)->first()->ovn_id; 
			           		
			           ?>
			<td>{{ Ovn::where('id', $ovnId)->first()->name }}  {{ OvnItem::where('id', $tilbud->item_id)->first()->name }}</td>
			<td><img src="/ovn/{{ OvnItem::where('id', $tilbud->item_id)->first()->image }}" style="height:50px; width:50px;"></td>
			<td>{{ OvnItem::where('id', $tilbud->item_id)->first()->pris }}</td>
			<td>{{ $tilbud->nypris }}</td>
			<td>{{ $tilbud->startdato }}</td>
			<td>{{ $tilbud->slutdato }}</td>
			<td><a href="/admin/editTilbud/{{ $tilbud->id  }}" class="btn btn-primary btn-xs">RET</a></td>
			<td><a href="/admin/deleteTilbud/{{ $tilbud->id  }}" class="btn btn-danger btn-xs">SLET</a></td>
			
			
			
		</tr>
	@endforeach
</table>
 
	
	
@stop