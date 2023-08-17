<?php
/**
 * Product book functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Product_book
 */

if ( ! defined( 'PRODU_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'PRODU_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function product_book_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Product book, use a find and replace
		* to change 'product-book' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'product-book', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'product-book' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'product_book_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'product_book_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function product_book_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'product_book_content_width', 640 );
}
add_action( 'after_setup_theme', 'product_book_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function product_book_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'product-book' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'product-book' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'product_book_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function product_book_scripts() {
	wp_enqueue_style( 'product-book-style', get_template_directory_uri().'/assets/css/main.css', array(), PRODU_VERSION );
//	wp_style_add_data( 'product-book-style', 'rtl', 'replace' );

	wp_enqueue_script( 'product-book-navigation', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), PRODU_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'product_book_scripts' );

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
 * Add Post Types
 */
require get_template_directory() . '/inc/post-types/post-types.php';

/**
 * Add Taxonomies
 */
require get_template_directory() . '/inc/taxonomies/taxonomies.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/filters.php';
/**
 * Add Shortcodes
 */
require get_template_directory() . '/inc/shortcodes/shortcodes.php';
/**
 * Add Widgets
 */
require get_template_directory() . '/inc/widget/widgets.php';