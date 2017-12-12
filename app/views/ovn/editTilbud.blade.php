@extends('layout.dashboard')

@section('title')
	edit Tibud
@stop

@section('content')

<h1>edit Tilbud</h1>
<hr>

<table class="table">
	<tr>
		<th>#</th>
		<th>Navn</th>
		<th>image</th>
		<th>Pris</th>
		<th>Ny Pris</th>
		<th>Start Dato</th>
		<th>Slut Dato</th>
		
		
		
		
		
	</tr>
	
		<tr>
		
			<td>{{ $tilbud->id }}</td>
			<?php $ovnId = OvnItem::where('id', $tilbud->item_id)->first()->ovn_id; 
			           		
			           ?>
			<td>{{ Ovn::where('id', $ovnId)->first()->name }} {{ $item->name }}</td>
			<td><img src="/ovn/{{ $item->image }}" style="height:50px; width:50px;"></td>
			<td>{{ $item->pris }}</td>
			{{ Form::open(array('route' => 'postEditTilbud')) }}
			<input type="hidden" name="id" value="{{ $tilbud->id}}">
			<td><input type="text" name="nypris" value="{{ $tilbud->nypris }}"></td>
			<td><input type="date" name="start_dato" value="{{ $tilbud->startdato }}"></td>
			<td><input type="date" name="slut_dato" value="{{ $tilbud->slutdato }}"></td>

			</tr></table>
			{{ Form::submit('RET', array('class' => 'btn btn-primary')) }}
			{{ Form::close() }}
			
			
			
			
			
		
	


@stop
 

