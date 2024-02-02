<?php
/**
 * ContentBerg Theme!
 * 
 * This is the typical theme initialization file. Sets up the Bunyad Framework
 * and the theme functionality.
 * 
 * ----
 * 
 * Code Locations:
 * 
 *  /          -  WordPress default template files.
 *  lib/       -  Contains the Bunyad Framework files.
 *  inc/       -  Theme related functionality and some HTML helpers.
 *  admin/     -  Admin-only content.
 *  partials/  -  Template parts (partials) called via get_template_part().
 *  
 * Note: If you're looking to edit HTML, look for default WordPress templates in
 * top-level / and in partials/ folder.
 * 
 * Main Theme file:  inc/theme.php 
 */

// Already initialized?
if (class_exists('Bunyad_Core')) {
	return;
}

// Require PHP 5.3.2+
if (version_compare(phpversion(), '5.3.2', '<')) {

	function contentberg_php_notice() {
		$message = sprintf(esc_html__('ContentBerg requires %1$sPHP 5.3.2+%2$s. Please ask your webhost to upgrade to at least PHP 5.3.2. Recommended: %1$sPHP 7+%2$s%3$s', 'contentberg'), '<strong>', '</strong>', '<br>');
		printf('<div class="notice notice-error"><h3>Important:</h3><p>%1$s</p></div>', wp_kses_post($message));
	}

	add_action('admin_notices', 'contentberg_php_notice');	
	return;
}

// Initialize Main Framework
require_once get_theme_file_path('lib/bunyad.php');
require_once get_theme_file_path('inc/bunyad.php');

/**
 * Main Theme File: Contains most theme-related functionality
 * 
 * See file:  inc/theme.php
 */
require_once get_theme_file_path('inc/theme.php');

// Fire up the theme - make available in Bunyad::get('theme')
Bunyad::register('theme', array(
	'class' => 'Bunyad_Theme_ContentBerg',
	'init' => true
));

// Main Framework Configuration
$bunyad_core = Bunyad::core()->init(apply_filters('bunyad_init_config', array(
	'theme_name'    => 'contentberg',
	'theme_version' => '1.8.3',

	// Supported formats
	'post_formats' => array('gallery', 'image', 'video', 'audio'),
	'customizer'   => true,
)));

add_action( 'widgets_init', 'dir_sidebar' );
function dir_sidebar() {
  $args = array(
    'name'          => 'Directory Sidebar',
    'id'            => 'dir-sidebar',
    'description'   => 'This is Directory sidebar.',
    'class'         => '',
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>' 
  );
  register_sidebar( $args );
}
/* Rest API for Mobile App */
/**
 * Grab latest post of ilove recovery and getting started guide data for the home screen of Mobile App
 */
function getIloveRecoveryPostAndGettingStarted() {
  $recent_posts = wp_get_recent_posts(array('post_type'=>'iloverec_post','numberposts'=>5,'post_status'=>'publish'));
  foreach($recent_posts as &$post) {
      $post['featured_img_url'] = get_the_post_thumbnail_url($post['ID'],'contentberg-main-full');
      $author = get_user_by('ID',$post['post_author']);
      $post['author_name'] = $author->data->display_name;
      unset($post['post_content'],$post['post_excerpt'],$post['post_status'],$post['comment_status'],$post['ping_status'],$post['post_password'],$post['post_name'],$post['to_ping'],$post['pinged'],$post['post_modified'],$post['post_modified_gmt'],$post['post_content_filtered'],$post['post_parent'],$post['guid'],$post['menu_order'],$post['post_type'],$post['post_mime_type'],$post['comment_count'],$post['filter'],$author);      
  }
  $all_content['i_love_recovery'] = $recent_posts;
  
  $getting_satarted = array();
  $getting_satarted[0]['cat_id'] = 328;
  $getting_satarted[0]['cat_slug'] = 'getting-started-guide';
  $getting_satarted[0]['title'] = 'A Guide for Those Seeking Recovery';
  $getting_satarted[0]['content'] = 'If you\'re ready to begin your recovery journey but you\'re not sure what to do next, then this guide is for you. We\'ve got information on all types of treatments, next steps, and more.';
  $getting_satarted[0]['featured_img_url'] = 'https://www.intherooms.com/home/wp-content/uploads/2019/08/getting-started-in-recovery.jpg';
  
  $getting_satarted[1]['cat_id'] = 63;
  $getting_satarted[1]['cat_slug'] = 'getting-started-for-loved-ones';
  $getting_satarted[1]['title'] = 'A Guide for Friends, Family, and Allies';
  $getting_satarted[1]['content'] = 'If your loved one is in recovery (or you think they might need to be), then this guide is for you. We have all you need to learn about how to have tough conversations, what types of treatment are available for your loved ones, and how to seek out care for yourself too.';
  $getting_satarted[1]['featured_img_url'] = 'https://www.intherooms.com/home/wp-content/uploads/2019/08/getting-started-for-loved-ones.jpg';
  
  $all_content['getting_started'] = $getting_satarted;
  
  if ( empty( $recent_posts ) ) {
    return new WP_Error( 'No_posts', 'No post found', array( 'status' => 404 ) );
  }
  return $response = new WP_REST_Response( $all_content );
}

function getPostOfCategory($data) {
    $args = array(
       'posts_per_page' => 10, // we need only the latest post, so get that post only
       'cat' => $data['id'] // Use the category id, can also replace with category_name which uses category slug
    );

    $recent_posts = get_posts($args);
    foreach($recent_posts as &$post) {
        $post->featured_img_url = get_the_post_thumbnail_url($post->ID,'contentberg-main-full');
        $author = get_user_by('ID',$post->post_author);
        $post->author_name = $author->data->display_name;
        $post->post_excerpt = wp_trim_excerpt($post->post_excerpt,$post->ID);
        unset($post->post_content,$post->post_status,$post->comment_status,$post->ping_status,$post->post_password,$post->post_name,$post->to_ping,$post->pinged,$post->post_modified,$post->post_modified_gmt,$post->post_content_filtered,$post->post_parent,$post->guid,$post->menu_order,$post->post_type,$post->post_mime_type,$post->comment_count,$post->filter,$author);      
    }
    $all_content['all_content'] = $recent_posts;
  
    if ( empty( $recent_posts ) ) {
      return new WP_Error( 'no_category', 'Invalid Category', array( 'status' => 404 ) );
    }

    return $response = new WP_REST_Response( $all_content );

}

function getPostForAPI($data) {
    $post = get_post($data['id']);
    $post->featured_img_url = get_the_post_thumbnail_url($post->ID,'contentberg-main-full');
    $author = get_user_by('ID',$post->post_author);
    $post->author_name = $author->data->display_name;
    unset($post->post_status,$post->comment_status,$post->ping_status,$post->post_password,$post->post_name,$post->to_ping,$post->pinged,$post->post_modified,$post->post_modified_gmt,$post->post_content_filtered,$post->post_parent,$post->guid,$post->menu_order,$post->post_type,$post->post_mime_type,$post->comment_count,$post->filter,$author);      
    
    if ( empty( $post ) ) {
      return new WP_Error( 'no_post', 'Invalid Post Id', array( 'status' => 404 ) );
    }

    return $response = new WP_REST_Response( $post );
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'itr_mobile_api/v1', '/get_iloverecovery_latest_post', array(
    'methods' => 'GET',
    'callback' => 'getIloveRecoveryPostAndGettingStarted',
    'args' => array(
    )
  ) );
  
  register_rest_route( 'itr_mobile_api/v1', '/get_posts_of_cat/(?P<id>\d+)', array(
    'methods' => 'GET',
    'callback' => 'getPostOfCategory',
    'args' => array(
        'id' => array(
        'validate_callback' => 'is_numeric'
      )
    )
  ) );
  
  register_rest_route( 'itr_mobile_api/v1', '/get_post/(?P<id>\d+)', array(
    'methods' => 'GET',
    'callback' => 'getPostForAPI',
    'args' => array(
        'id' => array(
        'validate_callback' => 'is_numeric'
      )
    )
  ) );
} );

/* Start - Meeing Calendar(Live) */

