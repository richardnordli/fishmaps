<?php
/**
 * Displays the searchform of the theme.
 *
 * @package ThemeGrill
 * @subpackage Spacious
 * @since Spacious 1.0
 */
?>
<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form searchform clearfix" method="get">
	<div class="search-wrap">
		<input type="text" placeholder="<?php esc_attr_e( 'Search', 'spacious' ); ?>" class="s field" name="s">
		<span class="search-icon"></span>
	</div>
	<input type="submit" value="<?php esc_attr_e( 'Search', 'spacious' ); ?>" name="submit" class="submit search-submit">
</form><!-- .searchform -->