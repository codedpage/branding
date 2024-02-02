<?php
/**
 * Template Name: Find Treatment Base
 * 
 * Static Find Addiction Treatment Center with search functionality
 * 
 */

get_header();
?>
<div style="text-align:center">
  <div id='div-gpt-ad-1622851086580-0' style='min-width: 728px; min-height: 90px;margin:15px 0;'>
    <script>
      googletag.cmd.push(function() { googletag.display('div-gpt-ad-1622851086580-0'); });
    </script>
  </div>
</div>
<?php
$upload_arr= wp_upload_dir(); $upload_dir_url = $upload_arr['baseurl'];
?>
<style>
/** ================= START - ITR NEW PAGE - CSS ======================= */
input[type="submit"].btnsrc-btn {
    background-color: #5091cd;
    border: 1px solid #FFFFFF;
    margin: 0 auto;
    outline: none;
    width: 150px;
    height: 25px;
    padding: 6px 1em;
    font-family: inherit;
    font-size: 14px;
    color: #FFFFFF;
    line-height: 1.5;
    text-align: center;
    cursor: pointer;
}
.clearfix:before, .clearfix:after{
    content:'.';
    display:block;
    height:0;
    overflow:hidden;
    visibility:hidden;
    width:0;
}
.clearfix:after{
    clear:both;
}
.clearfix{
    zoom: 1;
}

/* @import url('https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300&display=swap'); */

body, html{
    margin:0;
    padding:0;
}

