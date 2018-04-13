<?php
/**
 * test functions and definitions
 *
 * @package test
 */

if ( ! function_exists( 'test_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function test_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on test, use a find and replace
		 * to change 'test' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'test', get_template_directory() . '/languages' );

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

		/*
		 * Setting custom thumbs sizes
		 */
		if ( function_exists( 'add_image_size' ) ) {
			add_image_size( 'news-loop-thumb', 119, 68, true );
			add_image_size( 'slider', 760, 366, true );
		}

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'test' ),
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
		add_theme_support( 'custom-background', apply_filters( 'test_custom_background_args', array(
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
add_action( 'after_setup_theme', 'test_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function test_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'test' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'test' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'top-sidebar', 'test' ),
		'id'            => 'top-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'test' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'test_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function test_scripts() {
	wp_enqueue_style( 'test-style', get_stylesheet_uri(), array(), '1.00' );

	//Updating jQuery version on frontend,
	// load in footer to prevent possible issues
	if ( !is_admin() ) {
		wp_deregister_script( 'jquery' );
		wp_enqueue_script( 'jquery', "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js", array(), '3.1.1' );
	}

	/*Local Bootstrap*/
	wp_enqueue_style( 'test-bootstrap.css', get_template_directory_uri(). '/css/bootstrap.min.css' );
	wp_enqueue_script( 'test-bootstrap.js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '', true );

	/*Fonts*/
	wp_enqueue_style( 'test-bootstrap.css', 'https://fonts.googleapis.com/css?family=Roboto:300,400,500&amp;subset=cyrillic' );
	wp_enqueue_style( 'test-bootstrap.css', 'https://fonts.googleapis.com/css?family=Roboto:300,400,500&amp;subset=cyrillic' );

	//font Awesome, load in footer
//	wp_register_script( 'fontawesome-solid',    "https://use.fontawesome.com/releases/v5.0.9/js/solid.js" );
//	wp_register_script( 'fontawesome-regular',  "https://use.fontawesome.com/releases/v5.0.9/js/regular.js" );
//	wp_register_script( 'fontawesome',          "https://use.fontawesome.com/releases/v5.0.9/js/fontawesome.js" );


}
add_action( 'wp_enqueue_scripts', 'test_scripts' );

/*
 * Registering post type "News"
 */

add_action('init', 'my_custom_init');
function my_custom_init(){
	register_post_type('news', array(
		'labels'             => array(
			'name'               => 'Новость',
			'singular_name'      => 'Новость',
			'add_new'            => 'Добавить новость',
			'add_new_item'       => 'Добавить новость',
			'edit_item'          => 'Редактировать новость',
			'new_item'           => 'Новая новость',
			'view_item'          => 'Посмотреть новость',
			'search_items'       => 'Найти новость',
			'not_found'          =>  'Новостей не найдено',
			'not_found_in_trash' => 'В корзине новостей не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Новости'

		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
	) );
}

add_action( 'init', 'create_news_taxonomies' );
// функция, создающая 2 новые таксономии "genres" и "writers" для постов типа "book"
function create_news_taxonomies(){
	// определяем заголовки для 'regions'
	$labels = array(
		'name' => _x( 'Regions', 'taxonomy general name' ),
		'singular_name' => _x( 'Region', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Regions' ),
		'all_items' => __( 'All Regions' ),
		'parent_item' => __( 'Parent Region' ),
		'parent_item_colon' => __( 'Parent Region:' ),
		'edit_item' => __( 'Edit Region' ),
		'update_item' => __( 'Update Region' ),
		'add_new_item' => __( 'Add New Region' ),
		'new_item_name' => __( 'New Region Name' ),
		'menu_name' => __( 'Region' ),
	);

	// Добавляем древовидную таксономию 'genre' (как категории)
	register_taxonomy('region', array('news'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'region' ),
	));

}

/*
 * Adding options page
 */
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Sholex Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));


}

/*
 * Custom except of post content
 *
 *
 * Must run in global loop
 * Expample of use: the_excerpt_max_charlength(140);
 */

function the_excerpt_max_charlength( $charlength ){
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '...';
	} else {
		echo $excerpt;
	}
}




/*
 * Remove archive name before its title
 */
add_filter('get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});

/*
 * Woocommerce customisation
 */
/**
 * Check if WooCommerce is active
 **/
if (
in_array(
	'woocommerce/woocommerce.php',
	apply_filters( 'active_plugins', get_option( 'active_plugins' ) )
)
) {
	require get_template_directory() . '/inc/woocommerce.php';
}


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
