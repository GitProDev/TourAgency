@extends('layout')

@section('content')
	<div class="mt-3 text-center">
		<h2 css="margin: auto;">Tours</h2>
	</div>
	<div class="p-3  rounded">
		<div id="search_tours_container" class="mb-4">
            <form id="search_form" action="/"  method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search_tours" placeholder="Search by description or location" maxlength="255">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </div>
            </form>
            <input type="hidden" name="search_data" >
        </div>
		<table id="tours_table" class="table mb-5">
			<thead>
				<tr>
					<th>Tour Description</th>
					<th>Date</th>
					<th>Location</th>
					<th>Cost</th>
					<th>Image</th>
				</tr>	
			</thead>
			<tbody>
				@foreach ($tours as $tour)
					<tr>
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
					</tr>
				@endforeach
			</tbody>
		</table>
		<div id="pagination" class="text-center">
			{{ $tours->onEachSide(2)->links() }}
		</div>
		<div id="res_not_found" style="display: none;" class="text-center">
            <h5>Tours not found</h5>
        </div>
	</div>
	<script type="text/javascript">
		$( document ).ready(function() {
			$("#search_form").submit(function(e){
		        e.preventDefault();
		        search_data = $("#search_form").serialize();
		        searchTours(search_data);
		    });

		    function searchTours(search_data){
		    	$.ajax({ 
		            type: 'GET', 
		            url: '/search_tours', 
		            dataType: "json",
		            data: search_data, 
		            // beforeSend: function(xhr) {
		            // },
		            success: function (data) {
		            	if($.trim(data.html) !== ''){
		            		$('#tours_table').show().find('tbody').html(data.html);
		                	$('#pagination').show().html(data.pagination_links);
		                	$('#res_not_found').hide();

		                	$('a[rel=prev], a[rel=next]').click(function(e){
								e.preventDefault();
								page = $(this).attr('href').split('=')[1];
								search_tours = $('input[name=search_data]').val();
								pagination_data = 'search_tours=' + search_tours + '&page=' + page;
								searchTours(pagination_data);	    	

						    });
					    	$('input[name=search_data]').val(search_data.split('=')[1]);
		            	}
		            	else{
		            		$('#tours_table').hide().find('tbody').html('');
		            		$('#pagination').hide().html('');
		            		$('#res_not_found').show();
		            	}
		            	
		                //Make ajax-request when pagination links are clicked
		                
		            }
		            // ,error: function (xhr, status) {
		            //     console.log('Some error');
		            // },
		            // complete: function (xhr, status) {
		            // }
		        });
		    }
		});
		
	</script>
@endsection
