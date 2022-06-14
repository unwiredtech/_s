<?php
/**
 * patrick_theme Theme Customizer
 *
 * @package patrick_theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function patrick_theme_customize_register( $wp_customize ) {
	$wp_customize->getpatrick_themeetting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->getpatrick_themeetting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->getpatrick_themeetting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'patrick_theme_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'patrick_theme_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'patrick_theme_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function patrick_theme_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function patrick_theme_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function patrick_theme_customize_preview_js() {
	wp_enqueuepatrick_themecript( 'patrick_theme-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), patrick_theme_VERSION, true );
}
add_action( 'customize_preview_init', 'patrick_theme_customize_preview_js' );
