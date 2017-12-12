@extends('layout.home')

@section('title')
 kontakt
@stop

@section('content')
	<h4 class="pull-right" style="color:red; font-weight:900; font-style:italic;">Kontakt</h4><br>
<hr style="border-color: grey;">

<div class="col-sm-4">
<div class="address" >
	FireShopAps<br>
	Ny Kongensgade 11 <br>
	9670 Løgstør<br>
	+45 7020 6502<br>
	info@fireshop.dk
	<br>
	<br> <br> 
	
</div>

	{{ Form::open(array('route' => 'postKontakt')) }}
		<div class="form-group {{ ($errors->has('firmanavn')) ? 'has-error' : '' }}">
		{{ Form::label('Evt Firmanavn') }}
		{{ Form::text('firmanavn', '', array('class' => 'form-control', 'required' => 'required')) }}
		@if ($errors->has('firmanavn'))
			<strong>
				{{ $errors->first('firmanavn') }}
			</strong>
		@endif
		</div>
		<br>

		<div class="form-group {{ ($errors->has('kontaktperson')) ? 'has-error' : '' }}">
		{{ Form::label('Kontaktperson') }}
		{{ Form::text('kontaktperson', '', array('class' => 'form-control', 'required' => 'required')) }}
		@if ($errors->has('kontaktperson'))
			<strong>
				{{ $errors->first('kontaktperson') }}
			</strong>
		@endif
		</div>
		<br>

		

		<div class="form-group {{ ($errors->has('phone')) ? 'has-error' : '' }}">
		{{ Form::label('Telefon') }}
		{{ Form::text('phone', '', array('class' => 'form-control', 'required' => 'required')) }}
		@if ($errors->has('phone'))
			<strong>
				{{ $errors->first('phone') }}
			</strong>
		@endif
		</div>
		<br>

		
		<div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
		{{ Form::label('Email') }}
		{{ Form::email('email', '', array('class' => 'form-control', 'required'=> 'required')) }}
		@if ($errors->has('email'))
			<strong>
				{{ $errors->first('email') }}
			</strong>
		@endif
		</div>
		<br>

		<div class="form-group {{ ($errors->has('question')) ? 'has-error' : '' }}">
		{{ Form::label('Spørgsmål') }}
		{{ Form::textarea('question', '', array('class' => 'form-control', 'required' => 'required')) }}
		@if ($errors->has('question'))
			<strong>
				{{ $errors->first('question') }}
			</strong>
		@endif
		</div>
		<br>

		
		{{ Form::submit('OK', array('class' => 'btn ')) }}
	
	{{ Form::close() }}

</div>
<div class="col-sm-8">
<div class="map" style="position:relative;">
<img src="/logo/map.jpg" class="img-responsive">
<div class="location" style="position:absolute; top:230px; right:350px; width:10px; height:10px;background:red;"></div>
	
</div>
	
</div>	

@stop