function live_video_meetings_calendar() {
    if(isset($_REQUEST)) {
        //echo "<pre>";print_r($_REQUEST);
        $check = md5('live_video_meetings_calendar');       
        if($check == $_REQUEST['_nonce']) {
            $timeZone = sanitize_text_field(trim($_REQUEST['timeZone']));            
            if(empty($timeZone) || $timeZone == '') {
                // get the timezone of user
                $ip = $_SERVER['REMOTE_ADDR'];
                $json = file_get_contents('http://ip-api.com/json/' . $ip);
                $ipData = json_decode( $json, true);
                //echo "<pre>";print_r($ipData);
                if ($ipData['timezone'] && $ipData['timezone'] != '') {
                    $timeZone = $ipData['timezone'];
                } else if ($ipData['status']) {
                    $timeZone = 'America/New_York';
                }
                // get the timezone of user
            }
            $date = new DateTime("now", new DateTimeZone($timeZone));
            $currentDate = $date->format('Y-m-d');
            date_default_timezone_set($timeZone);
            $result = getDateMeetings($currentDate, $timeZone);
            echo $result;die;
        } else {
            echo 'Error';
            die;
        }
    }
}

function getDateMeetings($selectedDate, $userTimeZone) {
    $upload_arr= wp_upload_dir();
    $upload_dir_url = $upload_arr['baseurl'];
    date_default_timezone_set($userTimeZone);

    if(isset($selectedDate) && $selectedDate != '') {
        $selectedDate = sanitize_text_field(trim($selectedDate));             
        global $wpdb;
        $optionName = 'liveVideoMeetings_' . $selectedDate;
        $results = $wpdb->get_results("select * from wp_options where option_name='$optionName'");

        if(count($results) == 0) {
            // call API
            $str_post = "a=websiteapi.get_live_meetings"
                . "&username=recoverycentral"
                . "&authtoken=010de989dc0407626277e245bddbd00b9fbf71f6";
            $endpoint = 'https://api.intherooms.com/main.php';

            $ch = @curl_init();
            @curl_setopt($ch, CURLOPT_POST, true);
            @curl_setopt($ch, CURLOPT_POSTFIELDS, $str_post);
            @curl_setopt($ch, CURLOPT_URL, $endpoint);
            @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            @curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/x-www-form-urlencoded'
            ));
            $responseJson = @curl_exec($ch);
            @curl_close($ch);
            $responseArray = json_decode($responseJson, true);
            if($responseArray['response']['success'] == 0) {
                return 'Server error'; // Login Credentials failed
            } else if($responseArray['response']['status'] == 1) {
                $data = $responseArray['response']['response_message']['data'];
                $arr = json_encode($data);                        
                $wpdb->insert(
                    'wp_options', 
                    array(
                        'option_name' => 'liveVideoMeetings_' . $selectedDate,
                        'option_value' => $arr,
                    )
                );
            }
        } else {
            $results = (array) $results;
            $data = json_decode($results[0]->option_value, true);
        }

        // get all the fellowship dropdown
        /*foreach($data as $value) {
            $meetingFellowshipArray[] = $value['fellowship'];
        }
        $meetingFellowshipArray = array_values(array_unique($meetingFellowshipArray));
        sort($meetingFellowshipArray);*/
        
        $html = '';
        /*$html .= '<div class="col-md-12">
                <div style="text-align:center;">
                    <img src="https://www.intherooms.com/home/wp-content/uploads/2020/02/add-size-728x90.jpg">
                </div>
            </div>';*/
        $meetingNameFormats = array(
            "Coda [Codependency]" => "CODA [Codependency]",
            "Na Business" => "NA Business",
            "Na Live Business Meeting" => "NA Live Business Meeting",
            "Aca [Adult Children]" => "ACA [Adult Children]",
            "Aca Sunday" => "ACA Sunday",
            "Alanon" => "Al-Anon",
            "Sunday Night Alanon" => "Sunday Night Al-Anon",
            "Na Pride [Lgbt]" => "NA Pride [LGBT]",
            "Monday Afternoon Coda" => "Monday Afternoon CODA",
            "Lifering" => "LifeRing",
            "Naranon" => "Nar-Anon",
            "Agnostic Aa" => "Agnostic AA",
            "Agnostic Na" => "Agnostic NA",
            "Secular Aa" => "Secular AA",
            "Sunday Aa Marathon Meeting" => "Sunday AA Marathon Meeting",
            "Aca 20 Week Step Study" => "ACA 20 Week Step Study",
            "Wednesday's New Na" => "Wednesday’s New NA",
            "Soul Recovery W/ Ester Nicholson" => "Soul Recovery w/ Ester Nicholson",
            "Saturday's New Na" => "Saturday’s New NA",
            "Cma [Crystal Meth]" => "CMA [Crystal Meth]",
            "Cma" => "CMA",
            "Aca Friday" => "ACA Friday",
            "Cpa [Chronic Pain]" => "CPA [Chronic Pain]",
            "Saa [Sex Addicts]" => "SAA [Sex Addicts]",
            "Sex, Love And Addiction W/ Rob Weiss Phd, Lcsw" => "Sex, Love and Addiction w/ Rob Weiss PhD, LCSW",
            "Tgif" => "TGIF",
            "Oa Steps And Traditions" => "OA Steps and Traditions",
            "Abc Meeting" => "ABC Meeting",
            "Slaa [Sex Love]" => "SLAA [Sex Love]",
            "Slaa" => "SLAA",
            "New Alanon Meeting" => "New Al-Anon Meeting",
            "Caring And Sharing The Na Way" => "Caring and Sharing the NA Way",
        );
        $meetingNameFormatsLC = array_change_key_case($meetingNameFormats, CASE_LOWER);

        $specialtyMeetings = array(
            "Illness In Recovery" => "https://www.intherooms.com/home/illness-in-recovery/",
            "Women Warriors" => "https://www.intherooms.com/home/women-warriors/",
        );
        $specialtyMeetingsLC = array_change_key_case($specialtyMeetings, CASE_LOWER);

        //echo ucwords('Spiritual Gangsters [ mens Group]');die;

        //$var = '"joy of recovery"';
        //echo ucwordsCustom($var);die;
        //echo ucwords('“spiritual Not Religious”');echo "-------------";
        //echo str_replace('" ', '"', ucwords(str_replace('"', '" ', $var)));die;

        /*$fellowshipName = 'aca [adult children]';
        if(isset($meetingNameFormatsLC[$fellowshipName])) {
            echo $fellowshipName = $meetingNameFormatsLC[$fellowshipName];
        } else {
            echo "not";
        }
        die;*/
        //echo "<pre>";print_r($meetingNameFormatsLC);die;

        $fellowShipFilters = array(
            "Alcoholics_Anonymous" => array("ALCOHOLICS_ANONYMOUS"),
            "Narcotics_Anonymous" => array("NARCOTICS_ANONYMOUS"),
            "Specialty_Meetings" => array("11TH_STEP_MEDITATION_","CHEMSEX","CODEPENDENCY_GRIEF_AND_RELATIONSHIPS","HEALTHY_LOVE","SEX_TALK","SEX_&_ADDICTION","SHE_RECOVERS","SOUL_RECOVERY_W/_ESTER_NICHOLSON","WOMEN_IN_RECOVERY","SPIRITUAL_GANGSTERS_[MENS_GROUP]","TRAUMA_&_RECOVERY","YOGA_RECOVERY","LIFE_RECOVERY[FAITH_BASED]"),
            "Others" => array(''),
        );
        $optionValues = '';
        foreach($fellowShipFilters as $key => $value) {
            $fellowshipName = ucfirst(str_replace ("_", " ", $key));
            $optionValues .= '<option value="' . $key . '">' . $fellowshipName . '</option>';
        }        
        $html .= '<div class="col-md-12">
            <div class="vmc-hdg-pnl">
                <h2>Live Video Meetings Calendar</h2>
                <select class="fellowshipDropDown">
                    <option value="">Filter by Fellowship</option>
                    ' . $optionValues . '
                </select>
                <div class="side-green-button">
                    <a target="_blank" href="https://www.intherooms.com/home/special-events/">Special Events</a>
                </div>
            </div>
        </div>';

        $date = new DateTime("now", new DateTimeZone($userTimeZone));
        $timezone_identifiers =  DateTimeZone::listIdentifiers(DateTimeZone::ALL);
        $optionValues = '';
        foreach($timezone_identifiers as $key => $value) {
            $selectedValue = ($userTimeZone == $value) ? "selected" : "";
            $optionValues .= '<option value="' . $value . '" ' . $selectedValue . '>' . $value . '</option>';
        }
        
        $html .= '<div class="col-md-12">
                    <div class="tim-zon-hold">
                        <div class="ts-row blocks cf">
                            <div class="col-6 time-zon-txt">
                                <span class="class_strong">Your Local Time : ' . $date->format('h:i A') . ' </span>
                            </div>
                            <div class="col-6">
                                Current Calendar Time Zone Setting : <span class="class_strong">' . $userTimeZone . '</span>
                                [<a style="cursor: pointer;" onclick=showTimeZoneDropDown();>edit]</a><br>
                                <div id="timeZoneDropDownDiv" style="display:none;">
                                    Select to change : <select class="timeZoneDropDown">
                                        <option value="">Select Your TimeZone</option>
                                        ' . $optionValues . '
                                    </select>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>';

            /*for($i = 0; $i <count($meetingFellowshipArray); $i++) {
                $fellowshipName = str_replace ("_", " ", $meetingFellowshipArray[$i]);
                $html .= '<option value="'.$meetingFellowshipArray[$i].'">' . $fellowshipName . '</option>';
            }*/
        /* get all the fellowship dropdown */


        /* convert New York Time to user time zone */
        $newData = array();
        foreach($data as $value) {
            $date = new DateTime($value['meeting_date'], new DateTimeZone('America/New_York'));
            $date->setTimezone(new DateTimeZone($userTimeZone));
            $value['userLocalDateTime'] = $date->format('Y-m-d H:i:s');
            $newData[] = $value;
        }
        //echo "<pre>";print_r($newData);die;
        /* convert New York time to user time zone */

        /* get all the dates data in Array */
        $allDatesData = array();
        foreach($newData as $value) {
            $meetingDate = substr($value['userLocalDateTime'], 0, 10);
            $meetingTime = substr($value['userLocalDateTime'], 11, 5);
            $allDatesData[$meetingDate][$meetingTime][] = $value;
        }
        /* get all the dates data in Array */


        /* create date slider*/
        $totalDates = 0;
        $date = new DateTime("now", new DateTimeZone($userTimeZone));
        $currentDate = $date->format('Y-m-d');
        $html .= '<span id="' . $currentDate . '" class="currentSeletcedDate" style="display:none;"></span>';
        $html .= '<div class="col-md-12"> 
            <section class="center slider mb-5">';
            foreach($allDatesData as $key => $value) {
                $activeClass = '';
                if($key == $currentDate) {
                    $activeClass = ' active';
                }
                $html .= '<div class="dateRange" id="dateRange_'.$key.'" data-slide-number="' . $totalDates . '" data-slide-date="' . $key . '">' . 
                    date("D", strtotime($key)) . 
                    '<a id ="'.$key.'" class="dateCircle cld-min" style="cursor: pointer;margin: auto;">
                        <div id ="roundChild_'.$key.'" class="cld-crl'.$activeClass.'">' . 
                            date("M", strtotime($key)) . '<br>
                            <strong class="cld-date-sz">' . date("d", strtotime($key)). '</strong>
                        </div>
                    </a>
                </div>';
                $totalDates++;
            }
        $html .= '</section>
            </div>';
        /* create date slider*/

        $html .= '<div class="col-12">
                    <div style="margin: 1em 0;">                        
                        <span class="class_strong" id="showSelectedDate">Selected Date : ' . $currentDate . ' </span>                        
                    </div>
                </div>';

        /* show all the dates data */
        $date = new DateTime("now", new DateTimeZone($userTimeZone));
        $currentDate = $date->format('Y-m-d');
        foreach($allDatesData as $key1 => $value1) {
            if($key1 == $currentDate) {
                $displayClass = 'show';
            } else {
                $displayClass = 'hide';
            }
            $html .= '<div class="meetingList col-md-12 ' . $displayClass . '" id="meetingList_'.$key1.'"><div class="ue-cld-list">';
            $html .= '<div id="meetingListMessage_' . $key1 . '" style="display:none;">No meetings found.</div>';
            $html .= '<div id="meetingListHeading_' . $key1 . '" style="font-weight: bold;">
                        <div class="ue-cld-list-pnl clearfix"> 
                            <div class="ue-s-date-new">Time</div>
                            <div class="ue-s-detail-new">Fellowship</div>
                            <div class="ue-s-detail-new-sub">Meeting Name</div>
                        </div>
                    </div>';
            $countRows = 1;        
            foreach($value1 as $key => $value) {

                if(count($value) > 1) {
                    for($i=0;$i<count($value);$i++) {
                        $meetingDate = substr($value[$i]['userLocalDateTime'], 0, 10);
                        $meetingTime = substr($value[$i]['userLocalDateTime'], 11, 5);
                        $meetingTimeFormat = date('h:i A', strtotime($value[$i]['userLocalDateTime']));

                        $startTime = date('Y-m-d h:i A', strtotime($value[$i]['userLocalDateTime']));
                        $finishTime = date('Y-m-d h:i A',strtotime('+1 hour',strtotime($value[$i]['userLocalDateTime'])));
                        $date = new DateTime("now", new DateTimeZone($userTimeZone));
                        $currentTime = $date->format('Y-m-d h:i A');                    
                        if (strtotime($currentTime) > strtotime($startTime) && strtotime($currentTime) < strtotime($finishTime)) {
                            $liveMeeting = 'live_meeting';
                        } else {
                            $liveMeeting = '';
                        }

                        //$output = str_replace(array('[', ']'), '_', $value[$i]['fellowship']);
                        $key = searchForId($value[$i]['fellowship'], $fellowShipFilters);
                        $fellowshipName = strtolower(str_replace ("_", " ", $value[$i]['fellowship']));
                        $meetingName = strtolower($value[$i]['name']);

                        if(isset($meetingNameFormatsLC[$fellowshipName])) {
                            $fellowshipName = $meetingNameFormatsLC[$fellowshipName];
                        } else {
                            $fellowshipName = ucwordsCustom($fellowshipName);
                        }    

                        if(isset($meetingNameFormatsLC[$meetingName])) {
                            $meetingName = $meetingNameFormatsLC[$meetingName];
                        } else {
                            $meetingName = ucwordsCustom($meetingName);
                        }    

                        if($countRows % 2 != 0) {
                            $greyRowClass = 'grey_row';
                        } else {
                            $greyRowClass = '';
                        }
                        $countRows++;

                        $html .= '<div class="'.$key1.'_child fellowship fellowship_'.$key.'">';
                        $html .= '<a class="' . $liveMeeting . '" target="_blank" href="https://www.intherooms.com/livemeetings/view?meeting_id=' . $value[$i]['meeting_id'] . '">';                        

                        if($i == 0) {
                            $html .= '<div class="ue-cld-list-pnl clearfix ' . $greyRowClass . '" data-href="#" style="border-bottom:none; !important"> 
                                        <div class="ue-s-date-new">' . $meetingTimeFormat . '</div>';                                            
                        } else if($i == (count($value) - 1)) {
                            $html .= '<div class="ue-cld-list-pnl clearfix ' . $greyRowClass . '" data-href="#">
                                        <div class="ue-s-date-new timeComplete1 timeComplete1_'.$meetingDate.'" style="display:none;">' . $meetingTimeFormat . '</div>
                                        <div class="ue-s-date-new timeComplete2 timeComplete2_'.$meetingDate.'">&nbsp;</div>';
                        } else {
                            $html .= '<div class="ue-cld-list-pnl clearfix ' . $greyRowClass . '" data-href="#" style="border-bottom:none; !important">
                                        <div class="ue-s-date-new timeComplete1 timeComplete1_'.$meetingDate.'" style="display:none;">' . $meetingTimeFormat . '</div>
                                        <div class="ue-s-date-new timeComplete2 timeComplete2_'.$meetingDate.'">&nbsp;</div>';
                        }
                        $html .= '      <div class="ue-s-detail-new">' . $fellowshipName . '</div>
                                        <div class="ue-s-detail-new-sub">' . $meetingName . '</div>
                                    </div>
                                </a>';

                        if($value[$i]['special_meeting'] == 1 && $value[$i]['special_meeting_page_url'] != '') {
                            $html .= '<div class="meeting-info">';
                            $html .= '<a target="_blank" href="' . $value[$i]['special_meeting_page_url'] . '">
                                <i class="fa fa-info-circle fa-2" aria-hidden="true" style="margin-left:5px;"></i>
                            </a></div>';
                        } else if(isset($specialtyMeetingsLC[strtolower($fellowshipName)])) {
                            $html .= '<div class="meeting-info">';
                            $html .= '<a target="_blank" href="' . $specialtyMeetingsLC[strtolower($fellowshipName)] . '">
                                <i class="fa fa-info-circle fa-2" aria-hidden="true" style="margin-left:5px;"></i>
                            </a></div>';
                        }

                        $html .= '</div>';
                    }
                } else {
                    $meetingDate = substr($value[0]['userLocalDateTime'], 0, 10);
                    $meetingTime = substr($value[0]['userLocalDateTime'], 11, 5);
                    $meetingTimeFormat = date('h:i A', strtotime($value[0]['userLocalDateTime']));

                    $startTime = date('Y-m-d h:i A', strtotime($value[0]['userLocalDateTime']));
                    $finishTime = date('Y-m-d h:i A',strtotime('+1 hour',strtotime($value[0]['userLocalDateTime'])));
                    $date = new DateTime("now", new DateTimeZone($userTimeZone));
                    $currentTime = $date->format('Y-m-d h:i A');                    
                    if (strtotime($currentTime) > strtotime($startTime) && strtotime($currentTime) < strtotime($finishTime)) {
                        $liveMeeting = 'live_meeting';
                    } else {
                        $liveMeeting = '';
                    }

                    //$output = str_replace(array('[', ']'), '_', $value[0]['fellowship']);
                    $key = searchForId($value[0]['fellowship'], $fellowShipFilters);
                    $fellowshipName = strtolower(str_replace ("_", " ", $value[0]['fellowship']));
                    $meetingName = strtolower($value[0]['name']);

                    if(isset($meetingNameFormatsLC[$fellowshipName])) {
                        $fellowshipName = $meetingNameFormatsLC[$fellowshipName];
                    } else {
                        $fellowshipName = ucwordsCustom($fellowshipName);
                    }

                    if(isset($meetingNameFormatsLC[$meetingName])) {
                        $meetingName = $meetingNameFormatsLC[$meetingName];
                    } else {
                        $meetingName = ucwordsCustom($meetingName);
                    }

                    if($countRows % 2 != 0) {
                        $greyRowClass = 'grey_row';
                    } else {
                        $greyRowClass = '';
                    }
                    $countRows++;

                    $html .= '<div class="'.$key1.'_child fellowship fellowship_'.$key.'">';
                    $html .= '<a class="' . $liveMeeting . '" target="_blank" href="https://www.intherooms.com/livemeetings/view?meeting_id=' . $value[0]['meeting_id'] . '">
                        <div class="ue-cld-list-pnl clearfix ' . $greyRowClass . '" data-href="#"> 
                            <div class="ue-s-date-new">' . $meetingTimeFormat . '</div>
                            <div class="ue-s-detail-new">' . $fellowshipName . '</div>
                            <div class="ue-s-detail-new-sub">' . $meetingName . '</div>
                        </div>
                    </a>';
                    if($value[0]['special_meeting'] == 1 && $value[0]['special_meeting_page_url'] != '') {
                        $html .= '<div class="meeting-info">';
                        $html .= '<a target="_blank" href="' . $value[0]['special_meeting_page_url'] . '">
                            <i class="fa fa-info-circle fa-2" aria-hidden="true" style="margin-left:5px;"></i>
                        </a></div>';
                    } else if(isset($specialtyMeetingsLC[strtolower($fellowshipName)])) {
                        $html .= '<div class="meeting-info">';
                        $html .= '<a target="_blank" href="' . $specialtyMeetingsLC[strtolower($fellowshipName)] . '">
                            <i class="fa fa-info-circle fa-2" aria-hidden="true" style="margin-left:5px;"></i>
                        </a></div>';
                    }
                    $html .= '</div>';
                }
            }
            $html .= '</div></div>';
        }
        /* show all the dates data */            

        return $html;            
    }
}

