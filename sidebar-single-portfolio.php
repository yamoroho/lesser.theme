<?php
/**
 * The sidebar containing the main widget area
 *
 */

if ( ! is_active_sidebar( 'sidebar-single-blog' ) ) {
	return;
}
?>

<aside class="sidebar">
	<?php dynamic_sidebar( 'sidebar-single-blog' ); ?>
</aside><!-- #secondary -->
