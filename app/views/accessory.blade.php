@extends('layout.home')

@section('title')
	tilbehør
@stop

@section('content')

<h4 class="pull-right" style="color:red; font-weight:900; font-style:italic;">TILBEHØR</h4><br>
<hr style="border-color: grey;">
{{-- <div class="container"> --}}
	<div class="row" >	
		<div class="center-ovn" style="margin:0 auto; min-width:200px; max-width:700px;">
		@foreach ($acc as $acc)
		<div class="col-sm-4" >
		 <a href="/tilbehør/{{ $acc->name }}/listItems"><img src="/accessory/{{ $acc->image }}" style="height:160px; width:100px;">
		 <h5 style="color:red; font-weight:600; padding-left: 20px; ">{{ $acc->name }}</h5></a>
	
	    </div>
	@endforeach
	</div>
</div>
{{-- </div> --}}


 

@stop