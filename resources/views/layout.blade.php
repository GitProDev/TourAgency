<!DOCTYPE html>
<html>
<head>
	<title>Tours</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
	<script type="text/css" src="/app.css"></script>
	<style type="text/css">
		body { font-family: sans-serif; }
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	@if(session()->has('success'))
		<script type="text/javascript">
			$(function(){
				alert('{{ session('success') }}');
			});
		</script>
	@endif
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="d-flex flex-column vh-100">{{-- h-100 --}}
	<header>
		<div class="d-flex bg-dark fixed-top">{{-- flex-row-reverse --}}
			<a class="navbar-brand pull-left d-flex align-items-center" href="/">
				<img src="{{ asset('storage/images/logos/tour_agency_logo_rectangle.png') }}" alt="" width="" height="66" class="rounded-xl" style="margin: 3px; margin-left: 10px; float: left;">
			</a>
			<nav class="navbar navbar-expand-sm navbar-dark " style="margin-left: 57%;">
			  <div class="container-fluid">
			    <ul class="navbar-nav justify-content-end" style="margin-right: 10px;">
			      <li class="nav-item">
			        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">View tours</a>
			      </li>
			      <li class="nav-item">
			        <div class="dropdown">
					  <button type="button" class="btn btn-dark dropdown-toggle" style="color: {{ (request()->is('dashboard/tours') OR request()->is('dashboard/attractions')) ? '' : '#9B9D9E' }}" data-bs-toggle="dropdown">
					    Admin Dashboard
					  </button>
					  <ul class="dropdown-menu">
					    <li><a class="dropdown-item" href="/dashboard/tours">Tour Management</a></li>
					    <li><a class="dropdown-item" href="/dashboard/attractions">Attraction Management</a></li>
					  </ul>
					</div>
			      </li>
			      <li class="nav-item">
			      	<a class="nav-link {{ request()->is('/contactus') ? 'active' : '' }}" href="/contactus">Contact Us</a>
			      </li>
			      <li class="nav-item">
			        @guest
			        	<a class="nav-link" href="/login">Log In</a>
			        @else
			        	<a class="nav-link" href="/logout">Log Out</a>
			        @endguest
			      </li>
			    </ul>
			  </div>
			</nav>
		</div>
	</header>
	<main class="flex-shrink-0">
		<div class="container" style="margin-top: 120px;">
			@yield('content')	
		</div>	
	</main>
	<footer class="mt-auto footer">
		<div class="mt-5 p-3 bg-dark text-white text-center">
		  <span class="text-muted"><b>Tour Agency</b> 2022</span><br/>
		  <span class="text-muted">Developed by Chiril S.</span>
		</div>
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript" src="/app.js"></script>
</body>
</html>