<?php /* Template Name: Pricing Page Template */
get_header();
?>
<style>
   a {
    background-color: transparent;
    color: #180e80;
    text-decoration: none;
}


.container,
.container-lg,
.container-md,
.container-sm,
.container-xl {
    max-width: 1240px !important;
}




.border-n {
    border: none !important;
}




/* .bold {
	font-family: 'Proxima Nova bold';
} */




button.btnfirst {
    width: 100%;
    border: navajowhite;
    background-color: #000;
    color: #fff !important;

    width: 185px;
    height: 38px;
    / UI Properties /
    background: #2A2A72 0% 0% no-repeat padding-box;
    border-radius: 10px;
    opacity: 1;
}

button.btnsec {
    width: 100%;
    border: none !important;
    color: #2A2A72 0% 0% no-repeat padding-box;
    top: 707px;
    left: 787px;
    width: 85px;
    height: 28px;
    background: #fff 0% 0% no-repeat padding-box;
    border-radius: 5px;
    opacity: 1;
}

.d-flex.btn-css {
    justify-content: center;
}

.amount {
    font-size: 2.4em;
    color: #282973;
    font-weight: bolder;
}

:root {
    --pinkish-red: #C35A74;
    --medium-blue: #307BAA;
    --greenish-blue: #53BAB5;
    --bright-orange: #FF7445;
    --white-smoke: #F5F5F4;
    --white: #FFF;
    --dark-gray: #7D7C7C;
    --black: #000;
}

.bg_color2 {
    background: #d1d1d1 !important;
    font-weight: 909 !important;
}

.bg_color1 {
    background: #e5e5e5 !important;
}


.box {
    text-align: center;
    border: 2px solid #5091cd;
    height: auto;
    background: var(--white);
    background-color: transparent;
    height: 350px;
    position: relative;
    margin: 30px 0px;
}



.basic .title {
    background: #058D050D;
}

.standard .title {
    background: #058D050D;
}

.business .title {

    background: #058D050D;
}

.view {
    width: 100%;
    padding: 30px 0 20px;
    background: #fff;
    border-top-left-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    height: 100%;
}

i.fa.fa-check-circle.icon-cs {
    font-size: 16px;
    color: green;
}

.icon {
    display: flex;
    justify-content: center;
}

.icon img {
    width: 100px;
}

.cost {
    display: flex;
    justify-content: center;
    flex-direction: row;
    margin-top: 8px;
}

.amount {
    font-size: 2.8em;
    font-weight: bolder;
}



.description {
    margin: 30px auto;
    font-size: 0.8em;
    color: #7D7C7C;
    text-align: left;
}

ul {
    list-style: none;
}



li::before {
    content: "";
    background-position: center;
    background-size: cover;
    opacity: 0.5;

    display: inline-block;
    width: 10px;
    height: 10px;
    margin-right: 10px;
}

.button {
    margin: 0 auto 30px;
}

button {
    height: 30px;
    width: 250px;
    font-size: 0.7em;
    font-weight: bold;
    letter-spacing: 0.5px;
    color: #7D7C7C;
    border: 2px solid var(--dark-gray);
    border-radius: 50px;

    background: transparent;
}

button:hover {
    color: var(--white-smoke);
    transition: 0.5s;
    border: none;

    background: var(--bright-orange);
}

/ Responsiveness:Start /
@media screen and (max-width:970px) {
    .content {
        display: flex;
        align-items: center;
        flex-direction: column;
        margin: 50px auto;
    }

    .standard,
    .business {
        margin-top: 25px;
    }
}

.icon h3 {
    color: #5091cd;
    font-weight: 600;
}

.amount {
    font-size: 1.8em !important;
    color: #5091cd;
    font-weight: bolder;
}

.detail {
    margin: auto 0 auto 5px;
    width: 40px;
    font-size: 18px;
    font-weight: bold;
    line-height: 15px;
    color: #7D7C7C;
}

button.btn.signup {
    top: 1191px;
    left: 1054px;
    width: 141px;
    height: auto;
    background: #5091cd;
    /*border-radius: 5px;*/
    opacity: 1;
    color: #fff;
}

p.list {
    color: #5091cd;
    font-size: 20px;
}

