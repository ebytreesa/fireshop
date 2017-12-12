@extends('layout.dashboard')

@section('title')
	list Kontakt
@stop
@section('content')
	<h1>Kontakter</h1>
{{ Form::open(array('route' => 'postEditKontakt')) }}
	{{ Form::hidden('id', $kontakt->id)}}
		<div class="form-group {{ ($errors->has('firmanavn')) ? 'has-error' : '' }}">
		{{ Form::label('Evt Firmanavn') }}
		{{ Form::text('firmanavn', $kontakt->firmanavn, array('class' => 'form-control', 'required' => 'required')) }}
		@if ($errors->has('firmanavn'))
			<strong>
				{{ $errors->first('firmanavn') }}
			</strong>
		@endif
		</div>
		<br>

		<div class="form-group {{ ($errors->has('kontaktperson')) ? 'has-error' : '' }}">
		{{ Form::label('Kontaktperson') }}
		{{ Form::text('kontaktperson', $kontakt->kontaktperson, array('class' => 'form-control', 'required' => 'required')) }}
		@if ($errors->has('kontaktperson'))
			<strong>
				{{ $errors->first('kontaktperson') }}
			</strong>
		@endif
		</div>
		<br>

		

		<div class="form-group {{ ($errors->has('phone')) ? 'has-error' : '' }}">
		{{ Form::label('Telefon') }}
		{{ Form::text('phone', $kontakt->phone, array('class' => 'form-control', 'required' => 'required')) }}
		@if ($errors->has('phone'))
			<strong>
				{{ $errors->first('phone') }}
			</strong>
		@endif
		</div>
		<br>

		
		<div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
		{{ Form::label('Email') }}
		{{ Form::email('email', $kontakt->email, array('class' => 'form-control', 'required'=> 'required')) }}
		@if ($errors->has('email'))
			<strong>
				{{ $errors->first('email') }}
			</strong>
		@endif
		</div>
		<br>

		<div class="form-group {{ ($errors->has('question')) ? 'has-error' : '' }}">
		{{ Form::label('Spørgsmål') }}
		{{ Form::textarea('question', nl2br($kontakt->question), array('class' => 'form-control', 'required' => 'required')) }}
		@if ($errors->has('question'))
			<strong>
				{{ $errors->first('question') }}
			</strong>
		@endif
		</div>
		<br>

		
		{{ Form::submit('OK', array('class' => 'btn ')) }}
	
	{{ Form::close() }}
@stop	