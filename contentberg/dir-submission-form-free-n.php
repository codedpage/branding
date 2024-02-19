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
                        $json_ecode = json_encode($_POST);
                        echo $json_ecode;
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
                                        <div class="col-12-my">&nbsp;</div>
                                        <div class="col-12-my">
                                            <div class="form-row">
                                                <div class="form-group col-6-my">
                                                    <input type="hidden" id="free_subscription " name="free_subscription" value="true">
                                                    <button id="payment-button" class="btn btn-info">Subscribe</button>
                                                </div>
                                            </div>
                                        </div>
                                        </div>	
                                    </div><!-- full_payment_area end here -->
                                    
                        
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
