@extends('layout.dashboard')

@section('title')
	Create Tibud
@stop

@section('content')

<h1>Opret Tilbud</h1>
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
		<th>opret</th>
		
		
	</tr>
	@foreach($item as $item)
		<?php if(Tilbud::where('item_id', $item->id)->count() != 1) { ?>
		<tr>
			<td>{{ $item->id }}</td>

			<td>{{ Ovn::where('id', $item->ovn_id)->first()->name }} {{ $item->name }}</td>
			<td><img src="/ovn/{{ $item->image }}" style="height:50px; width:50px;"><br>
			<td>{{ $item->pris }}</td>
			{{ Form::open(array('route' => 'postCreateTilbud')) }}
			<input type="hidden" name="id" value="{{ $item->id}}">
			<td><input type="text" name="nypris"></td>
			<td><input type="date" name="start_dato"></td>
			<td><input type="date" name="slut_dato"></td>
			<td>{{ Form::submit('opret', array('class' => 'btn btn-primary')) }}</td>
			{{ Form::close() }}
			
			
		</tr>
		<?php } ?>
	@endforeach

</table>
 





@stop