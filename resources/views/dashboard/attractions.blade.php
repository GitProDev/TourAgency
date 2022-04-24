@extends('layout')

@section('content')
	<div class="mt-3 text-center">
		<h2 css="margin: auto;">Attraction Management</h2>
	</div>
	<div class="ml-3">
		<ul class="nav">
		  <li class="nav-item">
		    <a href="/dashboard/attraction/create" class="nav-link">Create Attraction</a>
		  </li>
		</ul>
	</div>
	<div class="p-3  rounded">
		<div class="row">
		  <div class="col-md-4"></div>
		  <div class="col-md-4">
		  	<table class="table table-bordered mb-5">
				<thead>
					<tr>
						<th>Location</th>
						<th>Image</th>
						<th></th>
					</tr>	
				</thead>
				<tbody>
					@foreach ($attractions as $attraction)
						<tr id="tr_{{ $attraction->id }}">
							<td class="">{{ $attraction->location }}</td>
							<td>
								<div>
						        	@if (!empty($attraction->image))
						        		<img src="{{ asset('storage/' . $attraction->image ) }}" alt="" width="60" height="60" class="rounded-xl">
						        	@endif
						    	</div>
						    </td>
						    <td>
						    	<a href="/dashboard/attraction/{{ $attraction->id }}/edit" class="btn btn-link">Edit</a>
	  							<button type="button" class="btn btn-link delete_attraction" id="{{ $attraction->id }}">Delete</button>
	  						</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{{ $attractions->onEachSide(2)->links() }}
			</div>
		  </div>
		  <div class="col-md-4"></div>
		</div>
	</div>
@endsection