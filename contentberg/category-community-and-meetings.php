<?php
/**
 * Archives Page!
 * 
 * This page is used for all kind of archives from custom post types to blog to 'by date' archives.
 * 
 * Bunyad framework recommends this template to be used as generic template wherever any sort of listing 
 * needs to be done.
 * 
 * Types of archives handled:
 * 
 *  - Categories
 *  - Tags
 *  - Taxonomies
 *  - Author Archives
 *  - Date Archives
 * 
 * @link http://codex.wordpress.org/images/1/18/Template_Hierarchy.png
 */
// Set default loop template
$loop_template = Bunyad::options()->archive_loop;

// Have a sidebar preference for archives?
if (Bunyad::options()->archive_sidebar) {
    Bunyad::core()->set_sidebar(
            Bunyad::options()->archive_sidebar
    );
}

get_header();

// Defaults for archive header
$bg_text = esc_html__('Browsing', 'contentberg');
$subtitle = esc_html__('Recovery Central', 'contentberg');
$heading = single_term_title('', false);

// For archives that support it
$description = get_the_archive_description();
?>

<div class="archive-head">

    <?php if (is_tag()): ?>

        <?php
        /**
         * Setup heading for tags
         */
        $subtitle = esc_html__('Tag', 'contentberg');
        ?>

    <?php elseif (is_category()): // category page ?>

        <?php
        /**
         * Category archives setup
         */
        $loop_template = Bunyad::options()->category_loop;

        $subtitle = $bg_text = esc_html__('Category', 'contentberg');
        ?>


    <?php elseif (is_search()): // search ?>

        <?php
        /**
         * Search archives setup
         */
        $loop_template = Bunyad::options()->search_loop;

        $heading = get_search_query();
        $bg_text = esc_html__('Search', 'contentberg');
        $subtitle = sprintf(esc_html__('%s Results', 'contentberg'), intval($wp_query->found_posts));
        ?>

    <?php elseif (is_author()): // author archives ?>

        <?php
        /**
         * Setup author archives header
         */
        $authordata = get_userdata(get_query_var('author'));
        $subtitle = esc_html__('Author', 'contentberg');
        $heading = get_the_author();
        ?>	


    <?php else: ?>

        <?php
        /**
         * Set heading based on archives, fallback to WordPress 4.1+ default
         * 
         * @see get_the_archive_title()
         */
        if (is_day()) {
            $heading = get_the_date('F j, Y');
        } else if (is_month()) {
            $heading = get_the_date('F Y');
        } else if (is_year()) {
            $heading = get_the_date('Y');
        }
        ?>

    <?php endif; ?>
    
    <div class="clearfix"></div>
	<div class="wrap mainbreadcrumbs">
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
        }
        ?>
    </div>
    <div class="clearfix"></div>

    <span class="sub-title"><?php echo esc_html($subtitle); ?></span>
    <h2 class="title"><?php echo esc_html($heading); ?></h2>

<!-- <i class="background"><?php echo esc_html($bg_text); ?></i> -->

    <?php if (!empty($description) && Bunyad::options()->archive_descriptions): ?>

        <div class="wrap description"><?php echo get_the_archive_description(); ?></div>

    <?php endif; ?>

</div>


