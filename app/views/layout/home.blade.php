<!doctype html>
<html lang="da">
<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
 

</head>
<style type="text/css">

body *
{
	padding: 0;
	/*margin:0;*/
}
.headerImg
{ height:100px;
	width: 100%;
}


.searchBox
{
	position: absolute;
	top: 20px;
	z-index: 1;

}


#textWrap
{
	float: right;
	margin: 10px;
	height: 400px;
	width: 400px;
}
.no-padding
{
	padding:0;
	margin: 0;
}
.bg-img
{	height:100px;

	background-image: url('/logo/image1.jpg');
	background-size: cover;
}
 

	
</style>


<body>
 <div class="container">
	<header>
		<div class="container" >
			<div class="row no-gutter" >
				<div class="col-sm-10 no-padding" >				
				{{-- <img src="{{ url('/logo/image1.jpg') }}" class="img-responsive headerImg"> --}}
				<div class="bg-img"></div>
				
				<div class="searchBox" >
					<div class="container">
							{{ Form::open(array('route' => 'postSearch')) }}
							{{ Form::text('search') }}
							<button>Search</button>
							{{ Form::close() }}
							<a href="/advSearch"><p style="color:blue;">Advanceret søg</p></a>
					</div>
				</div>
				</div>

				<div class="col-sm-2 no-padding" >				

				<div class="logo" >
					<div class="container">
						<img src="{{ url('/logo/logo.jpg') }}" style="height: 100px; width: 100px;" >
					</div>
				</div>
				</div>
				
			</div>
		</div>
		
		<div class="container">	
			<div class="row">				
				<nav class="navbar navbar-default" >
					<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div id="navbar" class="collapse navbar-collapse">
						<ul class="nav navbar-nav" style="display:flex;">		
							
							<li><a href="/">FORSIDE</a></li>
							<li><a href={{ URL::to('/ovne') }}>BRÆNDEOVNE</a></li>
							<li><a href="/tilbehør">TILBEHØR</a></li>
							<li><a href="/kontakt">KONTAKT</a></li>
							<li><a href={{ URL::to('/nyheder') }}>NYHEDER</a></li>				

						</ul>
					</div>
					</div>
				</nav>					
			</div>
		</div>
	</header>

	<section>
		<div class="container">
			@if ( Session::has('success'))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				{{ Session::get('success') }}
			</div>
		@endif
		@if ( Session::has('error'))
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				{{ Session::get('error') }}
			</div>
		@endif
			<div class="row" >
				<div class="col-sm-10" style="border-right:1px solid black;">				

					@yield('content')
				</div>
				
				<div class="col-sm-2" >
					<h2>Tilbud</h2><br><br>
					
					
					<?php $tilbud = Tilbud::get();?>
						@foreach($tilbud as $tilbud)
						<div class="row" style="margin-bottom:30px;">
						<div class="col-sm-5" >		
			                <p><img src="/ovn/{{ OvnItem::where('id', $tilbud->item_id)->first()->image }}" style="height:100px; width:90px;"></p>
			         </div>
			          <div class="col-sm-7">
			           <?php $ovnId = OvnItem::where('id', $tilbud->item_id)->first()->ovn_id; 
			           		
			           ?>
			                <p><strong>{{ Ovn::where('id', $ovnId)->first()->name }} {{ OvnItem::where('id', $tilbud->item_id)->first()->name }}</strong></p>
							<p style="text-decoration:line-through;">Kr. {{ OvnItem::where('id', $tilbud->item_id)->first()->pris }},-</p>
							<p>Kr. {{ $tilbud->nypris }},-</p>
					 </div></div>
						@endforeach
					
				</div>
				
			</div>
		</div>
	</section>

	<footer>
		<div class="container"><hr>
		 <p style="text-align:center;">FireShop Aps - Ny Kongensgade 11 - 9670 Løgstør - +45 7020 6502 - info@fireshop.dk</p>
			
		</div>
	</footer>
 </div>
	

		
	
</body>
</html>


