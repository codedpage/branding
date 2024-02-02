<?php
/**
 * Partial: Footer Bold Dark
 */

$classes = !isset($classes) ? 'dark bold' : $classes;

?>

	
	<footer class="main-footer <?php echo esc_attr($classes); ?>">
		
		<?php if (Bunyad::options()->footer_upper && is_active_sidebar('contentberg-footer')): ?>
		
		<section class="upper-footer">
		
			<div class="wrap">
				
				<ul class="widgets ts-row cf">
					<?php dynamic_sidebar('contentberg-footer'); ?>
				</ul>

			</div>
		</section>
		
		<?php endif; ?>
		
		
		<?php if (is_active_sidebar('contentberg-instagram')): ?>
		
		<section class="mid-footer cf mid-footer-six">
			<?php dynamic_sidebar('contentberg-instagram'); ?>
		</section>
		
		<?php endif; ?>
		
		

		<?php if (Bunyad::options()->footer_lower): ?>
		
		<section class="lower-footer cf">
			<div class="wrap">
                            <div class="ts-row cf">
                                <div style="text-align: left;" class="col-6">
                                    <!--<ul class="social-icons">
                                        <li>
                                            <a target="_blank" rel="noopener" href="https://apps.apple.com/us/app/in-the-rooms/id1507386880?ls=1">
                                                <img alt="Apple App Store" class="app-apple" src="https://media.intherooms.com/images/public/apps/apple-app-store.png">
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" rel="noopener" href="https://play.google.com/store/apps/details?id=com.ripenapps.intheroom">
                                                <img alt="Google Play Store" class="app-google" src="https://media.intherooms.com/images/public/apps/google-play-store.png">
                                            </a>
                                        </li>
                                    </ul>-->
                                </div>
                                <div class="col-6">
				<ul class="social-icons">
					
					<?php 
						
						/**
						 * Show Social icons
						 */
						$services = Bunyad::get('social')->get_services();
						$links    = Bunyad::options()->social_profiles;
						
						foreach ( (array) Bunyad::options()->footer_social as $icon):
							$social = $services[$icon];
							$url    = !empty($links[$icon]) ? $links[$icon] : '#';
						?>
							<li>
								<a href="<?php echo esc_url($url); ?>" class="social-link" target="_blank" title="<?php echo esc_attr($social['label']); ?>">
									<i class="fa fa-<?php echo esc_attr($social['icon']); ?>"></i>
									<span class="label"><?php echo esc_html($social['label']); ?></span>
								</a>
							</li>
						
					<?php
						endforeach;
					?>		
				</ul>
                                </div>
                            </div>
			
				<?php if (has_nav_menu('contentberg-footer-links')): ?>
						
					<div class="links">					
						<?php 
							wp_nav_menu(array(
								'theme_location' => 'contentberg-footer-links', 
								'fallback_cb' => '', 
								'walker' => (class_exists('Bunyad_Menus') ? 'Bunyad_MenuWalker' : '')
							)); 
						?>
					</div>
				
				<?php endif; ?>

				
				<p class="copyright"><?php 
					echo do_shortcode(
						wp_kses_post(Bunyad::options()->footer_copyright) 
					); ?>
				</p>


				
				<?php if (Bunyad::options()->footer_back_top): ?>
					<div class="to-top">
						<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i> <?php esc_html_e('Top', 'contentberg'); ?></a>
					</div>
				<?php endif; ?>
					
			</div>
		</section>
		
		<?php endif; ?>
		
		
	</footer>
