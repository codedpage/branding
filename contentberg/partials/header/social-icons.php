<?php 
/**
 * Partial: Header social icons
 */
?>
<!-- Registration form code -->
<div class="black_overlay" id="fade_reg"></div>	
<div class="itr-popup" id="itr-sign-up-light" style="display:none;">
    <div class="close" id="itr-sign-up-c">x</div>
    <div class="hding">
        <h3>Register Now</h3>
    </div>
    <form class="form m-0 snform" name="itr-register" id="itr-register" method="POST" action="/public/register">
        <div class="form-group">
            <input class="form-control form-control-sm" name="username" id="username" type="text" placeholder="Username" autocomplete="username">
            <div class="modal-error" id="register-error-username"></div>
        </div>
        <div class="form-group">
            <input class="form-control form-control-sm" name="email" id="email" type="text" placeholder="Email" autocomplete="email">
            <div class="modal-error" id="register-error-email"></div>
        </div>
        <div class="form-group">
            <input class="form-control form-control-sm" name="password" id="password" type="password" placeholder="Password" autocomplete="new-password">
            <div class="modal-error" id="register-error-password"></div>
        </div>
        <div class="google-recaptcha">
            <div class="g-recaptcha" data-sitekey="6Lfwk3cUAAAAAPUAFXpUGmIZGCsB24-6bqUlWkZf"></div>
            <div class="modal-error" id="register-error-captcha"></div>
        </div>
        <div class="register-btn">
            <a class="btn-pp" name="itr-register-btn" id="itr-register-btn"><div class="fa fa-spinner fa-spin fa-lg" id="register-modal-spinner"></div> Sign Up</a>
        </div>
      </form>
</div>
<div class="itr-popup" id="itr-login-light" style="display:none;">
    <div class="close" id="itr-sign-up-c">x</div>
    <div class="hding">
        <h3>Login Now</h3>
    </div>
    <form class="form m-0 snform" name="itr-login" id="itr-login" method="POST" action="/user/login">
        <div class="form-group">
            <input class="form-control form-control-sm" name="username_login" id="username_login" type="text" placeholder="Username" autocomplete="username">
            <div class="modal-error" id="login-error-username"></div>
        </div>
        <div class="form-group">
            <input class="form-control form-control-sm" name="password_login" id="password_login" type="password" placeholder="Password" autocomplete="new-password">
            <div class="modal-error" id="login-error-password"></div>
        </div>
        <div class="register-btn">
            <button class="btn-pp" name="itr-login-btn" id="itr-login-btn"><div class="fa fa-spinner fa-spin fa-lg" id="login-modal-spinner"></div> Log In</button>
            <div class="modal-error" id="login-error"></div>
            <a href="JavaScript:void(0);" id="forgot_account_link">Forgot Member Name or Password?</a>
        </div>
      </form>
</div>
<div class="itr-popup" id="itr-forgot-accont-light" style="display:none;">
    <div class="close" id="itr-sign-up-c">x</div>
    <div class="hding">
        <h3>Recover Account</h3>
    </div>
    <form class="form m-0 snform" name="itr-forgot" id="itr-forgot" method="POST" action="/">
        <div class="form-group">
            <div class="forgot-account-label">Please enter the full email address you used to sign up for In The Rooms and we’ll send you a link to get back into your account.</div>
            <input class="form-control form-control-sm" name="forgot_account" id="forgot_account" type="email" placeholder="Enter Email">
            <div class="modal-error" id="forgot-error-username"></div>
        </div>
        <div class="register-btn">
            <button class="btn-pp" name="itr-fogot-btn" id="itr-fogot-btn">
                <div class="fa fa-spinner fa-spin fa-lg" id="forgot-modal-spinner"></div> Submit
            </button>
            <div class="modal-error" id="forgot-error"></div>
        </div>
    </form>
    <p class="success-message" id="success_message_forgot">Email sent. Check your email and click on the link to reset password.
