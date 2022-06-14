<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package patrick_theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function patrick_theme_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! ispatrick_themeingular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_activepatrick_themeidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'patrick_theme_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function patrick_theme_pingback_header() {
	if ( ispatrick_themeingular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'patrick_theme_pingback_header' );
