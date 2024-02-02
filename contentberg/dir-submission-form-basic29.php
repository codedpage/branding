<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function form_gold() {
        global $wpdb;
        $states_list  =  $wpdb->get_results("SELECT * FROM {$wpdb->prefix}state where status = 1",OBJECT);
        $level_of_cares_temp = get_option( 'level_of_cares' );
        $level_of_cares = explode(',', $level_of_cares_temp);
        
	if (isset($_POST['doc_name'])) { 
            $doc_name	=   sanitize_text_field( $_POST['doc_name'] );
            $phone      =   sanitize_text_field( $_POST['phone'] );
            $add1	=   sanitize_text_field( $_POST['add1'] );
            $add2       =   sanitize_text_field( $_POST['add2'] );
            $city	=   sanitize_text_field( $_POST['city'] );
            $state	=   sanitize_text_field( $_POST['state'] );
            $zip        =   sanitize_text_field( $_POST['zip'] );
            $website    =   sanitize_text_field( $_POST['website'] );
            
            /* if (!empty($website) && !preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
              $website = "";
            } */
            
            $f_name     =   sanitize_text_field( $_POST['f_name'] );
            $l_name     =   sanitize_text_field( $_POST['l_name'] );
            $email      =   sanitize_text_field( $_POST['email'] );
            
            if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $email = "";
            }
            $c_phone    =   sanitize_text_field( $_POST['c_phone'] );
            
            global $reg_errors;
            $reg_errors = new WP_Error;
            
            if ( empty( $doc_name ) || empty( $phone ) || empty( $add1) || empty( $city ) || empty( $state ) || empty( $zip ) || empty($website) || empty($l_name) || empty($f_name) || empty($email) ) {
                $reg_errors->add('field', 'Required form field is missing');
            }
		
	} 
