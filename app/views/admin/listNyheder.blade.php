@extends('layout.dashboard')

@section('title')
	nyheder
@stop

@section('content')

<h4 class="pull-right" style="color:red; font-weight:900; font-style:italic;">NYHEDER</h4><br>
<hr style="border-color: grey;">
<a href="/admin/createNyhed" class="btn btn-primary">opret nyhed</a>
<hr>
 @foreach($nyheder as $nyhed)
 
 <h3>{{ $nyhed->title }}</h3>
 {{ $nyhed->created_at }}
 <p>{{ nl2br($nyhed->description) }}</p>
<a href="/admin/editNyhed/{{ $nyhed->id  }}" class="btn btn-primary btn-xs">RET</a>
<a href="/admin/deleteNyhed/{{ $nyhed->id  }}" class="btn btn-danger btn-xs">SLET</a>
<hr>
 @endforeach
 

@stop