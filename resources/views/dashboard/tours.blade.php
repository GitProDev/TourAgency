@extends('layout')

@section('content')
	<div class="mt-3 text-center">
		<h2 css="margin: auto;">Tour Management</h2>
	</div>
	<div class="ml-3">
		<ul class="nav">
		  <li class="nav-item">
		    <a href="/dashboard/tour/create" class="nav-link">Create Tour</a>
		  </li>
		</ul>
	</div>
	<div class="p-3  rounded">
		<table class="table table-bordered mb-5">
			<thead>
				<tr>
					<th>Tour Description</th>
					<th>Date</th>
					<th>Location</th>
					<th>Cost</th>
					<th>Image</th>
					<th></th>
				</tr>	
			</thead>
			<tbody>
				@foreach ($tours as $tour)
					<tr id="tr_{{ $tour->id }}">
						<td class="w-50">{{ $tour->description }}</td>
						<td>{{ date("Y-M-d", strtotime($tour->date)) }}</td>
						<td>{{ $tour->attraction->location }}</td>
						<td>{{ $tour->cost }}&euro;</td>
						<td>
							<div class="flex-shrink-0">
					        	@if (!empty($tour->attraction->image))
					        		<img src="{{ asset('storage/' . $tour->attraction->image ) }}" alt="" width="120" height="120" class="rounded-xl">
					        	@endif
					    	</div>
					    </td>
					    <td>
					    	<a href="/dashboard/tour/{{ $tour->id }}/edit" class="btn btn-link">Edit</a>
  							<button type="button" class="btn btn-link delete_tour" id="{{ $tour->id }}">Delete</button>
  						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{{ $tours->links() }}
		</div>
	</div>
@endsection