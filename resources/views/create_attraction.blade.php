@extends('layout')

@section('content')
	<div class="mt-3 text-center">
		<h2 css="margin: auto;">Create Tour </h2>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<form action="/dashboard/attraction" method="POST" enctype="multipart/form-data">
					@csrf
					  <div class="mb-3 mt-3">
					    <label for="location" class="form-label">Location:</label>
					    {{-- <textarea name="location" id="location" class="form-control">{{ old('location') }}</textarea> --}}
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
			<div class="col-sm-4"></div>
		</div>
	</div>
@endsection