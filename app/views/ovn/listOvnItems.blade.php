@extends('layout.dashboard')

@section('title')
	listOvnItems
@stop

@section('content')

<h1>{{ $ovn->name }}              </h1>

<table class="table">
	<tr>
		<th>#</th>
		<th>Navn</th>
		<th>image</th>
		<th>pris</th>
		<th>Description</th>
		<th>product details</th>
		<th>Ret</th>
		<th>Slet</th>
		
	</tr>
	 @foreach($item as $item)
		<tr>
			<td>{{ $item->id }}</td>
			<td>{{ $item->name }}</td>
			<td><img src="/ovn/{{ $item->image }}" style="height:50px; width:50px;"><br>
			<td>{{ $item->pris }}</td>
			<td>{{ nl2br($item->description) }}</td>
			<td>{{ nl2br($item->product_details) }}</td>
			
			<td><a href="/admin/{{ $ovn->name }}/editOvnItem/{{ $item->id }}" class="btn btn-primary btn-xs">RET</a></td>
			<td><a href="/admin/{{ $ovn->name }}/deleteOvnItem/{{ $item->id }}" class="btn btn-danger btn-xs">SLET</a></td>
			
		</tr>
	@endforeach
 
</table>
<a href="/admin/{{ $ovn->name }}/createNyOvnItem" class="btn btn-primary">Opret Ny</a>

@stop