function searchForId($searchValue, $array) {
    foreach ($array as $key => $val) {
        if (in_array($searchValue, $val)) {
            return $key;
        }
    }
    return 'Others';
}

function ucwordsCustom($str) {
    $str = ucwords($str);
    $str = str_replace('[ ', '[', ucwords(str_replace('[', '[ ', $str)));
    $str = str_replace('“ ', '“', ucwords(str_replace('“', '“ ', $str)));
    $str = str_replace('" ', '"', ucwords(str_replace('&#34;', '" ', $str)));    
    return $str;
}

add_action( 'wp_ajax_live_video_meetings_calendar', 'live_video_meetings_calendar' );
add_action( 'wp_ajax_nopriv_live_video_meetings_calendar', 'live_video_meetings_calendar' );

/* End - Meeing Calendar(Live) */



/* start - Meeing Calendar(Testing) */

function live_video_meetings_calendar_test() {
    if(isset($_REQUEST)) {
        //echo "<pre>";print_r($_REQUEST);
        $check = md5('live_video_meetings_calendar_test');       
        if($check == $_REQUEST['_nonce']) {
            $timeZone = sanitize_text_field(trim($_REQUEST['timeZone']));            
            if(empty($timeZone) || $timeZone == '') {
                // get the timezone of user
                $ip = $_SERVER['REMOTE_ADDR'];
                $json = file_get_contents('http://ip-api.com/json/' . $ip);
                $ipData = json_decode( $json, true);
                //echo "<pre>";print_r($ipData);
                if ($ipData['timezone'] && $ipData['timezone'] != '') {
                    $timeZone = $ipData['timezone'];
                } else if ($ipData['status']) {
                    $timeZone = 'America/New_York';
                }
                // get the timezone of user
            }
            //$timeZone = 'America/New_York';
            $date = new DateTime("now", new DateTimeZone($timeZone));
            $currentDate = $date->format('Y-m-d');
            date_default_timezone_set($timeZone);
            $result = getDateMeetingsTest($currentDate, $timeZone);
            echo $result;die;
        } else {
            echo 'Error';
            die;
        }
    }
}

