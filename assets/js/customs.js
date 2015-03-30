$(document).ready(function() {
	$("#checked").hide();

$('input[name=start_time]').timepicker();
$('input[name=end_time]').timepicker();
$(document).on('keyup', '.copy', function (){
            var the=$(this).val();
 					if($("#checker").prop('checked')){
 						$(".copy").each(function(){
 							$(".copy").val(the);
	 						});
 					}
					});
$('input[name=create]').click(function(){
	
		var diff;
		var start= $('input[name=start_time]').val();
		var end= $('input[name=end_time]').val();
function timeDiff( first, second ) {
    var f = first.split(':'), s = second.split(':');
    if( first == '12:00am' ) f[0] = '0';
    if( first == '12:00pm' ) f[1] = 'am';
    if( second == '12:00am' ) s[0] = '24';
    if( second == '12:00pm' ) s[1] = 'am';
    f[0] = parseInt( f[0], 10 ) + (f[1] == '00pm' ? 12 : 0);
    s[0] = parseInt( s[0], 10 ) + (s[1] == '00pm' ? 12 : 0);

    return s[0] - f[0];
}
function newstart(first){
	var f = first.split(':');
  
   	 if( first == '11:00pm' ) f[1] = '00am';
     if( first == '11:00am' ) f[1] = '00pm';
      if( first == '12:00pm' ) {
      	f[0] = '01';
      }
      else if( first == '12:00am' ) {
      	f[0] = '01';
      }
      else{
      	  f[0] = parseInt( f[0], 10 ) + 1;
      }

 
    return f[0]+":"+f[1];
}

	diff=timeDiff( start,end );
	$("#time").append("<input type='hidden' name='diff' value='"+diff+"'>");	
	start_time1=start;
	var array = [];
	for (var i = 0; i< diff; i++) {
		 array.push(i);
	};

	$("#result").html("<table id='mytable' class='table table-striped table-hover newtable' name='futsal-table' border=1 width=100% >"+
		"<tbody id='my'>"+
														"<tr class='info'>"+
															"<td name='time'>Time</td>"+
															"<td name='sunday'><span>Sunday</span></td>"+
															"<td name='monday'><span>Monday</span></td>"+
															"<td name='tuesday'><span>Tuesday</span></td>"+
															"<td name='wednesday'><span>Wednesday</span></td>"+
															"<td name='thrusday'><span>Thrusday</span></td>"+
															"<td name='friday'><span>Friday</span></td>"+
															"<td name='saturday'><span>Saturday</span></td>"+
														"</tr>"+"</tbody>");
													jQuery("#result tbody").append(function(){
														 var $container = $('<div></div>');
														    $.each(array, function(val) {
														        $container.append($("<tr/>").append(
														        	  $("<td/>").html("<span>"+start_time1+"--"+newstart(start_time1)+"</span>"),
														        	  $("<td/>").html("<span><input class='form-control copy' type='number' step='any' name='1"+val+"' ></span>"), 
														        	  $("<td/>").html("<span><input class='form-control copy'  type='number' step='any'name='2"+val+"' ></span>"), 
														        	  $("<td/>").html("<span><input class='form-control copy' type='number' step='any' name='3"+val+"' ></span>"), 
														        	  $("<td/>").html("<span><input class='form-control copy' type='number' step='any' name='4"+val+"' ></span>"),
														        	  $("<td/>").html("<span><input class='form-control copy' type='number' step='any' name='5"+val+"' ></span>"),
														        	  $("<td/>").html("<span><input class='form-control copy' type='number' step='any' name='6"+val+"' ></span>"),
														        	  $("<td/>").html("<span><input class='form-control copy' type='number' step='any' name='7"+val+"' ></span>")
														        	
														        ));
														      
																$("#time").append("<input type='hidden' name='start_time"+val+"' value='"+start_time1+"'>");											
														         start_time1=newstart(start_time1);
														         $("#time").append("<input type='hidden' name='end_time"+val+"' value='"+start_time1+"'>");	
														    });

														   return $container.html();
														});
$("#submit").html("<input type='submit' class='btn btn-primary submitsch' value='update'>");
$("#checked").show();
});	


});

