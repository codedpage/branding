<?php /* Template Name: Live Video Meetings Calendar */ ?>

<?php
    get_header();
    $page_obj = get_post(get_the_ID());
    
    $upload_arr= wp_upload_dir();
    $upload_dir_url = $upload_arr['baseurl'];    
?>

<style>
    .slick-slider {
            position: relative;
            display: block;
            box-sizing: border-box;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-touch-callout: none;
            -khtml-user-select: none;
            -ms-touch-action: pan-y;
            touch-action: pan-y;
            -webkit-tap-highlight-color: transparent;
    }
    .slick-list {
            position: relative;
            display: block;
            overflow: hidden;
            margin: 0;
            padding: 0;
    }
    .slick-list:focus {
            outline: none;
    }
    .slick-list.dragging {
            cursor: pointer;
            cursor: hand;
    }
    .slick-slider .slick-track, .slick-slider .slick-list {
            -webkit-transform: translate3d(0, 0, 0);
            -moz-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
            -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
    }
    .slick-track {
            position: relative;
            top: 0;
            left: 0;
            display: block;
            margin-left: auto;
            margin-right: auto;
    }
    .slick-track:before, .slick-track:after {
            display: table;
            content: '';
    }
    .slick-track:after {
            clear: both;
    }
    .slick-loading .slick-track {
            visibility: hidden;
    }
    .slick-slide {
            display: none;
            float: left;
            height: 100%;
            min-height: 1px;
    }
    [dir='rtl'] .slick-slide {
            float: right;
    }
    .slick-slide img {
            display: block;
    }
    .slick-slide.slick-loading img {
            display: none;
    }
    .slick-slide.dragging img {
            pointer-events: none;
    }
    .slick-initialized .slick-slide {
            display: block;
    }
    .slick-loading .slick-slide {
            visibility: hidden;
    }
    .slick-vertical .slick-slide {
            display: block;
            height: auto;
            border: 1px solid transparent;
    }
    .slick-arrow.slick-hidden {
            display: none;
    }

    .slick-slide {
            margin: 0px 1em;
            text-align:center;
    }
    .slick-slide {
            transition: all ease-in-out .3s;
            opacity: .2;
    }
    .slick-active {
            opacity: .5;
    }
    .slick-current {
        opacity: 1;
    }

    /* Arrows */
    .slick-prev, .slick-next {
            font-family: 'Font Awesome 5 Free';
            font-size: 0;
            line-height: 0;
            position: absolute;
            top: 50%;
            display: block;
            width: 20px;
            height: 20px;
            padding: 0;
            -webkit-transform: translate(0, -50%);
            -ms-transform: translate(0, -50%);
            transform: translate(0, -50%);
            cursor: pointer;
            color:#000000;
            border: none;
            outline: none;
            background: transparent;
    }
    .slick-prev:hover, .slick-prev:focus, .slick-next:hover, .slick-next:focus {
            color: transparent;
            outline: none;
            background: transparent;
    }
    .slick-prev:hover:before, .slick-prev:focus:before, .slick-next:hover:before, .slick-next:focus:before {
            opacity: 1;
    }
    .slick-prev.slick-disabled:before, .slick-next.slick-disabled:before {
            opacity: .25;
    }
    .slick-prev:before, .slick-next:before {
            font-family: 'FontAwesome';
            font-size: 20px;
            line-height: 1;
            opacity: .75;
            color:#000000;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
    }
    .slick-prev {
            left: -25px;
    }
    [dir='rtl'] .slick-prev {
            right: -25px;
            left: auto;
    }

    .slick-prev:before {
            content: '\f053';
    }
    [dir='rtl'] .slick-prev:before {
            content: '\f053';
    }
    .slick-next {
            right: -25px;
    }
    [dir='rtl'] .slick-next {
            right: auto;
            left: -25px;
    }
    .slick-next:before {
            content: '\f054';
    }
    [dir='rtl'] .slick-next:before {
            content: '\f054';
    }
    .cld-min{
            display:table;
    }
    .cld-crl{
            width:110px;
            height:110px;
            background-color:#5090cd;
            display: table-cell;
            vertical-align: middle;
            color:#FFFFFF;
            font-family:inherit;
            font-size:1.5em;
            font-weight:300;
            line-height:1;
            border-radius:50%;
            -webkit-border-radius:50%; 
            -moz-border-radius:50%; 
            -khtml-border-radius:50%;	

    }
    .cld-crl .cld-date-sz{
            font-size:1.7em;
    }

    /* List */

    .ue-cld-list {
            margin: 0;
            font-family: inherit;
            font-size: 1.1em;
            font-weight: 300;
            line-height:1.4;
            /*text-transform: capitalize;*/
    }
    /*.ue-meetings-calendar-header {
            text-align: center;
            padding-bottom: 10px;
            padding-top: 10px;
            border-bottom: 1px solid #dee2e6;
            color: #5091cd;
            font-size: 1.3em;
            line-height: 1.5;
            font-weight: 300;
            color: #2d53fe;
            background-color: #f4f4f4;
    }*/
    .ue-cld-list .ue-cld-list-pnl {
            background-color: #FFFFFF;
            padding: 0.5em 0;
            margin: 0;
            border-bottom: 1px solid #b2b2b2;
    }
    .ue-cld-list .ue-cld-list-pnl:hover {
            background-color: #FFFFFF;
    }
    .ue-cld-list .ue-cld-list-pnl a {
    }
    .ue-cld-list .ue-cld-list-pnl .ue-s-date-new {
            width: 13%;
            float: left;
            text-align:left;
            padding-left: 0.1em;
    }
    .ue-cld-list .ue-cld-list-pnl a .ue-s-date-new {
            color: #212529;
    }
    .ue-cld-list .ue-cld-list-pnl .ue-s-detail-new {
            float: left;
            width: 43%;
    }
    .ue-cld-list .ue-cld-list-pnl a .ue-s-detail-new {
            color: #000000;
    }
    .ue-s-detail-new-sub {
            float: left;
            width: 42%;
            padding-right:1.85em;
            text-align:right;
            color:#000000;
            text-decoration: none;
            background-color: transparent;
            position:relative;
    }
    .vmc-hdg-pnl {
            text-align:center;
        padding: 2em 0.3em;
    }
    .vmc-hdg-pnl h2{
            font-family:inherit;
            font-size: 1.5em;
        line-height: 1.5;
        color: #000000;
        font-weight:500;
            text-align: center;
            margin:0 0 0.7em 0;
            text-transform:uppercase;
    }
    .vmc-hdg-pnl select{
            background-color:transparent;
            margin:0 auto;
            outline:none;
            border:1px solid #000000;
            display: block;
            width:230px;
        height: 34px;
        padding: 6px 12px;
        font-size:1em;
            font-weight:400;
        line-height: 1.42857143;
            -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
            border-radius:3px;
            -webkit-border-radius:3px; 
            -moz-border-radius:3px; 
    }
    @media (min-width:768px) {
    .vmc-hdg-pnl {
            margin-bottom:1em;
    }
    }
    
    .active {
        
        opacity: 1 !important;
    }
    .show {
        display: block;
    }
    .hide {
        display: none;
    }
 /*new*/
 div.ue-cld-list > div.fellowship > a{
	display: block;
	position: relative;
        color: #000;}
 
 .live_meeting {
    color:#6faf73 !important;
    font-weight:bold !important;
 }
 a.live_meeting > .ue-cld-list-pnl > .ue-s-detail-new-sub {
     color:#6faf73 !important;
     font-weight:bold !important;
 }

    div.ue-cld-list > div.fellowship > .meeting-info{
        position: absolute;
        right: 0;
        font-size: 20px;
        margin-top: -32px;
        margin-right: 15px;
        vertical-align: middle;}



    .ue-cld-list .ue-cld-list-pnl .ue-s-detail-new{    text-align: center;}

    .cld-min .cld-crl:hover {
        background: #000;
        opacity:1 !important;
        text-decoration: none;
    }

    #meetingList >.slick-initialized .slick-slider > a:hover{text-decoration: none !important;}


    @media only screen and (max-width:768px){
    .slick-list:focus, .slick-slide:focus, .slick-slide a {
        outline: none;
        font-size: 8px;
    }
    .time-zon-txt{text-align:center !important;}

    }
    @media only screen and (max-width: 550px){
        .ue-cld-list .ue-cld-list-pnl{
                        font-size: 12px;
                        }
        
    }

    /*bootstrap*/
    *, ::after, ::before {
        box-sizing: border-box;
    }
    .clearfix::after {
        display: block;
        clear: both;
        content: "";
    }

    @media (min-width: 768px)
    .col-md-12 {
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%;
    }
    .col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto {
        position: relative;
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
    }

    a {
        color: #007bff;
        text-decoration: none;
        background-color: transparent;
    }
    select {
        word-wrap: normal;
    }
    button, select {
        text-transform: none;
    }
    .mb-5, .my-5 {
        margin-bottom: 3rem!important;
    }
    b, strong {
        font-weight: bolder;
    }
    .container {
        max-width: 1170px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .col-6, .column.half {
        width: 50%;
    }

    #allData{
        margin-top: 20px;
        margin-bottom: 20px;
        /*border-top: 1px solid #eeeeee;*/
    }

    .tim-zon-hold{
        text-align: right;
        margin: 1em 0;
        padding: 15px;
        background: #fbfbfb;
        border: 1px solid #eee;
    }
    .class_strong 
    {
        font-size: 16px;
        font-weight: 700;
        line-height: 24px;
    }
    .time-zon-txt{text-align:left;}

    .grey_row {
        background-color: #f9f9f9!important;
    }


</style>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet">
<!-- <link rel='stylesheet' id='contentberg-lightbox-css'  href='<?php echo home_url(); ?>/wp-content/themes/contentberg/css/bootstrap.min.css' type='text/css' media='all' /> -->
<div class="container">
    <div class="col-md-12">
    <?php /*<script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
        <script>
            window.googletag = window.googletag || {cmd: []};
            googletag.cmd.push(function() {
                googletag.defineSlot('/21776359302/ITR_728X90_Compass', [728, 90], 'div-gpt-ad-1578041752989-0').addService(googletag.pubads());
                googletag.pubads().enableSingleRequest();
                googletag.enableServices();
            });
        </script>
        <center>
            <br><br>
            <!-- /21776359302/ITR_728X90_Compass -->
            <div id='div-gpt-ad-1578041752989-0' style='width: 728px; height: 90px;'>
                <script>
                    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1578041752989-0'); });
                </script>
            </div>
        </center>*/ ?>
        <div id='allData'></div>
    </div>
</div>
<?php get_footer(); ?>


<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>    
<script src="<?php echo home_url(); ?>/wp-content/themes/contentberg/js/slick.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
    
    var currentIndex = '';
    var slideNumber = '';
    $(document).on('ready', function() {
        changeTimeZone('');
    });
    
    $(document).on('click', '.dateCircle', function () {
        selectedDate1 = this.id;
        slideNumber = $(this).parent().data('slide-number');
        //console.log(slideNumber + '+++' + selectedDate1);
        dateCircle();
    });

    function dateCircle() {
        //console.log('dateCircle----' + selectedDate1);
        $('.cld-crl').removeClass('active');
        $('#roundChild_' + selectedDate1).addClass('active');
        
        $('.meetingList').removeClass('show').addClass('hide');
        $('#meetingList_' + selectedDate1).removeClass('hide').addClass('show');
        
        var len = $("." + selectedDate1 + "_child:visible").length;
        if(len == 0) {
            $("#meetingListMessage_" + selectedDate1).show();
            $("#meetingListHeading_" + selectedDate1).hide();
        } else {
            $("#meetingListMessage_" + selectedDate1).hide();
            $("#meetingListHeading_" + selectedDate1).show();
        }
        
        $(".dateRange").parent().parent().removeClass('slick-current');
        $("#dateRange_" + selectedDate1).parent().parent().addClass('slick-current');

        //console.log(slideNumber + '+++' + selectedDate1);
        //$('.center').slick('slickGoTo', slideNumber, false);
        
        var selectedFellowship = $( ".fellowshipDropDown option:selected" ).val();
        $(".timeComplete1").hide();
        $(".timeComplete2").show();
        $("." + selectedDate1 + "_child.fellowship_" + selectedFellowship + " .timeComplete1_" + selectedDate1).show();
        $("." + selectedDate1 + "_child.fellowship_" + selectedFellowship + " .timeComplete2_" + selectedDate1).hide();

        $("#showSelectedDate").html('Selected Date : ' + selectedDate1);
    }
    
    $(document).on('change', '.fellowshipDropDown', function () {
        var selectedFellowship = $( ".fellowshipDropDown option:selected" ).val();
        if(selectedFellowship != '') {
            $('.fellowship').hide();
            selectedFellowship = selectedFellowship.replace('[','_').replace(']','_');            
            //console.log(selectedFellowship);
            $('.fellowship_' + selectedFellowship).show();
        } else {
            $('.fellowship').show();
        }
        console.log('----fellowshipDropDown----' + selectedDate1 + '----');
        
        var len = $("." + selectedDate1 + "_child:visible").length;
        if(len == 0) {
            $("#meetingListMessage_" + selectedDate1).show();
            $("#meetingListHeading_" + selectedDate1).hide();
        } else {
            $("#meetingListMessage_" + selectedDate1).hide();
            $("#meetingListHeading_" + selectedDate1).show();
        }
        
        $(".timeComplete1").hide();
        $(".timeComplete2").show();
        $("." + selectedDate1 + "_child.fellowship_" + selectedFellowship + " .timeComplete1_" + selectedDate1).show();
        $("." + selectedDate1 + "_child.fellowship_" + selectedFellowship + " .timeComplete2_" + selectedDate1).hide();
        
    });
    
    $(document).on('change', '.timeZoneDropDown', function () {
        var selectedValue = $( ".timeZoneDropDown option:selected" ).val();
        changeTimeZone(selectedValue);
    });
    
    function showTimeZoneDropDown() {
        $("#timeZoneDropDownDiv").toggle();
    }
    
    function changeTimeZone(timeZone) {
        $.ajax({
            type: "POST",
            url: '<?php echo admin_url("admin-ajax.php"); ?>',
            data: {
                'action': 'live_video_meetings_calendar',
                'timeZone' : timeZone,
                '_nonce': '<?php echo md5('live_video_meetings_calendar')?>',
            },
            success:function(response) {
                //console.log(response);
                $('#allData').html(response);

                selectedDate1 = $('.currentSeletcedDate').attr('id');                
                var indexNumber = $("#dateRange_" + selectedDate1).data('slide-number');
                currentIndex = indexNumber;
                //console.log('changeTimeZone--start');

                $('.center').slick({
                    infinite: false,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    swipeToSlide : true,
                    draggable : true,
                    initialSlide : indexNumber,
                    responsive: [
                      {
                        breakpoint: 1024,
                        settings: {
                          infinite: false,
                          slidesToShow: 3,
                          slidesToScroll: 1,
                          swipeToSlide : true,
                          draggable : true,
                          initialSlide : indexNumber,
                        }
                      },
                      {
                        breakpoint: 768,
                        settings: {
                          infinite: false,
                          slidesToShow: 3,
                          slidesToScroll: 1,
                          swipeToSlide : true,
                          draggable : true,
                          initialSlide : indexNumber,
                        }
                      },
                      {
                        breakpoint: 600,
                        settings: {
                          infinite: false,
                          slidesToShow: 2,
                          slidesToScroll: 1,
                          draggable : true,
                          initialSlide : indexNumber,
                        }
                      },
                      {
                        breakpoint: 480,
                        settings: {
                          infinite: false,
                          slidesToShow: 1,
                          slidesToScroll: 1,
                          draggable : true,
                          initialSlide : indexNumber,
                        }
                      }
                    ]
                });

                //console.log('changeTimeZone--end');
                //selectedDate1 = $('.currentSeletcedDate').attr('id');
                //console.log('---start----' + selectedDate1 + '----');
                //$(".dateRange").parent().parent().removeClass('slick-current');
                //$("#dateRange_" + selectedDate1).parent().parent().addClass('slick-current');

                //$('.center').slick('slickGoTo', 5, 1);
                //$('.center').slick('slickGoTo', 7);

                //var currentSlide = $('.center').slick('slickCurrentSlide');
                //console.log('---start----' + currentSlide + '----');  
            }
        });        
    }

    $(document).on('afterChange', '.center', function (e) {
        var sliderDate = $('.slick-slide.slick-current .dateRange').data('slide-date');
        console.log('afterChange--' + sliderDate); 
        selectedDate1 = sliderDate;
        dateCircle();
    });
</script>
