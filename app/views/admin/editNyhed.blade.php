@extends('layout.dashboard')

@section('title')
	Ret nyhed
@stop

@section('content')
	{{ Form::open(array('route' => 'postEditNyhed')) }}
	{{ Form::hidden('id', $nyhed->id) }} 

	<div class="form-group {{ ($errors->has('title')) ? 'has-error' : '' }}">
	{{ Form::label('title') }}
	{{ Form::text('title', $nyhed->title, array('class' => 'form-control', 'required' => 'required')) }}

	@if ($errors->has('title'))
			<strong>
				{{ $errors->first('title') }}
			</strong>
		@endif
	</div>
		<br>
	

	<div class="form-group {{ ($errors->has('description')) ? 'has-error' : '' }}">
	{{ Form::label('description') }}
	{{ Form::textarea('description', $nyhed->description, array('class' => 'form-control', 'required' => 'required')) }}

	@if ($errors->has('description'))
			<strong>
				{{ $errors->first('description') }}
			</strong>
		@endif
	</div>
		<br>

	
	
	{{ Form::submit('Ret', array('class' => 'btn btn-primary')) }}
	

	 
{{ Form::close() }}



@stop