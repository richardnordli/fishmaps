<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to generate_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package Generate
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

	<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'generate' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'generate' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'generate' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'generate' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ol class="comment-list">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use generate_comment() to format the comments.
				 * If you want to override this in a child theme, then you can
				 * define generate_comment() and that will be used instead.
				 * See generate_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments( array( 'callback' => 'generate_comment' ) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'generate' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'generate' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'generate' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'generate' ); ?></p>
	<?php endif; ?>

	<?php 
	$singular_comment_label_var = apply_filters('singular_comment_label', __('Comment','generate'));
	$plural_comment_label_var = apply_filters('plural_comment_label', __('Comments','generate'));
	$singular_lower_comment_label_var = apply_filters('singular_lower_comment_label',__('comment','generate'));
	$plural_lower_comment_label_var = apply_filters('plural_lower_comment_label',__('comments','generate'));
	$commenter = wp_get_current_commenter();
	$fields = array(
		'author' => '<input placeholder="' . __( 'Name','generate' ) . ' *" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" />',
		'email' => '<input placeholder="' . __( 'Email','generate' ) . ' *" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" />',
		'url' => '<input placeholder="' . __( 'Website','generate' ) . '" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />',
	);
	$defaults = array(
		'fields'		=> apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
		'must_log_in' 	=> '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%1$s">logged in</a> to post a %2$s.','generate' ), wp_login_url( get_permalink() ), $singular_lower_comment_label_var ) . '</p>',
		'logged_in_as'	=> '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>','generate' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( get_permalink() ) ) . '</p>',
		'comment_notes_before' => null,
		'comment_notes_after'  => null,
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => sprintf(__( 'Leave a %s','generate' ), $singular_comment_label_var),
		'title_reply_to'       => __( 'Leave a Reply to %s','generate' ),
		'cancel_reply_link'    => __( 'Cancel reply','generate' ),
		'label_submit'         => sprintf( __( 'Post %s','generate' ), $singular_comment_label_var ),
	);
	comment_form($defaults); 
	?>

</div><!-- #comments -->
