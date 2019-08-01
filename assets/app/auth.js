$(document).on("submit", "#ajax_post_login_form", function (arg) {
    arg.preventDefault();
    // start_process();
    var action = $(this).attr("action");
    var submitdata = $(this).serialize();
    $.ajax({
        type: "POST",
        url: action,
        data: submitdata,
        dataType: "JSON",
        success: function (response) {
            $('#alert-message').fadeIn();
            $('#alert-message').text(response.message);
            if (response.status) {
                window.location.href = response.redirect;
            }
        }
    });
    //alert();
});

$(document).on("submit", "#signup-form", function (arg) {
    arg.preventDefault();
    // start_process();
    var action = $(this).attr("action");
    var submitdata = $(this).serialize();
    $.ajax({
        type: "POST",
        url: action,
        data: submitdata,
        dataType: "JSON",
        success: function (response) {
            $('#alert-message').fadeIn();
            $('#alert-message').text(response.message);
            if (response.status) {
                window.location.href = response.redirect;
            }
        }
    });
    //alert();
});
