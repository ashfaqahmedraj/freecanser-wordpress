<?php
/**
 * freecanser functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package freecanser
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
define('THE_CSS', get_template_directory_uri() . '/assets/css/');
define('THE_JS', get_template_directory_uri() . '/assets/js/');
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function freecanser_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on freecanser, use a find and replace
		* to change 'freecanser' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'freecanser', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'freecanser' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
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

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

}
add_action( 'after_setup_theme', 'freecanser_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function freecanser_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'freecanser_content_width', 640 );
}
add_action( 'after_setup_theme', 'freecanser_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function freecanser_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'freecanser' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'freecanser' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'freecanser_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function freecanser_scripts() {
	// Register all CSS
	wp_enqueue_style( 'freecanser-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'bootstrap', THE_CSS . 'bootstrap.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'boxicons', THE_CSS . 'boxicons.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'magnific-popup', THE_CSS . 'magnific-popup.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'meanmenu-main', THE_CSS . 'meanmenu.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'odometer', THE_CSS . 'odometer.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'owl-carousel', THE_CSS . 'owl.carousel.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'style', THE_CSS . 'style.css', array(), _S_VERSION );
	wp_enqueue_style( 'responsive', THE_CSS . 'responsive.css', array(), _S_VERSION );
	// Register all JS
	wp_enqueue_script( 'bootstrap', THE_JS . 'bootstrap.bundle.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'appear', THE_JS . 'appear.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'magnific-popup', THE_JS . 'magnific-popup.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'meanmenu', THE_JS . 'meanmenu.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'odometer', THE_JS . 'odometer.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'owl-carousel', THE_JS . 'owl.carousel.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'parallax', THE_JS . 'parallax.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'sticky-sidebar', THE_JS . 'sticky-sidebar.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'wow', THE_JS . 'wow.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'main', THE_JS . 'main.js', array('jquery'), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'freecanser_scripts' );

/** Register Wordress Menue **/
function freecanser_menus() {
    register_nav_menus( array(
        'header-menu' => esc_html__( 'Header Menu', 'freecanser' ),
        'footer-menu' => esc_html__( 'Footer Menu', 'freecanser' ),
		)
	);
}
add_action('init', 'freecanser_menus');

/** Customizer navbar.**/
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/** * Custom template tags for this theme.*/
require get_template_directory() . '/inc/template-tags.php';

/*** Functions which enhance the theme by hooking into WordPress.*/
require get_template_directory() . '/inc/template-functions.php';

/*** Functions which enhance the theme by hooking into WordPress.*/
require get_template_directory() . '/inc/social-links.php';

/*** Customizer additions.*/
require get_template_directory() . '/inc/customizer.php';

/** * Load Jetpack compatibility file.*/
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

