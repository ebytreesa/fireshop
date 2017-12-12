@extends('layout.dashboard')

@section('title')
	Edit Tilbehør Item 
@stop

@section('content')

<h1>Edit {{ $item->name }} i '{{ $acc->name }}' </h1>
<br>
 
{{ Form::open(array('route' => 'postEditTilbehørItem', 'files' => true)) }}

	{{ Form::hidden('name', $acc->name ) }}
	{{ Form::hidden('id', $item->id ) }}
	<div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
		{{ Form::label('Navn') }}
		{{ Form::text('name', $item->name, array('class' => 'form-control', 'required' => 'required')) }}
			

	@if ($errors->has('name'))
			<strong>
				{{ $errors->first('name') }}
			</strong>
		@endif
	</div>
	<div class="form-group {{ ($errors->has('pris')) ? 'has-error' : '' }}">
		{{ Form::label('pris') }}
		{{ Form::number('pris', $item->pris, array('class' => 'form-control', 'required' => 'required')) }}
			

	@if ($errors->has('pris'))
			<strong>
				{{ $errors->first('pris') }}
			</strong>
		@endif
	</div>


	<div class="form-group {{ ($errors->has('description')) ? 'has-error' : '' }}">
	{{ Form::label('description') }}
	{{ Form::textarea('description', nl2br($item->description), array('class' => 'form-control', 'required' => 'required')) }}

	@if ($errors->has('description'))
			<strong>
				{{ $errors->first('description') }}
			</strong>
		@endif
	</div>
		<br>


	
	

	<img src="/accessory/{{ $item->image }}" style="height:80px; width:80px;"><br><br>
	{{ Form::label('billede')}}
	{{ Form::file('pic')}}
	<br>
	{{ Form::submit('RET', array('class' => 'btn btn-primary')) }}
	

	 
{{ Form::close() }}


@stop