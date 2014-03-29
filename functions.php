<?php
/**
 * Kavya functions and definitions
 *
 * @package Kavya
 */


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'kavya_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kavya_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Kavya, use a find and replace
	 * to change 'kavya' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'kavya', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	/**
	 * Editor styles for the win
	 */
	add_editor_style( 'css/editor-style.css' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 254, 146, true );
	add_image_size( 'kavya-featured', 460, 260, true );
	add_image_size( 'kavya-mini', 50, 50, true ); 

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'kavya' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside' ,'gallery', 'image', 'video', 'audio', 'quote', 'link', 'status', 'chat' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'kavya_custom_background_args', array(
		'default-color' => 'E6E1C4',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // kavya_setup
add_action( 'after_setup_theme', 'kavya_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function kavya_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'kavya' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'kavya_widgets_init' );



/* Start Option Framework */
/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}
/*
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 *
 * You can delete it if you not using that option
 */

add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});

	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}

});
</script>

<?php
}
/* End Option Framework */



/**
 * Enqueue scripts and styles.
 */
function kavya_scripts() {
	wp_enqueue_style( 'kavya-fonts', '//fonts.googleapis.com/css?family=Gilda+Display');
	wp_enqueue_style( 'kavya-style', get_stylesheet_uri() );
	
	if ( (function_exists( 'of_get_option' )) && (of_get_option('sidebar-layout', true) != 1) ) {
		if (of_get_option('sidebar-layout', true) ==  'right') {
			wp_enqueue_style( 'kavya-layout', get_template_directory_uri()."/css/layouts/content-sidebar.css" );
		}
		else {
			wp_enqueue_style( 'kavya-layout', get_template_directory_uri()."/css/layouts/sidebar-content.css" );
		}	
	}
	else {
		wp_enqueue_style( 'kavya-layout', get_template_directory_uri()."/css/layouts/no-sidebar.css" );
	}

	wp_enqueue_style( 'kavya-main-style', get_template_directory_uri()."/css/main.css", array('kavya-fonts','kavya-layout') );
	wp_enqueue_style( 'kavya-reset-style', get_template_directory_uri()."/css/reset.css", array('kavya-fonts','kavya-layout') );

	wp_enqueue_script( 'kavya-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'kavya-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	//wp_enqueue_script( 'kavya-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery') );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kavya_scripts' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';


/**
 * Additional helper post classes
 */
function kavya_post_class( $classes ) {
	if ( has_post_thumbnail() )
		$classes[] = 'has-post-thumbnail';
	return $classes;
}
add_filter('post_class', 'kavya_post_class' );

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


/**
 * Ignore and exclude featured posts on the home page.
 */
function kavya_pre_get_posts( $query ) {
	if ( ! $query->is_main_query() || is_admin() )
		return;

	if ( $query->is_home() ) { // condition should be (almost) the same as in index.php
		$query->set( 'ignore_sticky_posts', true );

		$exclude_ids = array();
		$featured_posts = kavya_get_featured_posts();

		if ( $featured_posts->have_posts() )
			foreach ( $featured_posts->posts as $post )
				$exclude_ids[] = $post->ID;

		$query->set( 'post__not_in', $exclude_ids );
	}
}
add_action( 'pre_get_posts', 'kavya_pre_get_posts' );

if ( ! function_exists( 'kavya_get_featured_posts' ) ) :
/**
 * Returns a new WP_Query with featured posts.
 */
function kavya_get_featured_posts() {
	global $wp_query;

	// Default number of featured posts
	$count = apply_filters( 'kavya_featured_posts_count', 4 );

	// Jetpack Featured Content support
	$sticky = apply_filters( 'kavya_get_featured_posts', array() );
	if ( ! empty( $sticky ) ) {
		$sticky = wp_list_pluck( $sticky, 'ID' );

		// Let Jetpack override the sticky posts count because it has an option for that.
		$count = count( $sticky );
	}

	if ( empty( $sticky ) )
		$sticky = (array) get_option( 'sticky_posts', array() );

	if ( empty( $sticky ) ) {
		return new WP_Query( array(
			'posts_per_page' => $count,
			'ignore_sticky_posts' => true,
		) );
	}

	$args = array(
		'posts_per_page' => $count,
		'post__in' => $sticky,
		'ignore_sticky_posts' => true,
	);

	return new WP_Query( $args );
}
endif;

if ( ! function_exists( 'kavya_get_related_posts' ) ) :
/**
 * Returns a new WP_Query with related posts.
 */
function kavya_get_related_posts() {
	$post = get_post();

	// Support for the Yet Another Related Posts Plugin
	if ( function_exists( 'yarpp_get_related' ) ) {
		$related = yarpp_get_related( array( 'limit' => 3 ), $post->ID );
		return new WP_Query( array(
			'post__in' => wp_list_pluck( $related, 'ID' ),
			'posts_per_page' => 3,
			'ignore_sticky_posts' => true,
			'post__not_in' => array( $post->ID ),
		) );
	}

	$args = array(
		'posts_per_page' => 3,
		'ignore_sticky_posts' => true,
		'post__not_in' => array( $post->ID ),
	);

	// Get posts from the same category.
	$categories = get_the_category();
	if ( ! empty( $categories ) ) {
		$category = array_shift( $categories );
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'category',
				'field' => 'id',
				'terms' => $category->term_id,
			),
		);
	}

	return new WP_Query( $args );
}
endif;
