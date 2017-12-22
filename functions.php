<?php
/**
 * erply functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package erply
 */

if ( ! function_exists( 'erply_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function erply_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on erply, use a find and replace
		 * to change 'erply' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'erply', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'erply' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'erply_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'erply_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function erply_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'erply_content_width', 640 );
}
add_action( 'after_setup_theme', 'erply_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function erply_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'erply' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'erply' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
	
	register_sidebar(array(
	'name' => 'Footer Column 1',
	'id'        => 'footer-1',
	'description' => 'First footer widget area',
	'before_widget' => '<div id="footer-col-1" class="footer-col">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
	));
	
	register_sidebar(array(
	'name' => 'Footer Column 2',
	'id'        => 'footer-2',
	'description' => 'First footer widget area',
	'before_widget' => '<div id="footer-col-1" class="footer-col">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
	));
	
	register_sidebar(array(
	'name' => 'Footer Column 3',
	'id'        => 'footer-3',
	'description' => 'First footer widget area',
	'before_widget' => '<div id="footer-col-1" class="footer-col">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
	));
	
	register_sidebar(array(
	'name' => 'Footer Column 4',
	'id'        => 'footer-4',
	'description' => 'First footer widget area',
	'before_widget' => '<div id="footer-col-1" class="footer-col">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
	));
	
	register_sidebar(array(
	'name' => 'Footer Column 5',
	'id'        => 'footer-5',
	'description' => 'First footer widget area',
	'before_widget' => '<div id="footer-col-1" class="footer-col">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
	));
	
	register_sidebar(array(
	'name' => 'Footer Column 6',
	'id'        => 'footer-6',
	'description' => 'First footer widget area',
	'before_widget' => '<div id="footer-col-1" class="footer-col">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
	));
	
	register_sidebar(array(
	'name' => 'Footer Column 7',
	'id'        => 'footer-7',
	'description' => 'First footer widget area',
	'before_widget' => '<div id="footer-col-1" class="footer-col">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
	));
	
	register_sidebar(array(
	'name' => 'Footer Column 8',
	'id'        => 'footer-8',
	'description' => 'First footer widget area',
	'before_widget' => '<div id="footer-col-1" class="footer-col">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
	));
	
	register_sidebar(array(
	'name' => 'Footer Column 9',
	'id'        => 'footer-9',
	'description' => 'First footer widget area',
	'before_widget' => '<div id="footer-col-1" class="footer-col">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
	));
	
}
add_action( 'widgets_init', 'erply_widgets_init' );

function wpmu_register_widgets() {
    register_sidebar( array(
        'name' => __( 'Single Post After Content', 'wpmu' ),
        'id' => 'single-after-content-widget-area',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ));
}
add_action( 'widgets_init', 'wpmu_register_widgets' );

/**
 * Enqueue scripts and styles.
 */
function erply_scripts() {
	wp_enqueue_style( 'erply-style', get_stylesheet_uri() );

    wp_enqueue_script( 'custom_script', get_template_directory_uri() . '/js/custom_script.js', array ( 'jquery' ), 1.0, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'erply_scripts' );
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
function register_my_menu() {
  register_nav_menu('secondary-menu',__( 'Secondary Menu' ));
}
add_action( 'init', 'register_my_menu' );
