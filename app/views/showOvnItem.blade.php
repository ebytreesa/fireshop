@extends('layout.home')

@section('title')
	OvnItems
@stop

@section('content')

<h4 class="pull-right" style="color:red; font-weight:900; font-style:italic;">{{$ovn->name}}</h4><br>
<hr style="border-color: grey;">

<div class="row" style="margin-top:30px;">

	<div class="col-sm-3">
		<div class="imgBox">
		<a href="#"  data-toggle ="modal" data-target = "#bigImg{{ $item->id }}"><img  class="img-responsive" 
		src="/ovn/{{ $item->image }}"  class="img-responsive" style="height:150px; width:150px;">
		<p>klik her for at se stor billede</p>
		</a>
		</div>

		<div class="modal fade" id="bigImg{{ $item->id }}"  role="dialog" >
			<div class="modal-dialog" style="display:table;">			
				<div class="modal-content">					
					<div class="modal-body">
						<img class="img-responsive" src="/ovn/{{ $item->image }}"><br>
							
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss ="modal">Close</button>		
					</div>								
				</div>
			</div>
		</div>	
	</div>
	
	<div class="col-sm-8">
		<div class="textBox">
		<h4 style="color:red; font-weight:500; font-style:italic;">{{$ovn->name}} {{ $item->name }}</h4>
		<p>{{ nl2br($item->description) }}</p>
		<p>Pris: {{ $item->pris }},-</p>
		</div>
		<br>
		<div>
			<h4>Product details</h4>
			<p>{{ nl2br($item->product_details) }}</p>
		</div>
	</div>

	
</div>



@stop