// // $("#submit").html("<input type='button' onclick='submit_ajax()' value='update'>");
//  function get_ajax(){
//  	var base_url= $('#base_url').val();
// 	$.ajax({
//      		type: "GET",
//           	url: base_url+'admin/get_schedular',
//           	dataType: 'json',
//           	  success:function(data){ 
//           	  	console.log(data);
// 				var start= data[0].start_time;
// 				function newstart(first){
// 				var f = first.split(':');
				  
// 				   	 if( first == '11:00pm' ) f[1] = '00am';
// 				     if( first == '11:00am' ) f[1] = '00pm';
// 				      if( first == '12:00pm' ) {
// 				      	f[0] = '01';
// 				      }
// 				      else if( first == '12:00am' ) {
// 				      	f[0] = '01';
// 				      }
// 				      else{
// 				      	  f[0] = parseInt( f[0], 10 ) + 1;
// 				      }

				 
// 				    return f[0]+":"+f[1];
// 				}

// 					diff=data[0].time_diff;
// 					$("#time").append("<input type='hidden' name='diff' value='"+diff+"'>");	
// 					start_time1=start;
// 					var array = [];
// 					for (var i = 0; i< diff; i++) {
// 						 array.push(i);
// 					};
// 					var array1 = [];
// 					for (var i = 1; i< 8; i++) {
// 						 array1.push(i);
// 					};
// 	$("#result").html("<table id='mytable' name='futsal-table' border=1 width=100% >"+
// 		"<tbody id='my'>"+
// 														"<tr>"+
// 															"<td name='time'>Time</td>"+
// 															"<td name='sunday'><span>Sunday</span></td>"+
// 															"<td name='monday'><span>Monday</span></td>"+
// 															"<td name='tuesday'><span>Tuesday</span></td>"+
// 															"<td name='wednesday'><span>Wednesday</span></td>"+
// 															"<td name='thrusday'><span>Thrusday</span></td>"+
// 															"<td name='friday'><span>Friday</span></td>"+
// 															"<td name='saturday'><span>Saturday</span></td>"+
// 														"</tr>"+"</tbody>");
// 													jQuery("#result tbody").append(function(){
// 														 var $container = $('<div></div>');
// 														    $.each(array, function(val) {
// 														        $container.append($("<tr/>").append(
// 														        	 $("<td/>").html("<span>"+start_time1+"--"+newstart(start_time1)+"</span>"),
// 														        	  $("<td/>").html("<span><input type='text' name='1"+val+"' value='"+data[val].price+"' ></span>"), 
// 														        	  $("<td/>").html("<span><input type='text' name='2"+val+"' value='"+data[val].price+"' ></span>"), 
// 														        	  $("<td/>").html("<span><input type='text' name='3"+val+"' value='"+data[val].price+"' ></span>"), 
// 														        	  $("<td/>").html("<span><input type='text' name='4"+val+"' value='"+data[val].price+"' ></span>"),
// 														        	   $("<td/>").html("<span><input type='text' name='5"+val+"' value='"+data[val].price+"' ></span>"),
// 														        	    $("<td/>").html("<span><input type='text' name='6"+val+"' value='"+data[val].price+"' ></span>"),
// 														        	     $("<td/>").html("<span><input type='text' name='7"+val+"' value='"+data[val].price+"' ></span>")
														        	
// 														        ));
// 														      	$("#id").append("<input type='hidden' name='id"+val+"' value='"+data[val].id+"'>");
// 																$("#time").append("<input type='hidden' name='start_time"+val+"' value='"+start_time1+"'>");											
// 														         start_time1=newstart(start_time1);
// 														         $("#time").append("<input type='hidden' name='end_time"+val+"' value='"+start_time1+"'>");	
// 														    });

// 														   return $container.html();
// 														});
// $("#submit").html("<input type='button' onclick='update_ajax()'  value='update'>");


               
//             },
//             error: function(jqXHR, textStatus, errorThrown){ 
//       alert( jqXHR.responseText);
               
//           }
//        });
// }

//  if($("#show").length > 0){
//     $(document).ready(function(){
//     	get_ajax();
//     });
// }

