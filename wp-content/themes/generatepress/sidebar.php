<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Generate
 */
 
$generate_settings = wp_parse_args( 
	get_option( 'generate_settings', array() ), 
	generate_get_defaults() 
);
?>
	<div id="right-sidebar" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary" <?php generate_right_sidebar_class(); ?>>
		<div class="inside-right-sidebar">
			<?php do_action( 'generate_before_right_sidebar_content' ); ?>
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
				<?php if ( 'nav-right-sidebar' !== $generate_settings['nav_position_setting'] ) : ?>
					<aside id="search" class="widget widget_search">
						<?php get_search_form(); ?>
					</aside>

					<aside id="archives" class="widget">
						<h3 class="widget-title"><?php _e( 'Archives', 'generate' ); ?></h3>
						<ul>
							<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
						</ul>
					</aside>

					<aside id="meta" class="widget">
						<h3 class="widget-title"><?php _e( 'Meta', 'generate' ); ?></h3>
						<ul>
							<?php wp_register(); ?>
							<li><?php wp_loginout(); ?></li>
							<?php wp_meta(); ?>
						</ul>
					</aside>
				<?php endif; ?>
			<?php endif; // end sidebar widget area ?>
			<?php do_action( 'generate_after_right_sidebar_content' ); ?>
		</div>
	</div><!-- #secondary -->
