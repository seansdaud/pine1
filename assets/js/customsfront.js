$(document).ready(function(){ 
	$(document).on('click', ".schedul", function(e) {
	     	var url = $('#base_url').val();
     	var day = $('#today').val();
     	var date = $('#date').val();
       	var type=$(this).attr('data-type');
       	if (type=="") {
       		
       	}
       		else{

       		}
    	var owner = $('#owner_id').val();
			$.ajax({
				type:'GET',
					url: url+'/prevdate',
				data:{
					day:day,
					date:date,
					owner:owner
				},
		success:function(data)
				{
					if (date=="not") {
						return false;
					};

					$('.ajax-caller').html(data);
							   $('.id').html("");
				 },
				  beforeSend : function (){
                 $('.id').html("<div class='loading1'><img src='"+url+"/assets/img/ajax_load.gif'></div>");

          	  },
				error: function(jqXHR, textStatus, errorThrown){ 
				 	 $('.id').html("");
				 	if (jqXHR.responseText) {
				 			$('.id').html("");
				 			console.log(errorThrown);
				 								 	alert(jqXHR.responseText);

				 	}
	 		 }
				  });
    });
    	var url = $('#base_url').val();

                 $('.id').html("<div class='loading1'><img src='"+url+"/assets/img/ajax_load.gif'></div>");

        });