function update_ajax(){

	
		var base_url= $('#base_url').val();
		var form_data = $("#myform1").serialize();
		$.ajax({
     		type: "POST",
          	url: base_url+'/postupdatePrice',
          	data: form_data,
          	dataType: 'json',
          	  success:function(data){ 
          	  	 $('#id').html("");

          	  	if (data==1) {
          	  		$('#message').html("Updated Successfully");
          	  		 $('#message').addClass("alert alert-danger");

          	  	};
          	  setTimeout(function () {
          	  $('#message').html("");
          	   $('#message').removeClass("alert alert-danger");
          	}, 2000);
     		  },
     		   beforeSend : function (){
                 $('#id').html("<div class='loading'><img src='"+base_url+"/assets/img/ajax_load.gif'></div>");

            },
          	    error: function(jqXHR, textStatus, errorThrown){ 
     /* alert( jqXHR.responseText);
               console.log(jqXHR.responseText);*/
          }
          	});

}
	$('#btn_book').prop('disabled',true);
$("#searchmem").keyup(function(){
	$('#btn_book').prop('disabled',true);
		var mem = $(this).val();	
		var url = $('#base_url').val();

			$.ajax({
				type:'POST',
					url: url+'/searchuser',
				data:{
					mem:mem
				},
				dataType: 'json',
				success:function(data)
				{

					if(data[0].uname=='emptysetfound'){
						$('#display').html("");	
						$('#display').html("No Username Found");
          	  		 $('#display').addClass("alert alert-danger");

					}
					else{

					var array = [];
					for (var i = 0; i< data.length; i++) {
							 if(data[i].uname==mem){
								$('#btn_book').prop('disabled',false);
							 };
						 array.push(i);
					};

						$('#display').removeClass("alert alert-danger");
						$('#display').html("");
						$('#display').html("<table class='table table-striped'>"+
							"<tbody>"+
									"<tr >"+
										"<th>id</th>"+
										"<th>Name</th>"+
										"<th>Action</th>"+
									"</tr>"+
									"</tbody>");
						jQuery("#display tbody").append(function(){
														 var $container = $('<div></div>');
														    $.each(array, function(val) {
														        $container.append($("<tr/>").append(
														        	 $("<td/>").html(val+1),
														        	  $("<td/>").html("<div class='data"+val+"'>"+data[val].uname+"</div>"), 
														        	  $("<td/>").html("<input class='btn btn-primary ' id='btnw-"+val+"' onclick='return item("+val+");' type='button' value='Choose'>")

														        ));
														      $('#display').append("<input class='datahid"+val+" form-control' type='hidden' value='"+data[val].uname+"'>");
														    });

														   return $container.html();
														});
				
			
					}
						$('.id').html("");

     		  },
     		   beforeSend : function (){
                 $('.id').html("<div class='loading1'><img src='"+url+"/assets/img/ajax_load.gif'></div>");

            },
				 error: function(jqXHR, textStatus, errorThrown){ 
				 		 $('.id').html("");
				 	if (jqXHR.responseText) {
				 			$('.id').html("");
				 								 	alert(jqXHR.responseText);

				 	};

   
               
          }
			});
		
	});
function item(m){
	var value = $(".datahid"+m).val();
	$("#searchmem").val(value);
	$('#btn_book').prop('disabled',false);
}
// $(document).ready(function() {

// var today = $("#today").val();
//  var now=parseInt(today) ;
// var date = $("#date").val();
// var c=now;
// var s=0;
// for (var i = 0; i <= 6; i++) {
// 	var data=increasedate(date,i);
// 	$(".din"+c+"").html(data);
// 	$(".date_send"+c+"").html("<input type='hidden' name='date' value='"+data+"'>");
// 	$(".date_get"+c+"").html("Date: "+data);
// 	$("#date_now"+c+"").val(data);
// 	c=c+1;
// 	if (s==1) {
// 		b=c-1;
// 		$(".rows"+b+"").addClass("warning");
// 	};
// 	if(c==8){
// 		c=1;
// 		s=1;
// 	}
	
// };

// });
// function increasedate(date,time){

// date1= new Date(date);
// next_date = new Date(date1.setDate(date1.getDate() + time));
// formatted = next_date.getUTCFullYear() + '-' + padNumber(next_date.getUTCMonth() + 1) + '-' + padNumber(next_date.getUTCDate())
//        function padNumber(number) {
//                 var string  = '' + number;
//                 string      = string.length < 2 ? '0' + string : string;
//                 return string;
//             } 
// return formatted;
// }

$(document).ready(function() {

var today = $("#today").val();
var now=parseInt(today) ;
	$(" ."+now).addClass("active");
});

