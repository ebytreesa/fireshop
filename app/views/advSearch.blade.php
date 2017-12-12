@extends('layout.home')

@section('title')
	Advanceret søg
@stop

@section('content')

<h1>Advanceret søg</h1>
<hr>
 
{{ Form::open(array('route' => 'postAdvSearch')) }}

<div class="form-group ">
		<label for=" Mærke" >Mærke</label>
		<select name="ovn" >
			@foreach($ovn as $ovn)
			<option value={{ $ovn->name }}>{{ $ovn->name }} </option> 
		     @endforeach
		</select>

		
		</div>
		<br> 
		<?php
		$items = DB::table('ovne')
				->join('ovn_items', 'ovn_items.ovn_id', '=', 'ovne.id')->select('ovn_items.name as item_name', 'ovn_items.pris', 'ovne.name')->get();

		?>

	<div class="form-group ">
		<label for=" item" >Model</label>
		<select name="item"  >
			@foreach($items as $item)
			<option value={{ $item->item_name }}>{{ $item->item_name }} </option> 
		    @endforeach
		</select>

		
	</div>
		<br>
	<label for=" pris" >Max Pris</label>
		<input type="text" name="pris">
			<br>	<br>

	<label for="search" >Søg ord</label>
		<input type="text" name="search">
	
	

	<br>	<br>	<br>
	
	{{ Form::submit('søg', array('class' => 'btn btn-primary')) }}
	

	 
{{ Form::close() }}


@stop