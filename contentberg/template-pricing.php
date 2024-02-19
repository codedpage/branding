<?php 
   /* Template Name: Pricing Page Template */
   get_header();
?>
<?php
   global $wpdb;
   $subscription = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}itr_dir_subs_plan WHERE is_ala_cart = 0", OBJECT );
   $ala_cart_features = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}itr_dir_subs_plan WHERE is_ala_cart = 1", OBJECT );
   $subscription_feature = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}itr_subs_plan_features  WHERE is_ala_cart = 0", OBJECT );
   
   if(!empty($subscription))
   {
       foreach($subscription as $key=>$value)
       {
          $subscription_array[]=$value->pricing_name; 
       }
   }
   
   ?>
<body>
   <div class="membership">
      <div class="banner">
         <div class="centered-pri">
            <h1>List your Practice on In The Rooms</h1>
            <center><span>Help those seeking addiction treatment find your treatment center or medical services</span></center>
         </div>
      </div>
      <section class="mt-4">
         <div class="container-fluid">
            <div id="pricingSection" class="my-5">
               <div class="container-fluid">
                  <!-- CHOOSE YOUR PLAN -->
                  <div id="js-pricing-switch" class="text-center my-4 py-2 relative">
                     <span class="switch-label js-switch-label-monthly">YEARLY</span>
                     <label class="switch">
                     <input type="checkbox" checked="checked">
                     <span class="slider"></span>
                     </label>
                     <span class="switch-label js-switch-label-yearly active">MONTHLY</span>
                     <br>
                     <button class="btn signupm1">Save up to 20% by billing annually</button>
                  </div>
                  <div class="row mt-4">
                     <!-- CHOOSE YOU PLAN END -->
                     <?php
                        if(!empty($subscription))
                        {
                            foreach($subscription as $key=>$value)
                            {
                                ?>
                     <div class="col-md-6 col-lg-3 col-sm-12">
                        <div class="basic box">
                           <div class="view">
                              <?php
                                 if($value->pricing_name == 'platinum'){
                                 ?>
                              <button class="btn signupm">Most Popular</button>
                              <?php
                                 }
                                 ?>
                              <div class="icon">
                                 <h3><?=ucfirst($value->pricing_name)?></h3>
                              </div>
                              <p class="ptext"><?=$value->pricing_description?></p>
                              <div class="cost">
                                 <?php
                                    if($value->pricing_name != 'free')
                                    {
                                        ?>
                                 <p class="amount" style="display:none" id="yearly_actual_amount_<?=$value->pricing_name?>"><s>$<?=sprintf("%02d", $value->price_monthly  * 12)?></s></p>
                                 <?php
                                    }
                                    ?>
                                 <p class="amount" id="pricing_<?=$value->pricing_name?>">$<?=sprintf("%02d", $value->price_monthly)?></p> 
                                 <p class="detail"id="pricing_term_<?=$value->pricing_name?>">/month</p>
                              </div>
                              <?php
                                 if($value->pricing_name != 'free')
                                 {
                                     $total_monthly_price = $value->price_monthly  * 12;
                                     $total_yearly_price = $value->price_yearly;
                                     $difference = $total_monthly_price - $total_yearly_price;                  
                                     $saving_percentage = ($difference / $total_monthly_price) * 100;
                                 ?>
                              <p class="saving" style="display:none" id="save_percentage_<?=$value->pricing_name?>">Save $<?=sprintf("%02d", $value->price_monthly  * 12 - $value->price_yearly )?></p>
                              <?php
                                 }
                                 ?>
                              <p class="list">List your rehab center</p>
                              <?php
                                 if($value->pricing_name  != 'platinum')
                                 {
                                     ?>
                              <button type="button"  class="btn signup"  id="<?=$value->pricing_name?>">Sign
                              Up</button>
                              <?php
                                 }
                                 else
                                 {
                                     ?>
                              <button type="button" data-toggle="modal" data-target="#myModal2" class="btn signup" id="<?=$value->pricing_name?>">Sign
                              Up</button>
                              <?php
                                 }
                                 ?>
                           </div>
                        </div>
                     </div>
                     <?php
                        }
                        }
                        ?>
                  </div>
                  <!-- END PRICING CARD -->
               </div>
            </div>
            <!-- Pricing Table -->
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-9 col-sm-12">
                     <div class="tble">
                        <table class="pricing-table">
                           <tbody>
                              <tr>
                                 <td width="50%" class="pricing-table-text">
                                 </td>
                                 <td width="50%" class="pricing-table-text">
                                 </td>
                                 <td width="15%">
                                    <div class="pricing-table-item">
                                       <div class="pricing-table-item-purchase">
                                          <h5 style="color: #000;">Fre </h5>
                                       </div>
                                    </div>
                                 </td>
                                 <td width="15%">
                                    <div class="pricing-table-item">
                                       <div class="pricing-table-item-purchase">
                                          <h5 style="color: #000;">Pro</h5>
                                       </div>
                                    </div>
                                 </td>
                                 <td width="15%">
                                    <div class="pricing-table-item">
                                       <div class="pricing-table-item-purchase">
                                          <h5 style="color: #000;">Gold</h5>
                                       </div>
                                    </div>
                                 </td>
                                 <td width="15%">
                                    <div class="pricing-table-item">
                                       <div class="pricing-table-item-purchase">
                                          <h5 style="color: #000;">Platinum</h5>
                                       </div>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="accordion" id="accordionPanelsStayOpenExample">
                     <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                           <button class="accordion-button buttontable" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                              <div class="accordings">  Full Onboarding Support and Ongoing Maintenance <span class="tooltipSec"><i class="fas fa-info-circle"></i>
                                 </span>
                                 <span class="tooltipHide">Get expert assistance for setup, optimization, and ongoing support for your listing.</span>
                              </div>
                           </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                           <div class="accordion-body">
                              <table class="pricing-table">
                                 <tbody>
                                    <tr class="pricing-table-list table-acc">
                                       <td class="bg_color2 tds" colspan="2"><span>Full Onboarding Support and Ongoing Maintenance</span></td>
                                       <td class="bg_color2 tds1"></td>
                                       <td class="bg_color2 tds1"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                       <td class="bg_color2 tds1"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                       <td class="bg_color2 tds1"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                           <button class="accordion-button buttontable" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                              <div class="accordings"> Directory Listing Size <span class="tooltipSec"><i class="fas fa-info-circle"></i>
                                 </span><span class="tooltipHide">This is how your listing will be previewed in the main search results</span>
                              </div>
                           </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
                           <div class="accordion-body">
                              <table class="pricing-table">
                                 <tbody>
                                    <tr class="pricing-table-list table-acc">
                                       <td class="bg_color2 tds" colspan="2"><span>Directory Listing Size &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                                       <td class="bg_color2 tds1">Small</td>
                                       <td class="bg_color2 tds1">Small </td>
                                       <td class="bg_color2 tds1">Medium</td>
                                       <td class="bg_color2 tds1">Large</td>
                                    </tr>
                                    <tr class="pricing-table-list table-acc">
                                       <td class="bg_color2 tds3" colspan="2"><span>Select Your Own Preview Photo</span></td>
                                       <td class="bg_color2 tds3"></td>
                                       <td class="bg_color2 tds3"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                       <td class="bg_color2 tds3"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                       <td class="bg_color2 tds3"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                    </tr>
                                    <tr class="pricing-table-list table-acc">
                                       <td class="bg_color2 tds" colspan="2"><span title="This blue check mark will be displayed prominently on your listing as an endorsement of trust from the In The Rooms team">In The Rooms Verified Check Mark <i class="fas fa-info-circle"></i></span></td>
                                       <td class="bg_color2 tds1"></td>
                                       <td class="bg_color2 tds1"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                       <td class="bg_color2 tds1"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                       <td class="bg_color2 tds1"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                           <button class="accordion-button buttontable" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                              <div class="accordings">  Dedicated Landing Page <span class="tooltipSec"><i class="fas fa-info-circle"></i>
                                 </span><span class="tooltipHide">Pro, Gold, and Platinum subscribers will get dedicated landing pages for their listing that include custom photos, copy, and other features.</span>
                              </div>
                           </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingThree">
                           <div class="accordion-body">
                              <table class="pricing-table">
                                 <tbody>
                                    <tr class="pricing-table-list table-acc">
                                       <td class="bg_color2 tds" colspan="2"><span>Dedicated Landing Page &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                                       <td class="bg_color2 tds1"></td>
                                       <td class="bg_color2 tds1"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                       <td class="bg_color2 tds1"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                       <td class="bg_color2 tds1"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                    </tr>
                                    <tr class="pricing-table-list table-acc">
                                       <td class="bg_color2 tds3" colspan="2"><span>Landing Page Photo Gallery</span></td>
                                       <td class="bg_color2 tds3"></td>
                                       <td class="bg_color2 tds3">5 Photos</td>
                                       <td class="bg_color2 tds3">5 Photos</td>
                                       <td class="bg_color2 tds3">Unlimited</td>
                                    </tr>
                                    <tr class="pricing-table-list table-acc">
                                       <td class="bg_color2 tds" colspan="2"><span>In The Rooms Verified Check Mark</span></td>
                                       <td class="bg_color2 tds1"></td>
                                       <td class="bg_color2 tds1"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                       <td class="bg_color2 tds1"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                       <td class="bg_color2 tds1"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                    </tr>
                                    <tr class="pricing-table-list table-acc">
                                       <td class="bg_color2 tds3" colspan="2"><span>Levels of Care details</span></td>
                                       <td class="bg_color2 tds3"></td>
                                       <td class="bg_color2 tds3"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                       <td class="bg_color2 tds3"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                       <td class="bg_color2 tds3"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                    </tr>
                                    <tr class="pricing-table-list table-acc">
                                       <td class="bg_color2 tds" colspan="2"><span>List of Insurances Accepted</span></td>
                                       <td class="bg_color2 tds1"></td>
                                       <td class="bg_color2 tds1"></td>
                                       <td class="bg_color2 tds1"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                       <td class="bg_color2 tds1"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                    </tr>
                                    <tr class="pricing-table-list table-acc">
                                       <td class="bg_color2 tds3" colspan="2"><span>Google Reviews On Page</span></td>
                                       <td class="bg_color2 tds3"></td>
                                       <td class="bg_color2 tds3"></td>
                                       <td class="bg_color2 tds3"></td>
                                       <td class="bg_color2 tds3"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                    </tr>
                                    <tr class="pricing-table-list table-acc">
                                       <td class="bg_color2 tds" colspan="2"><span>On Page Video</span></td>
                                       <td class="bg_color2 tds1"></td>
                                       <td class="bg_color2 tds1"></td>
                                       <td class="bg_color2 tds1"></td>
                                       <td class="bg_color2 tds1"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                    </tr>
                                    <tr class="pricing-table-list table-acc">
                                       <td class="bg_color2 tds3" colspan="2"><span>Embedded Google Map</span></td>
                                       <td class="bg_color2 tds3"></td>
                                       <td class="bg_color2 tds3"></td>
                                       <td class="bg_color2 tds3"></td>
                                       <td class="bg_color2 tds3"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                    </tr>
                                    <tr class="pricing-table-list table-acc">
                                       <td class="bg_color2 tds" colspan="2"><span title="Display to your visitors the various accreditations your facility holds such as Joint Commission and CARF.">Facility Accreditations on Display <i class="fas fa-info-circle"></i></span></td>
                                       <td class="bg_color2 tds1"></td>
                                       <td class="bg_color2 tds1"></td>
                                       <td class="bg_color2 tds1"></td>
                                       <td class="bg_color2 tds1"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <div class="accordion-item">
                              <h2 class="accordion-header" id="panelsStayOpen-headingThrees">
                                 <button class="accordion-button buttontable" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThrees" aria-expanded="false" aria-controls="panelsStayOpen-collapseThrees">
                                    <div class="accordings">  Marketing Features <span class="tooltipSec"><i class="fas fa-info-circle"></i>
                                       </span><span class="tooltipHide">These features affect how your listing is positioned and how many impressions you'll get</span>
                                    </div>
                                 </button>
                              </h2>
                              <div id="panelsStayOpen-collapseThrees" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingThrees">
                                 <div class="accordion-body">
                                    <table class="pricing-table">
                                       <tbody>
                                          <tr class="pricing-table-list table-acc">
                                             <td class="bg_color2 tds" colspan="2"><span>Marketing Features &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                                             <td class="bg_color2 tds1"></td>
                                             <td class="bg_color2 tds1"></td>
                                             <td class="bg_color2 tds1"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                             <td class="bg_color2 tds1"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                          </tr>
                                          <tr class="pricing-table-list table-acc">
                                             <td class="bg_color2 tds3" colspan="2"><span>Featured Article on ITR with Backllnk</span></td>
                                             <td class="bg_color2 tds3"></td>
                                             <td class="bg_color2 tds3"></td>
                                             <td class="bg_color2 tds3"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                             <td class="bg_color2 tds3"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                          </tr>
                                          <tr class="pricing-table-list table-acc">
                                             <td class="bg_color2 tds" colspan="2"><span>Target Your Listing by Zip Code</span></td>
                                             <td class="bg_color2 tds1"></td>
                                             <td class="bg_color2 tds1"></td>
                                             <td class="bg_color2 tds1">5 zip code</td>
                                             <td class="bg_color2 tds1">10 zip code</td>
                                          </tr>
                                          <tr class="pricing-table-list table-acc">
                                             <td class="bg_color2 tds3" colspan="2"><span>Target Your Listing by State</span></td>
                                             <td class="bg_color2 tds3"></td>
                                             <td class="bg_color2 tds3"></td>
                                             <td class="bg_color2 tds3">2 States</td>
                                             <td class="bg_color2 tds3">3 States</td>
                                          </tr>
                                          <tr class="pricing-table-list table-acc">
                                             <td class="bg_color2 tds1" colspan="2"><span title="Enhance your listing's exposure with prime placement across our website for increased
                                                visibility and traffic">Max Visibility Directory Placement <i class="fas fa-info-circle"></i></span></td>
                                             <td class="bg_color2 tds1"></td>
                                             <td class="bg_color2 tds1"></td>
                                             <td class="bg_color2 tds1"></td>
                                             <td class="bg_color2 tds1"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                          </tr>
                                          <tr class="pricing-table-list table-acc">
                                             <td class="bg_color2 tds1" colspan="2"><span>Featured in Email Blast</span></td>
                                             <td class="bg_color2 tds1"></td>
                                             <td class="bg_color2 tds1"></td>
                                             <td class="bg_color2 tds1"></td>
                                             <td class="bg_color2 tds1"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                           <div class="accordion-item">
                              <h2 class="accordion-header" id="panelsStayOpen-headingOne1">
                                 <button class="accordion-button buttontable" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne1" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne1">
                                    <div class="accordings">  Ala Carte Features <span class="tooltipSec" title=""><i class="fas fa-info-circle"></i>
                                       </span><span class="tooltipHide">Explore our additional features, including bespoke landing page designs, extra newsletter features in our email blasts, social media promotions, exclusive meeting spaces for your alumni, and enhanced visibility with additional state and zip code placements. Each project will be priced uniquely and tailored to your specific needs.</span>
                                    </div>
                                 </button>
                              </h2>
                              <div id="panelsStayOpen-collapseOne1" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne1">
                                 <div class="accordion-body">
                                    <table class="pricing-table">
                                       <tbody>
                                          <tr class="pricing-table-list table-acc">
                                             <td class="bg_color2 tds" colspan="2"><span>Ala Carte Features &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                                             <td class="bg_color2 tds1"></td>
                                             <td class="bg_color2 tds1"></td>
                                             <td class="bg_color2 tds1"></td>
                                             <td class="bg_color2 tds1"><i class="fa fa-check right" aria-hidden="true"></i></td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- pricing table closed -->
            <div class="col-xs-12 col-md-12" id="tableId" style="display:none;">
               <table class="pricing-table">
                  <tbody>
                     <tr>
                        <td width="50%" class="pricing-table-text">
                        </td>
                        <td width="50%" class="pricing-table-text">
                        </td>
                        <?php
                           foreach($subscription as $key=>$value)
                           {
                               ?>
                        <td width="15%">
                           <div class="pricing-table-item">
                              <div class="pricing-table-item-purchase">
                                 <h5 style="color: #000;"><?=ucfirst($value->pricing_name)?> </h5>
                              </div>
                           </div>
                        </td>
                        <?php
                           }
                           ?>
                     </tr>
                     <?php
                        foreach($subscription_feature as $key=>$value)
                        {
                            ?>
                     <tr class="pricing-table-list">
                        <td class="<?=(isset($value->is_bold_heading) && $value->is_bold_heading == 1) ? 'bg_color2' : 'bg_color1'?>" colspan="2"><?=$value->feature_description?>
                           <?php
                              if(!empty($value->extra_info))
                              {
                                  ?>
                           <span>
                           <i class="fas fa-info-circle"
                              data-toggle="tooltip"
                              title="<?=$value->extra_info?>"></i>
                           </span>
                           <?php
                              }
                              ?>
                        </td>
                        <?php
                           foreach($subscription_array as $k=>$v)
                           {
                               $key_to_find = 'is_'.$v;
                              //var_dump($v);
                               if(isset($value->$key_to_find))
                               {
                                   if($value->$key_to_find == '1')
                                   {
                                      
                                      ?>
                        <td><i class="fa fa-check right" aria-hidden="true"></td>
                        <?php
                           }
                           elseif($value->$key_to_find == '0')
                           {
                               
                               ?>
                        <td></td>
                        <?php
                           }
                           else
                           {
                              ?>
                        <td><?=$value->$key_to_find?></td>
                        <?php
                           }
                           }
                           }
                           
                           ?>
                     </tr>
                     <?php
                        }
                        ?>
                     <tr class="pricing-table-list">
                        <td class="bg_color2" colspan="2">Ala Carte Features <span><i class="fas fa-info-circle"
                           data-toggle="tooltip"
                           title="These features affect how your listing is positioned and how many impressions you'll get"></i></span></td>
                        <td>24/7</td>
                        <td>24/7</td>
                        <td>24/7</td>
                        <td>24/7</td>
                     </tr>
                     <tr class="pricing-table-list rr">
                        <td class="bg_color1 rr" colspan="2" rowspan="8">These customizable features are available to
                           platinum subscribers who are looking to
                           maximize their visibility and get in front of our
                           Audience through other various Channels. Work
                           with our team on these items to develop
                           campaigns that fit your goals and target.
                        </td>
                     </tr>
                     <?php
                        if(!empty($ala_cart_features))
                        {
                            foreach($ala_cart_features as $k=>$v)
                            {
                                ?>
                     <tr class="pricing-table-list">
                        <td class="bg_color1" colspan="2"><?=$v->pricing_description?>
                           <?php
                              if(!empty($v->extra_info))
                              {
                                  ?>
                           <span>
                           <i class="fas fa-info-circle"
                              data-toggle="tooltip"
                              title="<?=$v->extra_info?>">
                           </i>
                           </span>
                           <?php
                              }
                              ?>
                        </td>
                        <td colspan="2"><?=$v->price_desc?></td>
                     </tr>
                     <?php
                        }
                        }
                        ?>
                     <tr class="pricing-table-list">
                        <td class="bg_color1" colspan="2">Custom Landing Page features</td>
                        <td colspan="2">Price will vary by project</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
         <div class="main">
            <div class="main-sec">
               <div class="container">
                  <div class="row">
					<div class="col-md-3 col-lg-3 col-sm-12">
						<img class="imgf" width="100%" src="https://d1nhio0ox7pgb.cloudfront.net/_img/g_collection_png/standard/512x512/hospital.png">
					</div>
                     <div class="col-md-6 col-lg-6 col-sm-12">
                       <h1>Feature your center</h1>
							  <div class="clearfix"></div>
							  <p class="ptext1">Ready to connect with treatment seekers across the country? Enter your
                              information to learn about our advertising options and get in contact with our
                              development team.
                           </p>
                     </div>
                     <div class="col-md-3 col-lg-3 col-sm-12"> <button class="btn signup footer">Submit Your Center</button></div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Modal -->
      <div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">Tailor Made - Ala Carte Options
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               </div>
               <div class="modal-body">
                  <div>
                     <?php
                        if(!empty($ala_cart_features))
                        {
                            foreach($ala_cart_features as $k=>$v)
                            {
                                ?>
                     <div class="check">
                        <div class="content">
                           <input type="radio" id="<?=$v->pricing_name?>"  class="input-radio on ala_cart_features" name="<?=$v->pricing_name?>"><label><?=$v->pricing_description?> </label>
                        </div>
                        <div class="price">
                           <?=$v->price_desc?> 
                        </div>
                     </div>
                     <?php
                        }
                        }
                        ?>
                     <div class="check">
                        <span class="content">Sub Total </span> <span class="price" id="platinum_sub_price">$1000</span></label>    
                     </div>
                     <center>  <input type="submit" id="proceed_to_checkout"  value="Proceed to Checkout"></center>
                  </div>
               </div>
            </div>
            <!-- modal-content -->
         </div>
         <!-- modal-dialog -->
      </div>
      <!-- modal --> 
   </div>
   <form action="<?php echo get_home_url();?>/directory-subscription" method="post" id="submission_form">
      <input type="hidden" name="monthly_yearly" id="monthly_yearly"  value="monthly">
      <input type="hidden" name="selected_option" id="selected_option" value="">
      <input type="hidden" name="selected_ala_option" id="selected_ala_option" value="">
   </form>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
   <script type="text/javascript">
      jQuery(document).ready(function() {
      jQuery("input[type=radio]").click(function() {
             // Get the storedValue
             var previousValue = jQuery(this).data('storedValue');
             // if previousValue = true then
             //     Step 1: toggle radio button check mark.
             //     Step 2: save data-StoredValue as false to indicate radio button is unchecked.
             if (previousValue) {
               jQuery(this).prop('checked', !previousValue);
               jQuery(this).data('storedValue', !previousValue);
             }
             // If previousValue is other than true
             //    Step 1: save data-StoredValue as true to for currently checked radio button.
             //    Step 2: save data-StoredValue as false for all non-checked radio buttons. 
             else{
               jQuery(this).data('storedValue', true);
               jQuery("input[type=radio]:not(:checked)").data("storedValue", false);
             }
           });
       });
      var subscription = `<?=json_encode($subscription)?>`;
      var ala_cart_features = `<?=json_encode($ala_cart_features)?>`;
      var ala_cart_objects = JSON.parse(ala_cart_features);
      var s_object=JSON.parse(subscription);
      jQuery.noConflict();
      
      console.log(ala_cart_objects);
      
      jQuery(document).ready(function(){
         
         jQuery("#proceed_to_checkout").click(function(){
             jQuery("#submission_form").submit();
         });
       jQuery(".signup").click(function(){
           jQuery('input[type=radio]').prop('checked',false);
           jQuery('#selected_option').val(jQuery(this).attr('id'));
           if (jQuery("#js-pricing-switch input").is(":checked") === true) {
               jQuery("#monthly_yearly").val('monthly');
           }
           else
           {
               jQuery("#monthly_yearly").val('yearly');
           }
           
           if(jQuery(this).attr('id') != 'platinum')
           {
               jQuery("#submission_form").submit();
           }
           else
           {
               var mon_year = jQuery("#monthly_yearly").val();
              
               if(mon_year == 'monthly')
               {
                   for(var k in s_object) {
                       if(s_object[k].pricing_name == 'platinum')
                       {
                           jQuery('#platinum_sub_price').html("$" + s_object[k].price_monthly);
                       }
                   }
               }
               else
               {
                   for(var k in s_object) {
                       if(s_object[k].pricing_name == 'platinum')
                       {
                           jQuery('#platinum_sub_price').html("$" + s_object[k].price_yearly);
                       }
                   }
               }
           }
       });
       
       
       
       
       
       jQuery(".ala_cart_features").click(function(){
           var amount = 0;
           var selected_ala_cart = "";
      //            if(this.is(':checked'))
      //            {
      //                alert('Hello');
      //            }
           var clicked_id = jQuery(this).attr('id');
      //            if(jQuery('#' + clicked_id).is(':checked')) 
      //            { 
      //                alert("it's checked"); 
      //            }
           var mon_year = jQuery("#monthly_yearly").val();
           for(var k in ala_cart_objects) {
               
               if(jQuery('#'+ala_cart_objects[k].pricing_name).is(':checked')) 
               { 
                   
                   if(selected_ala_cart == "")
                   {
                       selected_ala_cart  = selected_ala_cart + ala_cart_objects[k].pricing_name;
                   }
                   else
                   {
                       selected_ala_cart  = selected_ala_cart + "," + ala_cart_objects[k].pricing_name;
                   }
                   if(mon_year == 'monthly')
                   {
                       amount = parseInt(amount) +  parseInt(ala_cart_objects[k].price_monthly);
                   }
                   else
                   {
                       amount = parseInt(amount) +  parseInt(ala_cart_objects[k].price_yearly); 
                   }
               }
           }
           
           //console.log(selected_ala_cart);
           jQuery("#selected_ala_option").val(selected_ala_cart);
           if(mon_year == 'monthly')
           {
               for(var k in s_object) {
                   if(s_object[k].pricing_name == 'platinum')
                   {
                       amount = parseInt(amount) +  parseInt(s_object[k].price_monthly); 
                   }
               }
           }
           else
           {
               for(var k in s_object) {
                   if(s_object[k].pricing_name == 'platinum')
                   {
                       amount = parseInt(amount) +  parseInt(s_object[k].price_yearly); 
                   }
               }
           }
            jQuery('#platinum_sub_price').html("$" + amount);
       });
      });
      
      (function ($) {
        $(function () {
           var toggleSwitch = $("#js-pricing-switch input");
      
           (function () {
              $(toggleSwitch).change(function () {
                 // Change prices for plans
                 togglePriceContent();
      
                 // Toggle monthly/yearly style
                 $(".js-switch-label-monthly, .js-switch-label-yearly").toggleClass(
                    "active"
                 );
              });
           })();
      
           function togglePriceContent() {
              if ($(toggleSwitch).is(":checked") === true) {
                  
                 // if toggle is yearly
                 for(var k in s_object) {
                   
                     
                     $("#pricing_" + s_object[k].pricing_name).html("$" + s_object[k].price_monthly);
                     $("#pricing_term_" + s_object[k].pricing_name).html("/month");
                     $("#yearly_actual_amount_"+s_object[k].pricing_name).hide();
                     $("#save_percentage_"+s_object[k].pricing_name).hide();
                 }
                 $(".js-toggle-price-content").each(function () {
                    $(this).html($(this).data("price-yearly"));
                 });
              } else {
                 // if toggle is monthly
                  for(var k in s_object) {
                     $("#pricing_" + s_object[k].pricing_name).html("$" + s_object[k].price_yearly);
                     $("#pricing_term_" + s_object[k].pricing_name).html("/year");
                     $("#yearly_actual_amount_"+s_object[k].pricing_name).show();
                     $("#save_percentage_"+s_object[k].pricing_name).show();
                 }
                 $(".js-toggle-price-content").each(function () {
                    $(this).html($(this).data("price-monthly"));
                 });
              }
           }
        });
      })(jQuery);
      
      window.odometerOptions = {
        duration: 400
      };
   </script>  
</body>
<?php
get_footer();