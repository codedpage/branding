<?php 
/**
 * Footer template for the site footer
 * 
 * The footer is split into three sections:
 * 
 *  - Upper footer with widgets
 *  - Instagram section
 *  - Copyright and Back to top button
 */

do_action('bunyad_pre_footer');

?>

	<?php 
		/**
		 * Default Light Footer
		 */
		if (!Bunyad::options()->footer_layout): 
	?>

	<footer class="main-footer">

		<?php if (Bunyad::options()->footer_upper && is_active_sidebar('contentberg-footer')): ?>	
		
		<section class="upper-footer">
			<div class="wrap">
				
				<ul class="widgets ts-row cf">
					<?php dynamic_sidebar('contentberg-footer'); ?>
				</ul>

			</div>
		</section>
		
		<?php endif; ?>
		
		
		<?php if (is_active_sidebar('contentberg-instagram')): ?>
		
		<section class="mid-footer cf">
			<?php dynamic_sidebar('contentberg-instagram'); ?>
		</section>
		
		<?php endif; ?>
		

		<?php if (Bunyad::options()->footer_lower): ?>
		
		<section class="lower-footer cf">
			<div class="wrap">
				<p class="copyright"><?php 
					echo do_shortcode(
						wp_kses_post(Bunyad::options()->footer_copyright) 
					); ?>
				</p>
				
				<?php if (Bunyad::options()->footer_back_top): ?>
				<div class="to-top">
					<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i> <?php esc_html_e('Top', 'contentberg'); ?></a>
				</div>
				<?php endif; ?>
			</div>
		</section>
		
		<?php endif; ?>
	
	</footer>
	
	
	<?php 
		/**
		 * Contrast/Dark Footer OR Alternate Footer Style  
		 */
		else: 
		
			get_template_part('partials/footer/layout-' . sanitize_file_name(Bunyad::options()->footer_layout));
		
		endif;
	?>
	
	
</div> <!-- .main-wrap -->


<?php

$mobile_menu = 'contentberg-mobile';

// Fallback to main menu for AMP if mobile is missing
if (!has_nav_menu('contentberg-mobile') && Bunyad::amp()->active()) {
	$mobile_menu = 'contentberg-main';
}

?>

<div class="mobile-menu-container off-canvas" id="mobile-menu">

	<a href="#" class="close"><i class="fa fa-times"></i></a>
	
	<div class="logo">
		<?php Bunyad::get('helpers')->mobile_logo(); ?>
	</div>
	
	<?php if (has_nav_menu($mobile_menu)): ?>

		<?php 
		wp_nav_menu(array(
			'container' => '', 
			'menu_class' => 'mobile-menu', 
			'theme_location' => $mobile_menu,
			'walker' => class_exists('Bunyad_Theme_Amp_MenuWalker') ? new Bunyad_Theme_Amp_MenuWalker : ''
		)); 
		?>

	<?php else: ?>
	
		<ul class="mobile-menu"></ul>

	<?php endif;?>
</div>

<?php get_template_part('partials/search-modal'); ?>

<?php wp_footer(); ?>
<div class="targeting" style="display:none;">

  <img src="https://tags.w55c.net/rs?id=077a817f5bdd4647914945dfd54adf5d&t=homepage" />