p {
    font-size: 12px !important;
    font-weight: 500;
    color: #a7a0a0;

}

p.ptext {
    padding: 0px 20px;
}

button.btn.signup {
    border: none;
    border-radius: 0px;
}

h2.hed {
    text-align: center;
    font-size: 40px;
    color: #5091cd;
    font-weight: 500;
}

section.mt-4 {
    margin-top: 50px !important;
    / margin-bottom: 40px !important; /
}

.card.center {
    text-align: center;
    margin-top: 20px;
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    / border: 1px solid rgba(0,0,0,.125); /
    background: transparent url(img/Logo.png) 0% 0% no-repeat padding-box;
    box-shadow: 0px 3px 6px #00000029;
    border-radius: 0.25rem;
}

/ Responsiveness:End /
[data-toggle="collapse"] i:before {
    content: "\f068";
}

[data-toggle="collapse"].collapsed i:before {
    content: "\f067";
}

.bottom-left {
    position: absolute;
    bottom: 8px;
    left: 16px;
}

.top-left {
    position: absolute;
    top: 8px;
    left: 16px;
}

.top-right {
    position: absolute;
    top: 8px;
    right: 16px;
}

.bottom-right {
    position: absolute;
    bottom: 8px;
    right: 16px;
}

.centered {
    position: absolute;
    top: 50%;
    font-family: Roboto, Arial, sans-serif;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #fff !important;

}

/*.container {
  position: relative;
  text-align: center;
  color: white;
}*/
.centered h1 {
    font-size: bold;
    font-size: 40px !important;
    font-weight: bold;
    color: #fff !important;
}



.btn:not(:disabled):not(.disabled) {
    cursor: pointer;
}

button.btn.signupm {
    position: absolute;
    z-index: 9999 !important;
    width: 150px;
    background-color: #41a44b;
    text-align: center;
    top: -16px;
    color: #fff;
    border-radius: 0px;
    left: 50%;
    line-height: 0px !important;
    transform: translateX(-50%);
}

.price-card--price-number:before {
    content: "$";
    font-size: 2rem;
    display: inline-block;
    position: relative;
}

.price-card--price-number:after {
    content: "/ mo";
    font-size: 1.3rem;
    display: inline-block;
}

.switch-label {
    text-align: center;
    /*  opacity: 0.4;*/
    font-size: 1rem;
    cursor: pointer;
    padding: 0 1rem;
    font-weight: bold;
    font-size:16px !important;
}

.switch-label .save-money {
    color: #3498db;
    font-style: italic;
    padding-left: 0.5rem;
}

.save-money--mobile {
    color: #3498db;

    display: none;
}

.switch-label.active {
    opacity: 1;
}

.switch {
    position: relative;
    display: inline-block;
   width: 3.9rem;
    height: 1.35rem;
    vertical-align: -10%;
    margin: 0;
}

.switch input {
    display: none;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #41a44b;
    border-radius: 34px;
    -webkit-transition: 0.1s;
    transition: 0.1s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 10px;
    width: 10px;
    left: 0px !important;
    bottom: 2px;
    background-color: white;
    border-radius: 50%;
    -webkit-transition: 0.1s;
    transition: 0.1s;
}
#js-pricing-switch input:focus+.slider {
    box-shadow: 0 0 1px #2196f3;
}

#js-pricing-switch input:checked+.slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
}

@media (max-width: 980px) {
    / Pricing Switch /

    .switch-label {
        display: inline-block;
        width: auto;
    }

    .save-money {
        display: none;
    }

    .save-money--mobile {
        display: block;
        font-weight: bold;
    }
}

button.btn.signupm1 {
    background: #41a44b;
    color: #ffff !important;
    line-height: 0px !important;
    border: none;
    border-radius: 0px;
    margin: 30px 0px;
    width: 24%;
    font-size: 14px !important;
}

/*riya*/
/ pricing table /
.pricing-table {
    padding: 0px;
    margin: 0px;
    margin-top: 10px;
    border-spacing: 2px;
}

.pricing-table td {
    padding: 0px;
    border-left: 1px solid transparent;
    gap: 10px
}

.pricing-table .pricing-table-list td {
    padding: 10px 8px;
    font-weight: 500;
    text-align: center;
    font-size: 12px;
    background: #F9F9F9;
}

