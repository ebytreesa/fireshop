@extends('layout.dashboard')

@section('title')
	list Kontakt
@stop
@section('content')
	<h1>Kontakter</h1>
	<table class="table">
		<tr>
			<th>#</th>
			<th>Firmanavn</th>
			<th>KontaktPerson</th>
		
			<th>Telefone</th>
			<th>Email</th>
			<th>Spørsmål</th>
			<th>RET</th>
			
			
		</tr>
		@foreach($kontakt AS $kontakt)
			<tr>
				<td><p>{{ $kontakt->id }}</p></td>
				<td><p>{{ $kontakt->firmanavn }}</p></td>
				<td><p>{{ $kontakt->kontaktperson }}</p></td>
				
				<td><p>{{ $kontakt->phone }}</p></td>
				<td><p>{{ $kontakt->email }}</p></td>
				<td><p>{{ nl2br($kontakt->question) }}</p></td>
				<td><a href="/admin/editKontakt/{{ $kontakt->id  }}" class="btn btn-primary btn-xs">RET</a></td>
				
			</tr>
		@endforeach
	</table>
	
@stop