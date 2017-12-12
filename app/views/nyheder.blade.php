@extends('layout.home')

@section('title')
	nyheder
@stop

@section('content')

<h4 class="pull-right" style="color:red; font-weight:900; font-style:italic;">NYHEDER</h4><br>
<hr style="border-color: grey;">

 @foreach($nyhed as $nyhed)
 
 <h3>{{ $nyhed->title }}</h3>
 {{ $nyhed->created_at }}
 <p>{{nl2br($nyhed->description) }}</p>
 <hr style="border-color: red;">
 @endforeach
 

@stop