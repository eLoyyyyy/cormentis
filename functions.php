<?php
/**
* cormentis functions and definitions
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package cormentis
*/

//WP Reset
require get_template_directory() . '/inc/resets.php';


if ( ! function_exists( 'cormentis_setup' ) ) :

	function cormentis_setup(){

	/*
	* Make theme available for translation.
	* Translations can be filed in the /languages/ directory.
	* If you're building a theme based on cormentis, use a find and replace
	* to change 'cormentis' to the name of your theme in all the template files.
	*/

		load_theme_textdomain( 'cormentis', get_template_directory() . '/languages' );

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
		* Add Custom Logo Support
		*/
		add_theme_support( 'custom-logo' );
		
		
		/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary', 'cormentis' ),
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
		* Enable support for Post Formats.
		* See https://developer.wordpress.org/themes/functionality/post-formats/
		*/
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link'
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'cormentis_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}

endif;
add_action( 'after_setup_theme', 'cormentis_setup' );


/**
* Enqueue Scripts and Styles
*/

function cormentis_scripts(){

	//Enqueue Bootstrap Grid
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array() , '3.3.7' );

	//Enqueue SMT-Bootstrap
	wp_enqueue_style('smt-bootstrap', get_template_directory_uri() . '/css/smt-bootstrap.css', array(), '3.1.2');

	//Enqueue Font-awesome
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '4.7.0');

	//Enqueue Unslider
	wp_enqueue_style('unslider', get_template_directory_uri() . '/css/unslider.css', array() , '20172102' );

	//Enqueue Unslider-dots
	wp_enqueue_style('unslider-dots', get_template_directory_uri() . '/css/unslider-dots.css', array() , '20172102' );

	//Default Style
	wp_enqueue_style('cormentis-style', get_stylesheet_uri() );

	//Enqueue Bootstrap Script
	wp_enqueue_script('bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', '');

	//Enqueue Unslider-min Script
	wp_enqueue_script('unslider-script', get_template_directory_uri() . '/js/unslider-min.js', array('jquery'), '20172102', '');

	//Custom JS
	wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery') , '' , true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'cormentis_scripts' );


function wpdocs_theme_add_editor_styles() {
   add_editor_style(array('/css/bootstrap.min.css','/css/smt-bootstrap.css'));
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );

/**
* This will rewrite the menu functions
*/

function cormentis_nav_menu(){
	wp_nav_menu( array(
		'theme-location' => 'primary-menu',
		'menu' 	=> 'main_nav',
		'menu_class' => 'nav navbar-nav navbar-right',
		'container' => false,
		'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'	=> 2,
		'walker' => new wp_custom_menu_walker() /* custom walker */
	) );
}

/**
*Custom Logo
*
*@link https://codex.wordpress.org/Theme_Logo
*/
function simple_bootstrap_custom_logo() {
	
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}

}


//Remove the Generator
/*function wp_remove_generator(){
	return '';
}
add_filter( 'the_generator', 'wp_remove_generator' );*/

/**
* Implement the custom menu walker
*/
require get_template_directory() . '/inc/wp_custom_walker.php';

/**
* Template Tags
*/
require get_template_directory() . '/inc/template-tags.php';

/**
* Register Widgets
*/
require get_template_directory() . '/inc/widgets/widgets.php';

/**
* Breadcrumbs
*/
require get_template_directory() . '/inc/breadcrumbs.php';

/**
* Comments
*/
require get_template_directory() . '/inc/wp_bootstrap_comments.php';
