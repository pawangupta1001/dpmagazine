<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Power_Magazine
 */

?>
<?php
	/**
	 * Hook - power_magazine_action_after_content
	 *
	 * @hooked power_magazine_content_end -10
	 *
	 */
	do_action( 'power_magazine_action_after_content' );

	/**
	 * Hook - power_magazine_action_before_footer
	 *
	 * @hooked power_magazine_footer_start -10
	 *
	 */
	do_action( 'power_magazine_action_before_footer' );

	/**
	 * Hook - power_magazine_action_footer
	 *
	 * @hooked power_magazine_footer_copyright -10
	 *
	 */
	do_action( 'power_magazine_action_footer' );

	/**
	 * Hook - power_magazine_action_after_footer
	 *
	 * @hooked power_magazine_footer_end -10
	 *
	 */
	do_action( 'power_magazine_action_after_footer' );

	/**
	 * Hook - power_magazine_action_scroll
	 *
	 * @hooked power_magazine_footer_scroll -10
	 *
	 */
	do_action( 'power_magazine_action_scroll' );

	/**
	 * Hook - power_magazine_action_after
	 *
	 * @hooked power_magazine_page_end -10
	 *
	 */
	do_action( 'power_magazine_action_after' );
?>

<?php wp_footer(); ?>
<div id="bottom-strip" class="bottom-strip fixed">
	'डीपीमैग्जीन' पर आप पढ़  सकते हैं 10 आर्टिकल बिलकुल फ्री ,
	<span class="txt-yellow">
		अनलिमिटेड पढ़ने के लिए
		 <a class="btn-yellow" onclick="ga('send','event','subscribe','bottom strip', 'https://www.grihshobha.in');
		 conversion_tracking('grihshobha', 'footer-strip-new', 'https://www.grihshobha.in');"
		 href="<?php echo home_url(). '/subscribe'; ?>" target="_blank">Subscribe Now
		</a>
	</span>
</div>
<script>
	var acc=document.getElementsByClassName("accordion");
	//console.log(acc);
	var i;
	for(i=0;i<acc.length;i++){

		acc[i].addEventListener("click",function(){
			//alert('hekl');
			this.classList.toggle("active");
			var panel=this.nextElementSibling;
			if(panel.style.maxHeight){
				panel.style.maxHeight=null;
			}else{
				panel.style.maxHeight=panel.scrollHeight+"px";}
			});
		}
</script>
<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js?ver=020120"></script>
<div id="whyRegister" class="modal" style="display:none;">
  <!-- Modal content -->
  <div class="modal-content">
    <span id="close-register" onclick="hide_modal('whyRegister');" href="JavaScript:void(0);" class="close">×</span>

    <div class="guest-register-block">
        <div class="form-head">सबस्क्राइब करें</div>
        <div class="form-subhead">डिजिटल<span id="forprint" style="font-size: 24px !important; display:none;"> + प्रिंट</span> एडिशन</div>
        <div class="frm-block frm-pad">
            <div id="register-info" class="text-center red"></div>
            <form id="guest-register" class="guest-register" method="post" action="http://dpmagazine.in/wp-admin/admin-ajax.php" accept-charset="utf-8" novalidate="novalidate">
                <div class="form-group">
                    <input type="text" name="user_name" class="form-control" value="" placeholder="Full Name">
                    <span class="text-danger"></span>
                </div>
                <div class="form-info-text">अपना फ़ोन नम्बर/ईमेल आईडी या दोनों भरें.</div>
                <div class="form-group">
                    <input type="text" id="user_mobile" name="user_mobile" class="form-control" value="" placeholder="Mobile Number">
                    <span class="text-danger"></span>
                </div>
                <div class="form-group">
                    <input type="text" id="user_email" name="user_email" class="form-control" value="" placeholder="Email ID">
                    <span class="text-danger"></span>
                </div>
                <div class="user-shipping" style="display: none;">
                    <div class="form-group" style="padding-bottom:0;">
                    <textarea id="user_shipping" name="user_shipping" class="form-control" value="" placeholder="Shipping Address"></textarea>
                    <span class="text-danger"></span>
                </div>
                <div class="form-group user-city" style="width:49%; float: left; margin-right: 2%;padding-top:0;">
                    <input type="text" id="user_city" name="user_city" class="form-control" value="" placeholder="City">
                    <span class="text-danger"></span>
                </div>
                <div class="form-group user-pincode" style="width:49%; float: left;padding-top:0;">
                    <input type="text" id="user_pincode" name="user_pincode" class="form-control" value="" placeholder="Pincode">
                    <span class="text-danger"></span>
                </div>
                <div class="form-group user-state">
                    <input type="text" id="user_state" name="user_state" class="form-control" value="" placeholder="State">
                    <span class="text-danger"></span>
                </div>
                </div>
                <input type="hidden" name="plan" value="">
                <input type="hidden" name="action" value="guest_register">
                <input type="hidden" name="redirect_to" value="http://www.dpmagazine.in">
                <input type="hidden" id="guest_register_field" name="guest_register_field" value="7b2cb6eeb6"><input type="hidden" name="_wp_http_referer" value="/">
                <!-- div class="text-center send-otp">
                    <input type="button" value="Send OTP" onclick="send_otp('no', 'register');" class="button">
                </div>

                <div class="loading-button"></div>

                <div class="form-group verify-otp">
                    <input type="text" id="user_otp" name="user_otp" class="form-control" value="" placeholder="Enter OTP" autocomplete="off">
                    <a id="resend-otp" onclick="send_otp('yes', 'register');" href="JavaScript:void(0);">Resend OTP</a>
                    <span class="text-danger"></span>
                </div -->

                <div class="text-center submit-form">
                    <input type="submit" name="login" value="Register Now" class="button">
                </div>

            </form>
        </div>

        <div class="text-center" style="font-size:16px; margin-top:10px;">Already Registered? <strong><a id="btnGuestLogin" class="red login-show"  href="JavaScript:void(0);" style="font-size:16px;">LOGIN HERE.</a></strong></div>


    </div><!-- /.body-text -->
  </div>

