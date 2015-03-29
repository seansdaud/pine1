// Login Form

$(function() {
    var button = $('#loginButton');
    var box = $('#loginBox');
    var form = $('#loginForm');
    button.removeAttr('href');
    button.mouseup(function(login) {
        box.toggle();
        button.toggleClass('active');
    });
    form.mouseup(function() { 
        return false;
    });
    $(this).mouseup(function(login) {
        if(!($(login.target).parent('#loginButton').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });

    $(form).on("submit", function(e){
        e.preventDefault();
        var url = $(this).attr("action");
        $.ajax({

            type : "POST",
            url : url,
            data : form.serialize(),
            success: function(data){
                if(data == "Invalid"){
                    $(".invalid").html("Invalid Username/Password");
                    $("#loginForm .loading").css("display", "none");
                }
                else{
                    window.location.replace(data);
                }
            },
            beforeSend : function (){
                 $("#loginForm .loading").css("display", "block");
            },
            error: function(){
                $(".invalid").html("Something went wrong. Please try again.");
                $("#loginForm .loading").css("display", "none");
            }

        });
    });
});