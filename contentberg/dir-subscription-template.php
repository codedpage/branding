<?php
/* Template Name: Dir Subscription */
get_header();
?>
<link rel="stylesheet" type="text/css" href="http://local.itr.com/example-styles.css">
<script type="text/javascript" src="http://local.itr.com/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="http://local.itr.com/jquery.multi-select.js"></script>
<?php
include('dir-submission-form-free-new.php');
include('dir-submission-form-basic5.php');
include('dir-submission-form-basic29.php');
include('dir-submission-form-featured69.php');
if (comments_open()){
    //comments_template();
}
if(!empty($_POST['selected_option']) && $_POST['selected_option']  == 'free')
{
    form_free();
}
else if(!empty($_POST['selected_option']) && $_POST['selected_option']  == 'pro')
{
    form_pro();
}
else if(!empty($_POST['selected_option']) && $_POST['selected_option']  == 'gold')
{
    form_gold();
}
else if(!empty($_POST['selected_option']) && $_POST['selected_option']  == 'platinum')
{
    form_platinum();
}
//if ( isset($_GET['type'] ) && $_GET['type'] == 'basic' ) { 
//    form_free();
//}
//elseif( isset($_GET['type'] ) && $_GET['type'] == 'gold' ) { 
//    form_basic();
//}
//elseif( isset($_GET['type'] ) && $_GET['type'] == 'platinum' ) {
//    form_featured();
//}
//else { ?>
<!--<div class="all-font">
		<div class="txt-cntr m-b">
		<p class="p-1"><strong>List your Practice on In The Rooms</strong></p>
		<p class="p-2">Help those seeking addiction treatment find your treatment center or medical services.</p>
		</div>
		<div class="box-hold">
				<div class="container-my">
				<div class="row-my">	
				<div class="col-4-my m-b-2">
					<div class="box-shdow">
						<div class="gredient-hold box-hding">Basic</div>
						<div class="plan-mnth"><p class="box-hding-p"><span class="mnth-value">$5</span>/month</p><a href="//<?php echo get_home_url();?>/directory-subscription/?type=basic"><button class="sel-btn">SELECT</button></a></div>
						<div class="feature-list">
							<ul type="none" class="list-ul">
								<li class="list-style"><span class="all-font">Address</span></li>
								<li class="list-style"><span class="all-font">Phone number</span></li>
								<li class="list-style text-muted"><span class="all-font">Website link</span></li>
								<li class="list-style text-muted"><span class="all-font">Priority ranking in search results</span></li>
								<li class="list-style text-muted"><span class="all-font">Upgraded listing size</span></li>
								<li class="list-style text-muted"><span class="all-font">Dedicated listing page with map</span></li>
								<li class="list-style text-muted"><span class="all-font">Description</span></li>
								<li class="list-style text-muted"><span class="all-font">Image</span></li>
								<li class="list-style text-muted"><span class="all-font">Star banner marker</span></li>
								<li class="list-style text-muted"><span class="all-font">Featured article about your practice</span></li>
								<li class="list-style text-muted"><span class="all-font">Additional placements across the website</span></li>
								<li class="list-style text-muted"><span class="all-font">Feature in member email sends</span></li>
								<li class="list-style text-muted"><span class="all-font">Discounts on other advertising packages</span></li>
								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-4-my m-b-2">
					<div class="box-shdow">
						<div class="gredient-hold box-hding">Gold</div>
						<div class="plan-mnth"><p class="box-hding-p"><span class="mnth-value">$29</span>/month</p><a href="//<?php echo get_home_url();?>/directory-subscription/?type=gold"><button class="sel-btn">SELECT</button></a></div>
						<div class="feature-list">
							<ul type="none" class="list-ul">
								<li class="list-style"><span class="all-font">Address</span></li>
								<li class="list-style"><span class="all-font">Phone number</span></li>
								<li class="list-style"><span class="all-font">Website link</span></li>
								<li class="list-style"><span class="all-font">Priority ranking in search results</span></li>
								<li class="list-style"><span class="all-font">Upgraded listing size</span></li>
								<li class="list-style"><span class="all-font">Dedicated listing page with map</span></li>
								<li class="list-style text-muted"><span class="all-font">Description</span></li>
								<li class="list-style text-muted"><span class="all-font">Image</span></li>
								<li class="list-style text-muted"><span class="all-font">Star banner marker</span></li>
								<li class="list-style text-muted"><span class="all-font">Featured article about your practice</span></li>
								<li class="list-style text-muted"><span class="all-font">Additional placements across the website</span></li>
								<li class="list-style text-muted"><span class="all-font">Feature in member email sends</span></li>
								<li class="list-style text-muted"><span class="all-font">Discounts on other advertising packages</span></li>
								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-4-my m-b-2">
					<div class="box-shdow">
						<div class="gredient-hold box-hding">Platinum</div>
						<div class="plan-mnth">
							<p class="hding-badge">BEST VALUE</p>
							<p class="box-hding-p"><span class="mnth-value">$69</span>/month</p><a href="//<?php echo get_home_url();?>/directory-subscription/?type=platinum"><button class="sel-btn selected-plan">SELECT</button></a></div>
						<div class="feature-list">
							<ul type="none" class="list-ul">
								<li class="list-style"><span class="all-font">Address</span></li>
								<li class="list-style"><span class="all-font">Phone number</span></li>
								<li class="list-style"><span class="all-font">Website link</span></li>
								<li class="list-style"><span class="all-font">Priority ranking in search results</span></li>
								<li class="list-style"><span class="all-font">Upgraded listing size</span></li>
								<li class="list-style"><span class="all-font">Dedicated listing page with map</span></li>
								<li class="list-style"><span class="all-font">Description</span></li>
								<li class="list-style"><span class="all-font">Image</span></li>
								<li class="list-style"><span class="all-font">Star banner marker</span></li>
								<li class="list-style"><span class="all-font">Featured article about your practice</span></li>
								<li class="list-style"><span class="all-font">Additional placements across the website</span></li>
								<li class="list-style"><span class="all-font">Feature in member email sends</span></li>
								<li class="list-style"><span class="all-font">Discounts on other advertising packages</span></li>
								
							</ul>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>	
	</div>-->