body{
    font-family: 'Open Sans', sans-serif;
}
a {
    opacity: initial;
    text-decoration: none;
    transition: all .25s ease-in-out;
}
a:hover {
    transform: scale(1.05);
}
.head-sn{
    width:100%;
    margin:0.7em 0 1em 0;
    text-align:center;
}
*{
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.head-sn img{
    max-width:100%;
    display:block;
    margin:0 auto;
}
.multi-colr{
    background-image: -webkit-linear-gradient(left, #5596c0, #6faf73);
    background-image: -o-linear-gradient(left, #5596c0, #6faf73);
    background-image: linear-gradient(to right, #5596c0, #6faf73); 
    width:100%; 
    display:inline-block;
}


.container {
    max-width: 1170px;
    margin: 0 auto;
    padding: 0 20px;
}
.row {
    display: block;
    padding: 0;
}

.row .col {
    float: left;
    min-height: 1px;
    position: relative;
}
.row .three {
    width: 25%;
}
.row .twl {
    width: 100%;
}
.post-grid {
    margin: 0 -10px;
    text-align: center;
}
.post-grid > .col{
    padding: 0 10px 10px;
}

.text-pnl{
    padding:0.7em;	
}
.text-pnl p{
    font-family: 'Open Sans Condensed', sans-serif;
    font-size: 1.7em;
    line-height: 1.5;
    color: #FFFFFF;
    font-weight: 300;
}
.text-pnl p.small{
    font-size:1.3em;
}
.text-pnl h2{
    font-family: 'Open Sans Condensed', sans-serif;
    font-size: 2em;
    line-height: 1.5;
    color: #FFFFFF;
    font-weight: 400;
}
.text-pnl p strong{
    font-weight:400;
}
.mrg{
    margin:0;
}
.btn-list-group {
    margin-bottom: 1em;
    width:100%;   
}
.btn-list-group a{
    padding:0.5em 1em;
    text-align:center;
    background-color:#FFFFFF;
    border:none;
    outline:none;
    display:block;
    font-family:'Open Sans', sans-serif;
    font-size:1.7em;
    line-height:1.3;
    color:#5091cd;
    font-weight:400;
    text-decoration:none;
    box-shadow:0px 0px 7px rgba(0,0,0,0.38);
    -webkit-box-shadow:0px 0px 7px rgba(0,0,0,0.38);
    -moz-box-shadow:0px 0px 7px rgba(0,0,0,0.38);
    -khtml-box-shadow:0px 0px 7px rgba(0,0,0,0.38);
}
.btn-list-group a:hover, 
.btn-list-group a:focus, 
.btn-list-group a:active,
.btn-list-group a.on{
    background-color:#5091cd;
    color:#FFFFFF;	
}

.sign-fm label{
    font-family: 'Open Sans', sans-serif;
    font-size:0.9em;
    line-height:1.3;
    color:#000000;
}

.sign-fm input,
.sign-fm select{
    margin:0;
    outline:none;
    height: 30px;
    padding: 5px 7px;
    font-size: 0.9em;
    line-height: 1.42857143;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.ftr-pnl {
    margin:1em 0;
    border-top:1px solid #F7F7F7;
}
.ftr-pnl .ftr-btn {
    padding: 0.3em 1.7em;
    line-height:1.5;
    font-family: 'Open Sans', sans-serif;
    font-size: 1.1em;
    font-weight:400;
    text-decoration:none;
    margin: 1em 0;
    text-align:center;
    color: #FFFFFF;
    display: inline-block;
    background: #6faf73;
    text-transform: uppercase;
    border:none;
    outline:none;
    height:auto;
    opacity: initial;
    text-decoration: none;
    transition: all .25s ease-in-out;
}
.ftr-pnl .ftr-btn:hover {
    cursor:pointer;
    transform: scale(1.05);
}

.se-block-locations-content {
    text-align: center;
}
.se-block-locations-content > .search-directory-form > .geo-details > .form-control.input-fld.location
{
    display: block;
    width: calc(100% - 24px);
    margin-left: 12px;
    max-width: 368px;
    height: 48px;
    border-radius: 2px;
    background-color: #fff;
    border: solid 1px #9b9b9b;
    padding: 5px 15px;
    margin: 20px auto;
    text-align: center;
}
.se-block-locations-content > .search-directory-form > .se-btn {
    display: inline-block;
    /* border-radius: 25px; */
    background-color: #41a44b;
    border: 2px solid #41a44b;
    color: #fff;
    min-height: 36px;
    max-width: 170px;
    width: calc(100% - 100px);
    font: 900 16px/40px "Roboto",sans-serif;
    text-transform: uppercase;
    text-align: center;
    padding: 0 40px;
}
.se-block-locations-content > .search-directory-form > .se-btn:hover, .se-block-locations-content > .search-directory-form > .se-btn:focus {
    color: #fff;
    text-decoration: none;
    background-color: #2b6d32;
    border: 2px solid #2b6d32;
}
/*media*/
@media (min-width:767px) and (max-width:940px){
  h3.module-title{font-size:1.5em;line-height:1em}
}
@media (max-width:432px){
   h3.module-title{font-size:1.5em;line-height:1em}
}

@media only screen and (min-width: 768px){
    .multi-colr{
        min-height:300px;
    }
    .btn-list-group a{
        min-height: 120px;
    }
    .text-pnl{
        padding:2em 2em 0.7em 2em;	
    }
    .text-pnl h2{
        margin-top:1em;
    }
    .btn-h1{
        padding-top:1em;
    }
    .btn-h2{
        padding-top:0.4em;
    }
    .sign-fm .select-1{
        margin-right:1em;
    }
}
@media only screen and (max-width: 767px){
    .container {
        padding: 0;
    }
    .post-grid {
        margin: 0 0px;
    }
    .post-grid  .col{
        padding: 0 0 15px;
    }	
    .row .three{
        width: 100%;
        float: none;
    }
    .post-grid  .col{
        padding: 0 0 15px;
    }
    .head-sn img {
        max-width: 80%;
        height: auto;
    }
    .btn-list-group a{
        margin:0 1em;
    }
    .sign-fm{
        margin-top:1em;
    }
    .sign-fm label{
        width:100%;
        display:block;
        margin-top:1em;
    }
    .sign-fm input,
    .sign-fm select{
        margin:0.3em 0;
    }
}

.error-alert {
    color: #721c24;
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
    padding: .55rem 1rem;
    margin-bottom: 1em;
    font-family:inherit;
    font-size:1em;
    line-height:1.5;
    font-weight:300;
    text-align:center;
}

/** ================= END - ITR NEW PAGE - CSS ======================= */


/** ================= Start - ITR Directory - CSS ======================= */
.multi-colr2{
    background-image: -webkit-linear-gradient(left, #5596c0, #6faf73);
    background-image: -o-linear-gradient(left, #5596c0, #6faf73);
    background-image: linear-gradient(to right, #5596c0, #6faf73); 
    width:100%; display:inline-block;
}

.ser-dirc-pnl {
    padding: 1em;
}
.ser-dirc-pnl h2{
    font-family: 'Open Sans Condensed', sans-serif;
    font-size: 1.5em;
    line-height: 1.5;
    color: #FFFFFF;
    font-weight:700;
    text-align: center;
    margin:0 0 1em 0;
}
.search-bnr{
    background-color:#FFFFFF;
    border:1px solid #aebdbb;
    margin:0 auto;
}
.search-bnr input[type=search]{
    background-color:transparent;
    float: left;
    margin:0;
    outline:none;
    border:none;
    display: block;
    width:90%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.search-bnr .btnsrc{
    background-color:transparent;
    float: left;
    margin:0;
    outline:none;
    border:none;
    display: block;
    width:10%;
    height: 34px;
    padding: 6px 0;
    font-size: 14px;
    line-height: 1.42857143;
    text-align:center;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.btnsrc-pnl{
    text-align:center;
    margin-top:1em;
}
.btnsrc-btn{
    background-color:#5091cd;
    border:1px solid #FFFFFF;
    margin:0 auto;
    outline:none;
    width:150px;
    height: 37px;
    padding: 6px 1em;
    font-family:inherit;
    font-size: 14px;
    color:#FFFFFF;
    line-height: 1.5;
    text-align:center;
    cursor:pointer;
}
.ser-pnl-hdg{
    font-family: 'Open Sans Condensed', sans-serif;
    font-size: 1.7em;
    line-height: 1.5;
    color: #707070;
    font-weight:700;
    text-align: center;
    text-transform:uppercase;
    margin:1.5em 0 1em 0;
}
.event-map-bg{
    background:url(<?php echo $upload_dir_url;?>/images/map.png) center top no-repeat;
    width:1180px;
    height:681px;
    margin:0 auto;
}
#area_image{
    width:1180px;
    height:681px;
    margin:0 auto;
}
map area {
    outline:none;
}

.st-list{
    margin:0;
    padding:1em 0 0 0;
}
.st-list li{
    float: left;
    min-height: 1px;
    font-family:'Open Sans', sans-serif;
    font-size:1em;
    line-height:1.4;
    color:#707070;
    font-weight:500;
    text-transform:uppercase;
    text-decoration:none;
    text-align:left;
    outline:none;
    list-style-type:none;
    padding: 0.3em 0;
}
.st-list li a{
    color:#707070;
    text-decoration:none;
}
.st-list li a:hover{
    color:#6faf73;
    text-decoration:none;
}

@media (min-width:768px) {
    .multi-colr2{
        padding:3em 0;
    }
    .search-bnr{
        width:35%;
    }
    .ser-dirc-pnl h2{
        font-size: 2em;
    }
}
@media (max-width:767px) {
    #event-map{
        display:none;
    }	
}
@media (max-width: 940px){
    ul.st-list { margin-left: 3em; }
    .col-2-my{ width: 50% !important;}
    .ts-row .col-2-my {	padding-left: 15px;padding-right: 15px;float: left;min-height: 1px;box-sizing: border-box;}
}
/** ================= END - ITR Directory - CSS ======================= */
</style>

<section class="multi-colr2">

    <div class="container">
        <div class="cf row">
            <div class="col twl">
                <div class="ser-dirc-pnl">
                    <h1 style="text-align: center;color: #FFFFFF;margin: 0 0 1em 0;">Find Addiction Treatment Centers Near You</h1>
                    <!--
                    <div class="search-bnr clearfix">
                        <input type="search" placeholder="Enter a location"> <button class="btnsrc"><i class="fa fa-map-marker" aria-hidden="true"></i></button>
                    </div>
                    <div class="btnsrc-pnl"><input type="submit" value="Search" class="btnsrc-btn"></div>
                    -->
                    <div class="se-block-locations-content">
                        <form id="search-directory-form" class="search-directory-form" method="get" action="<?php echo get_home_url();?>/directory/">
                            <label for="search-directory-form-term" class="sr-only">Street, City, State or ZIP</label>
                            <div class="geo-details">
                                <input type="text" name="itr-location" id="itr-location" placeholder="Enter a location" class="form-control input-fld location" value="" autocomplete="off">
                                <input id="itr-lat" type="hidden" data-geo="lat" name="itr-lat">
                                <input id="itr-lng" type="hidden" data-geo="lng" name="itr-lng">
                            </div>
                            <input type="submit" class="se-btn" value="Find Treatment">    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<div class="container">
    <div class="row cf post-grid">
        <div class="col twl ser-pnl">
            <h3 class="ser-pnl-hdg">Treatment Centers and Addiction Doctors in the United States</h3>
            <div data-type="event-map" id="event-map">
                <div class="event-map-bg">
                    <div id="area_image">
                        <img src="<?php echo $upload_dir_url;?>/images/map-trs.png" usemap="#map" border="0">
                        <map name="map">
                            <area shape="poly" coords="44,39,37,37,31,35,26,31,24,35,25,41,30,55,37,80,41,87,49,94,58,100,64,109,73,113,90,107,95,111,106,107,113,107,139,99,179,98,178,88,177,67,178,46,178,31,178,12,117,12,88,12,63,12,66,22,66,27,65,36,62,41,55,39,47,40" href="washington/" alt="Washington" title="Washington" onmouseover="change_image('wa')" onmouseout=" hide_image('wa')"> 
                            <area shape="poly" coords="84,110,79,113,76,114,72,114,64,111,59,105,57,101,50,97,44,91,40,89,37,84,38,95,39,109,39,133,36,154,27,188,31,192,31,203,34,211,42,211,55,211,69,211,81,211,93,211,103,211,116,211,121,211,131,211,142,211,152,211,161,211,177,211,177,159,179,152,172,147,188,111,178,100,140,100,129,104,115,109,106,109,96,113,90,109" href="oregon/" alt="Oregon" title="Oregon" onmouseover="change_image('or')" onmouseout=" hide_image('or')">
                            <area shape="poly" coords="77,212,34,212,33,216,38,222,37,225,37,236,31,251,32,257,38,263,42,267,43,290,58,306,59,310,58,314,62,314,67,318,68,322,69,328,70,335,74,339,79,340,83,344,83,346,79,350,80,355,82,358,87,364,92,371,100,377,100,383,106,383,106,385,105,397,109,400,126,401,136,409,148,410,149,417,157,418,165,426,170,430,176,446,227,442,228,436,223,434,223,426,227,422,228,410,235,406,229,401,226,390,174,343,145,316,118,291,118,254,118,227,118,212,99,212" href="california/" alt="California" title="California" onmouseover="change_image('ca')" onmouseout=" hide_image('ca')">
                            <area shape="poly" coords="210,212,192,212,174,212,156,212,119,212,119,239,119,265,119,270,119,275,119,279,119,284,120,290,124,293,130,299,140,308,145,313,153,320,159,326,165,332,178,344,224,386,222,360,233,360,236,360,236,337,236,328,236,319,236,311,236,303,236,293,236,282,236,275,236,270,236,262,236,253,236,245,236,233,236,212" href="nevada/" alt="Nevada" title="Nevada" onmouseover="change_image('nv')" onmouseout=" hide_image('nv')"> 
                            <area shape="poly" coords="196,13,179,13,179,59,179,89,180,100,190,111,180,134,174,147,181,151,178,161,178,174,178,179,178,185,178,190,178,201,178,211,297,209,297,146,294,143,292,137,288,141,273,142,272,144,265,144,261,147,254,135,248,133,248,126,239,110,231,116,226,114,228,104,231,82,222,80,210,64,202,60,204,57,197,44" href="idaho/" alt="Idaho" title="Idaho" onmouseover="change_image('id')" onmouseout=" hide_image('id')"> 
                            <area shape="poly" coords="198,13,198,28,198,43,205,56,204,60,209,62,218,72,222,79,233,82,230,94,229,107,227,113,230,115,238,110,249,125,249,133,254,134,256,137,261,145,265,143,271,143,274,141,287,140,292,137,296,146,298,129,313,128,436,129,436,13" href="montana/" alt="Montana" title="Montana" onmouseover="change_image('mt')" onmouseout=" hide_image('mt')">
                            <area shape="poly" coords="299,130,299,167,299,207,299,236,393,236,437,236,436,130" href="wyoming/" alt="Wyoming" title="Wyoming" onmouseover="change_image('wy')" onmouseout=" hide_image('wy')">
                            <area shape="poly" coords="437,13,436,100,586,101,586,90,582,83,581,74,581,66,581,54,575,39,576,20,574,13" href="north-dakota/" alt="North Dakota" title="North Dakota" onmouseover="change_image('nd')" onmouseout="hide_image('nd')">
                            <area shape="poly" coords="587,180,586,175,586,122,579,111,584,102,437,102,437,183,526,183,549,183,556,188,561,187,576,187,584,194" href="south-dakota/" alt="South Dakota" title="South Dakota" onmouseover="change_image('sd')" onmouseout=" hide_image('sd')">
                            <area shape="poly" coords="575,13,576,39,583,53,583,81,587,91,587,101,581,111,588,122,588,170,692,171,692,162,674,145,661,137,664,117,660,110,664,103,671,98,672,82,676,77,704,51,727,43,719,43,715,39,702,40,700,36,687,41,676,32,673,33,672,35,669,34,669,30,665,29,665,26,659,24,643,27,641,24,628,22,624,19,622,9,621,4,619,2,614,2,614,12,593,12,582,12" href="minnesota/" alt="Minnesota" title="Minnesota" onmouseover="change_image('mn')" onmouseout=" hide_image('mn')">
                            <area shape="poly" coords="237,211,237,339,337,339,337,259,337,237,297,237,297,211" href="utah/" alt="Utah" title="Utah" onmouseover="change_image('ut')" onmouseout=" hide_image('ut')">
                            <area shape="poly" coords="238,340,238,360,235,364,230,361,224,362,226,388,231,400,237,405,235,410,231,412,230,421,225,427,225,432,230,436,229,441,227,444,224,444,223,447,295,474,337,474,337,340" href="arizona/" alt="Arizona" title="Arizona" onmouseover="change_image('az')" onmouseout=" hide_image('az')">
                            <area shape="poly" coords="338,381,338,474,353,474,354,464,384,464,382,457,456,457,456,340,338,340" href="new-mexico/" alt="New Mexico" title="New Mexico" onmouseover="change_image('nm')" onmouseout=" hide_image('nm')">
                            <area shape="poly" coords="338,237,338,339,476,338,476,266,476,237" href="colorado/" alt="Colorado" title="Colorado" onmouseover="change_image('co')" onmouseout=" hide_image('co')">
                            <area shape="poly" coords="438,184,438,236,477,236,477,263,611,263,604,250,600,244,599,229,596,224,596,214,590,205,590,197,586,197,574,188,562,188,557,191,548,184" href="nebraska/" alt="Nebraska" title="Nebraska" onmouseover="change_image('ne')" onmouseout=" hide_image('ne')">
                            <area shape="poly" coords="477,338,625,338,625,287,621,284,614,274,621,269,619,267,613,264,554,264,477,264" href="kansas/" alt="Kansas" title="Kansas" onmouseover="change_image('ks')" onmouseout=" hide_image('ks')">
                            <area shape="poly" coords="626,339,457,339,457,350,519,350,519,397,526,402,531,398,536,406,549,409,556,406,560,412,565,410,570,414,573,411,575,413,580,411,583,415,588,412,592,417,597,413,617,413,628,420,628,371" href="oklahoma/" alt="Oklahoma" title="Oklahoma" onmouseover="change_image('ok')" onmouseout=" hide_image('ok')">
                            <area shape="poly" coords="428,513,449,527,455,528,461,522,466,511,491,510,505,526,513,544,529,561,530,573,537,586,554,593,564,594,570,599,575,595,569,590,565,574,575,558,588,541,613,530,625,519,639,513,639,508,642,505,642,495,645,485,646,481,636,461,636,422,629,423,615,414,597,415,591,420,587,415,582,417,578,413,575,418,573,414,571,416,570,415,563,412,560,415,555,408,549,411,534,407,531,401,527,405,518,398,518,351,457,351,457,458,385,459,385,462,419,492" href="texas/" alt="Texas" title="Texas" onmouseover="change_image('tx')" onmouseout=" hide_image('tx')">
                            <area shape="poly" coords="689,172,587,172,590,179,586,191,587,196,591,196,592,204,598,215,598,224,601,228,601,241,603,247,683,247,685,248,688,251,689,247,694,246,697,236,692,226,701,223,709,220,713,214,711,207,706,201,701,196,700,195,694,192,693,186,692,180,694,178,692,174" href="iowa/" alt="Iowa" title="Iowa" onmouseover="change_image('ia')" onmouseout=" hide_image('ia')">
                            <area shape="poly" coords="624,270,616,275,622,282,626,286,627,338,629,352,716,352,713,363,721,363,724,360,727,350,731,350,735,343,734,340,731,339,728,331,726,321,711,310,715,294,709,290,706,293,701,282,691,272,687,262,688,253,683,248,657,248,605,248,613,263,620,265" href="missouri/" alt="Missouri" title="Missouri" onmouseover="change_image('mo')" onmouseout=" hide_image('mo')">
                            <area shape="poly" coords="695,75,682,82,675,79,672,89,672,96,666,103,661,110,665,116,663,129,662,136,692,161,693,174,696,177,694,182,696,191,704,194,704,197,762,197,759,178,765,154,772,133,778,121,769,132,759,141,760,130,763,129,767,124,765,118,761,117,762,108,756,106,757,102,716,90,711,85,704,82,700,83,703,74" href="wisconsin/" alt="Wisconsin" title="Wisconsin" onmouseover="change_image('wi')" onmouseout=" hide_image('wi')">
                            <area shape="poly" coords="691,269,704,281,706,290,710,288,717,291,713,308,716,311,728,320,730,333,733,338,737,332,746,335,748,327,754,326,754,317,758,305,764,299,764,290,763,287,766,277,766,218,761,206,760,198,706,198,714,208,715,217,709,223,696,227,699,236,696,247,690,250,690,255,689,260" href="illinois/" alt="Illinois" title="Illinois" onmouseover="change_image('il')" onmouseout=" hide_image('il')">
                            <area shape="poly" coords="630,373,629,420,638,420,638,435,692,435,694,429,691,426,694,413,697,407,704,400,706,390,712,387,714,376,720,365,709,365,713,356,713,353,629,353" href="arkansas/" alt="Arkansas" title="Arkansas" onmouseover="change_image('ar')" onmouseout=" hide_image('ar')">
                            <area shape="poly" coords="638,436,638,459,649,482,644,494,645,505,641,511,660,511,664,514,677,514,675,510,679,510,685,512,691,517,694,519,693,521,697,524,704,524,707,521,712,522,714,525,718,523,714,516,723,518,722,521,729,523,734,527,737,524,723,515,731,511,728,507,723,510,720,505,710,504,715,496,724,503,726,500,719,490,720,484,683,483,685,474,692,461,697,452,692,445,693,436,664,436" href="louisiana/" alt="Louisiana" title="Louisiana" onmouseover="change_image('la')" onmouseout=" hide_image('la')">
                            <area shape="poly" coords="797,132,792,138,793,149,787,153,790,160,789,168,794,186,793,196,782,217,850,217,862,193,868,194,868,182,863,157,858,155,850,160,843,169,839,165,840,157,842,155,847,155,847,150,850,147,852,136,848,129,851,127,850,124,848,119,838,116,833,111,829,109,827,106,824,107,822,101,826,100,834,100,847,102,845,97,841,100,833,95,836,86,827,88,818,87,818,78,795,81,785,89,778,85,772,87,763,76,755,74,750,78,747,76,749,72,760,60,763,58,753,59,736,74,712,84,717,89,727,91,737,95,748,97,758,101,758,105,762,106,763,109,763,116,767,117,768,122,777,105,779,109,783,103,787,104,784,110,785,111,792,102,800,102,806,97,817,99,821,104,816,113,819,118,811,121,808,134,805,132,807,123" href="michigan/" alt="Michigan" title="Michigan" onmouseover="change_image('mi')" onmouseout=" hide_image('mi')">
                            <area shape="poly" coords="767,272,767,281,764,285,766,290,765,300,758,309,756,318,762,316,765,317,766,314,771,313,775,319,781,312,782,313,785,317,790,308,797,314,803,305,808,301,810,296,812,294,820,294,821,286,821,218,782,218,772,222,767,219" href="indiana/" alt="Indiana" title="Indiana" onmouseover="change_image('in')" onmouseout=" hide_image('in')">
                            <area shape="poly" coords="776,321,774,320,769,316,766,319,761,318,757,323,759,329,749,329,748,338,737,335,737,340,733,350,754,350,755,345,850,345,865,332,874,326,867,320,863,312,863,302,857,298,850,303,846,299,841,299,834,296,827,287,824,286,821,297,813,296,808,303,801,311,797,316,790,311,785,319,781,315,777,319" href="kentucky/" alt="Kentucky" title="Kentucky" onmouseover="change_image('ky')" onmouseout=" hide_image('ky')">
                            <area shape="poly" coords="871,227,860,225,857,223,850,218,822,218,822,285,827,285,834,294,841,298,846,297,851,300,857,296,862,299,865,302,873,302,873,295,874,288,881,292,883,290,883,281,889,279,895,277,901,270,906,246,906,213,896,216,883,224" href="ohio" alt="Ohio" title="Ohio" onmouseover="change_image('oh')" onmouseout=" hide_image('oh')">
                            <area shape="poly" coords="757,346,757,352,729,352,728,354,726,360,723,364,716,377,714,388,832,388,832,382,842,374,853,369,862,364,866,362,877,359,883,350,848,350,848,346" href="tennessee/" alt="Tennessee" title="Tennessee" onmouseover="change_image('tn')" onmouseout=" hide_image('tn')">
                            <area shape="poly" coords="700,451,697,458,689,469,687,477,685,482,722,482,722,490,727,499,731,497,740,494,748,496,748,445,753,406,754,389,711,389,707,396,707,401,701,405,697,412,695,420,693,426,697,429,695,437,695,443,696,448" href="mississippi/" alt="Mississippi" title="Mississippi" onmouseover="change_image('ms')" onmouseout=" hide_image('ms')">
                            <area shape="poly" coords="750,448,750,470,750,497,754,497,757,489,760,491,763,499,770,494,765,483,767,482,816,481,813,462,819,453,813,438,804,389,756,389,755,406" href="alabama/" alt="Alabama" title="Alabama" onmouseover="change_image('al')" onmouseout=" hide_image('al')">
                            <area shape="poly" coords="861,554,864,557,866,554,869,554,864,562,873,577,874,571,878,574,875,585,880,584,883,596,891,599,897,614,908,611,910,614,912,607,915,598,917,577,906,550,905,536,892,513,888,491,880,490,879,499,873,499,872,494,819,490,816,482,790,483,766,483,772,494,770,499,781,496,793,498,811,509,811,513,818,513,837,502,858,524,866,530" href="florida/" alt="Florida" title="Florida" onmouseover="change_image('fl')" onmouseout=" hide_image('fl')">
                            <area shape="poly" coords="805,389,815,438,821,453,815,464,817,479,820,488,873,492,875,497,878,496,878,489,888,489,888,480,891,476,893,466,898,460,893,456,887,437,865,414,859,402,849,395,853,389" href="georgia/" alt="Georgia" title="Georgia" onmouseover="change_image('ga')" onmouseout=" hide_image('ga')">
                            <area shape="poly" coords="870,417,888,435,895,456,899,459,908,447,912,447,919,442,933,430,936,422,944,415,925,393,903,393,897,387,896,385,876,384,866,385,856,389,851,395,860,401" href="south-carolina/" alt="South Carolina" title="South Carolina" onmouseover="change_image('sc')" onmouseout=" hide_image('sc')">
                            <area shape="poly" coords="842,377,837,382,834,383,834,388,855,387,869,382,897,384,903,392,925,392,945,414,957,414,960,405,970,397,985,394,987,396,992,391,981,390,987,383,983,378,986,376,994,379,998,373,1002,372,1002,368,997,364,984,365,987,361,995,361,996,357,1001,361,997,350,940,350,923,350,897,349,885,350,885,353,884,357,880,358,879,362,877,363,875,362,870,363,867,367,864,364,858,371,855,370" href="north-carolina/" alt="North Carolina" title="North Carolina" onmouseover="change_image('nc')" onmouseout=" hide_image('nc')">                        <area shape="poly" coords="912,328,902,331,895,335,890,334,885,336,876,328,864,335,850,348,999,349,998,343,990,343,987,338,991,338,988,333,993,328,990,323,992,317,985,312,974,301,975,292,965,284,960,286,953,281,943,295,938,295,933,305,924,301,919,313,915,320" href="virginia/" alt="Virginia" title="Virginia" onmouseover="change_image('va')" onmouseout=" hide_image('va')">
                            <area shape="poly" coords="874,300,875,302,873,303,864,303,864,309,870,321,876,325,880,329,885,334,890,332,894,333,902,329,910,327,924,298,932,303,938,292,941,294,949,284,952,278,962,284,961,274,955,271,948,276,943,272,938,278,938,276,929,280,929,270,907,270,906,249,904,262,903,268,899,276,893,279,886,281,884,283,884,289,884,293,879,293,877,291,875,290,874,297" href="west-virginia/" alt="West Virgina" title="West Virginia" onmouseover="change_image('wv')" onmouseout=" hide_image('wv')">
                            <area shape="poly" coords="1004,318,1011,314,1014,310,1017,302,1003,302,1000,273,993,287,992,297,993,304,1001,308" href="maryland/" alt="Maryland" title="Maryland" onmouseover="change_image('md')" onmouseout=" hide_image('md')">
                            <area shape="poly" coords="961,270,963,278,968,285,977,292,976,301,990,313,988,294,987,287,987,279,1002,270" href="washington-dc/" alt="Washington, DC" title="Washington, DC" onmouseover="change_image('dc')" onmouseout=" hide_image('dc')">
                            <area shape="poly" coords="1004,302,1017,301,1015,295,1012,293,1010,286,1002,273" href="delaware/" alt="Delaware" title="Delaware" onmouseover="change_image('de')" onmouseout=" hide_image('de')">
                            <area shape="poly" coords="1015,283,1019,283,1020,288,1029,278,1028,275,1031,274,1034,265,1038,254,1032,248,1036,244,1037,237,1032,234,1024,228,1017,236,1018,240,1015,246,1023,258,1014,266,1009,268,1005,274" href="new-jersey/" alt="New Jersey" title="New Jersey" onmouseover="change_image('nj')" onmouseout=" hide_image('nj')">
                            <area shape="poly" coords="908,269,1003,269,1013,265,1021,257,1017,251,1013,245,1017,240,1016,236,1023,228,1019,226,1016,217,1010,211,923,211,920,205,908,212,907,246" href="pennsylvania/" alt="Pennsylvania" title="Pennsylvania" onmouseover="change_image('pa')" onmouseout=" hide_image('pa')">
                            <area shape="poly" coords="994,157,992,161,993,165,994,168,982,177,967,178,964,175,949,173,937,177,939,184,942,189,922,205,923,210,1010,210,1017,216,1019,224,1039,236,1040,240,1045,235,1048,231,1047,206,1051,192,1052,169,1048,168,1048,151,1051,141,1050,135,1050,128,1022,128,1011,133,1000,147,990,153" href="new-york/" alt="New York" title="New York" onmouseover="change_image('ny')" onmouseout=" hide_image('ny')">
                            <area shape="poly" coords="1068,191,1065,188,1067,183,1069,173,1070,165,1075,156,1078,146,1085,142,1084,136,1087,129,1051,129,1052,144,1049,154,1049,167,1053,168,1053,181,1052,191,1061,191" href="vermont/" alt="Vermont" title="Vermont" onmouseover="change_image('vt')" onmouseout=" hide_image('vt')">
                            <area shape="poly" coords="1069,192,1094,192,1099,188,1103,181,1100,177,1097,173,1097,163,1096,160,1096,148,1096,121,1089,121,1088,128,1085,134,1085,143,1077,148,1077,154,1070,167,1069,179,1067,186" href="new-hampshire/" alt="New Hampshire" title="New Hampshire" onmouseover="change_image('nh')" onmouseout=" hide_image('nh')">
                            <area shape="poly" coords="1097,192,1087,192,1073,193,1066,192,1052,192,1048,209,1068,211,1080,210,1091,210,1092,218,1097,224,1104,216,1105,219,1106,223,1111,219,1105,213,1104,209,1102,205,1097,203,1100,195,1106,193,1098,189" href="massachusetts/" alt="Massachusetts" title="Massachusetts" onmouseover="change_image('ma')" onmouseout=" hide_image('ma')">
                            <area shape="poly" coords="1069,212,1049,211,1049,232,1073,228,1077,225,1078,218,1079,212" href="connecticut/" alt="Connecticut" title="Connecticut" onmouseover="change_image('ct')" onmouseout=" hide_image('ct')">
                            <area shape="poly" coords="1081,227,1088,226,1087,226,1089,223,1087,222,1088,218,1091,215,1090,211,1081,211,1080,217,1080,222,1078,226,1077,228" href="rhode-island/" alt="Rhode Island" title="Rhode Island" onmouseover="change_image('ri')" onmouseout=" hide_image('ri')">
                            <area shape="poly" coords="1098,173,1103,180,1109,171,1112,165,1116,160,1121,163,1123,159,1126,159,1130,156,1133,157,1136,151,1140,146,1146,152,1146,147,1149,145,1152,149,1154,147,1153,143,1155,143,1158,147,1160,144,1161,141,1166,140,1166,138,1170,139,1171,137,1175,138,1178,133,1174,124,1172,125,1168,121,1168,113,1161,108,1162,69,1153,61,1142,66,1136,65,1137,58,1132,59,1118,79,1117,88,1112,94,1113,103,1104,115,1102,119,1101,122,1098,118,1097,122,1097,149" href="maine/" alt="Maine" title="Maine" onmouseover="change_image('me')" onmouseout=" hide_image('me')">
                            <area shape="poly" coords="464,669,461,671,458,670,450,677,448,679,443,675,442,665,441,662,438,657,446,650,442,646,444,643,450,648,454,649,458,650,464,655,463,658,471,664" href="hawaii/" alt="Hawaii" title="Hawaii" onmouseover="change_image('hi')" onmouseout=" hide_image('hi')">
                            <area shape="poly" coords="131,608,122,608,110,609,109,604,111,601,108,596,103,599,96,594,97,590,91,584,97,576,97,571,101,569,104,571,107,565,111,566,116,563,113,557,115,554,112,552,107,557,97,555,91,554,90,550,84,544,102,535,102,540,111,541,113,538,107,531,107,529,103,529,101,524,91,515,92,510,100,508,105,504,106,498,110,492,115,492,121,485,127,486,133,477,142,485,150,485,155,491,163,490,173,494,177,493,183,497,189,493,199,501,199,594,207,595,214,606,220,599,224,599,232,613,239,623,245,628,247,634,243,637,237,637,239,639,235,638,229,633,225,625,218,612,212,609,204,600,191,596,184,596,178,593,171,598,164,598,152,603,153,611,149,617,143,623,140,618,149,609,147,607,131,622,119,632,121,636,117,638,114,634,87,650,81,651,96,639,128,618" href="alaska/" alt="Alaska" title="Alaska" onmouseover="change_image('Alaska')" onmouseout=" hide_image('Alaska')">
                            <area shape="poly" coords="337,13" href="#">
                        </map>
                    </div>
                </div>   
            </div>
        </div>

        <div class="col twl">
            <div class="row cf">
                <?php global $wpdb;
                    $results = $wpdb->get_results( "select * from wp_state order by state_name asc" );
                ?>
                <ul class="st-list clearfix">
                    <?php foreach($results as $result) { ?>
                    <li class="col-3 col-2-my"><a href="<?php echo get_page_link($result->post_id);?>"><?php echo $result->state_name;?></a></li>
                    <?php } ?>
                </ul>
                <h3 class="ser-pnl-hdg">Substance Abuse Treatment Options Outside of the United States</h3>  
                <ul class="st-list clearfix">
                    <li class="col-3 col-2-my"><a href="https://www.intherooms.com/home/find-treatment-center/canada/">Canada</a></li>
                </ul>
            </div>
        </div>

    </div>
</div>
<script>
function change_image(region) {
    var ShowItem=document.getElementById("area_image");
    ShowItem.style.backgroundImage='url(<?php echo $upload_dir_url;?>/images/map/'+region+'-img.gif)';
    return true;
}
function hide_image(){
    var ShowItem=document.getElementById("area_image");
    ShowItem.style.backgroundImage='url(<?php echo $upload_dir_url;?>/images/map/blank.gif)';
    return true;
}

jQuery(function ($) {
    $("#itr-location").geocomplete({
      details: ".geo-details",
      detailsAttribute: "data-geo"
    })
    .bind("geocode:result", function(event, result){
        //console.log(result);
        //write own code after geo output
        //getDirectory('geo');
    });
    $("#meeting-location").geocomplete({
      details: ".geo-details",
      detailsAttribute: "data-geo"
    })
    .bind("geocode:result", function(event, result){
        //console.log(result);
        //write own code after geo output
        //getDirectory('geo');
    });
});
</script>
<?php get_footer(); ?>



