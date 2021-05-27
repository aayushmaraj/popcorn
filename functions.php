<?php
/**
 * Popcorn functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Popcorn
 */

if ( ! function_exists( 'popcorn_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function popcorn_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Popcorn, use a find and replace
		 * to change 'popcorn' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'popcorn', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'popcorn' ),
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
		add_theme_support( 'custom-background', apply_filters( 'popcorn_custom_background_args', array(
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
add_action( 'after_setup_theme', 'popcorn_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function popcorn_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'popcorn_content_width', 640 );
}
add_action( 'after_setup_theme', 'popcorn_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function popcorn_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'popcorn' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'popcorn' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'popcorn_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function popcorn_scripts() {
	wp_enqueue_style( 'popcorn-style', get_stylesheet_uri() );
     wp_enqueue_style('bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
     wp_enqueue_style('slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"');
      wp_enqueue_style('font-css', '//fonts.googleapis.com/                         css?family=Montserrat:400,500,600,700,900&display=swap"');
       wp_enqueue_style('fontawesome-css', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css');
       wp_enqueue_style('aos-css', '//unpkg.com/aos@2.3.1/dist/aos.css');
     


     wp_enqueue_script( 'jquery-js','//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', '20151215', true );

     wp_enqueue_script( 'bootstap-js', '//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', '20151215', true );
	
	wp_enqueue_script( 'slick-js',  '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', '20151215', true );

	wp_enqueue_script( 'popper-js',  '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', '20151215', true );

	wp_enqueue_script( 'aos-js', '//unpkg.com/aos@2.3.1/dist/aos.js', '20151215', true );

	wp_enqueue_script( 'navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'popcorn-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'popcorn_scripts' );

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


// Register Custom Post Type
function movies_post_type() {

	$labels = array(
		'name'                  => _x( 'Movies', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Movie', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Movies', 'text_domain' ),
		'name_admin_bar'        => __( 'Movie', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Movie:', 'text_domain' ),
		'all_items'             => __( 'All Movies', 'text_domain' ),
		'add_new_item'          => __( 'Add New Movie', 'text_domain' ),
		'add_new'               => __( 'New Movie', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Movie', 'text_domain' ),
		'update_item'           => __( 'Update Movie', 'text_domain' ),
		'view_item'             => __( 'View Movie', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Movies', 'text_domain' ),
		'not_found'             => __( 'No Movies found', 'text_domain' ),
		'not_found_in_trash'    => __( 'No Movies found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Movie', 'text_domain' ),
		'description'           => __( 'Movie information pages.', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'custom-fields' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'movie', $args );

}
add_action( 'init', 'movies_post_type', 0 );



function upcomming_movies_post_type() {

	$labels = array(
		'name'                  => _x( 'Upcomming Movies', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Upcomming Movie', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Upcomming Movies', 'text_domain' ),
		'name_admin_bar'        => __( 'Upcomming Movie', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Movie:', 'text_domain' ),
		'all_items'             => __( 'All Upcomming Movies', 'text_domain' ),
		'add_new_item'          => __( 'Add New Upcomming Movie', 'text_domain' ),
		'add_new'               => __( 'New Upcomming Movie', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Upcomming Movie', 'text_domain' ),
		'update_item'           => __( 'Update Upcomming Movie', 'text_domain' ),
		'view_item'             => __( 'View Upcomming Movie', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Upcomming Movies', 'text_domain' ),
		'not_found'             => __( 'No Upcomming Movies found', 'text_domain' ),
		'not_found_in_trash'    => __( 'No Upcomming Movies found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Upcomming Movie', 'text_domain' ),
		'description'           => __( 'Upcomming Movie information pages.', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'custom-fields' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'upcomming', $args );

}
add_action( 'init', 'upcomming_movies_post_type', 0 );
 


 function tv_series_post_type() {

	$labels = array(
		'name'                  => _x( 'tv series', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'tv series', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'tv series', 'text_domain' ),
		'name_admin_bar'        => __( 'tv series', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent tv series:', 'text_domain' ),
		'all_items'             => __( 'All tv series', 'text_domain' ),
		'add_new_item'          => __( 'Add tv series', 'text_domain' ),
		'add_new'               => __( 'New tv series', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit tv series', 'text_domain' ),
		'update_item'           => __( 'Update tv series', 'text_domain' ),
		'view_item'             => __( 'View tv series', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search tv series', 'text_domain' ),
		'not_found'             => __( 'No tv series found', 'text_domain' ),
		'not_found_in_trash'    => __( 'No tv seriesfound in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'tv series', 'text_domain' ),
		'description'           => __( 'tv series information pages.', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'custom-fields' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'tvseries', $args );

}
add_action( 'init', 'tv_series_post_type', 0 );

