<?php
/**
 * Theme basic setup.
 *
 * @package understrap
 */

require get_template_directory() . '/inc/theme-settings.php';

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'understrap_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function understrap_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on understrap, use a find and replace
		 * to change 'understrap' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'understrap', get_template_directory() . '/languages' );

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
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		//add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'understrap' ),
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

		/*
		 * Adding Thumbnail basic support
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'understrap_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Set up the Wordpress Theme logo feature.
		add_theme_support( 'custom-logo' );

		// Check and setup theme default settings.
		setup_theme_default_settings();
	}
endif; // understrap_setup.
add_action( 'after_setup_theme', 'understrap_setup' );

if ( ! function_exists( 'custom_excerpt_more' ) ) {
	/**
	 * Removes the ... from the excerpt read more link
	 *
	 * @param string $more The excerpt.
	 *
	 * @return string
	 */
	function custom_excerpt_more( $more ) {
		return '';
	}
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

if ( ! function_exists( 'all_excerpts_get_more_link' ) ) {
	/**
	 * Adds a custom read more link to all excerpts, manually or automatically generated
	 *
	 * @param string $post_excerpt Posts's excerpt.
	 *
	 * @return string
	 */
	function all_excerpts_get_more_link( $post_excerpt ) {

		return $post_excerpt . '...';
	}
}
add_filter( 'wp_trim_excerpt', 'all_excerpts_get_more_link' );

/**
 * Filter the except length. Default is 55 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 35;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

show_admin_bar( false );

// add_action( 'init', 'cptui_register_my_taxes_project_tags' );
// function cptui_register_my_taxes_project_tags() {
// 	$labels = array(
// 		"name" => __( 'Project Tags', '' ),
// 		"singular_name" => __( 'Project Tag', '' ),
// 		);
//
// 	$args = array(
// 		"label" => __( 'Project Tags', '' ),
// 		"labels" => $labels,
// 		"public" => true,
// 		"hierarchical" => false,
// 		"label" => "Project Tags",
// 		"show_ui" => true,
// 		"show_in_menu" => true,
// 		"show_in_nav_menus" => true,
// 		"query_var" => true,
// 		"rewrite" => array( 'slug' => 'project_tags', 'with_front' => true, ),
// 		"show_admin_column" => false,
// 		"show_in_rest" => false,
// 		"rest_base" => "",
// 		"show_in_quick_edit" => false,
// 	);
// 	register_taxonomy( "project_tags", array( "project" ), $args );
//
// // End cptui_register_my_taxes_project_tags()
// }

//hook into the init action and call create_topics_nonhierarchical_taxonomy when it fires

add_action( 'init', 'create_project_tags_nonhierarchical_taxonomy', 0 );

function create_project_tags_nonhierarchical_taxonomy() {

// Labels part for the GUI

  $labels = array(
    'name' => _x( 'Project Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Project Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Project Tags' ),
    'popular_items' => __( 'Popular Project Tags' ),
    'all_items' => __( 'All Project Tags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Project Tag' ),
    'update_item' => __( 'Update Project Tag' ),
    'add_new_item' => __( 'Add New Project Tag' ),
    'new_item_name' => __( 'New Project Tag' ),
    'separate_items_with_commas' => __( 'Separate topics with commas' ),
    'add_or_remove_items' => __( 'Add or remove tags' ),
    'choose_from_most_used' => __( 'Choose from the most used tags' ),
    'menu_name' => __( 'Project Tags' ),
  );

// Now register the non-hierarchical taxonomy like tag

  register_taxonomy('project_tags','project',array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'project_tag' ),
  ));
}
