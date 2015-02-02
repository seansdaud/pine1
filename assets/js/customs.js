/*For active nav*/
//Admin
 $("#dashboard .sidebar-menu li a:contains('Dashboard')").addClass('active');
 $("#owners .sidebar-menu li a:contains('Owners')").addClass('active');

 //Owners
 $("#schedular .sidebar-menu li a:contains('Create Schedular')").addClass('active');

/*Admin profile info change*/
$(".form-inline").hide();
$(document).ready(function() {

	$("a").tooltip();

	$("#change-profile-pic").on("change", function() {		
		$("#change-admin-profile-pic").submit();
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
	$(".form-inline").on("submit", function(e) {
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
	$("#check-duplicate [data-check='true']").on("blur", function() {
		$("#check-duplicate").find("input[type='submit']").attr("disabled", "disabled");
		var value = $(this).val();
		var check = $(this).attr("name");
		var that = "input[name='"+ $(this).attr("name") +"']";
		var url = $("#check-duplicate").attr("check-url");
		if(value.trim() != ""){
			$.post(url, {value: value, check: check}, function(response) {
				if(response == "duplicate"){
					$("#check-duplicate").find(that).closest(".form-group").addClass("has-error");
					$("#check-duplicate").find(that).closest(".form-group").find(".help-block.with-errors").html("<ul class='list-unstyled'><li>" + check + " already exist.</li></ul>");
				}
				else{
					$("#check-duplicate").find(that).closest(".form-group").addClass("has-success");
					$("#check-duplicate").find(that).closest(".form-group").find(".help-block.with-errors").html("");
					$("#check-duplicate").find("input[type='submit']").removeAttr("disabled");
				}
			});
		}
	});
});