function getDateMeetingsTest($selectedDate, $userTimeZone) {
    $upload_arr= wp_upload_dir();
    $upload_dir_url = $upload_arr['baseurl'];
    date_default_timezone_set($userTimeZone);

    if(isset($selectedDate) && $selectedDate != '') {
        $selectedDate = sanitize_text_field(trim($selectedDate));             
        global $wpdb;
        $optionName = 'liveVideoMeetings_' . $selectedDate;
        $results = $wpdb->get_results("select * from wp_options where option_name='$optionName'");

        if(count($results) == 0) {
            // call API
            $str_post = "a=websiteapi.get_live_meetings"
                . "&username=recoverycentral"
                . "&authtoken=010de989dc0407626277e245bddbd00b9fbf71f6";
            $endpoint = 'https://api.intherooms.com/main.php';

            $ch = @curl_init();
            @curl_setopt($ch, CURLOPT_POST, true);
            @curl_setopt($ch, CURLOPT_POSTFIELDS, $str_post);
            @curl_setopt($ch, CURLOPT_URL, $endpoint);
            @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            @curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/x-www-form-urlencoded'
            ));
            $responseJson = @curl_exec($ch);
            @curl_close($ch);
            $responseArray = json_decode($responseJson, true);
            if($responseArray['response']['success'] == 0) {
                return 'Server error'; // Login Credentials failed
            } else if($responseArray['response']['status'] == 1) {
                $data = $responseArray['response']['response_message']['data'];
                $arr = json_encode($data);
                $wpdb->insert(
                    'wp_options', 
                    array(
                        'option_name' => 'liveVideoMeetings_' . $selectedDate,
                        'option_value' => $arr,
                    )
                );
            }
        } else {
            $results = (array) $results;
            $data = json_decode($results[0]->option_value, true);
        }
        //echo "<pre>";print_r($data);die;

        // get all the fellowship dropdown
        /*foreach($data as $value) {
            $meetingFellowshipArray[] = $value['fellowship'];
        }
        $meetingFellowshipArray = array_values(array_unique($meetingFellowshipArray));
        sort($meetingFellowshipArray);*/
        
        $html = '';
        /*$html .= '<div class="col-md-12">
                <div style="text-align:center;">
                    <img src="https://www.intherooms.com/home/wp-content/uploads/2020/02/add-size-728x90.jpg">
                </div>
            </div>';*/
        $meetingNameFormats = array(
            "Coda [Codependency]" => "CODA [Codependency]",
            "Na Business" => "NA Business",
            "Na Live Business Meeting" => "NA Live Business Meeting",
            "Aca [Adult Children]" => "ACA [Adult Children]",
            "Aca Sunday" => "ACA Sunday",
            "Alanon" => "Al-Anon",
            "Sunday Night Alanon" => "Sunday Night Al-Anon",
            "Na Pride [Lgbt]" => "NA Pride [LGBT]",
            "Monday Afternoon Coda" => "Monday Afternoon CODA",
            "Lifering" => "LifeRing",
            "Naranon" => "Nar-Anon",
            "Agnostic Aa" => "Agnostic AA",
            "Agnostic Na" => "Agnostic NA",
            "Secular Aa" => "Secular AA",
            "Sunday Aa Marathon Meeting" => "Sunday AA Marathon Meeting",
            "Aca 20 Week Step Study" => "ACA 20 Week Step Study",
            "Wednesday's New Na" => "Wednesday’s New NA",
            "Soul Recovery W/ Ester Nicholson" => "Soul Recovery w/ Ester Nicholson",
            "Saturday's New Na" => "Saturday’s New NA",
            "Cma [Crystal Meth]" => "CMA [Crystal Meth]",
            "Cma" => "CMA",
            "Aca Friday" => "ACA Friday",
            "Cpa [Chronic Pain]" => "CPA [Chronic Pain]",
            "Saa [Sex Addicts]" => "SAA [Sex Addicts]",
            "Sex, Love And Addiction W/ Rob Weiss Phd, Lcsw" => "Sex, Love and Addiction w/ Rob Weiss PhD, LCSW",
            "Tgif" => "TGIF",
            "Oa Steps And Traditions" => "OA Steps and Traditions",
            "Abc Meeting" => "ABC Meeting",
            "Slaa [Sex Love]" => "SLAA [Sex Love]",
            "Slaa" => "SLAA",
            "New Alanon Meeting" => "New Al-Anon Meeting",
            "Caring And Sharing The Na Way" => "Caring and Sharing the NA Way",
        );
        $meetingNameFormatsLC = array_change_key_case($meetingNameFormats, CASE_LOWER);

        $specialtyMeetings = array(
            "Illness In Recovery" => "https://www.intherooms.com/home/illness-in-recovery/",
            "Women Warriors" => "https://www.intherooms.com/home/women-warriors/",
        );
        $specialtyMeetingsLC = array_change_key_case($specialtyMeetings, CASE_LOWER);

        //echo ucwords('Spiritual Gangsters [ mens Group]');die;

        //$var = '"joy of recovery"';
        //echo ucwordsCustomTest($var);die;
        //echo ucwords('“spiritual Not Religious”');echo "-------------";
        //echo str_replace('" ', '"', ucwords(str_replace('"', '" ', $var)));die;

        /*$fellowshipName = 'aca [adult children]';
        if(isset($meetingNameFormatsLC[$fellowshipName])) {
            echo $fellowshipName = $meetingNameFormatsLC[$fellowshipName];
        } else {
            echo "not";
        }
        die;*/
        //echo "<pre>";print_r($meetingNameFormatsLC);die;

        $fellowShipFilters = array(
            "Alcoholics_Anonymous" => array("ALCOHOLICS_ANONYMOUS"),
            "Narcotics_Anonymous" => array("NARCOTICS_ANONYMOUS"),
            "Specialty_Meetings" => array("11TH_STEP_MEDITATION_","CHEMSEX","CODEPENDENCY_GRIEF_AND_RELATIONSHIPS","HEALTHY_LOVE","SEX_TALK","SEX_&_ADDICTION","SHE_RECOVERS","SOUL_RECOVERY_W/_ESTER_NICHOLSON","WOMEN_IN_RECOVERY","SPIRITUAL_GANGSTERS_[MENS_GROUP]","TRAUMA_&_RECOVERY","YOGA_RECOVERY","LIFE_RECOVERY[FAITH_BASED]"),
            "Others" => array(''),
        );
        $optionValues = '';
        foreach($fellowShipFilters as $key => $value) {
            $fellowshipName = ucfirst(str_replace ("_", " ", $key));
            $optionValues .= '<option value="' . $key . '">' . $fellowshipName . '</option>';
        }        
        $html .= '<div class="col-md-12">
            <div class="vmc-hdg-pnl">
                <h2>Live Video Meetings Calendar</h2>
                <select class="fellowshipDropDown">
                    <option value="">Filter by Fellowship</option>
                    ' . $optionValues . '
                </select>
                <div class="side-green-button">
                    <a target="_blank" href="https://www.intherooms.com/home/special-events/">Special Events</a>
                </div>
            </div>
        </div>';

        $date = new DateTime("now", new DateTimeZone($userTimeZone));
        $timezone_identifiers =  DateTimeZone::listIdentifiers(DateTimeZone::ALL);
        $optionValues = '';
        foreach($timezone_identifiers as $key => $value) {
            $selectedValue = ($userTimeZone == $value) ? "selected" : "";
            $optionValues .= '<option value="' . $value . '" ' . $selectedValue . '>' . $value . '</option>';
        }
        
        $html .= '<div class="col-md-12">
                    <div class="tim-zon-hold">
                        <div class="ts-row blocks cf">
                            <div class="col-6 time-zon-txt">
                                <span class="class_strong">Your Local Time : ' . $date->format('h:i A') . ' </span>
                            </div>
                            <div class="col-6">
                                Current Calendar Time Zone Setting : <span class="class_strong">' . $userTimeZone . '</span>
                                [<a style="cursor: pointer;" onclick=showTimeZoneDropDown();>edit]</a><br>
                                <div id="timeZoneDropDownDiv" style="display:none;">
                                    Select to change : <select class="timeZoneDropDown">
                                        <option value="">Select Your TimeZone</option>
                                        ' . $optionValues . '
                                    </select>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>';

            /*for($i = 0; $i <count($meetingFellowshipArray); $i++) {
                $fellowshipName = str_replace ("_", " ", $meetingFellowshipArray[$i]);
                $html .= '<option value="'.$meetingFellowshipArray[$i].'">' . $fellowshipName . '</option>';
            }*/
        /* get all the fellowship dropdown */


        /* convert New York Time to user time zone */
        $newData = array();
        foreach($data as $value) {
            $date = new DateTime($value['meeting_date'], new DateTimeZone('America/New_York'));
            $date->setTimezone(new DateTimeZone($userTimeZone));
            $value['userLocalDateTime'] = $date->format('Y-m-d H:i:s');
            $newData[] = $value;
        }
        //echo "<pre>";print_r($newData);die;
        /* convert New York time to user time zone */

        /* get all the dates data in Array */
        $allDatesData = array();
        foreach($newData as $value) {
            $meetingDate = substr($value['userLocalDateTime'], 0, 10);
            $meetingTime = substr($value['userLocalDateTime'], 11, 5);
            $allDatesData[$meetingDate][$meetingTime][] = $value;
        }
        /* get all the dates data in Array */


        /* create date slider*/
        $totalDates = 0;
        $date = new DateTime("now", new DateTimeZone($userTimeZone));
        $currentDate = $date->format('Y-m-d');
        $html .= '<span id="' . $currentDate . '" class="currentSeletcedDate" style="display:none;"></span>';
        $html .= '<div class="col-md-12"> 
            <section class="center slider mb-5">';
            foreach($allDatesData as $key => $value) {
                $activeClass = '';
                if($key == $currentDate) {
                    $activeClass = ' active';
                }
                $html .= '<div class="dateRange" id="dateRange_'.$key.'" data-slide-number="' . $totalDates . '" data-slide-date="' . $key . '">' . 
                    date("D", strtotime($key)) . 
                    '<a id ="'.$key.'" class="dateCircle cld-min" style="cursor: pointer;margin: auto;">
                        <div id ="roundChild_'.$key.'" class="cld-crl'.$activeClass.'">' . 
                            date("M", strtotime($key)) . '<br>
                            <strong class="cld-date-sz">' . date("d", strtotime($key)). '</strong>
                        </div>
                    </a>
                </div>';
                $totalDates++;
            }
        $html .= '</section>
            </div>';
        /* create date slider*/

        $html .= '<div class="col-12">
                    <div style="margin: 1em 0;">                        
                        <span class="class_strong" id="showSelectedDate">Selected Date : ' . $currentDate . ' </span>                        
                    </div>
                </div>';

        /* show all the dates data */
        $date = new DateTime("now", new DateTimeZone($userTimeZone));
        $currentDate = $date->format('Y-m-d');
        foreach($allDatesData as $key1 => $value1) {
            if($key1 == $currentDate) {
                $displayClass = 'show';
            } else {
                $displayClass = 'hide';
            }
            $html .= '<div class="meetingList col-md-12 ' . $displayClass . '" id="meetingList_'.$key1.'"><div class="ue-cld-list">';
            $html .= '<div id="meetingListMessage_' . $key1 . '" style="display:none;">No meetings found.</div>';
            $html .= '<div id="meetingListHeading_' . $key1 . '" style="font-weight: bold;">
                        <div class="ue-cld-list-pnl clearfix"> 
                            <div class="ue-s-date-new">Time</div>
                            <div class="ue-s-detail-new">Fellowship</div>
                            <div class="ue-s-detail-new-sub">Meeting Name</div>
                        </div>
                    </div>';
            $countRows = 1;        
            foreach($value1 as $key => $value) {

                if(count($value) > 1) {
                    for($i=0;$i<count($value);$i++) {
                        $meetingDate = substr($value[$i]['userLocalDateTime'], 0, 10);
                        $meetingTime = substr($value[$i]['userLocalDateTime'], 11, 5);
                        $meetingTimeFormat = date('h:i A', strtotime($value[$i]['userLocalDateTime']));

                        $startTime = date('Y-m-d h:i A', strtotime($value[$i]['userLocalDateTime']));
                        $finishTime = date('Y-m-d h:i A',strtotime('+1 hour',strtotime($value[$i]['userLocalDateTime'])));
                        $date = new DateTime("now", new DateTimeZone($userTimeZone));
                        $currentTime = $date->format('Y-m-d h:i A');                    
                        if (strtotime($currentTime) > strtotime($startTime) && strtotime($currentTime) < strtotime($finishTime)) {
                            $liveMeeting = 'live_meeting';
                        } else {
                            $liveMeeting = '';
                        }

                        //$output = str_replace(array('[', ']'), '_', $value[$i]['fellowship']);
                        $key = searchForIdTest($value[$i]['fellowship'], $fellowShipFilters);
                        $fellowshipName = strtolower(str_replace ("_", " ", $value[$i]['fellowship']));
                        $meetingName = strtolower($value[$i]['name']);

                        if(isset($meetingNameFormatsLC[$fellowshipName])) {
                            $fellowshipName = $meetingNameFormatsLC[$fellowshipName];
                        } else {
                            $fellowshipName = ucwordsCustomTest($fellowshipName);
                        }    

                        if(isset($meetingNameFormatsLC[$meetingName])) {
                            $meetingName = $meetingNameFormatsLC[$meetingName];
                        } else {
                            $meetingName = ucwordsCustomTest($meetingName);
                        }    

                        if($countRows % 2 != 0) {
                            $greyRowClass = 'grey_row';
                        } else {
                            $greyRowClass = '';
                        }
                        $countRows++;

                        $html .= '<div class="'.$key1.'_child fellowship fellowship_'.$key.'">';
                        $html .= '<a class="' . $liveMeeting . '" target="_blank" href="https://www.intherooms.com/livemeetings/view?meeting_id=' . $value[$i]['meeting_id'] . '">';                        

                        if($i == 0) {
                            $html .= '<div class="ue-cld-list-pnl clearfix ' . $greyRowClass . '" data-href="#" style="border-bottom:none; !important"> 
                                        <div class="ue-s-date-new">' . $meetingTimeFormat . '</div>';                                            
                        } else if($i == (count($value) - 1)) {
                            $html .= '<div class="ue-cld-list-pnl clearfix ' . $greyRowClass . '" data-href="#">
                                        <div class="ue-s-date-new timeComplete1 timeComplete1_'.$meetingDate.'" style="display:none;">' . $meetingTimeFormat . '</div>
                                        <div class="ue-s-date-new timeComplete2 timeComplete2_'.$meetingDate.'">&nbsp;</div>';
                        } else {
                            $html .= '<div class="ue-cld-list-pnl clearfix ' . $greyRowClass . '" data-href="#" style="border-bottom:none; !important">
                                        <div class="ue-s-date-new timeComplete1 timeComplete1_'.$meetingDate.'" style="display:none;">' . $meetingTimeFormat . '</div>
                                        <div class="ue-s-date-new timeComplete2 timeComplete2_'.$meetingDate.'">&nbsp;</div>';
                        }
                        $html .= '      <div class="ue-s-detail-new">' . $fellowshipName . '</div>
                                        <div class="ue-s-detail-new-sub">' . $meetingName . '</div>
                                    </div>
                                </a>';

                        if($value[$i]['special_meeting'] == 1 && $value[$i]['special_meeting_page_url'] != '') {
                            $html .= '<div class="meeting-info">';
                            $html .= '<a target="_blank" href="' . $value[$i]['special_meeting_page_url'] . '">
                                <i class="fa fa-info-circle fa-2" aria-hidden="true" style="margin-left:5px;"></i>
                            </a></div>';
                        } else if(isset($specialtyMeetingsLC[strtolower($fellowshipName)])) {
                            $html .= '<div class="meeting-info">';
                            $html .= '<a target="_blank" href="' . $specialtyMeetingsLC[strtolower($fellowshipName)] . '">
                                <i class="fa fa-info-circle fa-2" aria-hidden="true" style="margin-left:5px;"></i>
                            </a></div>';
                        }

                        $html .= '</div>';
                    }
                } else {
                    $meetingDate = substr($value[0]['userLocalDateTime'], 0, 10);
                    $meetingTime = substr($value[0]['userLocalDateTime'], 11, 5);
                    $meetingTimeFormat = date('h:i A', strtotime($value[0]['userLocalDateTime']));

                    $startTime = date('Y-m-d h:i A', strtotime($value[0]['userLocalDateTime']));
                    $finishTime = date('Y-m-d h:i A',strtotime('+1 hour',strtotime($value[0]['userLocalDateTime'])));
                    $date = new DateTime("now", new DateTimeZone($userTimeZone));
                    $currentTime = $date->format('Y-m-d h:i A');                    
                    if (strtotime($currentTime) > strtotime($startTime) && strtotime($currentTime) < strtotime($finishTime)) {
                        $liveMeeting = 'live_meeting';
                    } else {
                        $liveMeeting = '';
                    }

                    //$output = str_replace(array('[', ']'), '_', $value[0]['fellowship']);
                    $key = searchForIdTest($value[0]['fellowship'], $fellowShipFilters);
                    $fellowshipName = strtolower(str_replace ("_", " ", $value[0]['fellowship']));
                    $meetingName = strtolower($value[0]['name']);

                    if(isset($meetingNameFormatsLC[$fellowshipName])) {
                        $fellowshipName = $meetingNameFormatsLC[$fellowshipName];
                    } else {
                        $fellowshipName = ucwordsCustomTest($fellowshipName);
                    }

                    if(isset($meetingNameFormatsLC[$meetingName])) {
                        $meetingName = $meetingNameFormatsLC[$meetingName];
                    } else {
                        $meetingName = ucwordsCustomTest($meetingName);
                    }

                    if($countRows % 2 != 0) {
                        $greyRowClass = 'grey_row';
                    } else {
                        $greyRowClass = '';
                    }
                    $countRows++;

                    $html .= '<div class="'.$key1.'_child fellowship fellowship_'.$key.'">';
                    $html .= '<a class="' . $liveMeeting . '" target="_blank" href="https://www.intherooms.com/livemeetings/view?meeting_id=' . $value[0]['meeting_id'] . '">
                        <div class="ue-cld-list-pnl clearfix ' . $greyRowClass . '" data-href="#"> 
                            <div class="ue-s-date-new">' . $meetingTimeFormat . '</div>
                            <div class="ue-s-detail-new">' . $fellowshipName . '</div>
                            <div class="ue-s-detail-new-sub">' . $meetingName . '</div>
                        </div>
                    </a>';
                    if($value[0]['special_meeting'] == 1 && $value[0]['special_meeting_page_url'] != '') {
                        $html .= '<div class="meeting-info">';
                        $html .= '<a target="_blank" href="' . $value[0]['special_meeting_page_url'] . '">
                            <i class="fa fa-info-circle fa-2" aria-hidden="true" style="margin-left:5px;"></i>
                        </a></div>';
                    } else if(isset($specialtyMeetingsLC[strtolower($fellowshipName)])) {
                        $html .= '<div class="meeting-info">';
                        $html .= '<a target="_blank" href="' . $specialtyMeetingsLC[strtolower($fellowshipName)] . '">
                            <i class="fa fa-info-circle fa-2" aria-hidden="true" style="margin-left:5px;"></i>
                        </a></div>';
                    }
                    $html .= '</div>';
                }
            }
            $html .= '</div></div>';
        }
        /* show all the dates data */            

        return $html;            
    }
}

