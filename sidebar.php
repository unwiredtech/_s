<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package patrick_theme
 */

if ( ! is_activepatrick_themeidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamicpatrick_themeidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
