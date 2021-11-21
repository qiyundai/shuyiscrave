<?php
/**
 * shuyiscrave functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package shuyiscrave
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'shuyiscrave_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function shuyiscrave_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on shuyiscrave, use a find and replace
		 * to change 'shuyiscrave' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'shuyiscrave', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'shuyiscrave' ),
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
				'shuyiscrave_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'shuyiscrave_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function shuyiscrave_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'shuyiscrave_content_width', 640 );
}
add_action( 'after_setup_theme', 'shuyiscrave_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shuyiscrave_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'shuyiscrave' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'shuyiscrave' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'shuyiscrave_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function shuyiscrave_scripts() {
	wp_enqueue_style( 'shuyiscrave-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'shuyiscrave-style', 'rtl', 'replace' );

	wp_enqueue_script( 'shuyiscrave-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'shuyiscrave_scripts' );

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

// Increases upload size
@ini_set( 'upload_max_size' , '1024M' );
@ini_set( 'post_max_size', '1024M');
@ini_set( 'max_execution_time', '600' );

// Removes textarea from pages
function remove_textarea() {
    remove_post_type_support('page', 'editor');
}

add_action('admin_init', 'remove_textarea');

// Removes Comments and Posts
function post_remove ()
{
    remove_menu_page('edit.php');
}
add_action('admin_menu', 'post_remove');
function remove_wp_nodes()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_node( 'new-post' );
    $wp_admin_bar->remove_node( 'new-link' );
    $wp_admin_bar->remove_node( 'new-media' );
}
add_action( 'admin_bar_menu', 'remove_wp_nodes', 999 );
function pk_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'pk_remove_admin_menus' );
function pk_remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
add_action('init', 'pk_remove_comment_support', 100);
function pk_remove_comments_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'pk_remove_comments_admin_bar' );
function remove_menu_items(){
    remove_submenu_page( 'admin.php', 'wp_mailjet_options_campaigns_menu' );
}
add_action( 'admin_menu', 'remove_menu_items', 999 );
if (isset($_GET['activated']) && is_admin()) {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%postname%/');
    $wp_rewrite->flush_rules();
}
function redirect_to_permalink() {
    wp_redirect('options-permalink.php');
}
add_action( 'after_switch_theme', 'redirect_to_permalink' );
function remove_dashboard_meta() {
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
}
add_action( 'admin_init', 'remove_dashboard_meta' );

// Removes appearance customizer options
function mytheme_customize_register( $wp_customize ) {
    $wp_customize->remove_section( 'colors');
    $wp_customize->remove_section( 'header_image');
    $wp_customize->remove_section( 'background_image');
    $wp_customize->remove_panel( 'nav_menus');
    $wp_customize->remove_section( 'featured_content' );
    $wp_customize->remove_panel( 'widgets' );
}
add_action( 'customize_register', 'mytheme_customize_register',50 );

function my_theme_remove_submenus() {
    global $submenu;
    unset($submenu['themes.php'][7]); // Widgets
    unset($submenu['themes.php'][10]); // Menus
    unset($submenu['themes.php'][15]); // Header
    unset($submenu['themes.php'][20]); // Background
}
add_action('admin_menu', 'my_theme_remove_submenus');

// Add options pages
function my_acf_op_init() {
    if( function_exists('acf_add_options_page') ) {
        $header = acf_add_options_page(array(
            'page_title'    => __('Header'),
            'menu_title'    => __('Header'),
            'menu_slug'     => 'header',
            'position' => '22.2',
            'capability'    => 'edit_posts',
            'redirect'      => false,
            'icon_url' => 'dashicons-welcome-write-blog'
        ));
        $footer = acf_add_options_page(array(
            'page_title'    => __('Footer'),
            'menu_title'    => __('Footer'),
            'menu_slug'     => 'footer',
            'position' => '21.3',
            'capability'    => 'edit_posts',
            'redirect'      => false,
            'icon_url' => 'dashicons-welcome-write-blog'
        ));
    }
}
add_action('acf/init', 'my_acf_op_init');