// Get the modal
function get_modal(modalname, modalbtn, closebtn){
var modal = document.getElementById(modalname);

// Get the button that opens the modal
var btn = document.getElementById(modalbtn);

// Get the <span> element that closes the modal
//var span = document.getElementsByClassName("close")[0];

var span = document.getElementById(closebtn);

// When the user clicks on the button, open the modal
if(modal !==null && btn !== null){
    btn.onclick = function() {
      modal.style.display = "block";
    }

// When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }


// When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target === modal) {
        modal.style.display = "block";
      }
    }
}
}

//get_modal('whyRegister','btnWhyRegister', 'close-register');
//get_modal('GuestLogin','btnGuestLogin', 'close-guest');

function show_modal(modalname, value){
    var modal = document.getElementById(modalname);
    modal.style.display = "block";

    if(modalname ==='whyRegister' && value !== undefined){
    jQuery("#guest-register input[name=plan]").val(value);
    console.log(value);
    }

    if(modalname ==='GuestLogin'){
    var a = jQuery("#guest-register input[name=plan]").val();
    jQuery("#guest-login input[name=plan]").val(a);
    //console.log(a);
    }
    if(value === 'plan-3' || value === 'plan-13'){
        jQuery("#guest-register .user-shipping").show();
        jQuery("#forprint").show();
    }
    else{
        jQuery("#guest-register .user-shipping").hide();
        jQuery("#forprint").hide();
    }
}

function hide_modal(modalname){
    var modal = document.getElementById(modalname);
    modal.style.display = "none";
}