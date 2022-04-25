@extends('layout')

@section('content')
	<div class="mt-3 text-center">
		<h2 css="margin: auto;">Tour Management</h2>
	</div>
	<div class="ml-3">
		<ul class="nav">
		  <li class="nav-item">
		    <a href="/dashboard/tour/create" class="nav-link"><button type="button" class="btn btn-outline-primary">Create Tour</button></a>
		  </li>
		</ul>
	</div>
	<div class="p-3 rounded table-responsive-lg">
		<table class="table mb-5 text-center" style="min-width: 700px;">
			<thead>
				<tr>
					<th>Tour Description</th>
					<th>Date</th>
					<th>Location</th>
					<th>Cost</th>
					<th style="min-width: 136px;">Image</th>
					<th></th>
				</tr>	
			</thead>
			<tbody>
				@foreach ($tours as $tour)
					<tr id="tr_{{ $tour->id }}">
						<td class="w-50 align-middle" style="text-align: left;">{{ $tour->description }}</td>
						<td class="align-middle">{{ date("Y-M-d", strtotime($tour->date)) }}</td>
						<td class="align-middle">{{ $tour->attraction->location }}</td>
						<td class="align-middle">{{ $tour->cost }}&euro;</td>
						<td class="align-middle">
							<div class="flex-shrink-0">
					        	@if (!empty($tour->attraction->image))
					        		<img src="{{ asset('storage/' . $tour->attraction->image ) }}" alt="" width="120" style="height: 120px; background-color: #D3B04D" class="rounded-xl img-thumbnail">
					        	@else
					        		<img src="{{ asset('storage/images/special/no_image.png' ) }}" alt="" width="120" style="height: 120px;"  class="rounded-xl img-thumbnail">
					        	@endif
					    	</div>
					    </td>
					    <td class="align-middle">
					    	<a href="/dashboard/tour/{{ $tour->id }}/edit" class="btn btn-link"><button type="button" class="btn btn-outline-secondary">Edit</button></a>
  							<button type="button" class="btn btn-outline-secondary delete_tour" id="{{ $tour->id }}">Delete</button>
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