/*For active nav*/
//Admin
 $("#dashboard .sidebar-menu li a:contains('Dashboard')").addClass('active');
 $("#owners .sidebar-menu li a:contains('Add')").addClass('active');
 $("#owners .sidebar-menu li:contains('Owners')").addClass('active');
 $("#arenas .sidebar-menu li a:contains('Add')").addClass('active');
 $("#arenas .sidebar-menu li:contains('Arenas')").addClass('active');

 //Owners
 $("#schedular .sidebar-menu li a:contains('Create Schedular')").addClass('active');

/*Admin profile info change*/
$(".form-inline").hide();
$("#change-admin-password-form").hide();
$(document).ready(function() {

	$(".tab-content a").tooltip();
	$("a").tooltip();

	$("#change-profile-pic").on("change", function() {		
		$("#change-admin-profile-pic").submit();
	});

	$(".cancel-change-password").on("click", function() {
		var that = $(this).parent().parent();
		$("#change-admin-password-form").hide();
		that.find("#to-be-changed").show();
		that.find(".danger").html("");
		$("#change-admin-password-form .form-group").removeClass("has-error");
	});

	$("#change-admin-password-form").on("submit", function(e) {
		e.preventDefault();
		var url = $(this).attr("action");
		var token = $(this).find("input[name='_token']").val();
		var new_password = $("#new-password").val();
		var new_password_again = $("#new-password-again").val();
		if(new_password == new_password_again){
			$("#new-password").parent().removeClass("has-error");
			$("#new-password-again").parent().removeClass("has-error");
			$.post(url, {newpass: new_password, _token: token}, function(response) {
				if(response == "true"){
					$.gritter.add({
			            // (string | mandatory) the heading of the notification
			            title: 'Password Changed.',
			            // (string | mandatory) the text inside the notification
			            text: 'Your password has been successfully changed.',
			            // Fade out time
			            time: 5000
			        });
			        document.getElementById("new-password").value = "";
			        document.getElementById("new-password-again").value = "";
			        $("#change-admin-password-form").hide();
			        $("#change-admin-password-form").parent().find("#to-be-changed").show();
				}
				else{
					$("#old-password").parent().addClass("has-error");
					$("#change-admin-password-form").parent().find(".danger").html(response);
				}
			});
		}
		else{
			$(this).find(".danger").html("New Passwords do not match");
			$("#new-password").parent().addClass("has-error");
			$("#new-password-again").parent().addClass("has-error");
		}
	});

	// To change admin info
	$(".change").on("click", function() {
		var that = $(this).parent();
		that.find("#to-be-changed").hide();
		that.find("form").show();
	});

	$(".cancel").on("click", function() {
		var that = $(this).parent().parent();
		that.find("form").hide();
		that.find("#to-be-changed").show();
		that.find(".danger").html("");
		that.find("form .form-group").removeClass("has-error");
	});

	// Code to change admin info
	$(".admin-profile-form").on("submit", function(e) {
		e.preventDefault();
		var url = $(this).attr("action");
		var id = $(this).attr("id");
		var username = $(this).find("#new-value").val();
		var token = $(this).find("input[name='_token']").val();
		var change = $(this).find(".form-group input").attr("change");
		triggerChange(url, username, token, change, id);
	});

});

function triggerChange(url, value, token, changeType, id){
	var id = "#"+id;
	var that = $(id).parent();
	if(value.trim() != ""){
		$.post(url, {value: value, _token: token}, function(data) {
			if(data === "true"){
				$.gritter.add({
		            // (string | mandatory) the heading of the notification
		            title: changeType + ' Changed.',
		            // (string | mandatory) the text inside the notification
		            text: 'Your '+ changeType +' has been successfully changed to <strong>'+ value +'</strong>.',
		            // Fade out time
		            time: 5000
		        });
		        that.find("#to-be-changed").html(value);
				$(id).hide();
				that.find("#to-be-changed").show();
				$(id).find(".form-group").removeClass("has-error");
			}
			else{
				$(id).find(".danger").html(data);
				$(id).find(".form-group").addClass("has-error");
			}
		});
	}
	else{
		$(id).find(".form-group").addClass("has-error");
		$(id).find(".danger").html(changeType + " field empty");
	}
}

