<?php /* Template Name: City Template */
get_header();
$search_flag = false; 
if( isset($_REQUEST['itr-lat']) && isset($_REQUEST['itr-lng']) ) {
    $search_flag = true;
}
$page_obj = get_post(get_the_ID()); 
?>
<style type="text/css">
.mn-top-banner-hold{
    width:100%;
    background-image: url("https://www.intherooms.com/home/wp-content/uploads/2019/11/State-Page-Mockup-top-banner.jpg");
    background-repeat: no-repeat;
    background-size: cover;
}
.top-cont{text-align: center; padding: 7em 1em;}
.top-cont p , h3{color: #ffffff;text-transform: uppercase}
.top-cont p {font-size: 1.3em; line-height: 1.4em;margin-bottom: 12px; font-weight: 500;}
.top-cont h3 {font-size: 3em;line-height: 1em; margin-bottom: 12px; font-weight: 900;}
</style>
<link rel="stylesheet" href="<?php echo WP_PLUGIN_URL.'/itr-directory/css/style.css'; ?>">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet"> 
       
<div class="single-creative" style="margin-bottom: 40px;">
    <div class="mn-top-banner-hold">
        <div class="top-cont">
            <p>Addiction Treatment facilities in</p>
            <h3><?php echo get_the_title();?></h3>
        </div>
    </div>
</div>		
<?php 
$post_id= get_the_ID();
global $wpdb;
$meta_state= get_post_meta($post_id,'meta-state',true);
$meta_city= get_post_meta($post_id,'meta-city',true);

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$num_of_post = 10;
$offset = ($paged - 1) * $num_of_post;

$args = array(
	'numberposts' => $num_of_post,
	'offset' => $offset,
	'category' => 0,
	'orderby' => 'post_date',
	'order' => 'DESC',
        //'paged' => $paged,
	'include' => '',
	'exclude' => '',
	'meta_key' => '',
	'meta_value' =>'',
	'post_type' => 'itr_dir',
	'post_status' => 'publish',
	'suppress_filters' => true,
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'meta-sponsored',
                'value' => 'featured',
                'compare' => '=',
            ),
            array(
                'key' => 'meta-state',
                'value' => $meta_state,
                'compare' => '=',
            ),
            array(
                'key' => 'meta-city',
                'value' => $meta_city,
                'compare' => '=',
            ),
        )
);

$posts = wp_get_recent_posts( $args, OBJECT );
$itr_dir = new ITRDirectory();
$args = array(
               'taxonomy' => 'categories',
               'orderby' => 'name',
               'order'   => 'ASC'
           );

$cats = get_categories($args);
?>
<div class="main-wrap" style="transform: none;">
    <div class="main wrap" style="transform: none;margin-top: 0px;">
        <div class="ts-row cf">
            <div class="col-8">
                <!-- /21776359302/ITR_728X90_selfrecovery -->
                <div id='div-gpt-ad-1577196453964-0' style='width: 728px; height: 90px;'>
                  <script>
                    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1577196453964-0'); });
                  </script>
                </div>
                <article class="the-post">
                    <div class="post-content description cf entry-content has-share-float">
                        <?php echo $page_obj->post_content; ?>
                    </div>
                </article>
                <!--
                <div class="sidebar" style="padding-left: 0px;"><h5 class="widget-title">Beta — <a href="http://directory.intherooms.com" style="color: #1b651f;">click here</a> to view the classic version</h5></div>
                <form id="search-directory-form">
                    <div class="ts-row cf">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="email">Category</label>	
                                <div class="input-group">
                                    <select id="itr-name-cat-search" name="itr-name-cat-search" class="form-control input-fld">
                                        <option value="">Select</option>
                                        <?php foreach($cats as $cat) { ?>
                                        <option value="<?php echo $cat->name;?>"><?php echo $cat->name;?></option>
                                        <?php } ?>
                                    </select>                                    
                                </div>	
                            </div>	
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="email">Select location</label>	
                                <div class="input-group geo-details">
                                    <input type="text" name="itr-location" id="itr-location" placeholder="Enter a location"  class="form-control input-fld" placeholder="Search" name="search" value="<?php echo ($search_flag)? $_REQUEST['itr-location']:'';?>">
                                    <input id="itr-lat" type="hidden"  data-geo="lat" id="itr-lat" name="itr-lat" value="<?php echo ($search_flag)? $_REQUEST['itr-lat']:'';?>" />
                                    <input id="itr-lng" type="hidden"  data-geo="lng" id="itr-lng" name="itr-lng" value="<?php echo ($search_flag)? $_REQUEST['itr-lng']:'';?>" />
                                    <div class="input-group-btn">
                                        <button class="btn btn-default input-btn" type="submit"><i class="fa fa-map-marker"></i></button>
                                    </div>
                                </div>	
                            </div>	
                        </div>
                    </div>
                    <div class="ts-row cf">
                        <div class="col-1">
                            <div class="form-group">
                                <label for="sele">Radius</label>
                                <div><strong>Mile</strong></div>
                                <!-- <select class="form-control sele" name="itr-distance-unit" id="itr-distance-unit">
                                    <option value="km" selected>Kilometer</option>
                                    <option value="mi">Mile</option>
                                </select> 
                                <input type="hidden" name="itr-distance-unit" id="itr-distance-unit" value="mi">
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="slidecontainer">
                                <p>Distance: <span id="itr-range-output"></span></p>
                                <input type="range" min="1" max="300" value="100" name="itr-range" class="slider" id="itr-range">
                            </div>
                        </div>
                        <div class="col-3">
                            <p>&nbsp; <span id="itr-range-output"></span></p>
                            <button type="button" class="btn btn-primary" id="search-button">Search</button>
                        </div>
                    </div>		
                </form>
                -->
