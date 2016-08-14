// function to go back a window
function goBack() {
    window.history.back();
}

//function to validate email domain
jQuery.validator.addMethod("emailordomain",
        function (value, element) {
            return this.optional(element)
                    || /^\w+@mail.sfsu.edu/.test(value)
                    || /^\w+@sfsu.edu/.test(value);
        }, "Please provide a valid SFSU email");


$('.form').validate({
    rules: {
        student_id: {
            minlength: 9,
            maxlength: 9,
            digits: true
        },
        email: {
            required: true,
            emailordomain: true
        },
        agree: "required"
    },
    messages: {
        student_id: {
            minlength: "Student ID must be 9 characters long",
            maxlength: "Student ID must be 9 characters long"
        },
        agree: "&nbsp;You must agree to our terms"
    }
});

$(function () {
    // just a super-simple JS demo

    var demoHeaderBox;

    // simple demo to show create something via javascript on the page
    if ($('#javascript-header-demo-box').length !== 0) {
        demoHeaderBox = $('#javascript-header-demo-box');
        demoHeaderBox
                .hide()
                .text('Hello from JavaScript! This line has been added by public/js/application.js')
                .css('color', 'green')
                .fadeIn('slow');
    }

    // if #javascript-ajax-button exists
    if ($('#javascript-ajax-button').length !== 0) {

        $('#javascript-ajax-button').on('click', function () {

            // send an ajax-request to this URL: current-server.com/songs/ajaxGetStats
            // "url" is defined in views/_templates/footer.php
            $.ajax(url + "/songs/ajaxGetStats")
                    .done(function (result) {
                        // this will be executed if the ajax-call was successful
                        // here we get the feedback from the ajax-call (result) and show it in #javascript-ajax-result-box
                        $('#javascript-ajax-result-box').html(result);
                    })
                    .fail(function () {
                        // this will be executed if the ajax-call had failed
                    })
                    .always(function () {
                        // this will ALWAYS be executed, regardless if the ajax-call was success or not
                    });
        });
    }

});