</div>
<div id="GuestLogin" class="modal" style="display: none;">
  <!-- Modal content -->
  <div class="modal-content">
    <span id="close-guest" onclick="hide_modal('GuestLogin');" href="JavaScript:void(0);" class="close">×</span>

    <div class="guest-login-block">
        <div class="form-head">लॉग इन करें</div>
        <div class="form-subhead">डिजिटल एडिशन</div>
        <div class="frm-block frm-pad">
            <div id="login-info" class="text-center red"></div>
            <form id="guest-login" class="guest-login" method="post" action="http://www.dpmagazine.in/wp-admin/admin-ajax.php" accept-charset="utf-8" novalidate="novalidate">

                <div class="form-group">
                    <input id="user_login" type="text" name="user_login" class="form-control" value="" placeholder="Email ID / Mobile Number">
                    <span class="text-danger user_login"></span>
                </div>

                <input type="hidden" name="plan" value="">
                <input type="hidden" name="action" value="guest_login">
                <input type="hidden" name="redirect_to" value="http://www.dpmagazine.in">
                <input type="hidden" id="guest_login_field" name="guest_login_field" value="a41ac74b10"><input type="hidden" name="_wp_http_referer" value="/">
                <div class="text-center send-otp">
                    <input type="button" value="Send OTP" onclick="send_otp('no', 'login');" class="button">
                </div>

                <div class="loading-button"></div>

                <div class="form-group verify-otp">
                    <input type="text" id="user_otp" name="user_otp" class="form-control" value="" placeholder="Enter OTP" autocomplete="off">
                    <a id="resend-otp" onclick="send_otp('yes', 'login');" href="JavaScript:void(0);">Resend OTP</a>
                    <span class="text-danger"></span>
                </div>

                <div class="text-center submit-form">
                    <input type="submit" name="login" value="Login" class="button">
                </div>

            </form>
        </div>

        <div class="text-center" style="font-size:16px; margin-top:10px;">Don't have an account? <strong><a id="btnGuestLogin" class="red profile-show"  href="JavaScript:void(0);" style="font-size:16px;">GET REGISTER.</a></strong></div>

    </div><!-- /.body-text -->
  </div>

</div>
<script type="text/javascript">
	jQuery(document).ready(function(){
	jQuery(".login-show").click( function(){
		show_modal('GuestLogin');
		hide_modal('whyRegister')
	// });
	jQuery(".profile-show").click( function(){
		hide_modal('GuestLogin');
		show_modal('whyRegister')
	});
});
});

</script>
<?php
if (is_user_logged_in()) {
	?>
	<style type="text/css">
		.menu .login-show{
			display: none;
		}
	</style>
 <?php
}else{ ?>
	<style type="text/css">
		.menu .profile-show{
			display: none;
		}
	</style>
<?php
}
?>
</body>
</html>