<?php $state_arr = Array("AK"=>"Alaska","AL"=>"Alabama","AR"=>"Arkansas","AZ"=>"Arizona","CA"=>"California","CO"=>"Colorado","CT"=>"Connecticut","DC "=>"Washington DC","DE"=>"Delaware","FL"=>"Florida","GA"=>"Georgia","GU"=>"Guam","HI"=>"Hawaii","IA"=>"Iowa","ID"=>"Idaho","IL"=>"Illinois","IN"=>"Indiana","KS"=>"Kansas","KY"=>"Kentucky","LA"=>"Louisiana","MA"=>"Massachusetts","MD"=>"Maryland","ME"=>"Maine","MI"=>"Michigan","MN"=>"Minnesota","MO"=>"Missouri","MS"=>"Mississippi","MT"=>"Montana","NC"=>"North Carolina","ND"=>"North Dakota","NE"=>"Nebraska","NH"=>"New Hampshire","NJ"=>"New Jersey","NM"=>"New Mexico","NV"=>"Nevada","NY"=>"New York","OH"=>"Ohio","OK"=>"Oklahoma","OR"=>"Oregon","PA"=>"Pennsylvania","PR"=>"Puerto Rico","RI"=>"Rhode Island","SC"=>"South Carolina","SD"=>"South Dakota","TN"=>"Tennessee","TX"=>"Texas","UT"=>"Utah","VA"=>"Virginia","VI"=>"Virgin Islands","VT"=>"Vermont","WA"=>"Washington","WI"=>"Wisconsin","WV"=>"West Virginia","WY"=>"Wyoming"); ?>
                <div class="container loding-div text-center mb-4 loading-hold result-show">
                    <h2>Result Is Loading....</h2>
                    <div class="loader"></div>    
                </div>
                <div id="dir-result-output" class="dir-result-output">
                    <div class="col-12"><h2 class="free-title">Browse All Addiction Treatment Options in <?php echo get_the_title();?>, <?php echo $state_arr[get_post_meta(get_the_ID(),'meta-state',true)];?></h2></div>
<?php
if($search_flag) {
    echo $itr_dir->getSearchDirectoryOutPut($_REQUEST['itr-lat'],$_REQUEST['itr-lng']);
}else {
/*
* Get post details from itr_directory and print
*/
    
echo $itr_dir->getDirectoryHtml($posts,'','','city-page');
wp_reset_query();

/* Basic Listing */
$num_of_post = 20;
$offset = ($paged - 1) * $num_of_post;

$args = array(
	'numberposts' => $num_of_post,
	'offset' => $offset,
	'category' => 0,
	'orderby' => 'post_date',
	'order' => 'DESC',
        //'paged' => $paged,
	'include' => '',
	'exclude' => '',
	'meta_key' => '',
	'meta_value' =>'',
	'post_type' => 'itr_dir',
	'post_status' => 'publish',
	'suppress_filters' => true,
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'meta-sponsored',
                'value' => 'basic',
                'compare' => '=',
            ),
            array(
                'key' => 'meta-state',
                'value' => $meta_state,
                'compare' => '=',
            ),
            array(
                'key' => 'meta-city',
                'value' => $meta_city,
                'compare' => '=',
            ),
        )
);

