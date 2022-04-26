@extends('layout')

@section('content')
	{{-- <style type="text/css">
		
		@media only screen and (max-width:992px) {
		  table {
		  	background-color: orange;
		  }
		}
		@media only screen and (max-width:768px) {
		  table {
		  	background-color: red;
		  }
		}
				
	</style> --}}
	<div class="mt-3 text-center">
		<h2 css="margin: auto;">Attraction Management</h2>
	</div>
	<div class="ml-3">
		<ul class="nav">
		  <li class="nav-item">
		    <a href="/dashboard/attraction/create" class="nav-link"><button type="button" class="btn btn-outline-primary">Create Attraction</button></a>
		  </li>
		</ul>
	</div>
	<div class="p-3  rounded">
		<div class="row">
		  <div class="col-md-2 col-xl-3 col-xxl-4"></div>{{-- col-md-3 col-xl-4 --}}
		  <div class="col-12 col-md-8 col-xl-6 col-xxl-4" >{{-- col-md-6 col-xl-4 --}}
		  	<table class="table mb-5 text-center">
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
							<td class="align-middle">{{ $attraction->location }}</td>
							<td class="align-middle">
								<div>
						        	@if (!empty($attraction->image))
						        		<img src="{{ asset('storage/' . $attraction->image ) }}" alt="" width="70" style="height: 70px; background-color: #D3B04D" class="rounded-xl img-thumbnail">
						        	@else
						        		<img src="{{ asset('storage/images/special/no_image.png' ) }}" alt="" width="70" style="height: 70px;" class="rounded-xl img-thumbnail">
						        	@endif
						    	</div>
						    </td>
						    <td class="align-middle">
						    	<a href="/dashboard/attraction/{{ $attraction->id }}/edit" class="btn btn-link"><button type="button" class="btn btn-outline-secondary">Edit</button></a>
	  							<button type="button" class="btn btn-outline-secondary delete_attraction" id="{{ $attraction->id }}">Delete</button>
	  						</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{{ $attractions->onEachSide(2)->links() }}
			</div>
		  </div>
		  <div class="col-md-2 col-xl-3 col-xxl-4"></div>{{-- col-md-3 col-xl-4 --}}
		</div>
	</div>
@endsection