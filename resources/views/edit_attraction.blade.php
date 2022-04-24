@extends('layout')

@section('content')
	<div class="mt-3 text-center">
		<h2 css="margin: auto;">Edit Attraction </h2>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<form id="edit_attraction_form" action="/dashboard/attraction/{{ $attraction->id }}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('patch')
					  <div class="mb-3 mt-3">
					    <label for="location" class="form-label">Location:</label>
					    <textarea name="location" id="location" class="form-control">{{ old('location', $attraction->location) }}</textarea>
					    @error('location')
		    				<div class="alert alert-danger" style="padding: 3px;">{{ $message }}</div>
		    			@enderror
					  </div>
					  <div class="mb-3 mt-3">
					    <label for="image" class="form-label">Image:</label>
					    <input type="file" name="image">
					    <div style="margin: auto;">
			        	@if (!empty($attraction->image))
			        		{{-- <img src="https://picsum.photos/id/{{ $attraction->id * 5 }}/300/300" alt="" width="60" height="60" class="rounded-xl"> --}}
			        		<img src="{{ asset('storage/' . $attraction->image ) }}" alt="" width="150" height="150" class="rounded-xl img-thumbnail" style="margin-left: 38%" id="attraction_img">
			        	@endif
			    		</div>
					    @error('image')
		    				<div class="alert alert-danger" style="padding: 3px;">{{ $message }}</div>
		    			@enderror
					  </div>
					  <div>
					  	<button id="edit_attraction_btn" type="submit" class="btn btn-primary">Submit</button>
					  	@if (!empty($attraction->image))
					  		<button id="{{ $attraction->id }}" type="button" class="btn btn-primary del_img_btn">Delete Image</button>
					  	@endif
					  </div>
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
@endsection