<div class="main wrap">
    <div class="ts-row cf">
        <div class="col-8 main-content cf">
            <link rel='stylesheet' id='contentberg-lightbox-css'  href='<?php echo home_url(); ?>/wp-content/themes/contentberg/css/lightbox.css?ver=1.5.0' type='text/css' media='all' />
            <link rel='stylesheet' id='font-awesome-css'  href='<?php echo home_url(); ?>/wp-content/plugins/js_composer/assets/lib/bower/font-awesome/css/font-awesome.min.css?ver=5.7' type='text/css' media='all' />
            <link rel='stylesheet' id='yoast-seo-adminbar-css'  href='<?php echo home_url(); ?>/wp-content/plugins/wordpress-seo/css/dist/adminbar-1240.min.css?ver=12.4' type='text/css' media='all' />
            <link rel='stylesheet' id='js_composer_front-css'  href='<?php echo home_url(); ?>/wp-content/plugins/js_composer/assets/css/js_composer.min.css?ver=5.7' type='text/css' media='all' />
            <article id="post-89506" class="the-post the-page post-89506 page type-page status-draft">

                <header class="post-header the-post-header cf">

                    <div class="featured">

                    </div>




                    <h1 class="post-title-alt the-page-title"></h1>


                </header><!-- .post-header -->			

                <div class="post-content entry-content cf">

                    <div class="ts-row blocks cf wpb_row">
                        <div class="wpb_column vc_column_container vc_col-sm-12 col-12 vc_col-has-fill">
                            <div class="vc_column-inner vc_custom_1577993214012">
                                <div class="wpb_wrapper">
                                    <section class="vc_cta3-container" >
                                        <div class="vc_general vc_cta3 vc_cta3-style-classic vc_cta3-shape-rounded vc_cta3-align-left vc_cta3-color-classic vc_cta3-icon-size-md vc_cta3-actions-bottom vc_custom_1577998742221">
                                            <div class="vc_cta3_content-container">
                                                <div class="vc_cta3-content">
                                                    <header class="vc_cta3-content-header">
                                                        <h2>Join our Online Recovery Community and Attend Live Meetings.</h2>									
                                                    </header>
                                                    <p>Create your free account to join our live online meetings and make friends with others in the recovery community.</p>
                                                </div>
                                                <div class="vc_cta3-actions">
                                                    <div class="vc_btn3-container vc_btn3-inline">
                                                        <button class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-classic vc_btn3-color-sky register-form-open">Get Started</button>
                                                    </div>
                                                </div>					
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="ts-row blocks cf wpb_row">
                        <div class="wpb_column vc_column_container vc_col-sm-12 col-12 vc_col-has-fill">
                            <div class="vc_column-inner vc_custom_1577995059293">
                                <div class="wpb_wrapper">
                                    <div class="wpb_text_column wpb_content_element post-content">
                                        <div class="wpb_wrapper">
                                            <h3>What You Can Do on In The Rooms</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="ts-row blocks cf wpb_row">
                        <div class="wpb_column vc_column_container vc_col-sm-6 col-6">
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">
                                    <div class="vc_icon_element vc_icon_element-outer vc_custom_1577993455977 vc_icon_element-align-center">
                                        <div class="vc_icon_element-inner vc_icon_element-color-custom vc_icon_element-size-xl vc_icon_element-style- vc_icon_element-background-color-grey">
                                            <span class="vc_icon_element-icon fa fa-laptop" style="color:#5091cd !important"></span>
                                        </div>
                                    </div>

                                    <div class="wpb_text_column wpb_content_element  vc_custom_1577998239277 post-content">
                                        <div class="wpb_wrapper">
                                            <h4 style="text-align: center;">Attend Daily Live Online Meetings</h4>
                                            <p style="text-align: center;">In the Rooms hosts <a href="https://www.intherooms.com/livemeetings/list">over 130 live video meetings,virtual aa meetings &12 step meetings online</a> every week, run by fellowship chairpeople who invite members to share amongst the group. With an meeting attendance confirmation option, members can track the meetings they attend.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wpb_column vc_column_container vc_col-sm-6 col-6">
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">
                                    <div class="vc_icon_element vc_icon_element-outer vc_custom_1577993464733 vc_icon_element-align-center">
                                        <div class="vc_icon_element-inner vc_icon_element-color-custom vc_icon_element-size-xl vc_icon_element-style- vc_icon_element-background-color-grey">
                                            <span class="vc_icon_element-icon fa fa-comments-o" style="color:#5091cd !important"></span>
                                        </div>
                                    </div>

                                    <div class="wpb_text_column wpb_content_element  vc_custom_1577998249916 post-content">
                                        <div class="wpb_wrapper">
                                            <h4 style="text-align: center;">Connect and Share with the Community</h4>
                                            <p style="text-align: center;">Write a blog, post in the newsfeed, or direct message a friend—there are plenty of ways to talk and connect on In the Rooms.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="ts-row blocks cf wpb_row">
                        <div class="wpb_column vc_column_container vc_col-sm-6 col-6">
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">
                                    <div class="vc_icon_element vc_icon_element-outer vc_custom_1577994049037 vc_icon_element-align-center">
                                        <div class="vc_icon_element-inner vc_icon_element-color-custom vc_icon_element-size-xl vc_icon_element-style- vc_icon_element-background-color-grey">
                                            <span class="vc_icon_element-icon fa fa-user" style="color:#5091cd !important"></span>
                                        </div>
                                    </div>

                                    <div class="wpb_text_column wpb_content_element  vc_custom_1577998258422 post-content">
                                        <div class="wpb_wrapper">
                                            <h4 style="text-align: center;">Build A Member Profile</h4>
                                            <p style="text-align: center;">Members can be as anonymous or public as they wish—only a member username is required. Add a profile picture if you&#8217;d like, and your recovery date, your location, and other details to help friends connect with you.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wpb_column vc_column_container vc_col-sm-6 col-6">
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">
                                    <div class="vc_icon_element vc_icon_element-outer vc_custom_1577994820949 vc_icon_element-align-center">
                                        <div class="vc_icon_element-inner vc_icon_element-color-custom vc_icon_element-size-xl vc_icon_element-style- vc_icon_element-background-color-grey">
                                            <span class="vc_icon_element-icon fa fa-users" style="color:#5091cd !important"></span>
                                        </div>
                                    </div>

                                    <div class="wpb_text_column wpb_content_element  vc_custom_1577998267176 post-content">
                                        <div class="wpb_wrapper">
                                            <h4 style="text-align: center;">Find a Face-to-Face Meeting</h4>
                                            <p style="text-align: center;">Use the meeting finder tool to find a face-to-face meeting in your area.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="ts-row blocks cf wpb_row">
                        <div class="wpb_column vc_column_container vc_col-sm-12 col-12 vc_col-has-fill">
                            <div class="vc_column-inner vc_custom_1577993214012">
                                <div class="wpb_wrapper">
                                    <section class="vc_cta3-container" >
                                        <div class="vc_general vc_cta3 vc_cta3-style-classic vc_cta3-shape-rounded vc_cta3-align-left vc_cta3-color-classic vc_cta3-icon-size-md vc_cta3-actions-bottom vc_custom_1577998742221">
                                            <div class="vc_cta3_content-container">
                                                <div class="vc_cta3-content">
                                                    <header class="vc_cta3-content-header">
                                                        <h3>Mix Up Your Online Recovery Meetings</h3>									
                                                    </header>
                                                    <p>Expand your recovery with specialized topic-based online recovery meetings, including focus areas ranging from yoga and nutrition, to illness and grief, and much more.</p>
                                                </div>
                                                <div class="vc_cta3-actions">
                                                    <div class="vc_btn3-container vc_btn3-inline">
                                                        <a href="https://www.intherooms.com/home/specialty-meetings/">
                                                            <button class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-classic vc_btn3-color-sky">View Specialty Meetings</button>
                                                        </a>
                                                    </div>
                                                </div>					
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="ts-row blocks cf wpb_row">
                        <div class="wpb_column vc_column_container vc_col-sm-12 col-12">
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">
                                    <div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_100 vc_sep_pos_align_center vc_separator_no_text vc_sep_color_grey" >
                                        <span class="vc_sep_holder vc_sep_holder_l"><span  class="vc_sep_line"></span></span><span class="vc_sep_holder vc_sep_holder_r"><span  class="vc_sep_line"></span></span>
                                    </div>
                                    <section class="cf block loop-grid-3" data-id="1">
                                        <div class="block-head-c">
                                            <h4 class="title">Learn More About What We Offer</h4>
                                        </div>	
                                        <div class="block-content">
                                            <div class="posts-dynamic posts-container ts-row grid count-0 grid-cols-3">
                                                <div class="posts-wrap">				
                                                    <?php $args = array( 'numberposts' => 3, 'category_name' => 'about-intherooms','orderby' => 'date', 'order' => 'ASC' );                      
                                                          $posts = get_posts( $args ); 
                                                          foreach($posts as $post) {                                                               
                                                    ?>
                                                    <div class="col-4">	
                                                        <article id="post-<?php echo $post->ID;?>" class="grid-post post-<?php echo $post->ID;?> post type-post status-publish format-standard has-post-thumbnail category-about-intherooms category-community-and-meetings has-excerpt">
                                                            <div class="post-header cf">
                                                                <div class="post-thumb">
                                                                    <a href="<?php echo get_permalink($post->ID);?>" class="image-link">
                                                                        <?php echo get_the_post_thumbnail( $post->ID, 'contentberg-grid');?>
                                                                    </a>
                                                                </div>
                                                                <div class="meta-title">
                                                                    <div class="post-meta post-meta-b">
                                                                        <span class="post-cat">	
                                                                            <span class="text-in">In</span> 
                                                                            <a href="https://www.intherooms.com/home/category/about-intherooms/" class="category">About Us</a>
                                                                        </span>
                                                                        <h2 class="post-title-alt">
                                                                            <a href="<?php echo get_permalink($post->ID);?>"><?php echo $post->post_title;?></a>
                                                                        </h2>
                                                                        <div class="below">
                                                                            <span class="meta-item read-time"><?php echo esc_html(Bunyad::helpers()->reading_time($post->post_content));?></span>
                                                                        </div>
                                                                    </div>		
                                                                </div>

                                                            </div><!-- .post-header -->

                                                            <div class="post-content post-excerpt cf">
                                                                <p><?php echo wp_trim_excerpt('',$post->ID);?>...</p>
                                                            </div><!-- .post-content -->
                                                        </article>
                                                    </div>
                                                          <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_100 vc_sep_pos_align_center vc_separator_no_text vc_sep_color_grey" ><span class="vc_sep_holder vc_sep_holder_l"><span  class="vc_sep_line"></span></span><span class="vc_sep_holder vc_sep_holder_r"><span  class="vc_sep_line"></span></span>
                                    </div>
                                    <div class="wpb_text_column wpb_content_element post-content">
                                        <div class="wpb_wrapper">
                                            <p style="text-align: center;">Experience the safe and secure recovery meeting place<br />
                                                for the other 23 hours a day when you&#8217;re not in a meeting.</p>
                                        </div>
                                    </div>
                                    <div class="vc_btn3-container vc_btn3-center vc_custom_1577997833219" >
                                        <button class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-classic vc_btn3-color-sky register-form-open">Join Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .post-content -->

            </article>
            
        </div> <!-- .main-content -->

        <?php Bunyad::core()->theme_sidebar(); ?>

    </div> <!-- .ts-row -->
</div> <!-- .main -->

<?php get_footer(); ?>
<script>
    var style = jQuery('<style>.post-content.post-excerpt.cf { overflow: hidden; text-overflow: ellipsis;  -o-text-overflow: ellipsis; height: ' + ((parseInt(jQuery('.post-content.post-excerpt.cf').css('line-height')) * 3) + 'px') + ' }</style>');
    jQuery('html > head').append(style);
</script>