</p>
</div>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
// Register Modal
jQuery(function($){
    $('#sign-up-new, .register-form-open').click(function(){
       $('#fade_reg, #itr-sign-up-light').show(); 
	   $("html, body").delay(2000).animate({scrollTop: $('#itr-sign-up-light').offset().top }, 2000);
    });
    $('#login-new').click(function(){
       $('#fade_reg, #itr-login-light').show(); 
	   $("html, body").delay(2000).animate({scrollTop: $('#itr-login-light').offset().top }, 2000);
    });
    $('#forgot_account_link,.forgot_account_link_class').click(function(){
       $('#itr-login-light').hide();
       $('#fade_reg, #itr-forgot-accont-light').show(); 
	   $("html, body").delay(2000).animate({scrollTop: $('#itr-forgot-accont-light').offset().top }, 2000);
    });
    
    $('#itr-sign-up-c, .close').click(function(){
        $('#fade_reg, #itr-sign-up-light, #itr-login-light, #itr-forgot-accont-light').hide();
    });
    
    $("#itr-forgot").submit(function(e) {
        e.preventDefault();
        if($('#forgot_account').val() == "" ){
            $("#forgot-error-username").text("Please enter email id");
            return false;
        }
        $("#itr-fogot-btn").addClass('disabled');
        $("#forgot-modal-spinner").css('display', 'inline-block');
        $("#forgot-error-username").empty();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "/public/ajax/accountRecovery",
            data: { 
                'email': $('#forgot_account').val()
            },
            beforeSend: function() {
                jQuery("#itr-forgot-btn").attr("disabled", true);
            },
            success: function(responseData, textStatus, jqXHR) {
                if (responseData.success == true) {
                    $('#itr-forgot').hide();
                    $('#success_message_forgot').show();
                }
                else {
                    $("#forgot-error-username").text("Email not found. Please retype email address");
                    $("#itr-forgot-btn").removeClass('disabled');
                    $("#forgot-modal-spinner").css('display', 'none');
                    return false;
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
                $("#forgot-error").text("Unknown Error.");
            }
        });
    });
    
    $("#itr-login").submit(function(e) {
        e.preventDefault();
        if($('#username_login').val() == "" && $('#password_login').val() == ""){
            $("#login-error-username").text("Please enter username");
            $("#login-error-password").text("Please enter password");
            return false;
        }
        if($('#username_login').val() == ""){
            $("#login-error-password").empty();
            $("#login-error-username").text("Please enter username");
            return false;
        }
        if($('#password_login').val() == ""){
            $("#login-error-username").empty();
            $("#login-error-password").text("Please enter password");
            return false;
        }
        $("#itr-login-btn").addClass('disabled');
        $("#login-modal-spinner").css('display', 'inline-block');
        $("#login-error-username").empty();
        $("#login-error-password").empty();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "/public/ajax/loginNew",
            data: { 
                'login-username-nav': $('#username_login').val(),
                'login-password-nav': $('#password_login').val(),
                'username': $('#username_login').val(),
                'password': $('#password_login').val()
            },                
            success: function(responseData, textStatus, jqXHR) {
                if (responseData.success == true) {
                    $('<form action="/user/login" method="post" id="login_form_ready"></form>').appendTo('body');
                    $('<input/>').attr({
                        type: 'hidden',
                        name: 'username',
                        value: $('#username_login').val()
                        }).appendTo($("#login_form_ready"));
                    $('<input/>').attr({
                        type: 'hidden',
                        name: 'password',
                        value: $('#password_login').val()
                        }).appendTo($("#login_form_ready"));
                    $('<input/>').attr({
                        type: 'hidden',
                        name: 'username_login',
                        value: $('#username_login').val()
                        }).appendTo($("#login_form_ready"));
                    $('<input/>').attr({
                        type: 'hidden',
                        name: 'password_login',
                        value: $('#password_login').val()
                        }).appendTo($("#login_form_ready"));
                    $("#login_form_ready").submit();
                }
                else {
                    $.each(responseData.errors, function() {
                        $.each(this, function(k, v) {
                             if (k == "login") {
                                $("#login-error-username").text(v);
                             } else if (k == "account") {
                                $("itr-login").html('<p>We are having problems logging you into your account. Please contact support using the helpdesk link below or send an email to support@intherooms.com, Be sure to include the support code <b>'+v+'</b> for faster assistance.</p>');
                             } else {
                                $("#login-error-password").text(v);
                             }
                        });
                    });

                    $("#itr-login-btn").removeClass('disabled');
                    $("#login-modal-spinner").css('display', 'none');
                    return false;
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
                $("#login-error").text("Unknown Error.");
            }
        });
    });
    
    $("#itr-register-btn").click(function() {
        $("#itr-register-btn").addClass('disabled');
        $("#register-modal-spinner").css('display', 'inline-block');
        $("#register-modal-icon").hide();
        $("#register-error-username").empty();
        $("#register-error-password").empty();
        $("#register-error-email").empty();
        $("#register-error-captcha").empty();
        $("#register-error").empty();

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "/public/ajax/regCheckNew",
            data: $('#itr-register').serializeArray(),
            success: function(responseData, textStatus, jqXHR) {
                if (responseData.success == true) {
                    $('<input/>').attr({
                        type: 'hidden',
                        name: 'process',
                        value: true
                    }).appendTo($("form"));
                    $("#itr-register").submit();
                }
                else {
                    $.each(responseData.errors, function() {
                        $.each(this, function(k, v) {
                             if (k == "username") {
                                $("#register-error-username").text(v);
                             } else if (k == "password") {
                                $("#register-error-password").text(v);
                             } else if (k == "email") {
                                $("#register-error-email").text(v);
                             } else if (k == "g-recaptcha-response") {
                                $("#register-error-captcha").text(v);
                             } else {
                                $("#register-error").text(v);
                             }
                        });
                    });

                    $("#itr-register-btn").removeClass('disabled');
                    $("#register-modal-spinner").css('display', 'none');
                    $("#register-modal-icon").show();
                    return false;
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
                $("#register-error").text("Unknown Error.");
            }
        });
    });
});
</script>
<style type="text/css">

