$(document).ready(function(){ 
	$(document).on('click', ".schedul", function(e) {
	     	var url = $('#base_url').val();
     	var day = $('#today').val();
     	var date = $('#date').val();
       	var type=$(this).attr('data-type');
     
       	if (type=="prev") {
       		var mainurl=url+'/prevdate';
       	}
       		else{
       			var mainurl=url+'/nxtdate';
       		}
    	var owner = $('#owner_id').val();
			$.ajax({
				type:'GET',
					url: mainurl,
				data:{
					day:day,
					date:date,
					owner:owner
				},
		success:function(data)
				{
					if (data=="here") {

						$('#id').html("");
					swal({   title: "Alert!", type:"error",  text: "You cannot view Previous Bookings",   timer: 2000,   showConfirmButton: false });
						
					}else{

					$('.ajax-caller').html(data);

						
						$('#id').html("");
						};
				 },
				  beforeSend : function (){
                 $('#id').html("<div class='loading1' ><img src='"+url+"/assets/img/ajax_load.gif'></div>");

          	  },
				error: function(jqXHR, textStatus, errorThrown){ 
				 	// $('.id').html("");
				 	if (jqXHR.responseText) {
				 		//	$('.id').html("");
				 			console.log(errorThrown);
				 								 	alert(jqXHR.responseText);

				 	}
	 		 }
				  });
    });

    	
        });

function myFunction(tel){

   $('.modal').modal('hide');
	swal({   title: "Call Here For Booking!", type:"success",  text: "Phone Number:"+tel,     showConfirmButton: true });
						
}
	     