@extends('layout.home')

@section('title')
	Tilbehør Items
@stop

@section('content')

<h4 class="pull-right" style="color:red; font-weight:900; font-style:italic;">{{$acc->name}}</h4><br>
<hr style="border-color: grey;">
 @foreach($item as $item)
<div class="row" style="margin-top:30px;">

	<div class="col-sm-3">
		<div class="imgBox">
		<a href="#"  data-toggle ="modal" data-target = "#bigImg{{ $item->id }}"><img src="/accessory/{{ $item->image }}"  class="img-responsive" style="height:150px; width:150px;"></a><br>
		</div>
	</div>

	<div class="modal fade" id="bigImg{{ $item->id }}"  role="dialog" >
			<div class="modal-dialog" style="display:table;">			
				<div class="modal-content">					
					<div class="modal-body">
						<img class="img-responsive" src="/accessory/{{ $item->image }}"><br>
							
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss ="modal">Close</button>		
					</div>								
				</div>
			</div>
		</div>	
	
	<div class="col-sm-8">
		<div class="textBox">
		<h4 style="color:red; font-weight:500; font-style:italic;"> {{ $item->name }}</h4>
		<p>{{ nl2br($item->description) }}</p>
		<p>Pris: {{ $item->pris }},-</p>
		</div>
	</div>
	
</div>
@endforeach	


@stop