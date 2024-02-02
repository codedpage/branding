<?php
/**
 * Template Name: App Download
 * 
 * Static Find Addiction Treatment Center with search functionality
 * 
 */
$user_agent = strtolower($_SERVER['HTTP_USER_AGENT']); 
$accept     = strtolower($_SERVER['HTTP_ACCEPT']);
// array of agents that we need to test against
$agents = array('iphone'     => array('ipod', 'iphone') );

$iPhoneFlag = false;
// loop over our agents and see if we have a match				 
foreach ($agents as $key => $terms) {
    if (is_array($terms)) {
        foreach ($terms as $term) {
            if (strstr($user_agent, $term)) {
                $iPhoneFlag = true;
            }
        }
    }
    else {
        if (strstr($user_agent, $terms)) {
            $iPhoneFlag = true;
        }
    }
}
if($iPhoneFlag) {
    	header("Location: https://apps.apple.com/us/app/in-the-rooms/id1507386880?ls=1");
}else if(stripos($_SERVER['HTTP_USER_AGENT'],'android') !== false)  {
   	 header("Location: https://play.google.com/store/apps/details?id=com.ripenapps.intheroom");
}else if(stripos($_SERVER['HTTP_USER_AGENT'],'Macintosh') !== false)  {
	header("Location: https://apps.apple.com/us/app/in-the-rooms/id1507386880?ls=1");
}else {
	header("Location: https://play.google.com/store/apps/details?id=com.ripenapps.intheroom");
}
