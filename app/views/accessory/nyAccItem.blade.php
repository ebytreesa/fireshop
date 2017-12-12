@extends('layout.dashboard')

@section('title')
	Create ny Item
@stop

@section('content')

<h1>Ny Ovn Item i {{ $acc->name }}</h1>
<br>
 
{{ Form::open(array('route' => 'postCreateTilbehørItem', 'files' => true)) }}

	{{ Form::hidden('id', $acc->id ) }}
	<div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
		{{ Form::label('Navn') }}
		{{ Form::text('name', '', array('class' => 'form-control', 'required' => 'required')) }}
			

	@if ($errors->has('name'))
			<strong>
				{{ $errors->first('name') }}
			</strong>
		@endif
	</div>
	<div class="form-group {{ ($errors->has('pris')) ? 'has-error' : '' }}">
		{{ Form::label('pris') }}
		{{ Form::number('pris', '', array('class' => 'form-control', 'required' => 'required')) }}
			

	@if ($errors->has('pris'))
			<strong>
				{{ $errors->first('pris') }}
			</strong>
		@endif
	</div>


	<div class="form-group {{ ($errors->has('description')) ? 'has-error' : '' }}">
	{{ Form::label('description') }}
	{{ Form::textarea('description', '', array('class' => 'form-control', 'required' => 'required')) }}

	@if ($errors->has('description'))
			<strong>
				{{ $errors->first('description') }}
			</strong>
		@endif
	</div>
		<br>

	
	

	
	{{ Form::label('billede')}}
	{{ Form::file('pic')}}
	<br>
	{{ Form::submit('opret', array('class' => 'btn btn-primary')) }}
	

	 
{{ Form::close() }}


@stop