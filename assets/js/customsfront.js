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
							if (navigator.geolocation) {
               navigator.geolocation.getCurrentPosition(showPosition1);
    }
    else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
    }

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


    function showPosition1(position) {
      var base_url= $('#base_url').val();
        //  x.innerHTML = "Latitude: " + position.coords.latitude + 
        // "<br>Longitude: " + position.coords.longitude;  

    	var owner = $('#owner_id').val();
    	   if (owner==null) {
        	return false;
        };
        $.ajax({
            type: "GET",
            url: base_url+'/getCurrentnow',
            data: {
              lat:position.coords.latitude,
              lng:position.coords.longitude,
              radius:200,
				owner:owner

            },
            success:function(data){ 
                if (data=="noResult") {
                	alert("nope");
                }else{
                //	alert(data);
                $('.distance-ajax').html("<div  class='schedule' style='margin-left: 15%;'>Distance From Here:"+data["result"][0]['distances'].toFixed(2)+"miles</div>");
             // x.innerHTML = "data: "+ data;
              // console.log(position.coords.latitude);
              // console.log(position.coords.longitude);
                 //console.log(data['result']);
                };
           
            },
            beforeSend : function (){
                 $('.distance-ajax').html("<div><img style='width: 7%;margin-left: 41%;' src='"+base_url+"/assets/img/ajax_load.gif'></div>");

            },
            error: function(jqXHR, textStatus, errorThrown){ 
              alert( jqXHR.responseText);
               console.log(jqXHR.responseText);
            }
        });
    }
       if (navigator.geolocation) {
               navigator.geolocation.getCurrentPosition(showPosition1);
    }
    else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
    }
