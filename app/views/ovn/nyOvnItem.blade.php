@extends('layout.dashboard')

@section('title')
	Create ny Item
@stop

@section('content')

<h1>Ny Ovn Item i {{ $ovn->name }}</h1>
<br>
 
{{ Form::open(array('route' => 'postCreateOvnItem', 'files' => true)) }}

	{{ Form::hidden('id', $ovn->id ) }}
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

	<div class="form-group {{ ($errors->has('product_det')) ? 'has-error' : '' }}">
	{{ Form::label('Product detejler') }}
	{{ Form::textarea('product_det', '', array('class' => 'form-control', 'required' => 'required')) }}

	@if ($errors->has('product_det'))
			<strong>
				{{ $errors->first('product_det') }}
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