function searchForIdTest($searchValue, $array) {
    foreach ($array as $key => $val) {
        if (in_array($searchValue, $val)) {
            return $key;
        }
    }
    return 'Others';
}

function ucwordsCustomTest($str) {
    $str = ucwords($str);
    $str = str_replace('[ ', '[', ucwords(str_replace('[', '[ ', $str)));
    $str = str_replace('“ ', '“', ucwords(str_replace('“', '“ ', $str)));
    $str = str_replace('" ', '"', ucwords(str_replace('&#34;', '" ', $str)));    
    return $str;
}

add_action( 'wp_ajax_live_video_meetings_calendar_test', 'live_video_meetings_calendar_test' );
add_action( 'wp_ajax_nopriv_live_video_meetings_calendar_test', 'live_video_meetings_calendar_test' );

/* End - Meeing Calendar(Testing) */
function _decryptCookie($data)
{
    try {
        $iv_size   = @mcrypt_get_iv_size(MCRYPT_3DES, MCRYPT_MODE_ECB);
        $iv        = @mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $_magic = 'Super Standard Magic Key';
        $decoded   = base64_decode($data);
        $decrypted = unserialize(@mcrypt_decrypt(MCRYPT_3DES, $_magic, $decoded, MCRYPT_MODE_ECB, $iv));
    }catch(Exception $e) {
        return false;
    }
    return $decrypted;
}
add_filter( 'wp_image_editors', function() { return array( 'WP_Image_Editor_GD' ); } );