</div>
<?php if(1==3) { ?>
    <div class="bottom-sticky" id="bottom_sticky">
        <div class="bottom-sticky-copy-container">
            <div class="bsh-text">I need help with my addiction</div>
            <div class="bd-container">
                <button role="button" class="" tabindex="0" id="who-answer" data-micromodal-trigger="modal-helpline-disclaimer">
                    <i class="fa fa-info-circle" aria-hidden="true"></i> Who Answers?
                </button>                    
            </div>
	    <div class="bd-container">
                <button><a style="color: #6faf73;font-size: 1em;font-weight: 600;" href="https://support.intherooms.com/index.php?a=add">I need tech support</a></button>
            </div>
        </div>
        <div class="bottom-sticky-button-main-container">
            <div class="bottom-sticky-button-container">
                <a class="bottom-sticky-button-link" href="tel:8885326556">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                </a>
                <span>(888) 532-6556</span>
            </div>
        </div>
	<div class="bottom-sticky-button-container">
                <a class="bottom-sticky-button-link" href="https://www.compassdetox.com/insurance-verification/">
                    <img src="https://www.buprenorphine-doctors.com/wp-content/uploads/2020/02/imgpsh_benefits.png" alt="" style="width: 32px;margin: 0 auto;margin-top: 3px;">
                </a>
                <span>Check Benefits</span>
        </div>
    </div>
<script>
jQuery(window).scroll(function() {    
    var scroll = jQuery(window).scrollTop();

    if (scroll >= 180) {
        jQuery(".bottom-sticky").addClass("bottom-sticky-show");
    } else {
        jQuery(".bottom-sticky").removeClass("bottom-sticky-show");
    }
});
</script>
 <!-- Start - bottom sticky -->   
<style>
.bottom-sticky {
    position: fixed;
    z-index: 5;
    width: 100%;
    bottom: 0;
    display:none;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    background: #fff;
    -webkit-box-shadow: 0 0 8px 0 rgba(0,0,0,.5);
    box-shadow: 0 0 8px 0 rgba(0,0,0,.5);
    height: 100px;
    padding: 0 1em;
}
/*.bottom-sticky-hide {
    display: none;
    -webkit-transition: .6s ease-in-out;
    transition: .6s ease-in-out;
}*/
.bottom-sticky-show {
    display: -webkit-box;
    display: -ms-flexbox;
    display:flex;
    -webkit-transition: .6s ease-in-out;
    transition: .6s ease-in-out;
    z-index: 100;
}
.bottom-sticky-copy-container {
    margin: 0;
}
.bsh-text {
    font-family:inherit;
    font-size: 15px;
    font-weight: 700;
    margin-bottom: 10px;
    text-align: inherit;
    line-height: 1.5em;
}
.bd-container {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}
.bd-container button{
	background-color:transparent;
	border:none;
	outline:none;
	font-size:0.8em;
	line-height:normal;
	font-weight:300;
	color:#6faf73;
	padding:0;
        font-weight: 600;
}
.bd-container button:hover{
	color:#5596c0;
}
.bottom-sticky-button-main-container {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}
.bottom-sticky-button-container{
	margin:0;
	display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
}
.bottom-sticky-button-link{
	width: 56px;
    height: 56px;
    background-color: #6faf73;
    border-radius:50%;
	-webkit-border-radius:50%; 
	-moz-border-radius:50%;
	-khtml-border-radius:50%;
	text-align:center;
	display: table;
	
}
.bottom-sticky-button-link:hover{
    background-color:#5596c0;
}
.bottom-sticky-button-link .fa{
	color:#FFFFFF;
	display: table-cell;
    vertical-align: middle;
	font-size:1.5em;
}
.bottom-sticky-button-container span{
	font-size: 0.67em;
    font-weight: 500;
    text-align: center;
    height: 25px;
    margin-top: 5px;
}
@media (min-width: 768px){
#itr-call-up-light{ 
    position: fixed;
    top: 50px;
}
.bottom-sticky-copy-container {
    margin-right: 60px;
}
.bottom-sticky {
	-webkit-box-pack: center;
	-ms-flex-pack: center;
	justify-content: center;
}
.bsh-text {
    font-size: 20px;
    text-align: start;
}
.bottom-sticky-button-container{
	margin:0 0.7em;
}
.bottom-sticky-button-container span{
	font-size: 0.75em;
	font-weight: 700;
}
}
</style>
<div class="black_overlay" id="fade_reg"></div>	
<div class="itr-popup" id="itr-call-up-light">
    <div class="close" id="itr-call-up-c">x</div>
    <div class="hding">
        <h3>Who Answers this Call?</h3>
    </div>
    <p style="text-align:left;">This phone line is answered by Compass Hotline, which is sponsored by Compass Detox, our drug and alcohol addiction treatment facility sponsor.</p>
    <p style="text-align:left;">To discover alternative addiction treatment options, please visit the <a style="color:#4F91CD;" href="https://intherooms.com/home/find-treatment-center/">Substance Abuse and Mental Health Services Administration Treatment Locator</a> the <a style="color:#4F91CD;" href="https://alcoholtreatment.niaaa.nih.gov/?campaign=ITR">National Institute on Alcohol Abuse and Alcoholism Alcohol Treatment Navigator</a>.</p>
</div>
<script>
// Register Modal
jQuery(function($){
    $('#who-answer').click(function(){
       $('#fade_reg, #itr-call-up-light').show(); 
	   $("html, body").delay(2000).animate({scrollTop: $('#itr-call-up-light').offset().top }, 2000);
    });
    $('#itr-call-up-c').click(function(){
        $('#fade_reg, #itr-call-up-light').hide();
    });    
});
$(document).ready(function(){
    $('#viewOnlineMeetingsScheduleButton').click(function() {
        $("html, body").animate({scrollTop: $('#upcomingLiveOnlineMeetings').offset().top }, 500);
    });
});
</script>
<?php } ?>
<?php
//if(!wp_is_mobile()){
if(1==4){
    if(is_front_page()){ ?>
	<script type="text/javascript"> var infolinks_pid = 3209696; var infolinks_wsid = 0; </script> <script type="text/javascript" src="//resources.infolinks.com/js/infolinks_main.js"></script>
<?php } else { ?>
	<script type="text/javascript"> var infolinks_pid = 3209696; var infolinks_wsid = 0; </script> <script type="text/javascript" src="//resources.infolinks.com/js/infolinks_main.js"></script> 
<?php } } ?>
        
