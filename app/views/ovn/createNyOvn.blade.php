@extends('layout.dashboard')

@section('title')
	Create ny Ovn
@stop

@section('content')

<h1>Ny Ovn </h1>
<br>
{{ Form::open(array('route' => 'postCreateNyOvn', 'files' => true)) }}
	<div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
		{{ Form::label('Navn') }}
		{{ Form::text('name', '', array('class' => 'form-control', 'required' => 'required')) }}
			

	@if ($errors->has('name'))
			<strong>
				{{ $errors->first('name') }}
			</strong>
		@endif
	</div>
	

	
	{{ Form::label('billede')}}
	{{ Form::file('pic')}}
	<br>
	{{ Form::submit('opret', array('class' => 'btn btn-primary')) }}
	

	 
{{ Form::close() }}


@stop