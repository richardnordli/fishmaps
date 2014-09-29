<?php
/**
 * @package Generate
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemprop="blogPost" itemtype="http://schema.org/BlogPosting" itemscope="itemscope">
	<div class="inside-article">
		<?php do_action( 'generate_before_content'); ?>
		<header class="entry-header">
			<h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>

			<div class="entry-meta">
				<?php generate_posted_on(); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->
		<?php do_action( 'generate_after_entry_header'); ?>
		<div class="entry-content" itemprop="text">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'generate' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			<?php
				/* translators: used between list items, there is a space after the comma */
				$category_list = get_the_category_list( __( ', ', 'generate' ) );

				/* translators: used between list items, there is a space after the comma */
				$tag_list = get_the_tag_list( '', __( ', ', 'generate' ) );

				$meta_text = '';

				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list && '' != $category_list ) {
					$meta_text = '<span class="cat-links">%1$s</span><span class="tags-links">%2$s</span>';
				} elseif ( '' == $tag_list && '' != $category_list ) {
					$meta_text = '<span class="cat-links">%1$s</span>';
				}
				
				printf(
					$meta_text,
					$category_list,
					$tag_list
				);
			?>
			
			<?php generate_content_nav( 'nav-below' ); ?>

			<?php edit_post_link( __( 'Edit', 'generate' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
		<?php do_action( 'generate_after_content'); ?>
	</div><!-- .inside-article -->
</article><!-- #post-## -->
