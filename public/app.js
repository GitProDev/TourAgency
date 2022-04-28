$(function(){
    $('#datepicker').datepicker({
  		format: 'yyyy/mm/dd'
    });
    $('.datepicker').datepicker({
  		format: 'yyyy/mm/dd'
    });

    $(document).ajaxError(
        function(e, x, settings, exception) {
            var message;
            var statusErrorMap = {
                '400' : "Server understood the request, but request content was invalid.",
                '401' : "Unauthorized access.",
                '403' : "Forbidden resource can't be accessed.",
                '500' : "Internal server error.",
                '503' : "Service unavailable."
            };
            if (x.status) {
                message =statusErrorMap[x.status];
                                if(!message){
                                      message="Unknown Error \n.";
                                  }
            }else if(exception=='parsererror'){
                message="Error.\nParsing JSON Request failed.";
            }else if(exception=='timeout'){
                message="Request Time out.";
            }else if(exception=='abort'){
                message="Request was aborted by the server";
            }else {
                message="Unknown Error \n.";
            }
            console.log('!ErrorMessage!: ' + message);
        }
    );

    $.ajaxSetup({
	    headers: {
	       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	// $.ajaxSetup({
	//     headers: {
	//        'Access-Control-Allow-Origin': ''
	//     }
	// });

    $(".delete_attraction").click(function(){
    	var id = $(this).attr('id');

	    $.ajax({ 
	        type: 'POST', 
	        url: '/dashboard/attraction/' + id, //http://localhost:8000
	        dataType: "json",
	        data: { _method: 'DELETE' }, 
	        success: function (data) { 
	        	if(data.success == 'true')
	            	$('#tr_' + id).remove();
	            else
	            	alert(data.message);

	        }
	    });
	});

	$(".delete_tour").click(function(){
	    var id = $(this).attr('id');

	    $.ajax({ 
	        type: 'POST', 
	        url: '/dashboard/tour/' + id,  //http://localhost:8000
	        dataType: "json",
	        data: { _method: 'DELETE' }, 
	        success: function (data) { 
	        	if(data.success == 'true')
	            	$('#tr_' + id).remove();
	            else
	            	alert('Something went wrong!');

	        }
	    });
	});

	$(".del_img_btn").click(function(){
	    var id = $(this).attr('id');

	    $.ajax({ 
	        type: 'POST', 
	        url: '/dashboard/attraction/' + id + '/image', 
	        dataType: "json",
	        data: { _method: 'DELETE' }, 
	        success: function (data) { 
	        	//console.log(data);
	        	if(data.success == 'true'){
	            	$('#attraction_img').remove();
	            	$('.del_img_btn').remove();
	        	}
	            else
	            	alert('Something went wrong!');

	        }
	    });
	});

	// $("#edit_attraction_form").submit(function(event){
	// 	event.preventDefault();

	// 	var id = $('.del_img_btn').attr('id');
	// 	console.log($('#edit_attraction_form').serialize());    edit_attraction_form
	// 	console.log(new FormData(this));
	// 	$.ajax({ 
	//         type: 'POST', 
	//         url: 'http://localhost:8000/dashboard/attraction/' + id + '/image', 
	//         dataType: "json",
	//         data: new FormData(this), 
	//         success: function (data) { 
	//         	if(data.success == 'true'){
	//             	alert('success!');
	//         	}
	//             else
	//             	alert('Something went wrong!');

	//         }
	//     });
	// });

});
    
    
