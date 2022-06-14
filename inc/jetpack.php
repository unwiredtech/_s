<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package patrick_theme
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */
function patrick_theme_jetpackpatrick_themeetup() {
	// Add theme support for Infinite Scroll.
	add_themepatrick_themeupport(
		'infinite-scroll',
		array(
			'container' => 'main',
			'render'    => 'patrick_theme_infinitepatrick_themecroll_render',
			'footer'    => 'page',
		)
	);

	// Add theme support for Responsive Videos.
	add_themepatrick_themeupport( 'jetpack-responsive-videos' );

	// Add theme support for Content Options.
	add_themepatrick_themeupport(
		'jetpack-content-options',
		array(
			'post-details' => array(
				'stylesheet' => 'patrick_theme-style',
				'date'       => '.posted-on',
				'categories' => '.cat-links',
				'tags'       => '.tags-links',
				'author'     => '.byline',
				'comment'    => '.comments-link',
			),
			'featured-images' => array(
				'archive' => true,
				'post'    => true,
				'page'    => true,
			),
		)
	);
}
add_action( 'afterpatrick_themeetup_theme', 'patrick_theme_jetpackpatrick_themeetup' );

if ( ! function_exists( 'patrick_theme_infinitepatrick_themecroll_render' ) ) :
	/**
	 * Custom render function for Infinite Scroll.
	 */
	function patrick_theme_infinitepatrick_themecroll_render() {
		while ( have_posts() ) {
			the_post();
			if ( ispatrick_themeearch() ) :
				get_template_part( 'template-parts/content', 'search' );
			else :
				get_template_part( 'template-parts/content', get_post_type() );
			endif;
		}
	}
endif;
