@extends('layout.dashboard')

@section('title')
	Ret Ovn
@stop

@section('content')

<h1>Ret Ovn </h1>
<br>
{{ Form::open(array('route' => 'postEditOvn', 'files' => true)) }}
	{{ Form::hidden('id', $ovn->id) }}
	<div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
		{{ Form::label('Navn') }}
		{{ Form::text('name', $ovn->name, array('class' => 'form-control', 'required' => 'required')) }}
			

	@if ($errors->has('name'))
			<strong>
				{{ $errors->first('name') }}
			</strong>
		@endif
	</div>
	

	<img src="/ovn/{{ $ovn->pic }}" style="height:80px; width:80px;"><br><br>
	{{ Form::label('billede')}}
	{{ Form::file('pic')}}
	<br>
	{{ Form::submit('RET', array('class' => 'btn btn-primary')) }}
	

	 
{{ Form::close() }}
@stop