?>
<form class="my-frm" method="post" id="payment-form" action="<?php echo get_home_url();?>/directory-subscription/?type=gold">
<div class="container-my">
	<div class="package-frm">
	<div class="row-my">
	<div class="col-12-my m-10">
		<h3 class="frm-top-hding" style="margin-top:20px;">Add a Gold Listing</h3><hr class="divider-line">
		<?php
                if (isset($_POST['doc_name'])) {
                    if ( is_wp_error( $reg_errors ) ) {
                        foreach ( $reg_errors->get_error_messages() as $error ) {
                            echo '<div class="error">';
                            echo '<strong>';
                            echo $error . '<br/>';
                            echo '</strong></div>';
                        }
                    }
                    if(count($reg_errors->errors) == 0) {
                            $thanks_html = '
                                    </div>
                                    <div class="col-12-my">
                                        <h3 class="sub-hding">Contributor Contact Details</h3>
                                    </div>
                                    <div class="col-6-my">
                                        <p>First Name:&nbsp;&nbsp;<b>'.$f_name.'</b></p>
                                    </div>
                                    <div class="col-6-my">
                                        <p>Last Name:&nbsp;&nbsp;<b>'.$l_name.'</b></p>
                                    </div>
                                    <div class="col-6-my">
                                        <p>Email:&nbsp;&nbsp;<b>'.$email.'</b></p>
                                    </div>
                                    <div class="col-6-my">
                                        <p>Phone:&nbsp;&nbsp;<b>'.$c_phone.'</b></p>
                                    </div>
                                    <div class="col-12-my">
                                        <h3 class="sub-hding">Listing Information</h3>
                                    </div>
                                    <div class="col-6-my">
                                        <p>Treatment Center or Doctor Name:&nbsp;&nbsp;<b>'.$doc_name.'</b></p>
                                    </div>
                                    <div class="col-6-my">
                                        <p>Phone Number:&nbsp;&nbsp;<b>'.$phone.'</b></p>
                                    </div>
                                    <div class="col-6-my">
                                        <p>Address Line 1:&nbsp;&nbsp;<b>'.$add1.'</b></p>
                                    </div>
                                    <div class="col-6-my">
                                        <p>Address Line 2:&nbsp;&nbsp;<b>'.$add2.'</b></p>
                                    </div>
                                    <div class="col-6-my">
                                        <p>City:&nbsp;&nbsp;<b>'.$city.'</b></p>
                                    </div>
                                    <div class="col-6-my">
                                        <p>State:&nbsp;&nbsp;<b>'.$state.'</b></p>
                                    </div>
                                    <div class="col-6-my">
                                        <p>Zip Code:&nbsp;&nbsp;<b>'.$zip.'</b></p>
                                    </div>
                                    <div class="col-6-my">
                                        <p>Website:&nbsp;&nbsp;<b>'.$website.'</b></p>
                                    </div>
                                    <div class="col-12-my">
                                        <h3 class="sub-hding">Order Summary</h3>
                                        <p><b>Gold Listing Monthly Subscription</b><br>$29.00 today, then $29.00/month<br>Your subscription will continue until cancelled.<br><br>Total: $29.00</p>
                                    </div>
                                    <div class="col-12-my">
                                        <h3 class="sub-hding">Payment Details</h3>
                                        <div id="payment_process"></div>
                                    </div>
                                    <div id="full_payment_area" class="row-my" style="margin-left: 15px;">
                                        <div class="col-12-my">
                                            <div class="form-row">
                                                <div class="form-group col-6-my">
                                                    <label for="firstname">Name on Card</label>
                                                    <input class="form-control"  style="color: #32325d;border: none;border-bottom: 1px solid #ccc;padding-left: 0;" type="text" name="fname" id="card-name" data-tid="elements_examples.form.name_placeholder" placeholder="Jane Doe" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12-my">&nbsp;</div>
                                        <div class="col-12-my">
                                            <div class="form-row">
                                                <div class="form-group col-6-my">
                                                    <label for="" id="card-element"></label><!-- A Stripe Element will be inserted here. -->
                                                    <label for="" id="card-errors" role="alert"></label><!-- Used to display form errors. -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12-my">&nbsp;</div>
                                        <div class="col-12-my">
                                            <div class="form-row">
                                                <div class="form-group col-6-my">
                                                    <label for="">Amount : $29.00</label>
                                                </div>
                                                <div class="form-group col-6-my">
                                                    <button id="payment-button" class="btn btn-info">Submit Payment</button>
                                                </div>
                                            </div>
                                        </div>
                                        </div>	
                                    </div><!-- full_payment_area end here -->
                                    
                                    <!-- Stripe payment area start here -->
                                    <script src="https://js.stripe.com/v3/"></script>
                                    <script type="text/javascript"> 
                                    /* Create a Stripe client */
                                    var stripe = Stripe("pk_test_51Mne95HZuGuJ7noYJTCb7yST7LWfN5H362x6ObC8SiZT2indjq5P5pG51AG1gQKRVuPDAEQVaXLIlkfbZ3PKCAwN00ahy44O5g");
                                    //var stripe = Stripe("pk_test_HoUb9XZhaQbCuUJGPNyHyjKx");
                                    /* Custom styling can be passed to options when creating an Element */
                                    /* (Note that this demo uses a wider set of styles than the guide below.) */
					var style = {
						base: {
							color: "#32325d",
							lineHeight: "18px",
							fontSmoothing: "antialiased",
							fontSize: "16px",
							"::placeholder": {
								color: "#aab7c4"
							}
						},
					invalid: {
						color: "#fa755a",
						iconColor: "#fa755a"
					}
					};

                                    /* Create an instance of Elements */
					var elements = stripe.elements();
				
                                    /* Create an instance of the card Element. */
					var card = elements.create("card", {style: style});
				
                                    /* Add an instance of the card Element into the `card-element` <div>. */
					card.mount("#card-element");
					
                                    /* Handle real-time validation errors from the card Element. */
					card.addEventListener("change", function(event) {
                                            var displayError = document.getElementById("card-errors");
                                            if (event.error) {
                                                    displayError.textContent = event.error.message;
                                                    paymentButton.disabled = false;
                                            } else {
                                                    displayError.textContent = "";
                                            }
                                        });

                                    var ownerInfo = {
                                        owner: {
                                            name: "'.$f_name." ".$l_name.'",
                                            address: {
                                              line1: "'.$add1.$add2.'",
                                              city: "'.$city.'",
                                              postal_code: "'.$zip.'",
                                              country: "US",
                                            },
                                            email: "'.$email.'"
                                        },
                                    };
			
                                /* Handle form submission. */
				var form = document.getElementById("payment-form");
				var paymentButton = document.getElementById("payment-button");
				
				form.addEventListener("submit", function(event) { 
                                    event.preventDefault();
                                    paymentButton.disabled = true;
                                    stripe.createSource(card, ownerInfo).then(function(result) {
					if (result.error) {
                                            /* Inform the user if there was an error */
                                            var errorElement = document.getElementById("card-errors");
                                            errorElement.textContent = result.error.message;
                                            paymentButton.disabled = false;
					} else {
                                            /* Send the source to your server */
                                            stripeSourceHandler(result.source);
                                        }
                                    });
                                });
				
                                function stripeSourceHandler(source) {
                                    /* Insert the source ID into the form so it gets submitted to the server */
                                    var form = document.getElementById("payment-form");
                                    var hiddenInput = document.createElement("input");
                                    hiddenInput.setAttribute("type", "hidden");
                                    hiddenInput.setAttribute("name", "stripeSource");
                                    hiddenInput.setAttribute("value", source.id);
                                    form.appendChild(hiddenInput);
                                    jQuery.ajax({
                                        type : "POST",
                                        dataType : "json",
                                        url : "'.admin_url( 'admin-ajax.php' ).'",
                                        data : {
                                           card_name: jQuery("#card_name").val(),
                                           card_no: jQuery("#card_no").val(),
                                           exp_date: jQuery("#exp_date").val(),
                                           cvv: jQuery("#cvv").val(),
                                           f_name: "'.$f_name.'",
                                           l_name: "'.$l_name.'",
                                           email: "'.$email.'",
                                           c_phone: "'.$c_phone.'",
                                           doc_name: "'.$doc_name.'",
                                           add1: "'.$add1.'",
                                           add2: "'.$add2.'",
                                           city: "'.$city.'",
                                           state: "'.$state.'",
                                           zip: "'.$zip.'",
                                           phone: "'.$phone.'",
                                           website: "'.$website.'",
                                           stripeSource: source.id,    
                                           listing_type: "basic",
                                           action: "pay_basic"
                                        },
                                        beforeSend: function() {
                                           jQuery("#payment-button").attr("disabled", true);
                                           jQuery("#payment-button").after(\'<img id="loading_gif" src="https://www.intherooms.com/home/wp-content/uploads/2020/04/2.gif" style="width: 30px;margin-left: 25px;position: absolute;top: 5px;">\');
                                           //jQuery("#payment_process").html(\'<div class="alert alert-info"><i class="fa fa-info-circle"></i> Please wait!</div>\');
                                        },
                                        complete: function() {
                                               jQuery("#payment-button").attr("disabled",false);
                                               jQuery("#loading_gif").remove();
                                        },
                                        success: function(json) {
                                               if (json["error"]) {
                                                   jQuery("#payment_process").html(\'<div class="alert alert-danger">\' + json["error"] + \'</div>\');
                                                   jQuery("html, body").animate({ scrollTop: jQuery("#payment_process").offset().top }, 1000);
                                               }
                                               if (json["success"]) {
                                                   window.location.replace("https://www.intherooms.com/home/successful-payment/");
						   jQuery("#payment_process").html("");    
                                                   jQuery("#full_payment_area").html("<p>Thank you for the payment!<br>You request for your listing to be added to our directory has been received.<br>Your listing will be reviewed within the next two business days.  Once this review process has been completed you will receive an email confirming that your listings are live and where you can see them.<br>If you have any questions please email us at contact@intherooms.com</p>");
                                                   //jQuery("html, body").animate({ scrollTop: jQuery("#payment_process").offset().top }, 1000);
                                               }
                                           }
                                    });
                                    //form.submit();  /* Submit the form */
                                }
                                </script>
                                    <script>
                                    jQuery(function($) {
                                        $("#exp_date").on("input",function(){
                                            var curLength = $(this).val().length;
                                            if(curLength === 2){
                                               var newInput = $(this).val();
                                                newInput +="/";
                                                $(this).val(newInput);
                                            }
                                        });
                                        $("#card_no").on("keypress change", function () {
                                            $(this).val(function (index, value) {
                                                    return value.replace(/\W/gi, "").replace(/(.{4})/g, "$1 ");
                                            });
                                        });
                                        $("body").on("click", "#paypal_featured", function(e){
                                            e.preventDefault();
                                            $.ajax({
                                                 type : "POST",
                                                 dataType : "json",
                                                 url : "'.admin_url( 'admin-ajax.php' ).'",
                                                 data : {
                                                    card_name: $("#card_name").val(),
                                                    card_no: $("#card_no").val(),
                                                    exp_date: $("#exp_date").val(),
                                                    cvv: $("#cvv").val(),
                                                    f_name: "'.$f_name.'",
                                                    l_name: "'.$l_name.'",
                                                    email: "'.$email.'",
                                                    c_phone: "'.$c_phone.'",
                                                    doc_name: "'.$doc_name.'",
                                                    add1: "'.$add1.'",
                                                    add2: "'.$add2.'",
                                                    city: "'.$city.'",
                                                    state: "'.$state.'",
                                                    zip: "'.$zip.'",
                                                    phone: "'.$phone.'",
                                                    website: "'.$website.'",
                                                    listing_type: "basic",
                                                    action: "pay_basic"
                                                 },
                                                 beforeSend: function() {
                                                    $("#paypal_featured").attr("disabled", true);
                                                    $("#payment_process").html(\'<div class="alert alert-info"><i class="fa fa-info-circle"></i> Please wait!</div>\');
                                                 },
                                                 complete: function() {
                                                        $("#paypal_featured").attr("disabled",false);
                                                 },
                                                 success: function(json) {
                                                        if (json["error"]) {
                                                            $("#payment_process").html(\'<div class="alert alert-danger">\' + json["error"] + \'</div>\');
                                                            $("html, body").animate({ scrollTop: $("#payment_process").offset().top }, 1000);
                                                        }
                                                        if (json["success"]) {
                                                            $("#payment_process").html("");    
                                                            $("#full_payment_area").html("<p>Thank you for the payment!<br>You request for your listing to be added to our directory has been received.<br>Your listing will be reviewed within the next two business days.  Once this review process has been completed you will receive an email confirming that your listings are live and where you can see them.<br>If you have any questions please email us at contact@intherooms.com</p>");
                                                            $("html, body").animate({ scrollTop: $("#payment_process").offset().top }, 1000);
                                                        }
                                                    }
                                            });
                                        });

                                    });
                                    </script>
                                    </div></div></div></div></form>';
                            echo $thanks_html;
                            return;

                        
                    }
                }
		?>
	</div>
	</div>
        <div class="row-my">
            <div class="col-12-my">
                <h3 class="sub-hding">Contributor Contact Details</h3>
            </div>    
            <div class="col-6-my">
                 <div class="frm-grp">
                    <label for="first name">First Name</label>
                    <input class="form-control <?php echo ( isset($_POST['f_name']) && empty($_POST['f_name']) )? "error": '';?>" oninput="setCustomValidity('')"  oninvalid="this.setCustomValidity('Enter First Name')" required="" type="text" name="f_name" value="<?php echo ( isset($_POST['f_name']) && empty($_POST['f_name']) )? "": $_POST['f_name'];?>">
                    <?php if(isset($_POST['f_name']) && empty($_POST['f_name'])) { ?>
                    <span class="error">Please enter First Name</span>
                    <?php } ?>
                 </div>
            </div>
            <div class="col-6-my">
                <div class="frm-grp">
                   <label for="Last name">Last Name</label>
                   <input class="form-control <?php echo ( isset($_POST['l_name']) && empty($_POST['l_name']) )? "error": '';?>" oninput="setCustomValidity('')"  oninvalid="this.setCustomValidity('Enter Last Name')"   required="" type="text" name="l_name" value="<?php echo ( isset($_POST['l_name']) && empty($_POST['l_name']) )? "": $_POST['l_name'];?>">
                   <?php if( isset($_POST['l_name']) && empty($_POST['l_name']) ) { ?>
                   <span class="error">Please enter Last Name</span>
                   <?php } ?>
                </div>
            </div>
            <div class="col-6-my">
                <div class="frm-grp">
                    <label for="email">Email</label>
                    <input class="form-control <?php echo ( isset($_POST['email']) && empty($_POST['email']) )? "error": '';?>" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Enter an email id')" type="email"  required="" name="email" value="<?php echo ( isset($_POST['email']) && empty($_POST['email']) )? "": $_POST['email'];?>">
                    <?php if( isset($_POST['email']) && empty($_POST['email']) ) { ?>
                    <span class="error">Please enter valid email</span>
                    <?php } ?>
                </div>
            </div>
            <div class="col-6-my">
                 <div class="frm-grp">
                    <label for="phone no">Phone (optional)</label>
                    <input class="form-control" type="tel" name="c_phone" maxlength="10" value="<?php echo ( isset($_POST['c_phone']) && empty($_POST['c_phone']) )? "": $_POST['c_phone'];?>">
                </div>
            </div>
            <div class="col-12-my">
                <h3 class="sub-hding">Listing Information</h3>
            </div>
            <div class="col-6-my">
                <div class="frm-grp">
                    <label for="Treatment center">Treatment Center or Doctor Name</label>
                    <input class="form-control <?php echo ( isset($_POST['doc_name']) && empty($_POST['doc_name']) )? "error": '';?>"  oninput="setCustomValidity('')"  oninvalid="this.setCustomValidity('Enter Treatment Center/Doctor Name')"  required="" type="text" name="doc_name" value="<?php echo ( isset($_POST['doc_name']) && empty($_POST['doc_name']) )? "": $_POST['doc_name'];?>">
                    <?php if( isset($_POST['doc_name']) && empty($_POST['doc_name']) ) { ?>
                    <span class="error">Please enter Treatment Center/Doctor name</span>
                    <?php } ?>
                </div>
            </div>
            <div class="col-6-my">
                <div class="frm-grp">
                    <label for="Phone Number">Phone Number</label>
                    <input class="form-control <?php echo ( isset($_POST['phone']) && empty($_POST['phone']) )? "error": '';?>" type="tel"  oninput="setCustomValidity('')"  oninvalid="this.setCustomValidity('Enter Phone No.')"  required="" name="phone" maxlength="10" value="<?php echo ( isset($_POST['phone']) && empty($_POST['phone']) )? "": $_POST['phone'];?>">
                    <?php if( isset($_POST['phone']) && empty($_POST['phone']) ) { ?>
                    <span class="error">Please enter a valid 10-digit phone number</span>
                    <?php } ?>
                </div>
            </div>
            <div class="col-6-my">
                <div class="frm-grp">
                    <label for="Address1">Address Line 1</label>
                    <input class="form-control <?php echo ( isset($_POST['add1']) && empty($_POST['add1']) )? "error": '';?>"  required=""  oninput="setCustomValidity('')"  oninvalid="this.setCustomValidity('Enter Address')"  type="text" name="add1" value="<?php echo ( isset($_POST['add1']) && empty($_POST['add1']) )? "": $_POST['add1'];?>">
                    <?php if( isset($_POST['add1']) && empty($_POST['add1']) ) { ?>
                    <span class="error">Please enter Address Line 1</span>
                    <?php } ?>
                </div>
            </div>
            <div class="col-6-my">	
                <div class="frm-grp">
                    <label for="Address2">Address Line 2</label>
                    <input class="form-control" type="text" name="add2" value="<?php echo ( isset($_POST['add2']) && empty($_POST['add2']) )? "": $_POST['add2'];?>">
                </div>
            </div>
            <div class="col-6-my">
                <div class="frm-grp">
                    <label for="City">City</label>
                    <input class="form-control <?php echo ( isset($_POST['city']) && empty($_POST['city']) )? "error": '';?>"  required=""  oninput="setCustomValidity('')"  oninvalid="this.setCustomValidity('Enter City')" type="text" name="city" value="<?php echo ( isset($_POST['city']) && empty($_POST['city']) )? "": $_POST['city'];?>">
                    <?php if( isset($_POST['city']) && empty($_POST['city']) ) { ?>
                    <span class="error">Please enter City</span>
                    <?php } ?>
                </div>
            </div>
            <div class="col-6-my">
                <div class="frm-grp">
                    <label for="state">State</label>
                    
                    <select class="frm-cntrl <?php echo ( isset($_POST['state']) && empty($_POST['state']) )? "error": '';?>" name="state">
                        <option value="">Select</option>
                        <?php
                        if(!empty($states_list))
                        {
                            foreach($states_list as  $key=>$value)
                            {
                                ?>
                                <option value="<?=$value->state_code?>" <?php echo ( isset($_POST['state']) && $_POST['state'] ==$value->state_code )? 'selected':'';?> ><?=$value->state_name?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                    <?php if( isset($_POST['state']) && empty($_POST['state']) ) { ?>
                    <span class="error">Please select state</span>
                    <?php } ?>
                </div>
            </div>
<!--            <div class="col-6-my">
                <div class="frm-grp">
		<label for="state">State</label>
                <select class="frm-cntrl <?php echo ( isset($_POST['state']) && empty($_POST['state']) )? "error": '';?>" name="state">
                    <option value="">Select</option>
                    <option value="AL" <?php echo ( isset($_POST['state']) && $_POST['state'] =='AL' )? 'selected':'';?> >Alabama</option>
                    <option value="AK" <?php echo ( isset($_POST['state']) && $_POST['state'] =='AK' )? 'selected':'';?> >Alaska</option>
                    <option value="AZ" <?php echo ( isset($_POST['state']) && $_POST['state'] =='AZ' )? 'selected':'';?> >Arizona</option>
                    <option value="AR" <?php echo ( isset($_POST['state']) && $_POST['state'] =='AR' )? 'selected':'';?> >Arkansas</option>
                    <option value="CA" <?php echo ( isset($_POST['state']) && $_POST['state'] =='CA' )? 'selected':'';?> >California</option>
                    <option value="CO" <?php echo ( isset($_POST['state']) && $_POST['state'] =='CO' )? 'selected':'';?> >Colorado</option>
                    <option value="CT" <?php echo ( isset($_POST['state']) && $_POST['state'] =='CT' )? 'selected':'';?> >Connecticut</option>
                    <option value="DE" <?php echo ( isset($_POST['state']) && $_POST['state'] =='DE' )? 'selected':'';?> >Delaware</option>
                    <option value="FL" <?php echo ( isset($_POST['state']) && $_POST['state'] =='FL' )? 'selected':'';?> >Florida</option>
                    <option value="GA" <?php echo ( isset($_POST['state']) && $_POST['state'] =='GA' )? 'selected':'';?> >Georgia</option>
                    <option value="GU" <?php echo ( isset($_POST['state']) && $_POST['state'] =='GU' )? 'selected':'';?> >Guam</option>
                    <option value="HI" <?php echo ( isset($_POST['state']) && $_POST['state'] =='HI' )? 'selected':'';?> >Hawaii</option>
                    <option value="ID" <?php echo ( isset($_POST['state']) && $_POST['state'] =='ID' )? 'selected':'';?> >Idaho</option>
                    <option value="IL" <?php echo ( isset($_POST['state']) && $_POST['state'] =='IL' )? 'selected':'';?> >Illinois</option>
                    <option value="IN" <?php echo ( isset($_POST['state']) && $_POST['state'] =='IN' )? 'selected':'';?> >Indiana</option>
                    <option value="IA" <?php echo ( isset($_POST['state']) && $_POST['state'] =='IA' )? 'selected':'';?> >Iowa</option>
                    <option value="KS" <?php echo ( isset($_POST['state']) && $_POST['state'] =='KS' )? 'selected':'';?> >Kansas</option>
                    <option value="KY" <?php echo ( isset($_POST['state']) && $_POST['state'] =='KY' )? 'selected':'';?> >Kentucky</option>
                    <option value="LA" <?php echo ( isset($_POST['state']) && $_POST['state'] =='LA' )? 'selected':'';?> >Louisiana</option>
                    <option value="ME" <?php echo ( isset($_POST['state']) && $_POST['state'] =='ME' )? 'selected':'';?> >Maine</option>
                    <option value="MD" <?php echo ( isset($_POST['state']) && $_POST['state'] =='MD' )? 'selected':'';?> >Maryland</option>
                    <option value="MA" <?php echo ( isset($_POST['state']) && $_POST['state'] =='MA' )? 'selected':'';?> >Massachusetts</option>
                    <option value="MI" <?php echo ( isset($_POST['state']) && $_POST['state'] =='MI' )? 'selected':'';?> >Michigan</option>
                    <option value="MN" <?php echo ( isset($_POST['state']) && $_POST['state'] =='MN' )? 'selected':'';?> >Minnesota</option>
                    <option value="MS" <?php echo ( isset($_POST['state']) && $_POST['state'] =='MS' )? 'selected':'';?> >Mississippi</option>
                    <option value="MO" <?php echo ( isset($_POST['state']) && $_POST['state'] =='MO' )? 'selected':'';?> >Missouri</option>
                    <option value="MT" <?php echo ( isset($_POST['state']) && $_POST['state'] =='MT' )? 'selected':'';?> >Montana</option>
                    <option value="NE" <?php echo ( isset($_POST['state']) && $_POST['state'] =='NE' )? 'selected':'';?> >Nebraska</option>
                    <option value="NV" <?php echo ( isset($_POST['state']) && $_POST['state'] =='NV' )? 'selected':'';?> >Nevada</option>
                    <option value="NH" <?php echo ( isset($_POST['state']) && $_POST['state'] =='NH' )? 'selected':'';?> >New Hampshire</option>
                    <option value="NJ" <?php echo ( isset($_POST['state']) && $_POST['state'] =='NJ' )? 'selected':'';?> >New Jersey</option>
                    <option value="NM" <?php echo ( isset($_POST['state']) && $_POST['state'] =='NM' )? 'selected':'';?> >New Mexico</option>
                    <option value="NY" <?php echo ( isset($_POST['state']) && $_POST['state'] =='NY' )? 'selected':'';?> >New York</option>
                    <option value="NC" <?php echo ( isset($_POST['state']) && $_POST['state'] =='NC' )? 'selected':'';?> >North Carolina</option>
                    <option value="ND" <?php echo ( isset($_POST['state']) && $_POST['state'] =='ND' )? 'selected':'';?> >North Dakota</option>
                    <option value="OH" <?php echo ( isset($_POST['state']) && $_POST['state'] =='OH' )? 'selected':'';?> >Ohio</option>
                    <option value="OK" <?php echo ( isset($_POST['state']) && $_POST['state'] =='OK' )? 'selected':'';?> >Oklahoma</option>
                    <option value="OR" <?php echo ( isset($_POST['state']) && $_POST['state'] =='OR' )? 'selected':'';?> >Oregon</option>
                    <option value="PA" <?php echo ( isset($_POST['state']) && $_POST['state'] =='PA' )? 'selected':'';?> >Pennsylvania</option>
                    <option value="PR" <?php echo ( isset($_POST['state']) && $_POST['state'] =='PR' )? 'selected':'';?> >Puerto Rico</option>
                    <option value="RI" <?php echo ( isset($_POST['state']) && $_POST['state'] =='RI' )? 'selected':'';?> >Rhode Island</option>
                    <option value="SC" <?php echo ( isset($_POST['state']) && $_POST['state'] =='SC' )? 'selected':'';?> >South Carolina</option>
                    <option value="SD" <?php echo ( isset($_POST['state']) && $_POST['state'] =='SD' )? 'selected':'';?> >South Dakota</option>
                    <option value="TN" <?php echo ( isset($_POST['state']) && $_POST['state'] =='TN' )? 'selected':'';?> >Tennessee</option>
                    <option value="TX" <?php echo ( isset($_POST['state']) && $_POST['state'] =='TX' )? 'selected':'';?> >Texas</option>
                    <option value="UT" <?php echo ( isset($_POST['state']) && $_POST['state'] =='UT' )? 'selected':'';?> >Utah</option>
                    <option value="VT" <?php echo ( isset($_POST['state']) && $_POST['state'] =='VT' )? 'selected':'';?> >Vermont</option>
                    <option value="VA" <?php echo ( isset($_POST['state']) && $_POST['state'] =='VA' )? 'selected':'';?> >Virginia</option>
                    <option value="VI" <?php echo ( isset($_POST['state']) && $_POST['state'] =='VI' )? 'selected':'';?> >Virgin Islands</option>
                    <option value="WA" <?php echo ( isset($_POST['state']) && $_POST['state'] =='WA' )? 'selected':'';?> >Washington</option>
                    <option value="WV" <?php echo ( isset($_POST['state']) && $_POST['state'] =='WV' )? 'selected':'';?> >West Virginia</option>
                    <option value="WI" <?php echo ( isset($_POST['state']) && $_POST['state'] =='WI' )? 'selected':'';?> >Wisconsin</option>
                    <option value="WY" <?php echo ( isset($_POST['state']) && $_POST['state'] =='WY' )? 'selected':'';?> >Wyoming</option>
                </select>
                <?php if( isset($_POST['state']) && empty($_POST['state']) ) { ?>
                <span class="error">Please select state</span>
                <?php } ?>
            </div>
	</div>-->
        <div class="col-6-my">
            <div class="frm-grp">
                <label for="zip">Zip Code</label>
                <input class="form-control <?php echo ( isset($_POST['zip']) && empty($_POST['zip']) )? "error": '';?>"  oninput="setCustomValidity('')"  oninvalid="this.setCustomValidity('Enter Zip')"  required="" type="text" name="zip" value="<?php echo ( isset($_POST['zip']) && empty($_POST['zip']) )? "": $_POST['zip'];?>">
                <?php if( isset($_POST['zip']) && empty($_POST['zip']) ) { ?>
                <span class="error">Please enter zip</span>
                <?php } ?>
            </div>
        </div>
        <div class="col-6-my">
            <div class="frm-grp">
                <label for="Website">Website</label>
                <input class="form-control <?php echo ( isset($_POST['website']) && empty($_POST['website']) )? "error": '';?>"  oninput="setCustomValidity('')"  oninvalid="this.setCustomValidity('Enter website url')"  required="" type="text" name="website" value="<?php echo ( isset($_POST['website']) && empty($_POST['website']) )? "": $_POST['website'];?>">
                <?php if( isset($_POST['website']) && empty($_POST['website']) ) { ?>
                <span class="error">Please enter website</span>
                <?php } ?>
            </div>
        </div>
        <div class="col-6-my">
            <div class="frm-grp">
                <label for="state">Select state to list</label>

                <select multiple class="frm-cntrl <?php echo ( isset($_POST['listing_state']) && empty($_POST['listing_state']) )? "error": '';?>" name="listing_state" id="listing_state">
                    <option value="">Select</option>
                    <?php
                    if(!empty($states_list))
                    {
                        foreach($states_list as  $key=>$value)
                        {
                            ?>
                            <option value="<?=$value->state_code?>" <?php echo ( isset($_POST['listing_state']) && $_POST['listing_state'] ==$value->state_code )? 'selected':'';?> ><?=$value->state_name?></option>
                            <?php
                        }
                    }
                    ?>

                </select>
                <?php if( isset($_POST['state']) && empty($_POST['state']) ) { ?>
                <span class="error">Please select state</span>
                <?php } ?>
            </div>
        </div>
        <div class="col-6-my">
                <div class="frm-grp">
                    <label for="state">Level Of cares</label>
                    
                    <select class="frm-cntrl <?php echo ( isset($_POST['state']) && empty($_POST['state']) )? "error": '';?>" multiple name="level_of_cares" id="level_of_cares">
                        
                        <?php
                        if(!empty($level_of_cares))
                        {
                            foreach($level_of_cares as  $key=>$value)
                            {
                                ?>
                                <option value="<?=$value?>" <?php echo ( isset($_POST['level_of_cares']) && $_POST['level_of_cares'] ==$value )? 'selected':'';?> ><?=str_replace(array('-', '_'), array(' ', '-'), $value)?></option>
                                <?php
                            }
                        }
                        ?>
s                   </select>
                    <?php if( isset($_POST['level_of_cares']) && empty($_POST['level_of_cares']) ) { ?>
                    <span class="error">Please select Level of Cares</span>
                    <?php } ?>
                </div>
            </div>
            <div class="col-6-my">
                <div class="frm-grp">
                    <label for="Website">List of Zip code</label>
                    <input class="form-control <?php echo ( isset($_POST['listing_zip_codes']) && empty($_POST['listing_zip_codes']) )? "error": '';?>"  oninput="setCustomValidity('')"  oninvalid="this.setCustomValidity('Enter website url')"  required="" type="text" name="listing_zip_codes" value="<?php echo ( isset($_POST['listing_zip_codes']) && empty($_POST['listing_zip_codes']) )? "": $_POST['listing_zip_codes'];?>">
                    <?php if( isset($_POST['listing_zip_codes']) && empty($_POST['listing_zip_codes']) ) { ?>
                    <span class="error">Please enter Zip Codes in which listing  will be  displayed</span>
                    <?php } ?>
                </div>
            </div>
            <div class="col-12-my">
            <div class="frm-grp">
                <label for="description">Description</label>
                <textarea maxlength="1500" rows="4" style="min-height: 80px;line-height: 100%!important;" class="form-control <?php echo ( isset($_POST['description']) && empty($_POST['description']) )? "error": '';?>" oninput="setCustomValidity('')"  oninvalid="this.setCustomValidity('Enter description')"  required="" name="description" id="description"><?php echo ( isset($_POST['description']) && empty($_POST['description']) )? "": $_POST['description'];?></textarea>
                <p style="text-align:right;margin-bottom: -15px;" id="c_message"></p>
                <?php if( isset($_POST['description']) && empty($_POST['description']) ) { ?>
                <span class="error">Please enter description</span>
                <?php } ?>
            </div>
        </div>
        <div class="col-12-my">
            <div class="frm-grp">
                <label for="image">Custom Facility Photo</label>
                <?php if($upload_img_id != null) { 
                    $img = wp_get_attachment_image_src( $upload_img_id, 'thumbnail');
                ?>
                <img src="<?php echo $img[0];?>"><input type="hidden" name="upload_img_id" value="<?php echo $upload_img_id;?>">
                <?php } else { ?>
                    <?php wp_nonce_field( 'my_image_upload', 'my_image_upload_nonce' ); ?>
                    <input class="form-control" type="file" name="my_image_upload" id="my_image_upload" multiple="false"  oninput="setCustomValidity('')"  oninvalid="this.setCustomValidity('upload image')"  required="">
                    <br><span>Add your logo or an image of your practice or center. Images should be 285X153 pixels in a JPEG or PNG file format.</span>
                    <?php if(!empty($reg_errors->errors) && count($reg_errors->errors) > 0 && !empty($reg_errors->errors[image][0])) { ?>
                    <br><span class="error"><?php echo $reg_errors->errors[image][0];?></span>
                    <?php } ?>
                <?php } ?>
                    <div id="cover_image_div"></div>
            </div>
        </div>
        <div class="col-12-my">
            <div class="frm-grp">
                <label for="image">Landing Page Photo Gallery</label>
                <?php if($upload_img_id != null) { 
                    $img = wp_get_attachment_image_src( $upload_img_id, 'thumbnail');
                ?>
                <img src="<?php echo $img[0];?>"><input type="hidden" name="upload_img_id" value="<?php echo $upload_img_id;?>">
                <?php } else { ?>
                    <?php wp_nonce_field( 'my_image_upload', 'my_image_upload_nonce' ); ?>
                    <input class="form-control" type="file" name="gallery_upload" id="gallery_upload" multiple="true"  oninput="setCustomValidity('')"  oninvalid="this.setCustomValidity('upload image')"  required="">
                    <br><span>Add your logo or an image of your practice or center. Images should be 285X153 pixels in a JPEG or PNG file format.</span>
                    <?php if(!empty($reg_errors->errors) && count($reg_errors->errors) > 0 && !empty($reg_errors->errors[image][0])) { ?>
                    <br><span class="error"><?php echo $reg_errors->errors[image][0];?></span>
                    <?php } ?>
                <?php } ?>
                    <div id="gallery_upload_div"></div>
            </div>
        </div>
	</div>
	</div>
	<div class="row-my">
	<div class="col-12-my m-10">
		<button class="proceed-btn">Proceed</button>
	</div>
	</div>
	</div>
</div>
</form>
<?php
} //end of function form_basic()
?>
<script type="text/javascript">
    function readURL(input) {
     for(var i =0; i< input.files.length; i++){
         if (input.files[i]) {
            var reader = new FileReader();

            reader.onload = function (e) {
               var img = $('<img id="dynamic">');
               img.attr('src', e.target.result);
               img.appendTo('#cover_image_div');  
            }
            reader.readAsDataURL(input.files[i]);
           }
        }
    }
    $( document ).ready(function() {
        $("#my_image_upload").change(function(){
            readURL(this);
        });
    });
    function readURL1(input) {
     for(var i =0; i< input.files.length; i++){
         if (input.files[i]) {
            var reader = new FileReader();

            reader.onload = function (e) {
               var img = $('<img id="dynamic1">');
               img.attr('src', e.target.result);
               img.appendTo('#gallery_upload_div');  
            }
            reader.readAsDataURL(input.files[i]);
           }
        }
    }
    $( document ).ready(function() {
        $('#level_of_cares').multiSelect();
        $('#listing_state').multiSelect();
        $("#gallery_upload").change(function(){
            readURL1(this);
        });
        
        
        $('.multi-select-menuitem').on('click',function() {
            var listing_state_value = $("#listing_state").val();
            var id = $(this).attr('for');
            if(listing_state_value.includes($('#' + id).attr('value')))
            {
                return true;
            }
            else if(listing_state_value.length == 4)
            {
                alert('Sorry You can select up to 4 states only');
                return false;
            }
        });
        
        
    });

</script>


