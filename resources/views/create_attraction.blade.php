@extends('layout')

@section('content')
	<div class="mt-3 text-center">
		<h2 css="margin: auto;">Create Attraction</h2>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-1 col-md-2 col-lg-3 col-xxl-4"></div>
			<div class="col-12 col-md-8 col-lg-6 col-xxl-4">
				<form action="/dashboard/attraction" method="POST" enctype="multipart/form-data">
					@csrf
					  <div class="mb-3 mt-3">
					    <label for="location" class="form-label">Location:</label>
					    <input name="location" id="location" class="form-control" value="{{ old('location') }}">
					    @error('location')
		    				<div class="alert alert-danger" style="padding: 3px;">{{ $message }}</div>
		    			@enderror
					  </div>
					  <div class="mb-3 mt-3">
					    <label for="image" class="form-label">Image:</label>
					    <input type="file" name="image">
					    @error('image')
		    				<div class="alert alert-danger" style="padding: 3px;">{{ $message }}</div>
		    			@enderror
					  </div>
					  <div>
					  	<button type="submit" class="btn btn-primary">Submit</button>
					  </div>
				</form>
			</div>
			<div class="col-1 col-md-2 col-lg-3 col-xxl-4"></div>
		</div>
	</div>
@endsection