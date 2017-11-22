<?php
/**
 * bridging-ideas functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bridging-ideas
 */

if ( ! function_exists( 'bridging_ideas_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function bridging_ideas_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on bridging-ideas, use a find and replace
     * to change 'bridging-ideas' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'bridging-ideas', get_template_directory() . '/languages' );

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
      'primary-menu' => esc_html__( 'Primary', 'bridging-ideas' ),
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
    add_theme_support( 'custom-background', apply_filters( 'bridging_ideas_custom_background_args', array(
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
add_action( 'after_setup_theme', 'bridging_ideas_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bridging_ideas_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'bridging_ideas_content_width', 640 );
}
add_action( 'after_setup_theme', 'bridging_ideas_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bridging_ideas_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'bridging-ideas' ),
    'id'            => 'sidebar-1',
    'description'   => esc_html__( 'Add widgets here.', 'bridging-ideas' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'bridging_ideas_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function wps_scripts() {
  /* Theme CSS */
  wp_enqueue_style(
    'wps-style',
    get_stylesheet_uri(),
    array( ),
    ($_SERVER["SERVER_NAME"] == 'localhost' ? null : '1.0.0')
  );

  /* Bootstrap CSS */
  wp_enqueue_style(
    'bootstrap',
    get_template_directory_uri() . '/css/bootstrap.min.css',
    array(),
    '3.3.7'
  );

  /* Bootstrap JS */
  wp_enqueue_script(
    'bootstrap',
    get_template_directory_uri() . '/js/popper.min.js',
    array( 'jquery' ),
    '3.3.7',
    true
  );
  wp_enqueue_script(
    'bootstrap',
    get_template_directory_uri() . '/js/bootstrap.min.js',
    array( 'jquery' ),
    '3.3.7',
    true
  );

}

add_action( 'wp_enqueue_scripts', 'wps_scripts' );


function bridging_ideas_scripts() {
  wp_enqueue_style( 'bridging-ideas-style', get_stylesheet_uri() );

  wp_enqueue_script( 'bridging-ideas-navigation', get_template_directory_uri() . '/js/navigation.js', array(), null, true );

  wp_enqueue_script( 'page-scroll', get_template_directory_uri() . '/js/page-scroll.js', array(), null, true );

  wp_enqueue_script( 'bridging-ideas-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), null, true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'bridging_ideas_scripts' );

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

function add_menuclass($ulclass) {
  return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');
