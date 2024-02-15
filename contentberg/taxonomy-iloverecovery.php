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
$bg_text  = esc_html__('Browsing', 'contentberg');
$subtitle = esc_html__('Blogs & Articles', 'contentberg');
$heading  = single_term_title('', false);

// For archives that support it
$description = get_the_archive_description();

?>
	<div class="main-wrap" style="transform: none;">
    
		<div class="main wrap" style="transform: none;">
			<div class="clearfix"></div>
			<div class="wrap mainbreadcrumbs">
				<?php
				if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				}
				?>
			</div>
		</div>
	</div>
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
		
		$heading   = get_search_query();
		$bg_text   = esc_html__('Search', 'contentberg');
		$subtitle  = sprintf(esc_html__('%s Results', 'contentberg'), intval($wp_query->found_posts)); 
		 
		?>
		
	<?php elseif (is_author()): // author archives ?>
		
		<?php 
		
		/**
		 * Setup author archives header
		 */
		
		$authordata = get_userdata(get_query_var('author'));
		$subtitle   = esc_html__('Author', 'contentberg');
		$heading    = get_the_author();
		
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
			}
			else if (is_month()) {
				$heading =  get_the_date('F Y');
			}
			else if (is_year()) {
				$heading = get_the_date('Y');
			}		
		?>
	
	<?php endif; ?>
            
            <?php if(esc_html($heading) == 'All') { ?>                
		<h2 class="title"><?php echo esc_html($subtitle); ?></h2>
            <?php } else { ?>
                <span class="sub-title"><?php echo esc_html($subtitle); ?></span>
		<h2 class="title"><?php echo esc_html($heading); ?></h2>
            <?php } ?>
		
		<!-- <i class="background"><?php echo esc_html($bg_text); ?></i> -->
		
		<?php if (!empty($description) && Bunyad::options()->archive_descriptions): ?>
		
			<div class="wrap description"><?php echo get_the_archive_description(); ?></div>
		
		<?php endif; ?>
	
	</div>
	<div style="margin-top:20px;display:none;">
            <section class="common-slider carousel-slider">
                <div class="slides wrap" data-slider="carousel" data-autoplay data-speed="5000" data-parallax>
                    <div class="item">
                        <a href="https://www.intherooms.com/home/iloverecovery/entertainment-and-the-arts-in-recovery/" tabindex="0">
                            <img width="370" height="370" src="https://www.intherooms.com/home/wp-content/uploads/2019/09/recovery_articles-370x305.jpg" class="attachment-contentberg-slider-carousel size-contentberg-slider-carousel wp-post-image" alt="Entertainment & the Arts" title="" srcset="https://www.intherooms.com/home/wp-content/uploads/2019/09/recovery_articles-300x200.jpg 300w, https://www.intherooms.com/home/wp-content/uploads/2019/09/recovery_articles-768x512.jpg 768w, https://www.intherooms.com/home/wp-content/uploads/2019/09/recovery_articles-1024x683.jpg 1024w, https://www.intherooms.com/home/wp-content/uploads/2019/09/recovery_articles-270x180.jpg 270w, https://www.intherooms.com/home/wp-content/uploads/2019/09/recovery_articles-770x515.jpg 770w, https://www.intherooms.com/home/wp-content/uploads/2019/09/recovery_articles-370x245.jpg 370w">
                        </a>
                        <div class="overlay_modify cf">
                            <a href="https://www.intherooms.com/home/iloverecovery/entertainment-and-the-arts-in-recovery/" class="category carousel-slider-center-txt" tabindex="0">Entertainment & the Arts</a>
                        </div>
                    </div>
                    <div class="item">
                        <a href="https://www.intherooms.com/home/iloverecovery/health-and-wellness-in-recovery/" tabindex="0">
                            <img width="370" height="370" src="https://www.intherooms.com/home/wp-content/uploads/2019/09/i_love_recovery-370x305.jpg" class="attachment-contentberg-slider-carousel size-contentberg-slider-carousel wp-post-image" alt="Health & Wellness" title="" sizes="(max-width: 370px) 100vw, 370px" srcset="https://www.intherooms.com/home/wp-content/uploads/2019/09/i_love_recovery-300x200.jpg 300w, https://www.intherooms.com/home/wp-content/uploads/2019/09/i_love_recovery-768x512.jpg 768w, https://www.intherooms.com/home/wp-content/uploads/2019/09/i_love_recovery-1024x683.jpg 1024w, https://www.intherooms.com/home/wp-content/uploads/2019/09/i_love_recovery-270x180.jpg 270w, https://www.intherooms.com/home/wp-content/uploads/2019/09/i_love_recovery-770x515.jpg 770w, https://www.intherooms.com/home/wp-content/uploads/2019/09/i_love_recovery-370x245.jpg 370w">
                        </a>
                        <div class="overlay_modify cf">
                            <a href="https://www.intherooms.com/home/iloverecovery/health-and-wellness-in-recovery/" class="category carousel-slider-center-txt" tabindex="0">Health & Wellness</a>
                        </div>
                    </div>
                    <div class="item">
                        <a href="https://www.intherooms.com/home/iloverecovery/lifestyle-and-relationships-in-recovery/" tabindex="0">
                            <img width="370" height="370" src="https://www.intherooms.com/home/wp-content/uploads/2019/09/member_blogs-370x305.jpg" class="attachment-contentberg-slider-carousel size-contentberg-slider-carousel wp-post-image" alt="Lifestyle & Relationships" title="" srcset="https://www.intherooms.com/home/wp-content/uploads/2019/09/member_blogs-300x200.jpg 300w, https://www.intherooms.com/home/wp-content/uploads/2019/09/member_blogs-768x512.jpg 768w, https://www.intherooms.com/home/wp-content/uploads/2019/09/member_blogs-1024x683.jpg 1024w, https://www.intherooms.com/home/wp-content/uploads/2019/09/member_blogs-270x180.jpg 270w, https://www.intherooms.com/home/wp-content/uploads/2019/09/member_blogs-770x515.jpg 770w, https://www.intherooms.com/home/wp-content/uploads/2019/09/member_blogs-370x245.jpg 370w">
                        </a>
                        <div class="overlay_modify cf">
                            <a href="https://www.intherooms.com/home/iloverecovery/lifestyle-and-relationships-in-recovery/" class="category carousel-slider-center-txt" tabindex="0">Lifestyle & Relationships</a>
                        </div>
                    </div>
                </div>                    
            </section>    
        </div>
	
	<div class="main wrap">
		<div class="ts-row cf">
			<div class="col-8 main-content cf">
		
			<?php 
			
			if (is_search() && !have_posts()) {
			
				// Not found message
				get_template_part('partials/no-results');
				
			}
			else {
				// Render our loop
				Bunyad::get('helpers')->loop($loop_template);
			}
	
			?>
	
			</div> <!-- .main-content -->
			
			<?php Bunyad::core()->theme_sidebar(); ?>
			
		</div> <!-- .ts-row -->
	</div> <!-- .main -->

<?php get_footer(); ?>
<script>
var style = jQuery('<style>.post-content.post-excerpt.cf { overflow: hidden; text-overflow: ellipsis;  -o-text-overflow: ellipsis; height: '+((parseInt(jQuery('.post-content.post-excerpt.cf').css('line-height')) * 3)+'px')+' }</style>');
jQuery('html > head').append(style);
</script>