/*function add_to_yoast_seo($post_id, $metatitle, $metadesc) {
    update_post_meta($post_id, '_yoast_wpseo_title', $metatitle);
    update_post_meta($post_id, '_yoast_wpseo_metadesc', $metadesc);
}
$seo_updated = add_to_yoast_seo(
    '96126',
    'My Seo Title',
    'My Seo Description',
);*/
add_filter('bunyad_widget_posts_query_args','bunyad_widget_posts_custom_post_type',10,1);
function bunyad_widget_posts_custom_post_type($query_args)
{
    if(is_single() || is_tax('iloverecovery'))
    {
        $post_id = get_the_ID();
        $post_type = get_post_type(get_the_ID()); 
        if((!empty($post_type) && $post_type == 'iloverec_post') || is_tax('iloverecovery'))
        {
            $query_args['post_type'] = array('iloverec_post');
        }
    }
    return $query_args;
}
add_filter('bunyad_get_related_query','bunyad_get_related_query_custom',10,1);
function bunyad_get_related_query_custom($args)
{
   if(is_single())
    {
        $post_id = get_the_ID();
        if(!empty($post_id))
        {
           $post_type = get_post_type(get_the_ID()); 
           $category_detail = get_the_terms( $post_id,'iloverecovery' ); 
           //$category_detail=get_the_term_list($post_id,'iloverecovery','', ', ', '');
        }
        
        if(!empty($post_id) && !empty($post_type) && !empty($category_detail) && $post_type == 'iloverec_post')
        {
            
            foreach($category_detail as $k=>$v)
            {
                $args['category_in'][] = $v->term_id;
            }
            $args['numberposts'] = 4;
            $args['post_type'] ='iloverec_post';
            $args['orderby'] ='rand';
            $args['date_query'] =array(
                array(
                    'column' => 'post_date_gmt',
                    'after'  => '3 month ago'
                ));
            return $args;
        }
    }
}
function prefix_filter_title_example( $title ) {
    global $wp;
    
    $url_data = explode("/",$wp->request);
    if(!empty($url_data) && count($url_data) > 1)
    {
        if($url_data[0] == 'find-treatment-center')
        {
            if(!empty($url_data[1]) && !empty($url_data[2]))
            {
                $title = "Treatment Centers & Drug Rehab in ". ucwords($url_data[2]).", ".ucwords($url_data[1]) ." – ITR";
            
                   }
            else if(!empty($url_data[1]))
            {
                $title = ucwords($url_data[1]) . " Drug Rehab & Addiction Treatment Center – ITR";
           
            }
        }
    }
    return $title;
}
add_filter( 'wpseo_title', 'prefix_filter_title_example' );
function prefix_filter_description_example( $description ) {
    global $wp;
      
      $url_data = explode("/",$wp->request);
      
      if(!empty($url_data) && count($url_data) > 1)
      {
          if($url_data[0] == 'find-treatment-center')
          {
              if(!empty($url_data[1]) && !empty($url_data[2]))
              {
                  $description = "Searching for treatment center in ".ucwords($url_data[2]).", ".ucwords($url_data[1])." ? Find an addiction treatment center or drug and alcohol rehab center in ".ucwords($url_data[2])." to get help on your recovery journey.";
              }
              else if(!empty($url_data[1]))
              {
                  $description = "Find drug rehab & addiction treatment center in ".ucwords($url_data[1]).". We help people from any addiction by offering weekly online meetings, discussion groups & addiction meetings near you.";
             
              }
          }
      }
      return $description;
  }
