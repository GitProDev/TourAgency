@extends('layout')

@section('content')
	<div class="mt-3 text-center">
		<h2 css="margin: auto;">Contact Us</h2>
	</div>
	<div class="mt-5 mx-auto rounded" style="width: 500px; padding-left: 8%;">
		<img src="{{ asset('storage/images/icons/call.png') }}" alt="" width="" height="45" class="rounded-xl" style="">
		<span class="h5 m-2">(+123) 456-789</span>
		<br><br>
		<img src="{{ asset('storage/images/icons/mail.png') }}" alt="" width="" height="45" class="rounded-xl" style="">
		<span class="h5 m-2">travelagency@dummymail.com</span>
		<br><br>
		<img src="{{ asset('storage/images/icons/location.png') }}" alt="" width="" height="45" class="rounded-xl" style="">
		<span class="h5 m-2">Moldova, Chisinau</span>
	</div>
@endsection