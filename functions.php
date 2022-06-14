<?php
/**
 * patrick_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package patrick_theme
 */

if ( ! defined( 'patrick_theme_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'patrick_theme_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the afterpatrick_themeetup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function patrick_themepatrick_themeetup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on patrick_theme, use a find and replace
		* to change 'patrick_theme_' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'patrick_theme_', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_themepatrick_themeupport( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_themepatrick_themeupport( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_themepatrick_themeupport( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'patrick_theme_' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_themepatrick_themeupport(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_themepatrick_themeupport(
		'custom-background',
		apply_filters(
			'patrick_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_themepatrick_themeupport( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_themepatrick_themeupport(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'afterpatrick_themeetup_theme', 'patrick_themepatrick_themeetup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function patrick_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'patrick_theme_content_width', 640 );
}
add_action( 'afterpatrick_themeetup_theme', 'patrick_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function patrick_theme_widgets_init() {
	registerpatrick_themeidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'patrick_theme_' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'patrick_theme_' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'patrick_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function patrick_themepatrick_themecripts() {
	wp_enqueuepatrick_themetyle( 'patrick_theme-style', getpatrick_themetylesheet_uri(), array(), patrick_theme_VERSION );
	wppatrick_themetyle_add_data( 'patrick_theme-style', 'rtl', 'replace' );

	wp_enqueuepatrick_themecript( 'patrick_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), patrick_theme_VERSION, true );

	if ( ispatrick_themeingular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueuepatrick_themecript( 'comment-reply' );
	}
}
add_action( 'wp_enqueuepatrick_themecripts', 'patrick_themepatrick_themecripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
