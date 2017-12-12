@extends('layout.home')

@section('title')
	home
@stop

@section('content')
<h3>Søgresultater  </h3>

@foreach ($results as $result)


<div class="row" style="margin-top:30px;">
<div class="col-sm-3">
		<div class="imgBox">
		<a href="/ovne/{{Ovn::where('id',$result->ovn_id)->first()->name }}/listItems/{{ $result->id }}"><img src="/ovn/{{ $result->image }}"  class="img-responsive" style="height:150px; width:150px;"></a><br>
		</div>
	</div>
	<div class="col-sm-8">
	<div class="textBox">
		<h4 style="color:red; font-weight:500; font-style:italic;">{{Ovn::where('id',$result->ovn_id)->first()->name }} {{$result->name}} </h4>
		<p>{{ nl2br($result->description) }}</p>
		<p>Pris: {{ $result->pris }},-</p>
	</div>
	</div>

<hr>
</div>
@endforeach


@stop