add_filter( 'wpseo_metadesc', 'prefix_filter_description_example' );
add_filter( 'wpseo_metadesc', 'prefix_filter_description_example' );
add_action( 'rest_api_init', function () {
  register_rest_route( 'itr/addListing', '/v1', array(
    'methods' => 'post',
    'callback' => 'addPBBListing',
  ) );
});

function addPBBListing()
{
    global $wpdb;
    if(!empty($_POST))
    {
       
        $postValues = $_POST;
        $treatment_center_name = wp_strip_all_tags(!empty($postValues['treatment_center_name']) ? sanitize_text_field($postValues['treatment_center_name']) : sanitize_text_field($postValues['doctor_first_name']) . "  ".sanitize_text_field($postValues['doctor_middle_name']) . " ". sanitize_text_field($postValues['doctor_last_name']) . " ". (sanitize_text_field($postValues['doctor_suffix'])));
        $post = array(
            'post_title'    => wp_strip_all_tags(!empty($postValues['treatment_center_name']) ? sanitize_text_field($postValues['treatment_center_name']) : (sanitize_text_field($postValues['doctor_first_name']) . "  ".sanitize_text_field($postValues['doctor_middle_name']) . " ". sanitize_text_field($postValues['doctor_last_name']) . " ". sanitize_text_field($postValues['doctor_suffix']))),
            'post_content'  => !empty( $postValues['description']) ? sanitize_text_field($postValues['description']) : '',
            'post_status'   => 'publish',
            'post_type'     => 'itr_dir',
            'ping_status'   => 'closed',
            'comment_status'=> 'closed',
        );
        
    
        $post_id = wp_insert_post( $post);
       
        if($post_id > 0)
        {
            if( isset( $treatment_center_name) ) {
                $meta_name = sanitize_text_field( $treatment_center_name);
                update_post_meta( $post_id, 'meta-name', $meta_name  );
            } else {
                    update_post_meta( $post_id, 'meta-name', '' );
            }
            
            if( isset( $postValues[ 'address1' ] ) ) {
                $meta_address= sanitize_text_field( $postValues[ 'address1' ] ) . " " . sanitize_text_field( $postValues[ 'address2' ] );
                update_post_meta( $post_id, 'meta-address', $meta_address );
            } else {
                    update_post_meta( $post_id, 'meta-address', '' );
            }
            
            if( isset( $postValues[ 'city' ] ) ) {
                $meta_city= sanitize_text_field( $postValues[ 'city' ] );
                update_post_meta( $post_id, 'meta-city', $meta_city );
            } else {
                    //update_post_meta( $post_id, 'meta-city', '' );
            }
            
            if( isset( $postValues[ 'state' ] ) ) {
                $meta_state= sanitize_text_field( $postValues[ 'state' ] );
                update_post_meta( $post_id, 'meta-state', $meta_state );
            } else {
                    //update_post_meta( $post_id, 'meta-state', '' );
            }
            
            if( isset( $postValues[ 'zip' ] ) ) {
                $meta_zip= sanitize_text_field( $postValues[ 'zip' ] );
                update_post_meta( $post_id, 'meta-zip', $meta_zip );
            } else {
                    update_post_meta( $post_id, 'meta-zip', '' );
            }
            
            if( isset( $postValues[ 'email' ] ) ) {
                $meta_email =  sanitize_text_field( $postValues[ 'email' ] );
                update_post_meta( $post_id, 'meta-email', $meta_email );
            } else {
                    update_post_meta( $post_id, 'meta-email', '' );
            }
            
            if( isset(  $postValues[ 'treatment_center_phone_number' ] ) ) {
                $meta_phone= sanitize_text_field( $postValues[ 'treatment_center_phone_number' ]);
                update_post_meta( $post_id, 'meta-phone', $meta_phone );
            } 
            elseif(isset($postValues[ 'phone' ] ))
            {
                $meta_phone= sanitize_text_field( $postValues[ 'phone' ]);
                update_post_meta( $post_id, 'meta-phone', $meta_phone );
            }
            else
            {
                update_post_meta( $post_id, 'meta-phone', '' );
            }
          
            
           
            
            
            update_post_meta( $post_id, 'meta-sponsored', 'featured' );
          
            
            if( isset( $postValues[ 'cover_image_path' ] ) ) {
                $meta_logo_image= sanitize_text_field( $_POST[ 'cover_image_path' ] );
                update_post_meta( $post_id, 'meta-logo-image', $meta_logo_image );
            } else {
                    update_post_meta( $post_id, 'meta-logo-image', '' );
            }
            
            if( isset( $postValues[ 'website' ] ) ) {
                $meta_website= sanitize_text_field( $_POST[ 'website' ] );
                update_post_meta( $post_id, 'meta-website', $meta_website );
            } else {
                    update_post_meta( $post_id, 'meta-website', '' );
            }
            
            if( isset( $postValues['lat'])  && isset($postValues['lng']) ) {
                $meta_map_latlong= sanitize_text_field( $postValues['lat'] ) . "," . sanitize_text_field( $postValues['lng'] );
                update_post_meta( $post_id, 'meta-map-latlong', $meta_map_latlong );
            } else {
                    update_post_meta( $post_id, 'meta-map-latlong', '' );
            }
            global $wpdb;
            $table_name = "wp_itr_directory";
        
            $sql = "SELECT * FROM ". $table_name ." where post_id=".$post_id." limit 1";
            $itr_dir_post = $wpdb->get_results($sql);
            if(count($itr_dir_post)> 0) {
                
                $wpdb->update( 
                    $table_name, 
                    array( 
                        'name' => !empty($meta_name) ? $meta_name : '',
                        'phone' => !empty($meta_phone) ? $meta_phone : '',
                        'cat_of_treat' => '',
                        'address' => !empty($meta_address) ? $meta_address : '',
                        'city' => !empty($meta_city) ? $meta_city : '',
                        'state' => !empty($meta_state) ? $meta_state : '',
                        'zip' => !empty($meta_zip) ? $meta_zip : '',
                        'geo_loc' =>!empty( $meta_map_location) ? $meta_map_location : '',
                        'geo_lat_long' => !empty($meta_map_latlong) ? $meta_map_latlong : '',
                        'sponsored' => 'featured',
                        'website' => !empty($meta_website) ? $meta_website : '',
                        'logo_url' => !empty($meta_logo_image) ? $meta_logo_image : '',
                        'post_id' => !empty($post_id) ? $post_id : ''
                    ), 
                    array( 'post_id' => $post_id ), 
                    array( 
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s',
                            '%s'
                    ), 
                    array( '%d' ) 
                );    
            }
            else
            {
                $wpdb->insert(
                    'wp_itr_directory', 
                    array(
                            'name' => !empty($meta_name) ? $meta_name : '',
                            'phone' => !empty($meta_phone) ? $meta_phone : '',
                            'cat_of_treat' => '',
                            'address' => !empty($meta_address) ? $meta_address : '',
                            'city' => !empty($meta_city) ? $meta_city : '',
                            'state' => !empty($meta_state) ? $meta_state : '',
                            'zip' => !empty($meta_zip) ? $meta_zip : '',
                            'geo_loc' =>!empty( $meta_map_location) ? $meta_map_location : '',
                            'geo_lat_long' => !empty($meta_map_latlong) ? $meta_map_latlong : '',
                            'sponsored' => 'featured',
                            'website' => !empty($meta_website) ? $meta_website : '',
                            'logo_url' => !empty($meta_logo_image) ? $meta_logo_image : '',
                            'post_id' => !empty($post_id) ? $post_id : ''
                    )
                );
            }
            if(!empty($meta_map_latlong)){
                $table_name = "wp_geo_position";
                $sql = "SELECT * FROM ". $table_name ." where post_id=".$post_id." limit 1";
                $itr_geo_post = $wpdb->get_results($sql);
                if(count($itr_geo_post)> 0) {
                    $latlong_arr = explode(",", $meta_map_latlong);
                    $wpdb->update( 
                            $table_name, 
                            array( 
                                    'lat' => $latlong_arr[0],
                                    'lng' => $latlong_arr[1]
                            ), 
                            array( 'post_id' => $post_id ), 
                            array( 
                                    '%s',
                                    '%s'
                            ), 
                            array( '%d' ) 
                    );                    
                }else {
                    
                    $latlong_arr = explode(",", $meta_map_latlong);
                    $wpdb->insert(
                            $table_name, 
                            array(
                                    'lat' => $latlong_arr[0],
                                    'lng' => $latlong_arr[1],
                                    'post_id' => $post_id
                            )
                    );
                    
                }
                 
            }
        }
        echo json_encode($postValues);
        exit;
    }
    
}

