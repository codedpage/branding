<?php /* Template Name: State Canada Template */
get_header();
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
.featured-title{color: #707070;margin: -15px 0 15px 0;}
.st-list {margin: 0 0 0 10px;padding: 0 0 0 2em;}
.st-list li{font-size: 1em; line-height: 1.4; color: #707070;font-weight: 500; text-transform: uppercase;text-decoration: none;text-align: left; outline: none; list-style-type: none;padding: 0.3em 0;}
.st-list li a {color: #707070;text-decoration: none;}
.st-list li a:hover { color: #6faf73; text-decoration: none;}
.trnding-hding {
    font-family: inherit;
    text-transform: uppercase;
    font-size: 12px;
    display: block;
    line-height: 20px;
    letter-spacing: 0.7px;font-weight: 600;
}
.mod-colu-bl {
    color: #5091CD !important;
}
.trnding-txt {
    font-size: 15px;
    line-height: 22px;
    display: block;
}
.mod-colu-gry {
    color: #707070;
}
.trnding-caption {
    font-size: 11px;
    line-height: 20px;
    text-transform: uppercase;
    display: block;
    margin-bottom: 15px;
}
.query-txt{color: #000;
    font-weight: 600;
    display: block;
    margin-bottom: 2px;
}
p {
    margin-top: 0;
    margin-bottom: 2rem;
    font-family: 'Open Sans', sans-serif;
}
@media (min-width: 500px) and (max-width: 940px){
    .col-2-my{ width: 50% !important;}
    .ts-row .col-2-my {	padding-left: 15px;padding-right: 15px;float: left;min-height: 1px;box-sizing: border-box;}
}
</style>
       
<div class="single-creative">
    <div class="mn-top-banner-hold">
        <div class="top-cont">
            <p>Addiction Treatment facilities in</p>
            <h3><?php echo get_the_title();?></h3>
        </div>
    </div>
		
    <div class="main wrap">
        <div id="post-65070" class="post-65070 iloverec_post type-iloverec_post status-publish format-standard has-post-thumbnail iloverecovery-addiction iloverecovery-recovery-articles iloverecoverytag-addiction-news iloverecoverytag-addiction-recovery iloverecoverytag-addiction-response">
            <div class="ts-row cf">
                <div class="col-8 main-content cf">
                    <article class="the-post">
                        <div class="post-content description cf entry-content has-share-float">
                            <?php echo $page_obj->post_content; ?>
                        </div>
                    </article>
                    <?php
                    $post_id= get_the_ID();
                    global $wpdb;
                    $featured_posts= get_post_meta($post_id,'featured-posts',true);
                    if(!empty($featured_posts)) {
                    	$args = array(
                                'numberposts' => $num_of_post,
                                'offset' => $offset,
                                'category' => 0,
                                'orderby' => 'post_date',
                                'order' => 'DESC',
                                //'paged' => $paged,
                                'include' => $featured_posts,
                                'exclude' => '',
                                'meta_key' => '',
                                'meta_value' =>'',
                                'post_type' => 'itr_dir',
                                'post_status' => 'publish',
                                
                                );

                    	$posts = wp_get_recent_posts( $args, OBJECT );
                    	echo $itr_dir->getDirectoryHtml($posts);
		}
                    
                    $meta_state= get_post_meta($post_id,'meta-city',true);
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
                                    )
                                )
                        );

                        $posts = wp_get_recent_posts( $args, OBJECT );
                        ?>
                    <div class="col-12">
                        <div class="ts-row cf">
                            <div class="col-12"><h2 class="free-title">Additional Treatment Options</h2></div>
                        </div>
                    </div>
                    <?php
                        foreach($posts as $post) { 
                                global $wpdb;
                                $table_name = $wpdb->prefix . "itr_directory";
                                $sql = "SELECT * FROM ". $table_name ." where post_id=".$post->ID." limit 1";
                                $itr_dir_post = $wpdb->get_results($sql); 
                            ?>
                            <div class="col-6 mb-4">
                                <div class="border-free-listing p-3">
                                    <h3 class="free-listing-title"><!-- <a href="<?php echo get_permalink($post->ID);?>"> --><?php echo $post->post_title;?><!-- </a> --></h3>
                                    <p><span class="norm-txt"><?php echo $itr_dir_post[0]->address.', '.$itr_dir_post[0]->city.', '.$itr_dir_post[0]->state.', '.$itr_dir_post[0]->zip;?></span></p>
                                    <p class="m-b-0"><strong>Phone:</strong> <span class="norm-txt"><a class="mod-green txt-deco" href="tel:<?php echo $itr_dir_post[0]->phone;?>"><?php echo $itr_dir_post[0]->phone;?></a></span></p>
                                </div>
                            </div>
                        <?php } 

                    ?>
                    <link rel="stylesheet" href="<?php echo WP_PLUGIN_URL.'/itr-directory/css/style.css'; ?>">
                    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet"> 
                    
                </div>
                <?php    get_sidebar('dir-sidebar'); ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();