$posts = wp_get_recent_posts( $args, OBJECT );
?>
                    <div class="col-12">
                    <div class="ts-row cf">
                        <div class="col-12"><h2 class="free-title">Additional Treatment Options</h2></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="free-listing-wrapper">
                        <div class="ts-row cf">
<?php
if(is_array($posts)) {
?>
                
                            <?php foreach($posts as $post) { 
                                global $wpdb;
                                $website_html='';
                                $table_name = $wpdb->prefix . "itr_directory";
                                $sql = "SELECT * FROM ". $table_name ." where post_id=".$post->ID." limit 1";
                                $itr_dir_post = $wpdb->get_results($sql); 
                                $logo_url = $itr_dir_post[0]->logo_url;
                                if(is_numeric($itr_dir_post[0]->logo_url)) {
                                    $img = wp_get_attachment_image_src( $itr_dir_post[0]->logo_url, 'dir-img');
                                    $logo_url = $img[0];
                                } else {
                                    $logo_url = 'https://www.intherooms.com/home/wp-content/uploads/2020/05/us-map.png';
                                }
                                if(!empty($itr_dir_post[0]->website)){
                                    if(strpos($itr_dir_post[0]->website, "?")) {
                                        $web_trim_url = substr($itr_dir_post[0]->website, 0, strpos($itr_dir_post[0]->website, "?"));
                                    }else {
                                        $web_trim_url = $itr_dir_post[0]->website;
                                    }
                                    $web_trim_url=substr($web_trim_url,strpos($web_trim_url,'//')+2);
                                    $website_html = '<p class="web-link-wrap p-mb2"><a href="'.$itr_dir_post[0]->website.'" class="mod-colo-green txt-deco"><i class="fa fa-globe"></i> &nbsp; '.$web_trim_url.'</a></p>';
                                }
                            ?>
                            <div class="col-12 brdr p-4 mb-4">
                                <div class="ts-row rf">
                                    <div class="col-5 pos-rel bx-shad">
                                        <a href="<?php echo get_permalink($post->ID);?>">
						<img class="brand-logo" src="<?php echo get_home_url().'/wp-content/plugins/itr-directory/images/transparent-cover.png';?>"  style="background-image: url('<?php echo $logo_url;?>');">
					</a>
                                        <div class="listing_cat">
                                        </div>                                    
                                    </div>
                                    <div class="col-7">
                                        <h3 class="web-link-wrap"><a href="<?php echo get_permalink($post->ID);?>"><?php echo $post->post_title;?></a></h3>
                                        <p class="web-link-wrap p-mb2">
                                            <a class="phone_number_click mod-colo-green txt-deco" data-phone_number_type="city-page" href="tel:<?php echo $itr_dir_post[0]->phone;?>"><i class="fa fa-phone"></i> &nbsp;<?php echo $itr_dir_post[0]->phone;?></a>
                                        </p>
                                        <div class="clinic-add-icn">
                                            <a class="mod-colo-green txt-deco" href="https://www.google.com/maps/search/<?php echo get_post_meta($post->ID,'meta-map-latlong',true);?>" target="_blank"><span style="color: #000;line-height: 1.7em;"><?php echo $itr_dir_post[0]->address.', '.$itr_dir_post[0]->city.', '.$itr_dir_post[0]->state.', '.$itr_dir_post[0]->zip;?></span></a>
                                        </div>

                                        <?php echo $website_html; ?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        
                    
<?php } 
wp_reset_query();



$num_of_post = 20;
$offset = ($paged - 1) * $num_of_post;

$args = array(
	'numberposts' => $num_of_post,
	'offset' => $offset,
	'category' => 0,
	'orderby' => 'post_date',
	'order' => 'DESC',
        //'paged' => $paged,
	'include' => '',
	'exclude' => '',
	'meta_key' => '',
	'meta_value' =>'',
	'post_type' => 'itr_dir',
	'post_status' => 'publish',
	'suppress_filters' => true,
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'meta-sponsored',
                'value' => 'free',
                'compare' => '=',
            ),
            array(
                'key' => 'meta-state',
                'value' => $meta_state,
                'compare' => '=',
            ),
            array(
                'key' => 'meta-city',
                'value' => $meta_city,
                'compare' => '=',
            ),
        )
);