/* To check duplicate username and email while creating new owners. */
$(document).ready(function() {
	$("#check-duplicate [data-check='true']").on("keyup blur", function() {
		var value = $(this).val();
		var check = $(this).attr("name");
		var that = "input[name='"+ $(this).attr("name") +"']";
		var url = $("#check-duplicate").attr("check-url");
		var token = $("#check-duplicate input[name='_token']").val();
		if(value.trim() != ""){
			$.ajax({
				method: "POST",
				url: url,
				data: {value: value, check: check, _token: token}
			})

			.done  (function(data)        { 
				if(data == "duplicate"){
					$("#check-duplicate").find(that).closest(".form-group").addClass("has-error");
					$("#check-duplicate").find(that).closest(".form-group").find(".help-block.with-errors").html("<ul class='list-unstyled'><li>" + check + " already exist.</li></ul>");
					$("#check-duplicate").find("input[type='submit']").attr("disabled", "disabled");
				}
				else{
					$("#check-duplicate").find(that).closest(".form-group").removeClass("has-error");
					$("#check-duplicate").find(that).closest(".form-group").find(".help-block.with-errors").html("");
					var error = $("#check-duplicate").find(".form-group").hasClass("has-error");
					if(!error){
						$("#check-duplicate").find("input[type='submit']").removeAttr("disabled");
					}
				}
			})

		    .fail  (function(jqXHR, textStatus, errorThrown) { console.log(errorThrown) });
		}
	});
});

$(document).ready(function(){ 
    $('.all').click(function() {
        var $checkboxes = $(this).parent().parent().parent().find('input[type=checkbox]');
        $checkboxes.prop('checked', $(this).is(':checked'));
    });

    $(".check input[type='checkbox']").on("click", function(){
    	var checked = $(".check").find("input[type=checkbox]").is(":checked");
	    if(checked){
	    	$(".action-buttons").css("margin-bottom", "6px");
	    	var tab  = $(this).closest(".tab-pane").attr("id");
	    	if(tab == "active"){
	    		showActionButton("delete", "disable");
	    	}
	    	else if(tab == "disabled"){
	    		showActionButton("delete", "enable");
	    	}
	    	else{
	    		showActionButton("restore", "deletef");
	    	}
	    }
	    else{
	    	$(".action-buttons").find("a").css("display", "none");
	    	$(".action-buttons").css("margin-bottom", "46px");
	    }
    });

    function showActionButton(btn1, btn2){
    	$(".action-buttons").find("a[name=" + btn1 + "]").css("display", "inline");
    	$(".action-buttons").find("a[name=" + btn2 + "]").css("display", "inline");
    }

    $(".action-buttons a").on("click", function(e) {
    	e.preventDefault();
    	var action = $(this).attr("href");
    	$("form[name='owners']").attr("action", action);
    	$("form[name='owners']").submit();
    });
}); 

$(document).ready(function(){ 
	$(document).on('click', ".arrows-next", function(e) {
    	var url = $('#base_url').val();
    	var day = $('#today').val();
    	var date = $('#date').val();
    	var forwho = $('#for').val();
			$.ajax({
				type:'GET',
					url: url+'/nextdate',
				data:{
					day:day,
					date:date,
					forwho:forwho
				},
		success:function(data)
				{
					  $(".ajax").html(data);
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

				 	};
				 }
				  });
    });
    $(document).on('click', ".arrows-prev", function(e) {
    	var url = $('#base_url').val();
    	var day = $('#today').val();
    	var date = $('#date').val();
var forwho = $('#for').val();
			$.ajax({
				type:'GET',
					url: url+'/prevdate',
				data:{
					day:day,
					date:date,
					forwho:forwho
				},
		success:function(data)
				{
					  $(".ajax").html(data);
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

				 	};
				 }
				  });
    });



});

$(".select-owner").select2({
	allowClear : true
});

$(".select-arena").select2({allowClear: true});
$(".select-master").select2({allowClear: true});

$("#add-arena-form").hide();
$("#add-arena-form-close").hide();
$("#add-arena-form-open").on("click", function(e){
	e.preventDefault();
	$("#add-arena-form").slideDown();
	$("#add-arena-form-open").hide();
	$("#add-arena-form-close").show();
});
$("#add-arena-form-close").on("click", function(e){
	e.preventDefault();
	$("#add-arena-form").slideUp();
	$("#add-arena-form-open").show();
	$("#add-arena-form-close").hide();
});