.pricing-table .pricing-table-list .glyphicon-ok {
    color: #68AF27;
}

.pricing-table .pricing-table-list .glyphicon-remove {
    color: #C22439;
}

.pricing-table .pricing-table-list td:first-child {
    font-weight: 600;
    text-align: left;
    border-left: 0px;
    font-size: 12px;
    color: #333;
    text-transform: uppercase;
}

.pricing-table .pricing-table-list:nth-child(2n) td {
    background: #F2F2F2;
}

.pricing-table .pricing-table-text h2 {
    font-size: 35px;
    font-weight: 300;
    line-height: 33px;
    margin: 0px;
    padding: 0px;
    text-align: center;
    color: #009AD7;
}

.pricing-table .pricing-table-text p {
    font-size: 12px;
    font-weight: 400;
    text-align: center;
    color: #666;
    margin-top: 10px;
}

.pricing-table .pricing-table-item {
    color: #FFF;
}

.pricing-table .pricing-table-item .pricing-table-item-head {
    padding: 10px 5px;
    text-align: center;
    background: #009AD7;
}

.pricing-table .pricing-table-item .pricing-table-item-head p {
    font-size: 17px;
    font-weight: 600;
    line-height: 21px;
    text-transform: uppercase;
    margin-bottom: 0px;
}

.pricing-table .pricing-table-item .pricing-table-item-head span {
    font-size: 11px;
    font-weight: 400;
}

.pricing-table .pricing-table-item .pricing-table-item-price {
    padding: 15px 10px;
    text-align: center;
    background: #FFF;
    color: #009AD7;
}

.pricing-table .pricing-table-item .pricing-table-item-price p {
    font-size: 41px;
    font-weight: 400;
    line-height: 36px;
    margin-bottom: 0px;
}

.pricing-table .pricing-table-item .pricing-table-item-price p span {
    font-size: 12px;
    font-weight: 300;
}

.pricing-table .pricing-table-item .pricing-table-item-price>span {
    font-size: 12px;
    font-weight: 400;
    color: #009AD7
}
td.bg_color1.ak {
    width: 377%;
    background: white!important;
    display: flex;
}

.pricing-table .pricing-table-item .pricing-table-item-purchase {
    padding: 10px 5px;
    background: #FFF;
}

.pricing-table .pricing-table-item .pricing-table-item-purchase .btn {
    text-transform: uppercase;
    margin-bottom: 0px;
}

/ eof pricing table /
h5 {
    text-align: center;
}
.tooltip-inner {
    background-color: #fefbe5!important;
    font-size: 13px;
    color: #000!important;
}

td {
    width: 7%;
    / margin: 10px !important; /
    / padding: 10px !important; /
    / background-color: #000; /
}

table {
    border-collapse: separate !important;
    border-spacing: 5px;
}

i.fa.fa-check.right {
    color: #41a44b;
    font-weight: 900 !important;
    font-size: 20px !important;
}
i.fas.fa-info-circle {
    float: right;
    padding-right: 10px;
}
span.glyphicon.glyphicon-ok {
    font-size: 18px !important;
}
@media only screen and (max-width: 768px) {
    .centered {
        font-family: Roboto, Arial, sans-serif;
        color: #fff !important;
        width: 100%;
        padding: 20px;
        height: 100%;
        background: #00000070;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
.banner img {
    height: 330px;
    object-fit: cover;
    width: 100%;
}
.content {
     display: flex; 
     align-items: baseline !important;
    flex-direction: row !important;
     margin: 0px auto !important; 
}
.modal.left .modal-body, .modal.right .modal-body {
    padding: 15px 15px 80px;
    margin-top: 10px !important;
}
p.ptext1 {
    color: #606060;
    font-size: 13px !important;
    font-weight: 600;
    width: 100% !important;
}
#tableId {
    overflow-x: scroll;
}
.centered h1 {
    font-size: 36px !important;
    font-weight: bold;
    width: 100% !important;
}
.centered span {
    font-size: 18px;
}
button.btn.signupm1 {
    background: #41a44b;
    color: #ffff !important;
    line-height: 0px !important;
    border: none;
    border-radius: 0px;
    margin: 30px 0px;
    width: 100%;
    font-size: 14px !important;
}
}
.modal.left .modal-body, .modal.right .modal-body {
    padding: 15px 15px 80px;
    margin-top: 50px !important;
}