$posts = wp_get_recent_posts( $args, OBJECT );
?>
					
                            <?php foreach($posts as $post) { 
                                global $wpdb;
                                $table_name = $wpdb->prefix . "itr_directory";
                                $sql = "SELECT * FROM ". $table_name ." where post_id=".$post->ID." limit 1";
                                $itr_dir_post = $wpdb->get_results($sql); 
                            ?>
                            <div class="col-6 mb-4">
                                <div class="border-free-listing p-3">
                                    <h3 class="free-listing-title"><!-- <a href="<?php echo get_permalink($post->ID);?>"> --><?php echo $post->post_title;?><!-- </a> --></h3>
                                    <p><span class="norm-txt"><?php echo $itr_dir_post[0]->address.', '.$itr_dir_post[0]->city.', '.$itr_dir_post[0]->state.', '.$itr_dir_post[0]->zip;?></span></p>
                                    <p class="m-b-0"><strong>Phone:</strong> <span class="norm-txt"><a data-phone_number_type="city-page" class="phone_number_click mod-green txt-deco" href="tel:<?php echo $itr_dir_post[0]->phone;?>"><?php echo $itr_dir_post[0]->phone;?></a></span></p>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>    
                    <?php 
                        $query = new WP_Query( $args   );
                        //echo "<pre>"; print_r($query); 
                        $total_free_post =  $query->found_posts;
                        $GLOBALS['wp_query']->max_num_pages = $query->max_num_pages;
                            echo the_posts_pagination( array(
                               'total'             => ceil($total_free_post / $num_of_post),
                               //'mid_size' => 1,
                               'prev_text' => __( 'Back', 'itr' ),
                               'next_text' => __( 'Onward', 'itr' ),
                               'screen_reader_text' => __( 'Posts navigation' )
                            ) );
                            /*
                            echo the_posts_pagination( array(
                               'total'             => ceil($total_free_post / $num_of_post),
                               'prev_text' => __( 'Back', 'green' ),
                               'next_text' => __( 'Onward', 'green' ),
                               'screen_reader_text' => __( 'Posts navigation' )
                            ) );
                             * 
                             */
                        wp_reset_query();
                        ?>
                </div>
                <?php } //end of no serach result ?>    
                </div>
                
            </div>
                <?php    get_sidebar('dir-sidebar'); ?>
            </div>
        </div>
    </div>
<script>
jQuery(function ($) {
    function getDirectory(itr_click=''){
        var formData = new FormData();
        formData.append('itr-name-cat-search', $('#itr-name-cat-search').val());
        formData.append('itr-distance-unit', $('#itr-distance-unit').val());
        formData.append('itr-range', $('#itr-range').val());
        formData.append('itr-lat', $('#itr-lat').val());
        formData.append('itr-lng', $('#itr-lng').val());
        formData.append('itr-click', itr_click);
        formData.append('security', '<?php echo wp_create_nonce( 'GET_DIRECTORY' );?>');        
        formData.append('action', 'get_directory');
        jQuery('#dir-result-output').addClass('fade-up-back');
        jQuery.ajax( {
            url: '<?php echo admin_url( 'admin-ajax.php' );?>',
            type: 'post',
            cache:false,
            contentType: false,
            processData: false,
            data: formData,
            success: function ( response ) {
                $('#dir-result-output').html(response);
                jQuery('#dir-result-output').removeClass('fade-up-back');
                //response = JSON.parse(response);
                //console.log(response);
                //console.log(cDom);
                //jQuery('> button.dislike_post > span.counter',cDom).html(response[0].dislike);
                //jQuery('> button.like_post > span.counter',cDom).html(response[0].like);
            }
        } );
    }
    
    $("#itr-location").geocomplete({
      details: ".geo-details",
      detailsAttribute: "data-geo"
    })
    .bind("geocode:result", function(event, result){
        //console.log(result);
        //write own code after geo output
        //getDirectory('geo');
    });
    
    $('#search-icon').click(function(){
        //getDirectory('name-cat');
    });
    $('#search-button').click(function(){
        getDirectory();
    });

});
var slider = document.getElementById("itr-range");
var output = document.getElementById("itr-range-output");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
jQuery( "#search-directory-form" ).submit(function( event ) {
    //alert( "Handler for .submit() called." );
    event.preventDefault();
  });
</script>

<?php
get_footer();



