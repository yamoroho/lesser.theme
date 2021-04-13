<?php
/**
 * The sidebar containing the main widget area
 *
 */

if ( ! is_active_sidebar( 'sidebar-single-portfolio' ) ) {
	return;
}
?>

<aside class="sidebar">
	<?php dynamic_sidebar( 'sidebar-single-portfolio' ); ?>
</aside><!-- #secondary -->
