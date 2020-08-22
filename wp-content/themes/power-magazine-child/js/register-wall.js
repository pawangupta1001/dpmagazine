jQuery(document).ready(function($) {
    $("#guest-register").validate({
        rules: {
            user_name: "required",
            user_email: {
                required: function(element) {
                    return (jQuery.isEmptyObject($("#user_mobile").val()));
                },
                email: true
            },
            user_mobile: {
                required: function(element) {
                    return (jQuery.isEmptyObject($("#user_email").val()));
                },
                minlength: 10,
                maxlength: 15,
                digits: true
            },
            user_shipping: "required",
            user_city: "required",
            user_state: "required",
            user_pincode: "required"
        },
        messages: {
            user_name: "Please enter your full name",
            user_mobile: {
                required: "Please enter mobile number",
                minlength: "Your mobile number must be at least 10 digits long",
                maxlength: "Your mobile number should not be more than 12 digits long",
                digits: "Mobile number should be in digit only"
            },
            user_password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 8 characters long"
            },
            user_confim_pass: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Please enter the same password as above"
            },
            user_email: "Please enter a valid email address",
            user_shipping: "Please enter complete address",
            user_city: "Please enter city",
            user_state: "Please enter state",
            user_pincode: "Please enter pincode"
        }
    });
});
jQuery(document).ready(function($) {
    $("#guest-register").submit(function(e) {
        e.preventDefault();
        if ($("#guest-register").valid()) {
            var $form = $(this);
            console.log($form.serialize());
            //retrun false;
            // $.post($form.attr('action'), $form.serialize(), function(data) {
            //     if (data.error === true) {
            //         $("#register-info").html(data.error_message);
            //     }
            //     razorpopup(data);
            // }, 'json');
        }
    });
    $("#guest-login").submit(function(e) {
        e.preventDefault();
        if (validate_login()) {
            var $form = $('#guest-login');
            $.post($form.attr('action'), $form.serialize(), function(data) {
                if (data.error !== false) {
                    $("#login-info").html(data.error_message);
                } else {
                    window.location.href = data.redirect_to;
                }
            }, 'json');
        }
    });
});
function validate_login() {
    var data = $("#user_login").val();
    var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
    if (filter.test(data)) {
        $("#guest-login span.text-danger.user_login").hide();
        return true;
    }
    var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if (filter.test(data)) {
        $("#guest-login span.text-danger.user_login").hide();
        return true;
    }
    $("#guest-login span.text-danger.user_login").show();
    $("#guest-login span.text-danger.user_login").html('Please enter valid information');
    return false;
}
function pay_now(modalname, planid) {
    var $form = $('#guest-register');
    if (planid === 'plan-3' || planid === 'plan-13') {
        show_modal(modalname, planid);
        return;
    }
    $.post($form.attr('action'), '&action=pay_now&planid=' + planid, function(data) {
        if (data.error === true) {
            alert(data.error_message);
        }
        razorpopup(data);
    }, 'json');
}
function send_otp(resend = 'no', form = 'login') {
    if ($("#guest-register").valid() && form === 'register') {
        $("#guest-register .send-otp").hide();
        if (resend === 'no') {
            $("#guest-register .loading-button").show();
        } else {
            $("#guest-register .user_otp").val('');
        }
        var pid = $("#guest-register input[name=plan]").val();
        var $form = $('#guest-register');
        var formdata = $form.find(':not(input[name=action])').serialize();
        $.post($form.attr('action'), formdata + '&action=send_otp', function(data) {
            if (data.error !== false) {
                $("#guest-register .loading-button").hide();
                $("#guest-register .send-otp").show();
                $("#register-info").html(data.error_message);
            } else {
                $("#guest-register .loading-button").hide();
                $("#guest-register .verify-otp").show();
                $("#guest-register .submit-form").show();
            }
        }, 'json');
    }
    if (validate_login() && form === 'login') {
        $("#guest-login .send-otp").hide();
        if (resend === 'no') {
            $("#guest-login .loading-button").show();
        } else {
            $("#guest-login .user_otp").val('');
        }
        var $form = $('#guest-login');
        var formdata = $form.find(':not(input[name=action])').serialize();
        $.post($form.attr('action'), formdata + '&action=send_otp', function(data) {
            if (data.error !== false) {
                $("#guest-login .loading-button").hide();
                $("#guest-login .send-otp").show();
                $("#login-info").html(data.error_message);
            } else {
                $("#guest-login .loading-button").hide();
                $("#guest-login .verify-otp").show();
                $("#guest-login .submit-form").show();
            }
        }, 'json');
    }
}
function razorpopup(data) {
    var options = data;
    options.handler = function(response) {
        PostDataRedirect([response.razorpay_payment_id, response.razorpay_signature, 'rzp_form'], ["razorpay_payment_id", "razorpay_signature", 'action'], "https://www.grihshobha.in/wp-admin/admin-post.php");
    };
    options.theme.image_padding = false;
    options.modal = {
        ondismiss: function() {
            console.log("This code runs when the popup is closed");
        },
        escape: true,
        backdropclose: false
    };
    var rzp = new Razorpay(options);
    rzp.open();
}
function PostDataRedirect(data, dataName, location) {
    var form = document.createElement("form");
    form.method = "POST";
    form.action = location;
    if (data.constructor === Array && dataName.constructor === Array) {
        for (var i = 0; i < data.length; i++) {
            var element = document.createElement("input");
            element.type = "hidden";
            element.value = data[i];
            element.name = dataName[i];
            form.appendChild(element);
        }
    } else {
        var element1 = document.createElement("input");
        element1.type = "hidden";
        element1.value = data;
        element1.name = dataName;
        form.appendChild(element1);
    }
    document.body.appendChild(form);
    form.submit();
}
function audio_disable() {
    $("#dummy-audio .play-pause-btn").css("opacity", "0.2");
}