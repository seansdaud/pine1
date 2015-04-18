$("#home li a:contains('HOME')").parent().addClass('active');
$("#arenas li a:contains('ARENAS')").parent().addClass('active');
$("#about li a:contains('ABOUT')").parent().addClass('active');
$("#contact li a:contains('CONTACT')").parent().addClass('active');

$('input[name=start_time]').timepicker();
$('input[name=end_time]').timepicker();

// Login Form

$(function() {
    var button = $('#loginButton');
    var box = $('#loginBox');
    var form = $('#loginForm');
    var forgot = $("#forgotForm");
    button.removeAttr('href');
    button.mouseup(function(login) {
        box.toggle();
        button.toggleClass('active');
    });
    form.mouseup(function() { 
        return false;
    });
    forgot.mouseup(function() { 
        return false;
    });
    $(this).mouseup(function(login) {
        if(!($(login.target).parent('#loginButton').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });

    $(".popout").on("submit", function(e){
        e.preventDefault();
        var id = $(this).attr("id");
        var url = $(this).attr("action");
        $.ajax({

            type : "POST",
            url : url,
            data : $(this).serialize(),
            success: function(data){
                if(data == "Invalid"){
                    $(".invalid").html("Invalid Username/Password");
                    $("#" + id + " .loading").css("display", "none");
                }
                else if(data == "Empty"){
                    $(".invalid").html("Email does not exist in our system.");
                    $("#" + id + " .loading").css("display", "none");
                }
                else if(data == "Success"){
                    $(".invalid").html("Recovery Email Sent.");
                    $("#" + id + " .loading").css("display", "none");
                }
                else{
                    window.location.replace(data);
                }
            },
            beforeSend : function (){
                 $("#" + id + " .loading").css("display", "block");
            },
            error: function(){
                $(".invalid").html("Something went wrong. Please try again.");
                $("#" + id + " .loading").css("display", "none");
            }

        });
    });
});

$(document).ready(function() {

    $("#forgot-password").on("click", function(e) {
        e.preventDefault();
        $("#loginForm").css("display", "none");
        $("#forgotForm").css("display", "block");
    });

});

$(document).ready(function() {

    $("#back-to-login").on("click", function(e) {
        e.preventDefault();
        $("#forgotForm").css("display", "none");
        $("#loginForm").css("display", "block");
    });

});

$(document).ready(function(){
    $("#change-cover-pic").on("change", function() {      
        $("#change-user-cover-pic").submit();
    });
});

$(document).ready(function(){
    $("#review-form").css("display", "block");
    $("#review-form textarea").keyup(function(e) {
        var cs = 200 - $(this).val().length;
        $('#characters').html(cs + " characters left.");
        if(cs == 0 || cs < 0){
            e.preventDefault();
        }
    });

    $("#review-form textarea").on("focus", function(){
        var cs = 200 - $(this).val().length;
        $("#characters").html(cs + " characters left.");
    });
});

$(".select-arena").select2({
    placeholder: "Select a arena",
    allowClear: true
});

// var x = document.getElementById("demo");