/*pop*/
/*******************************
* MODAL AS LEFT/RIGHT SIDEBAR
* Add "left" or "right" in modal parent div, after class="modal".
* Get free snippets on bootpen.com
*******************************/
  .modal.left .modal-dialog,
  .modal.right .modal-dialog {
    position: fixed;
    margin: auto;
    width: 350px;
    height: 100%;
    -webkit-transform: translate3d(0%, 0, 0);
        -ms-transform: translate3d(0%, 0, 0);
         -o-transform: translate3d(0%, 0, 0);
            transform: translate3d(0%, 0, 0);
  }
  button.close {
    width: 0px !important;
}

  .modal.left .modal-content,
  .modal.right .modal-content {
    height: 100%;
    overflow-y: auto;
  }
  
  .modal.left .modal-body,
  .modal.right .modal-body {
    padding: 15px 15px 80px;
  }

/*Left*/
  .modal.left.fade .modal-dialog{
    left: -320px;
    -webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
       -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
         -o-transition: opacity 0.3s linear, left 0.3s ease-out;
            transition: opacity 0.3s linear, left 0.3s ease-out;
  }
  
  .modal.left.fade.in .modal-dialog{
    left: 0;
  }
        
/*Right*/
  .modal.right.fade .modal-dialog {
    right: -320px;
    -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
       -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
         -o-transition: opacity 0.3s linear, right 0.3s ease-out;
            transition: opacity 0.3s linear, right 0.3s ease-out;
  }
  
  .modal.right.fade.in .modal-dialog {
    right: 0;
  }

/ ----- MODAL STYLE ----- /
  .modal-content {
    border-radius: 0;
    border: none;
  }

  .modal-header {
    border-bottom-color: #EEEEEE;
    background-color: #FAFAFA;
  }



.demo {
  padding-top: 60px;
  padding-bottom: 110px;
}

.btn-demo {
  margin: 15px;
  padding: 10px 15px;
  border-radius: 0;
  font-size: 16px;
  background-color: #FFFFFF;
}

.btn-demo:focus {
  outline: 0;
}

.demo-footer {
  position: fixed;
  bottom: 0;
  width: 100%;
  padding: 15px;
  background-color: #212121;
  text-align: center;
}

.demo-footer > a {
  text-decoration: none;
  font-weight: bold;
  font-size: 16px;
  color: #fff;
}





div#myModal2 {
    z-index: 100000000 !important;
}
#radioButtons{
  margin: 5px 0 10px 0;
}

input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
    width: 60%;
    background-color: #5091cd;
    color: white;
    padding: 12px 12px;
    justify-content: center !important;
    margin-top: 12px;
    border: none;
    / border-radius: 4px; /
    cursor: pointer;
}

input[type=submit]:hover {
  background-color: #018c94;
}

.div1 {
  margin: auto;
  width: 30%;
  border-radius: 5px;
  background-color: #ededed;
  padding: 20px;
  font-family: 'Work Sans', sans-serif;
}
.banner {
    position: relative;
}

button.btn.signup.footer {
    background-color: #41a44b;
    margin-top: 30%;
}
.icon.icon1 {
    justify-content: left;
    color: #41a44b;
}
h3.features {
    color: #2a2a72;
    font-size: 40px;
}
p.ptext1 {
    color: #606060;
    font-size: 13px !important;
    font-weight: 600;
    width: 500px;
}
img.imgf {
    margin-top: 18%;
}
button.btn.signup.footer {
    background-color: #41a44b;
    margin-top: 30%;
    width: 60%;
    padding: 8px;
    justify-content: end;
    float: right;
}
.main {
    background: #fff;
    padding: 30px;
}
.main {
    background: #fff;
    padding: 30px;
    border-top: 20px solid #41a44b;
    border-bottom: 20px solid #41a44b;
    margin: 30px 0;
}
.modal-header {
   
    width: 100% !important;
}
.input-radio.on:checked {
  /*  box-shadow: 0px 0px 0px 4px #00eb27 !important;*/
    color: #51ff6e !important;
}
.check{display: flex !important; gap:20px !important;
justify-content: Justify space between !important;
margin-bottom: 20px !important;
}
.content {
    width: 250px !important;
}
label {
    font-weight: 400 !important;
    font-size: 12px;
}
.content{display: flex !important; gap:10px !important;}
.modal-header {
    padding: 15px;
    border-bottom: 1px solid #e5e5e5;
    color: #5091CD;
    font-size: 16px;
    font-weight: 600;
}
button.close {
    color: #5091CD !important;
    opacity: 0.9;
}
span.content {
    color: blue;
    text-align: center;
    justify-content: center;
    font-weight: 900;
    margin-bottom: 20px;
    margin-top: 30px;
}
span.price {
    margin-bottom: 20px !important;
    margin-top: 30px !important;
    color: blue;
    font-weight: 700;
}

