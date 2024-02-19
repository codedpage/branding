<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

global $wpdb;
    $states_list  =  $wpdb->get_results("SELECT * FROM {$wpdb->prefix}state where status = 1",OBJECT);

	if (isset($_POST['doc_name'])) { 
            $doc_name	=   sanitize_text_field( $_POST['doc_name'] );
            $phone      =   sanitize_text_field( $_POST['phone'] );
            $add1	=   sanitize_text_field( $_POST['add1'] );
            $add2       =   sanitize_text_field( $_POST['add2'] );
            $city	=   sanitize_text_field( $_POST['city'] );
            $state	=   sanitize_text_field( $_POST['state'] );
            $zip        =   sanitize_text_field( $_POST['zip'] );
            
            $f_name     =   sanitize_text_field( $_POST['f_name'] );
            $l_name     =   sanitize_text_field( $_POST['l_name'] );
            $email      =   sanitize_text_field( $_POST['email'] );
            
            if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $email = "";
            }
            $c_phone    =   sanitize_text_field( $_POST['c_phone'] );
            
            global $reg_errors;
            $reg_errors = new WP_Error;
	
            if ( empty( $doc_name ) || empty( $phone ) || empty( $add1) || empty( $city ) || empty( $state ) || empty( $zip ) || empty($l_name) || empty($f_name) || empty($email) ) {
                    $reg_errors->add('field', 'Required form field is missing');
            }
		
	}
