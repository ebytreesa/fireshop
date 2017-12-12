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
 

	
</style>


<body>
 <div class="container">
	<header>
		<div class="container" >
			<div class="row " style="border-color:gray;">
								
				{{-- <img src="{{ url('/logo/image1.jpg') }}" class="headerImg"> --}}
				
				
				<h3 style="text-align:center;"> DASHBOARD</h3>

								

				{{-- <div class="logo" >
					<div class="container">
						<img src="{{ url('/logo/logo.jpg') }}" style="height: 100px; width: 100px;" >
					</div>
				</div> --}}
				
				
			</div>
		</div>
		
		<div class="container">	
			<div class="row">				
				<nav class="navbar navbar-default" >
					<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapse" data-toggle="collapse" data-target="#navbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div id="navbar" class="collapse navbar-collapse">
						<ul class="nav navbar-nav" ">		
							
							<li><a href="/admin/editForside">FORSIDE</a></li>
							<li><a href="/admin/listOvne">BRÆNDEOVNE</a></li>
							<li><a href="/admin/listTilbehør">TILBEHØR</a></li>
							<li><a href="/admin/listTilbud">TILBUD</a></li>	
							<li><a href="/admin/listKontakt">KONTAKT</a></li>
							<li><a href="/admin/listNyheder">NYHEDER LIST</a></li>
							<li><a href="/admin/logout">LOGOUT</a></li>					

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
				<div class="col-sm-10" >				

					@yield('content')
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


