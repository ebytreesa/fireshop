@extends('layout.dashboard')

@section('title')
	Ret Forside
@stop

@section('content')
	{{ Form::open(array('route' => 'postRetForside', 'files' => true)) }}
	{{ Form::hidden('id', $forside->id) }}

	<div class="form-group {{ ($errors->has('description')) ? 'has-error' : '' }}">
	{{ Form::label('description') }}
	{{ Form::textarea('description', $forside->description, array('class' => 'form-control', 'required' => 'required')) }}

	@if ($errors->has('description'))
			<strong>
				{{ $errors->first('description') }}
			</strong>
		@endif
	</div>
		<br>

	<img src="/img/{{ $forside->image }}_thumb">
	<div class="form-group">
	{{ Form::label('billede')}}
	{{ Form::file('pic')}}
	@if ($errors->has('pic'))
		<strong>
			{{ $errors->first('pic') }}
		</strong>
		@endif
</div>
	<br>
	{{ Form::submit('Ret', array('class' => 'btn btn-primary')) }}
	

	 
{{ Form::close() }}



@stop