tr:nth-child(odd) td {
    background: #fff;
    border: navajowhite;
}

.wrap {
    width: 1170px;
    margin: 0 auto;
    text-align: left;
}

.navigation .menu > li > a {
    padding: 0px 1px;
    font-size: 12px;
    margin: 0px !important;
    letter-spacing: 0;
    font-weight: 600;
}

.navigation .menu ul li, .navigation .menu .sub-menu li {
    float: none;
    min-width: 240px;
    max-width: 350px;
    border-top: 0;
    line-height: 12px !important;
    padding: 0;
    position: relative;
}

.bg_color1 {
    background: #e5e5e5 !important;
}

.bg_color2 {
    background: #efefef !important;
    font-weight: 909 !important;
}

.pricing-table-item-purchase h5 {
    text-align: center;
    font-weight: 700;
}

@media only screen and (max-width: 768px){
button.btn.signupm1 {
    background: #41a44b;
    color: #ffff !important;
    line-height: 0px !important;
    border: none;
    border-radius: 0px;
    width: 90%;
    font-size: 14px !important;
} 
.wrap {
    width: 100% !important;
    padding: 0 22px;
}
 button.btn.signup.footer {
    background-color: #41a44b;
    / margin-top: 30%; /
    width: unset;
    padding: 8px;
    justify-content: end;
    float: left;
    margin-top: 0px !important;
}
}

</style>
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
    <div class="banner">
        <img src="https://www.intherooms.com/home/wp-content/uploads/2024/01/ban.jpg" alt="Snow" style="width:100%;">

        <div class="centered">
           <h1>List your Practice on In The Rooms</h1>
           <center><span>Help those seeking addiction treatment find your treatment center or medical services</span>
           </center>
        </div>
    </div>
    <div class="container-fluid-fluid"></div>
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
                                            <p style="display:none" id="save_percentage_<?=$value->pricing_name?>"><?=number_format((float)$saving_percentage, 2, '.', '')?>%</p>
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

            <div class="col-xs-12 col-md-12" id="tableId">
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
                        campaigns that fit your goals and target.</td>
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
     <div class="col-md-6 col-lg-3 col-sm-12"><img class="imgf" width="40%" src="https://d1nhio0ox7pgb.cloudfront.net/_img/g_collection_png/standard/512x512/hospital.png"></div>
    <div class="col-md-6 col-lg-6 col-sm-12">
                   
                        <div class="view">
                           <div class="icon icon1">
                              <h3 class="features">Feature your center</h3>
                           </div>
                           <p class="ptext1">Ready to connect with treatment seekers across the country? Enter your
information to learn about our advertising options and get in contact with our
development team.</p>
                        </div>

              
                  </div>
                   <div class="col-md-6 col-lg-3 col-sm-12"> <button class="btn signup footer">Submit Your Center</button></div>
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

         </div><!-- modal-content -->
      </div><!-- modal-dialog -->
   </div><!-- modal -->
   <br><br>
   <form action="/directory-subscription" method="post" id="submission_form">
   <input type="hidden" name="monthly_yearly" id="monthly_yearly"  value="monthly">
   <input type="hidden" name="selected_option" id="selected_option" value="">
   <input type="hidden" name="selected_ala_option" id="selected_ala_option" value="">
   </form>
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
   <script>
      jQuery(document).ready(function ($) {
         $('[data-toggle="tooltip"]').tooltip();
      });
   </script>
</body>
<?php
get_footer();