<style>
    .overlay1 {
        background-color: rgba(0,0,0,0.7);
        display: none;
        height: 100%;
        left: 0;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1001;
    }
    .itr-popup1{
        width: 35%;
        background: #ffffff;
        border: 1px solid #fdf4f2;
        padding: 0.7em 0.7em 2em 0.7em;
        margin: 0 auto;
        text-align: center;
        position: absolute;
        left: 0;
        right: 0;
        top: 50px;
        z-index: 1002;
        opacity: 1;
    }
    @media(max-width:991px){
        .itr-popup1{
                width:60%;
        }
    }
    @media(max-width:767px){
          .itr-popup1{
                  width:90%;
          }
    }
</style>
<style>.itrpcta-cta{align-content:center;align-items:center;background-color:#69c;bottom:0;box-shadow:0 0 10px rgba(0,0,0,.25);box-shadow:0 0 5px rgba(59,39,39,.4);display:flex;font-family:Open Sans,sans-serif;font-size:16px;font-weight:600;justify-content:center;justify-items:center;left:0;line-height:1.2;min-height:50px;position:fixed;width:100%;z-index:1000}.itrpcta-cta .primary{text-align:center}.itrpcta-cta .primary .mobile-message{align-items:center;color:#fff;display:flex;justify-content:center;padding:5px 10px 0}.itrpcta-cta .primary .desktop-message,.itrpcta-cta .primary .number-wrapper .number,.itrpcta-cta .primary .secondary-message{display:none}.itrpcta-cta .who_answers{color:#fff;cursor:pointer;display:flex;font-size:11px;font-weight:600;justify-content:center;line-height:1;margin-bottom:10px}.itrpcta-cta .who_answers svg{height:11px;margin-right:3px}.itrpcta-cta .primary a{align-items:center;display:inline-flex;justify-content:center;padding:5px 10px 7px;text-decoration:none}.itrpcta-cta .fa-stack{align-items:center;display:inline-flex;height:2em;line-height:2em;position:relative;vertical-align:middle;width:2em}.itrpcta-cta .fa-stack svg,.itrpcta-cta .fa-stack svg:first-child{left:0;position:absolute;text-align:center;width:100%}.itrpcta-cta .fa-stack svg:first-child{fill:#13a7dd}@media (min-width:768px){.itrpcta-cta{background-color:#69c;color:#170939;display:inline-flex;justify-content:center}.itrpcta-cta .primary .mobile-message{display:none}.itrpcta-cta .primary .desktop-message{display:inline-flex;font-size:20px}.itrpcta-cta .primary .message-wrapper{background:#fff275;border-radius:4px;color:#fff;display:flex;padding:10px;background-color:#6faf73}.itrpcta-cta .fa-stack{height:auto}.itrpcta-cta .fa-stack svg:first-child{display:none}.itrpcta-cta .primary .number-wrapper{display:inline-flex}.itrpcta-cta .primary .number-wrapper .number{display:inline-flex;font-size:20px;font-weight:700}.itrpcta-cta .fa-stack svg{fill:#fff;left:0;position:absolute;text-align:center;width:100%}}@media (min-width:1200px){.itrpcta-cta{display:inline-flex;justify-content:space-evenly}.itrpcta-cta .primary .secondary-message{color:#fff;display:inline-flex}.itrpcta-cta .primary{align-content:center;align-items:center;display:inline-flex;justify-content:center}.itrpcta-cta .who_answers{margin-top:8px}}
.itrpcta-cta {
    display: block!important;
    text-align: center!important;
}
@media (min-width:768px) and (max-width:1199px){
	.itrpcta-cta .primary .mobile-message {
		display: block;
	}
}
    @media(max-width:767px){
    .itrpcta-cta {
        display: block!important;
        text-align: center!important;
    }
    .itrpcta-cta .primary .mobile-message{
                  display:block!important;
    }
    .itrpcta-cta .primary .message-wrapper1 {
        background: #fff275;
        border-radius: 4px;
        color: #fff;
        display: block;
        padding: 3px;
        background-color: #6faf73;
        margin-bottom: 5px;
    }
    .itrpcta-cta .fa-stack svg {
            fill: #fff;
            left: 0;
            position: absolute;
            text-align: center;
            width: 100%;
    }
    .itrpcta-cta .fa-stack svg:first-child{
            fill:none;
    }
}
</style>
<div class="overlay1">
    <div class="itr-popup1">
        <div class="close" id="itr-ad-c">x</div>
        <div class="hding" style="margin-bottom: 0px;">
           <h3>Who Answers?</h3>
           <p style="color: #000;line-height: initial;text-align: left;line-height: 2em;padding: 20px 20px 0px 20px;">Calls to the general helpline will be answered by a paid advertiser of one of our treatment partners.</p>
        </div>
    </div>
</div>
<script>
jQuery(function($){
   $('#itr-who-answers').click(function(){
          $('.overlay1').show(); 
                          $('html, body').delay(2000).animate({scrollTop: $('#itr-ad-light').offset().top }, 2000);
      });
   $('#itr-ad-c').click(function(){
          $('.overlay1').hide();
      });

    var is_mobile= '<?= wp_is_mobile() ? '1' : '0'?>;';
    $('.phone_number_click').click(function(){
          //console.log($( this ).data( "phone_number_type" ));
          
          var data = {
		'action': 'store_click_phone_number',
		'is_mobile': is_mobile,
		'link_value': $(this).attr("href"),
		'phone_number_type': $( this ).data( "phone_number_type" )     // We pass php values differently!
            };
	// We can also pass the url value separately from ajaxurl for front end AJAX implementations
	jQuery.post("<?php echo admin_url('admin-ajax.php'); ?>", data, function(response) {
		//alert('Got this from the server: ' + response);
	});
    });

   });
</script>
<div id="itrpcta-cta" class="itrpcta-cta">
    <div class="primary">
        <a class="link phone_number_click" data-phone_number_type='footer-number' href="tel:8884011241">
        <?php
        if(wp_is_mobile())
        {
        ?>
        <div class="mobile-message">
            <h2 style="color: #fff!important;font-size: 18px;padding-bottom: 10px;">Get Help Now - Call 24/7</h2>
            <div style="clear:both"></div>

            <div class="message-wrapper1">
            <span class="fa-stack">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                   <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                </svg>
                <svg fill="rgb(248, 205, 28)" width="16px" height="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                   <path d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z"></path>
                </svg>
            </span>
            <span class="number">888-401-1241</span></div>
	</div>
        <?php
        }
        else
        {
        ?>
	<span class="message-wrapper">
            <span class="desktop-message">Get Help Now - Call 24/7</span>
            <span class="number-wrapper">
                <span class="fa-stack">
                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                      <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                   </svg>
                   <svg fill="rgb(248, 205, 28)" width="16px" height="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                      <path d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z"></path>
                   </svg>
                </span>
               <span class="number">888-401-1241</span>
            </span>
        </span>
        <?php
        }
        ?>
        </a>
        <span class="secondary-wrapper">
            
           <span class="secondary-message">
           
            100% Confidential</span>
           <div id="itr-who-answers" class="who_answers" href="#who_answers">
           <?php
            if(wp_is_mobile())
            {
            ?>
            <small style="padding-right:4px;">100% Confidential</small>
            <?php
            }
            ?>
              <svg fill="rgb(248, 205, 28)" width="11px" height="11px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                 <path d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path>
              </svg>
              Who Answers?
           </div>
        </span>
    </div>
</div>
<script type="text/javascript">    
    (function () {
		function addClass(el, cls) {
			if (!el.className.match('(?:^|\\s)' + cls + '(?!\\S)')) { el.className += ' ' + cls; }
		}
		function hasClass(el, cls) {
			if (el.className.match('(?:^|\\s)' + cls + '(?!\\S)')) { return true; }
		}
		function delClass(el, cls) {
			el.className = el.className.replace(new RegExp('(?:^|\\s)' + cls + '(?!\\S)'), '');
		}
		function tabCloseMenu() {
			var navActive = document.querySelectorAll('#menu li.active');
			for (var i = 0; i < navActive.length; i++) {
				delClass(navActive[i], 'active');
			}
		}
		var navUL = document.querySelector('#menu > div > div > ul'),
			navA = document.querySelectorAll('#menu li a'),
			prevLi, nextLi;
		navUL.addEventListener('blur', tabCloseMenu); // remember to put tabindex="0" on main menu ul
		navUL.addEventListener('mouseleave', tabCloseMenu);
		navA[navA.length - 1].addEventListener('blur', tabCloseMenu);
		for (var i = 0; i < navA.length; i++) {
			navA[i].addEventListener('focus', function () {
				if (this.parentNode.querySelector('#menu ul ul')) { addClass(this.parentNode, 'active'); }
				prevLi = this.parentNode.previousElementSibling;
				if (prevLi && hasClass(prevLi, 'active')) { delClass(prevLi, 'active'); }
				nextLi = this.parentNode.nextElementSibling;
				if (nextLi && hasClass(nextLi, 'active')) { delClass(nextLi, 'active'); }
			});
		}
	})();

    </script>
</body>
</html>
