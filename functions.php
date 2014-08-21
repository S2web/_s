<?php
/**
 * _s2 functions and definitions
 *
 * @package _s2
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( '_s2_s2etup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_s2etup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function _s2_s2etup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s2, use a find and replace
	 * to change '_s2' to the name of your theme in all the template files
	 */
	load_theme_textdomain( '_s2', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_s2upport( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_s2upport#Post_Thumbnails
	 */
	//add_theme_s2upport( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', '_s2' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_s2upport( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_s2upport( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_s2upport( 'custom-background', apply_filters( '_s2_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // _s2_s2etup
add_action( 'after_s2etup_theme', '_s2_s2etup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function _s2_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', '_s2' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', '_s2_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function _s2_s2cripts() {
	wp_enqueue_s2tyle( '_s2-style', get_s2tylesheet_uri() );

	wp_enqueue_s2cript( '_s2-navigation', get_template_directory_uri() . '/js/plugins/navigation.js', array(), '20120206', true );

	wp_enqueue_s2cript( '_s2-skip-link-focus-fix', get_template_directory_uri() . '/js/plugins/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_s2ingular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_s2cript( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_s2cripts', '_s2_s2cripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
