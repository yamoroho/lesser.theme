<?php
/**
 * The sidebar containing the main widget area
 *
 */

if ( ! is_active_sidebar( 'sidebar-about' ) ) {
	return;
}
?>

<aside class="sidebar">
	<?php dynamic_sidebar( 'sidebar-about' ); ?>
</aside><!-- #secondary -->