.itr-popup{
    display: none;
    width:35%;
    background:#ffffff;
    border:1px solid #fdf4f2;
    padding:0.7em 0.7em 2em 0.7em;
    margin:0 auto;
    text-align:center;
    position:absolute;
    left: 0;
    right: 0;
    top: 50px;
    z-index: 1002;
    transition: 750ms all;
}
#register-modal-spinner, #login-modal-spinner, #forgot-modal-spinner {display:none;}
.close{
    position:absolute;
    z-index:99;
    top:6px;
    right:15px;
    font-family:"Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size:24px;
    font-weight:700;
    line-height:21px;
    color:#bbb9b9;
    cursor:pointer;
}
.itr-popup .img{
    margin:0 auto;
    text-align:center;
    width:90%;
}
.itr-popup .img img{
    max-width:100%;
    height:auto;
    display:inline-block;
    margin-bottom:15px;
}
a#forgot_account_link:hover {
    color: #5091cd;
}
#success_message_forgot {
    display: none;
    color: #000;
    font-size: medium;
    line-height: initial;
    padding: 0 40px;
}
.snform{
    
    margin:1em;
}
.snform .form-control {
    outline:none !important;
    display: block;
    height: 35px;
    padding: 3px 12px;
    font-family:inherit;
    font-size: 13px;
    line-height: 1.42857143;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    margin-bottom: 1em;
    border: 1px solid #a2a2a2 !important;
    width: 100%;
    border-radius: 0;
}
.snform .form-control:focus{
     border: 1px solid #a2a2a2 !important;
}
.forgot-account-label {
    color: #000;
    line-height: normal;
    text-align: left;
    padding-bottom: 10px;
}
.snform div.modal-error {
    color: #f00;
    text-align: left;
    line-height: 1em;
}
.snform .popup-btn {
    font-family: inherit;
    font-size: 1em;
    line-height: 1.4;
    font-weight: 600;
    text-align: center;
    color: #000000;
    width: 100%;
    background-color: #5091CD !important;
    border: none;
    outline: none;
    display: block;
    height: auto;
    padding: 0.5em 0;
    text-transform: uppercase;
    text-decoration: none;
    cursor: pointer;
}

