@extends('layout.home')

@section('title')
	home
@stop

@section('content')

<h4>Velkommen til Fire Shop Aps</h4>
<hr style="border:1px solid grey;">
 <img src="/img/{{ $forside->image }}" class="img-responsive" id="textWrap">
	<p>{{ nl2br($forside->description) }}</p>

@stop