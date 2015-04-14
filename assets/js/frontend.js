$("#home li a:contains('HOME')").parent().addClass('active');
$("#arenas li a:contains('ARENAS')").parent().addClass('active');
$("#about li a:contains('ABOUT')").parent().addClass('active');
$("#contact li a:contains('CONTACT')").parent().addClass('active');

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



$(document).ready(function() {
    $("#check-duplicate [data-check='true']").on("keyup blur", function() {
        var value = $(this).val();
        var image = $("#load-image").attr("url");
        var check = $(this).attr("name");
        var that = "input[name='"+ $(this).attr("name") +"']";
        var url = $("#check-duplicate").attr("check-url");
        var token = $("#check-duplicate input[name='_token']").val();
        if(value.trim() != ""){
            $.ajax({
                method: "POST",
                url: url,
                data: {value: value, check: check, _token: token},
                success : function(data){
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
                },

                beforeSend: function() {
                    $("#check-duplicate").find(that).closest(".form-group").find(".help-block.with-errors").html("<img src='"+ image +"/assets/img/ajax_load.gif' width='20px' height='20px' style='display:block; margin:0 auto;'>");
                }, 

                error : function(jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown)
                }
            });
        }
    });
});

$(".select-arena").select2({
    placeholder: "Select a arena",
    allowClear: true
});

// var x = document.getElementById("demo");