.snform .popup-btn:hover{
    background-color:#6CB33F;
}
.btn-pp {
    background: #5091CD;
    font-family: Roboto, Arial, sans-serif;
    width: 100%;
    display: block;
    padding: 0.5em 0;
    font-size: 1em;
    line-height: 1.4;
    font-weight: 600;
    text-align: center;
    color: #ffffff;
    text-transform: uppercase;
    cursor: pointer;
}
.btn-pp:hover {
    background: #6CB33F;
}
.black_overlay {
	background-color:rgba(0,0,0,0.7);
	display: none;
	height: 100%;
	left: 0;
	opacity: 0.4;
	position: fixed;
	top: 0;
	width: 100%;
	z-index: 1001;
}
.register-btn{
    margin-top: 1em;
}
	
@media only screen and (max-width: 450px){
#light{
	width:85% !important;
}
	.itr-popup { width: 90%;}
	.itr-popup .close {
		top: 3px;
		right: 8px;
	}
	.itr-popup .snform{
            /*	width:100%; */
	}
	.snform .form-control,.snform .popup-btn{
		/* width:90%; */
	}
	
}
@media only screen and (min-width: 678px){
	.itr-popup{
		top: 160px;
	}
}
@media only screen and (max-width: 950px) and (min-width: 451px) {
	.itr-popup{
		width:350px !important;
	}
}
.hding h3{
    border-bottom: 1px solid #eaeaea;
    padding-bottom: 1em;
    font-size: 1.5em;
    line-height: 1em;
    text-transform: uppercase;
    color: #4F91CD;
	margin-bottom: 0.2em;
}
</style>
<!-- /Registration form code end here -->

	<?php if (!empty($social_icons) && Bunyad::options()->topbar_social): ?>
		<ul class="login-signup">
			<?php
                        if(isset($_COOKIE['GPCookie']))
			$decrypted_cookie = _decryptCookie($_COOKIE['GPCookie']);
                        if(isset($_COOKIE['GPCookie']) && ($decrypted_cookie !== false) && isset($decrypted_cookie['mid']) ){
                            //header("Location: https://www.intherooms.com/member/home");
			?>
			<li><a href="https://www.intherooms.com/member/home" style="background: #6faf73;color: #fff;">Go to Member Area</a></li>	
			<?php 
			}else {
                            //setcookie('GPCookie',false,time()-3600*365,'/','intherooms.com');
			?>
			<!-- <li><a href="https://www.intherooms.com/public/register" style="background: #6faf73;color: #fff;">Sign Up</a></li>-->
			<li><a href="JavaScript:void(0);" id="sign-up-new" style="background: #6faf73;color: #fff;">Sign Up</a></li>
			<li><a href="JavaScript:void(0);" id="login-new" style="color: #6faf73;background:#fff;">Log In</a></li>
			<?php } ?>
		</ul>
		<ul class="social-icons cf">
		
			<?php
			
			/**
			 * Use theme settings to show enabled icons
			 */
			$services = Bunyad::get('social')->get_services();
			$links    = Bunyad::options()->social_profiles;
			
			foreach ( (array) Bunyad::options()->topbar_social as $icon):
			
				$service = $services[$icon];
				$url = !empty($links[$icon]) ? $links[$icon] : '#';
			?>
		
			<li><a href="<?php echo esc_url($url); ?>" class="fa fa-<?php echo esc_attr($service['icon']); 
				?>" target="_blank"><span class="visuallyhidden"><?php echo esc_html($service['label']); ?></span></a></li>
									
			<?php endforeach; ?>
		
		</ul>
	
	<?php endif; ?>
			
