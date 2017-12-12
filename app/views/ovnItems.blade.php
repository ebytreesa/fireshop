@extends('layout.home')

@section('title')
	OvnItems
@stop

@section('content')

<h4 class="pull-right" style="color:red; font-weight:900; font-style:italic;">{{$ovn->name}}</h4><br>
<hr style="border-color: grey;">
 @foreach($item as $item)
<div class="row" style="margin-top:30px;">

	<div class="col-sm-3">
		<div class="imgBox">
		<a href="/ovne/{{$ovn->name}}/listItems/{{ $item->id }}"><img src="/ovn/{{ $item->image }}"  class="img-responsive" style="height:150px; width:150px;"></a><br>
		</div>
	</div>
	
	<div class="col-sm-8">
		<div class="textBox">
		<a href="/ovne/{{$ovn->name}}/listItems/{{ $item->id }}"><h4 style="color:red; font-weight:500; font-style:italic;">{{$ovn->name}} {{ $item->name }}</h4></a>
		<p>{{ nl2br($item->description) }}</p>
		<p>Pris: {{ $item->pris }},-</p>
		</div>
	</div>
	
</div>
@endforeach	


@stop