?>
<form class="my-frm" method="post" id="payment-form" action="<?php echo get_home_url();?>/directory-subscription">
<div class="container-my">
	<div class="package-frm">
	<div class="row-my">
	<div class="col-12-my m-10">
		<h3 class="frm-top-hding" style="margin-top:20px;">Add a Free Listing</h3><hr class="divider-line">
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
                        //write code to save info of form into DB
                        global $wpdb;
                        $table_name ='wp_dir_subscription';
                        $success = $wpdb->insert($table_name, array(
                            'treat_center' => $doc_name,
                            'add1' => $add1,
                            'add2' => $add2,
                            'city' => $city,
                            'state' => $state,
                            'zip'   => $zip,
                            'phone' => $phone,
                            'c_f_name' => $f_name,
                            'c_l_name' => $l_name,
                            'c_email'  => $email,
                            'c_phone'  => $c_phone,
                            'listing_type'  => 'free',
                       ));
                        if($success) {
                            /* code for hubsport to send email */
                            $ip_addr         = $_SERVER['REMOTE_ADDR']; //IP address too.
                            $hs_context      = array(
                                    'ipAddress' => $ip_addr,
                                    'pageUrl' => 'https://www.intherooms.com/home/directory-subscription/',
                                    'pageName' => 'Listing Subscription Free'
                            );
                            $hs_context_json = json_encode($hs_context);

                            $str_post = "email=" .urlencode($email)
                                    . "&firstname=" . urlencode($f_name)
                                    . "&lastname=" . urlencode($l_name)
                                    . "&zip_code=" . urlencode($zip)
                                    . "&phone=" . urlencode($phone)
                                    . "&treatment_center_or_doctor_name=" . urlencode($doc_name)
                                    . "&hs_context=" . urlencode($hs_context_json); //Leave this one be
                            $endpoint = 'https://forms.hubspot.com/uploads/form/v2/573688/ebb99a76-f4be-4fa6-b023-8bd6a9b14162';

                            $ch = @curl_init();
                            @curl_setopt($ch, CURLOPT_POST, true);
                            @curl_setopt($ch, CURLOPT_POSTFIELDS, $str_post);
                            @curl_setopt($ch, CURLOPT_URL, $endpoint);
                            @curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                    'Content-Type: application/x-www-form-urlencoded'
                            ));
                            @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            //$response    = @curl_exec($ch); //Log the response from HubSpot as needed.
                            $status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE); //Log the response status code
                            //print curl_error($ch);
                            @curl_close($ch);
                            /* Hubspot code end here */
                            $thanks_html = '
                                    <div>
                                        <p>Thank you!<br>You request for your listing to be added to our directory has been received.<br>Check your email for a message about the next steps.<br>Your listing will be reviewed within the next two business days.  Once this review process has been completed you will receive an email confirming that your listings are live and where you can see them.<br>If you have any questions please email us at contact@intherooms.com</p>
                                    </div></div></div></div></div></form>';
                            echo $thanks_html;
                            return;
                        } else {
                            $thanks_html = '
                                    <div>
                                        <p>Some error occur please try again after sometime.</p>
                                    </div></div></div></div></div></form>';
                            echo $thanks_html;
                            return;
                        }
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
                    <input class="form-control <?php echo ( isset($_POST['f_name']) && empty($_POST['f_name']) )? "error": '';?>" oninput="setCustomValidity('')"  oninvalid="this.setCustomValidity('Enter First Name')" required="" type="text" name="f_name" value="<?php echo  isset($_POST['f_name']) ? (empty($_POST['f_name']) ? "": $_POST['f_name']) : "" ?>">
                    <?php if(isset($_POST['f_name']) && empty($_POST['f_name'])) { ?>
                    <span class="error">Please enter First Name</span>
                    <?php } ?>
                 </div>
            </div>
            <div class="col-6-my">
                <div class="frm-grp">
                   <label for="Last name">Last Name</label>
                   <input class="form-control <?php echo ( isset($_POST['l_name']) && empty($_POST['l_name']) )? "error": '';?>" oninput="setCustomValidity('')"  oninvalid="this.setCustomValidity('Enter Last Name')"   required="" type="text" name="l_name" value="<?php echo  isset($_POST['l_name']) ? (empty($_POST['l_name']) ? "": $_POST['l_name']) : "" ?>">
                   <?php if( isset($_POST['l_name']) && empty($_POST['l_name']) ) { ?>
                   <span class="error">Please enter Last Name</span>
                   <?php } ?>
                </div>
            </div>
            <div class="col-6-my">
                <div class="frm-grp">
                    <label for="email">Email</label>
                    <input class="form-control <?php echo ( isset($_POST['email']) && empty($_POST['email']) )? "error": '';?>" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Enter an email id')" type="email"  required="" name="email" value="<?php echo  isset($_POST['email']) ? (empty($_POST['email']) ? "": $_POST['email']) : "" ?>">
                    <?php if( isset($_POST['email']) && empty($_POST['email']) ) { ?>
                    <span class="error">Please enter valid email</span>
                    <?php } ?>
                </div>
            </div>
            <div class="col-6-my">
                 <div class="frm-grp">
                    <label for="phone no">Phone (optional)</label>
                    <input class="form-control" type="tel" name="c_phone" maxlength="10" value="<?php echo  isset($_POST['c_phone']) ? (empty($_POST['c_phone']) ? "": $_POST['c_phone']) : "" ?>">
                </div>
            </div>
            <div class="col-12-my">
                <h3 class="sub-hding">Listing Information</h3>
            </div>
            <div class="col-6-my">
                <div class="frm-grp">
                    <label for="Treatment center">Treatment Center or Doctor Name</label>
                    <input class="form-control <?php echo ( isset($_POST['doc_name']) && empty($_POST['doc_name']) )? "error": '';?>"  oninput="setCustomValidity('')"  oninvalid="this.setCustomValidity('Enter Treatment Center/Doctor Name')"  required="" type="text" name="doc_name" value="<?php echo  isset($_POST['doc_name']) ? (empty($_POST['doc_name']) ? "": $_POST['doc_name']) : "" ?>">
                    <?php if( isset($_POST['doc_name']) && empty($_POST['doc_name']) ) { ?>
                    <span class="error">Please enter Treatment Center/Doctor name</span>
                    <?php } ?>
                </div>
            </div>
            <div class="col-6-my">
                <div class="frm-grp">
                    <label for="Phone Number">Phone Number</label>
                    <input class="form-control <?php echo ( isset($_POST['phone']) && empty($_POST['phone']) )? "error": '';?>" maxlength="10" type="tel" oninput="setCustomValidity('')"  oninvalid="this.setCustomValidity('Enter Phone No.')"  required="" name="phone" value="<?php echo  isset($_POST['phone']) ? (empty($_POST['phone']) ? "": $_POST['phone']) : "" ?>">
                    <?php if( isset($_POST['phone']) && empty($_POST['phone']) ) { ?>
                    <span class="error">Please enter a valid 10-digit phone number</span>
                    <?php } ?>
                </div>
            </div>
            <div class="col-6-my">
                <div class="frm-grp">
                    <label for="Address1">Address Line 1</label>
                    <input class="form-control <?php echo ( isset($_POST['add1']) && empty($_POST['add1']) )? "error": '';?>" required=""  oninput="setCustomValidity('')"  oninvalid="this.setCustomValidity('Enter Address')" type="text" name="add1" value="<?php echo  isset($_POST['add1']) ? (empty($_POST['add1']) ? "": $_POST['add1']) : "" ?>">
                    <?php if( isset($_POST['add1']) && empty($_POST['add1']) ) { ?>
                    <span class="error">Please enter Address Line 1</span>
                    <?php } ?>
                </div>
            </div>
            <div class="col-6-my">	
                <div class="frm-grp">
                    <label for="Address2">Address Line 2</label>
                    <input class="form-control" type="text" name="add2" value="<?php echo  isset($_POST['add2']) ? (empty($_POST['add2']) ? "": $_POST['add2']) : "" ?>">
                </div>
            </div>
            <div class="col-6-my">
                <div class="frm-grp">
                    <label for="City">City</label>
                    <input class="form-control <?php echo ( isset($_POST['city']) && empty($_POST['city']) )? "error": '';?>" type="text" required=""  oninput="setCustomValidity('')"  oninvalid="this.setCustomValidity('Enter City')" name="city" value="<?php echo  isset($_POST['city']) ? (empty($_POST['city']) ? "": $_POST['city']) : "" ?>">
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
            <div class="col-6-my">
                <div class="frm-grp">
                    <label for="zip">Zip Code</label>
                    <input class="form-control <?php echo ( isset($_POST['zip']) && empty($_POST['zip']) )? "error": '';?>" oninput="setCustomValidity('')"  oninvalid="this.setCustomValidity('Enter Zip')"  required="" type="text" name="zip" value="<?php echo  isset($_POST['zip']) ? (empty($_POST['zip']) ? "": $_POST['zip']) : "" ?>">
                    <?php if( isset($_POST['zip']) && empty($_POST['zip']) ) { ?>
                    <span class="error">Please enter zip</span>
                    <?php } ?>
                </div>
            </div>
	</div>
	<div class="row-my">
            <div class="col-12-my m-10">
            <input type="hidden" id="selected_option" name="selected_option" value="free">
            <button class="proceed-btn">Submit</button>
            </div>
	</div>
    </div>
</div>
</form>

