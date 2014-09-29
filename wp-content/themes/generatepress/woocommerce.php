<?php
/**
 * The template is specifically for WooCommerce.
 *
 * This is the template that is used by WooCommerce.
 *
 * @package Generate
 */

get_header(); ?>

	<div id="primary" <?php generate_content_class();?>>
		<main id="main" <?php generate_main_class(); ?> itemprop="mainContentOfPage" role="main">
			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemtype="http://schema.org/CreativeWork" itemscope="itemscope">
				<div class="inside-article">
					<div class="entry-content" itemprop="text">
						<?php if ( function_exists( 'woocommerce_content' ) ) :
							woocommerce_content(); 
						endif; ?>
					</div><!-- .entry-content -->
				</div><!-- .inside-article -->
			</article><!-- #post-## -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
do_action('generate_sidebars');
get_footer();