add_filter("wpseo_breadcrumb_links", "wpse_100012_override_yoast_breadcrumb_trail");

function wpse_100012_override_yoast_breadcrumb_trail($links)
{
    $post_type = get_post_type();
   
    if(!empty($links[1]['term_id']) && in_array($links[1]['term_id'],array(3509,3510,1711)))
    {
        if ($post_type === 'iloverec_post') {
        $breadcrumb[] = array(
            'url' => '/home/iloverecovery/all',
            'text' => 'Blog & Article'
        );
        array_splice($links, 1, -3, $breadcrumb);
    }
        return $links;
    }
    if(!empty($links[1]['text']) && $links[1]['text'] == 'ITR Coach')
    {
       $breadcrumb[] = array(
            'url' => '/home/find-treatment-center/',
            'text' => 'Find Treatment'
        );
        array_splice($links, 1, -3, $breadcrumb);
        
        if(!empty($links[2]['text']) && $links[2]['text'] == 'ITR Coach')
        {
            $links[2]['text'] = 'Find A Recovery Coach';
        }
     
        return $links;
    }
    
    return $links;
}
add_action( 'wp_ajax_nopriv_store_click_phone_number', 'store_click_phone_number' );
add_action( 'wp_ajax_store_click_phone_number', 'store_click_phone_number' );

function store_click_phone_number() {
    global $wpdb;
    $user_id = 0;
 
    if(isset($_COOKIE['GPCookie']))
    {
        $decrypted_cookie = _decryptCookie($_COOKIE['GPCookie']);
       
        if(isset($_COOKIE['GPCookie']) && ($decrypted_cookie !== false) && isset($decrypted_cookie['mid']) ){
            $user_id = $decrypted_cookie['mid']; 
        }
    }
  
    if(!empty($_POST['link_value']) && !empty($_POST['phone_number_type']))
    {
        $_address = '';
        if(!empty($_SERVER['REMOTE_ADDR'])){
            $_address = $_SERVER['REMOTE_ADDR'];
        }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $_address= $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        
        
        $wpdb->query(
            $wpdb->prepare(
               "INSERT INTO phone_number_clicked
               ( href_tag_value, user_id, type,ip_address,is_mobile )
               VALUES ( %s, %d, %s,%s,%d )",
               $_POST['link_value'],
               $user_id,
               $_POST['phone_number_type'],
               $_address,
               $_POST['is_mobile']
            )
         );
    }
   exit;
}