<?php //} ?>
<style>
				
		*, ::after, ::before { box-sizing: border-box;}
		.sel-btn{ background-color: #fff; border: 1px solid #6faf73; box-shadow: inset 0 0 3px 1px #d0d0d0; color: #6faf73; font-weight: 500; font-size: 1.2em; line-height: 1.1em; padding: 0.5em 2.5em;    transition: all 0.40s ease-in-out;cursor: pointer;}
		.sel-btn:hover, .selected-plan{background-color: #6faf73;border: 1px solid #6faf73; box-shadow: none; color: #fff;    transition: all 0.40s ease-in-out;cursor: pointer;}
		.box-hold{text-align:center;margin-bottom:2em;}
		.mnth-value{font-size: 1.7em;line-height: 1.5em;}
		.box-hding{color: #fff;font-size: 1.3em;line-height: 1.2em;font-weight: 300;padding: 1.5em 0.5em;}
		.all-font{margin-top: 4em;}
		.txt-cntr{text-align: center;}
		.whit-colr{color:#ffffff;}
		.blu-colr{color:#5091cd;}
		.text-muted {opacity: 0.3;}
		.m-b{margin-bottom: 4em;}
		.main-hold{margin-top:10px;margin-bottom: 10px;}
		.p-1{font-size: 2em;line-height: 2.1em;font-weight: 100; margin-bottom: 2px;}
		.p-2{font-size: 1.2em;line-height: 1.3em;font-weight: 100; margin-top: 5px;}
		.m-b-2{margin-bottom:2em;}
		.box-hding-p{margin-top: 0; margin-bottom: 20px;}
		.plan-mnth{margin-top:2em;margin-bottom:2em;}
		.feature-list{text-align:left;padding: 0 3em;}
		.gredient-hold{background-image: -webkit-linear-gradient(left, #5596c0, #6faf73);background-image: -o-linear-gradient(left, #5596c0, #6faf73);background-image: linear-gradient(to right, #5596c0, #6faf73);width: 100%;}
		.box-shdow{border: 1px solid #e6e5e5;box-shadow: 0px 3px 6px #bbb8b8;-webkit-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s; transition: all 0.3s ease 0s;}
		.list-style{font-size: 16px;line-height: 18px;margin: 1.5em 0; font-family: "FontAwesome";padding-left: 30px; position: relative;}
		.list-style:before { content: "\f05d";    font-weight: 300;    -webkit-font-smoothing: antialiased;
    display: inline-block;font-style: normal; font-variant: normal; text-rendering: auto; line-height: 1;position: absolute;color: #5090cd; margin-right: 12px;left: 0;font-size:27px; }
		.hding-badge{ border: 1.5px solid #5091cd; color: #5091cd; font-size: 14px; padding: 5px; max-width: 150px;
    margin: -50px auto 16px auto; background-color: #fff;}
		.list-ul{padding-left:0 !important;}
.row-my {display: -ms-flexbox;display: flex;-ms-flex-wrap: wrap;flex-wrap: wrap;margin-right: -15px;margin-left: -15px;}
.col-4-my{position: relative; width: 100%; padding-right: 15px;padding-left: 15px;}
.container-my { width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto;
  margin-left: auto;}

@media (min-width:576px) {
  .container-my {    max-width: 540px;  }
}

@media (min-width:768px) {
.container-my {    max-width: 720px;  }
.col-4-my {-ms-flex: 0 0 33.333333%;flex: 0 0 33.333333%; max-width: 33.333333%;}
}

@media (min-width:992px) {
  .container-my {    max-width: 960px;  }
}

@media (min-width:1200px) {
  .container-my {    max-width: 1140px;  }
}
		
@media (min-width:768px) and (max-width:991px){.feature-list { padding: 0 1em;}}
@media (max-width:529px){.p-1 { line-height: 1.1em;}}

/* FORM CSS */
.container-my{font-family: 'Open Sans', sans-serif;}
	*, ::after, ::before { box-sizing: border-box;}
	.row-my {display: -ms-flexbox;display: flex;-ms-flex-wrap: wrap;flex-wrap: wrap;margin-right: -15px;margin-left: -15px;}
	.col-4-my, .col-6-my, .col-12-my{position: relative; min-height: 1px; width: 100%; padding-right: 15px;padding-left: 15px;}
	.container-my { width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto;margin-left: auto;}
	
	.m-10 { margin-bottom: 10px; margin-top: 10px;}
	.package-frm{max-width:900px;margin:auto;}
	select, input, a, textarea, option {outline: none !important;}
	.my-frm .package-frm .row-my .frm-grp { margin-bottom: 20px;}
	.frm-cntrl { display: block; width: 100%; height: calc(1.5em + .75rem + 2px); padding: .375rem .75rem; font-weight: 400; line-height: 1.5; color: #495057; background-color: #fff; background-clip: padding-box; border: 1px solid #ced4da; border-radius: .25rem; transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;}
	
	.my-frm .package-frm input[type=date], .my-frm .package-frm input[type=email], .my-frm .package-frm input[type=number], .my-frm .package-frm input[type=password], .my-frm .package-frm input[type=tel], .my-frm .package-frm input[type=text], .my-frm .package-frm select, .my-frm .package-frm textarea {
    line-height: 46px!important; height: 39px;color: #212122;    background: none;
    -webkit-box-shadow: none;box-shadow: none;border: 1px solid #b4b4b4;padding: 0 40px 0 15px;font-size: 14px; width: 100%;border-radius: 0; -webkit-transition: border-color 0.3s ease; -o-transition: border-color 0.3s ease;
    transition: border-color 0.3s ease;}
	
	input:not([type="button"]):not([type="submit"]) { line-height: normal !important; max-width: 100% !important;}
	.frm-top-hding{font-size: 28px;line-height: 1.2;font-weight: 400; margin-bottom: 10px;}
	.divider-line{margin: 1em 0 2em 0;}
	
	.proceed-btn {padding: 14px 35px; background: #6faf73; box-shadow: 0 2px 3px rgba(110, 110, 110, 0.25); color: #fff; font-size: 12px; font-weight: 500; line-height: 1; letter-spacing: 0.1em; text-transform: uppercase; -webkit-font-smoothing: antialiased; transition: all .30s ease-in-out;border:none;}
	.proceed-btn:hover { background: #f6f6f6; color: #000;border: 1px solid #6faf73; transition: all .30s ease-in-out;}

           .sub-hding{
    font-size: 22px;
   line-height: 1.2;
   font-weight: 400;
    background-color: #efefef;
     border: 1px solid #e2e2e2;
   padding: 10px;
    text-transform: capitalize;
    margin-bottom: 20px;
}
        /*media*/
	@media (min-width:576px) {
	.container-my {    max-width: 540px;  }
	}

	@media (min-width:768px) {
	.container-my {    max-width: 720px;  }
	.col-4-my {-ms-flex: 0 0 33.333333%;flex: 0 0 33.333333%; max-width: 33.333333%;}
	}

	@media (min-width:992px) {
	.container-my {    max-width: 960px;  }
	.col-6-my {-ms-flex: 0 0 50%;flex: 0 0 50%;  width: 50%;}
	.col-12-my { width: 100%;}
	}

	@media (min-width:1200px) {
	.container-my { max-width: 1140px;  }
	}
	@media (max-width: 767.98px) and (min-width: 320px) {
	label {display: block;margin-bottom: .5rem;}
	}
	.package-frm input.form-control.error { outline: 1px solid #f00!important;}
	.error { color: #f00;}
	.package-frm select.error { border: 1px solid #f00;}
        div#payment_process {
            background: #f9d4d4;
            padding: 0px 20px;
            font-size: large;
        }

</style>
<?php get_footer();
?>


