<?php

/**
 * WP Bootstrap Kreativno functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Bootstrap_Kreativno
 */

if ( ! function_exists( 'wp_bootstrap_kreativno_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wp_bootstrap_kreativno_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on WP Bootstrap Kreativno, use a find and replace
	 * to change 'wp-kreativno' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wp-kreativno', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'wp-kreativno' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wp_bootstrap_kreativno_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

    function wp_boostrap_kreativno_add_editor_styles() {
        add_editor_style( 'custom-editor-style.css' );
    }
    add_action( 'admin_init', 'wp_boostrap_kreativno_add_editor_styles' );

}
endif;
add_action( 'after_setup_theme', 'wp_bootstrap_kreativno_setup' );


/**
 * Add Welcome message to dashboard
 */
function wp_bootstrap_kreativno_reminder(){

}
add_action( 'admin_notices', 'wp_bootstrap_kreativno_reminder' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_bootstrap_kreativno_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_bootstrap_kreativno_content_width', 1170 );
}
add_action( 'after_setup_theme', 'wp_bootstrap_kreativno_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_bootstrap_kreativno_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'wp-kreativno' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'wp-kreativno' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'wp-kreativno' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add footer nav here.', 'wp-kreativno' ),
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'wp_bootstrap_kreativno_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function wp_bootstrap_kreativno_scripts() {
    $version = '1.0.1'; //Add new version

    // load bootstrap css
    if ( is_single() && 'posteri' == get_post_type() ) {
        wp_enqueue_script( 'wp-kreativno-jquery', 'https://code.jquery.com/jquery-3.2.1.min.js', array(), '', true );
    }
    if ( get_theme_mod( 'cdn_assets_setting' ) === 'yes' ) {
        wp_enqueue_style( 'wp-kreativno-bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css' );
        wp_enqueue_style( 'wp-kreativno-fontawesome-cdn', 'https://use.fontawesome.com/releases/v5.10.2/css/all.css' );
    } else {
        wp_enqueue_style( 'wp-kreativno-bootstrap-css', get_template_directory_uri() . '/inc/assets/css/bootstrap.min.css' );
        wp_enqueue_style( 'wp-kreativno-fontawesome-cdn', get_template_directory_uri() . '/inc/assets/css/fontawesome.min.css' );
    }
	// load bootstrap css
	// load AItheme styles
	// load WP Bootstrap Kreativno styles
    wp_enqueue_style( 'wp-kreativno-style', get_stylesheet_directory_uri() . '/style.css', '', $version );
    wp_enqueue_style( 'wp-kreativno-style-custom', get_stylesheet_directory_uri() . '/style-custom.css', '', $version );
    if(get_theme_mod( 'theme_option_setting' ) && get_theme_mod( 'theme_option_setting' ) !== 'default') {
        //wp_enqueue_style( 'wp-kreativno-'.get_theme_mod( 'theme_option_setting' ), get_template_directory_uri() . '/inc/assets/css/presets/theme-option/'.get_theme_mod( 'theme_option_setting' ).'.css', false, '' );
    }
    
    wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;1,300;1,400;1,700&display=swap', false ); 
    
    //Color Scheme
    /*if(get_theme_mod( 'preset_color_scheme_setting' ) && get_theme_mod( 'preset_color_scheme_setting' ) !== 'default') {
        wp_enqueue_style( 'wp-kreativno-'.get_theme_mod( 'preset_color_scheme_setting' ), get_template_directory_uri() . '/inc/assets/css/presets/color-scheme/'.get_theme_mod( 'preset_color_scheme_setting' ).'.css', false, '' );
    }else {
        wp_enqueue_style( 'wp-kreativno-default', get_template_directory_uri() . '/inc/assets/css/presets/color-scheme/blue.css', false, '' );
    }*/

	wp_enqueue_script('jquery');

    // Internet Explorer HTML5 support
    wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/inc/assets/js/html5.js', array(), '3.7.0', false );
    wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );

	// load bootstrap js
    if ( get_theme_mod( 'cdn_assets_setting' ) === 'yes' ) {
        wp_enqueue_script('wp-kreativno-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1/dist/umd/popper.min.js', array(), '', true );
    	wp_enqueue_script('wp-kreativno-bootstrapjs', 'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js', array(), '', true );
    } else {
        wp_enqueue_script('wp-kreativno-popper', get_template_directory_uri() . '/inc/assets/js/popper.min.js', array(), '', true );
        wp_enqueue_script('wp-kreativno-bootstrapjs', get_template_directory_uri() . '/inc/assets/js/bootstrap.min.js', array(), '', true );
    }
    wp_enqueue_script('wp-kreativno-themejs', get_template_directory_uri() . '/inc/assets/js/theme-script.min.js', array(), '', true );
    wp_enqueue_script( 'wp-kreativno-skip-link-focus-fix', get_template_directory_uri() . '/inc/assets/js/skip-link-focus-fix.min.js', array(), '20151215', true );
    wp_enqueue_script( 'wp-kreativno-custom', get_template_directory_uri() . '/inc/assets/js/custom.js', array(), '', true );
    
    //custom za postere
    if ( is_single() && 'posteri' == get_post_type() ) {
        wp_enqueue_script( 'wp-kreativno-price',  get_template_directory_uri() . '/inc/assets/js/price.js', array(), $version, true );
        wp_enqueue_script( 'wp-kreativno-recaptcha', 'https://www.google.com/recaptcha/api.js', array(), $version, true );
        wp_enqueue_script( 'wp-kreativno-validator',  get_template_directory_uri() . '/forms/validator.js', array(), $version, true );
        wp_enqueue_script( 'wp-kreativno-contact',  get_template_directory_uri() . '/forms/contact.js', array(), $version, true );
    }

    //custom za postere
    if ( is_front_page() ) {
        wp_enqueue_script( 'wp-kreativno-contact',  get_template_directory_uri() . '/inc/assets/js/category-filter.js', array(), $version, true );
    }

}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_kreativno_scripts' );



/**
 * Add Preload for CDN scripts and stylesheet
 */
function wp_bootstrap_kreativno_preload( $hints, $relation_type ){
    if ( 'preconnect' === $relation_type && get_theme_mod( 'cdn_assets_setting' ) === 'yes' ) {
        $hints[] = [
            'href'        => 'https://cdn.jsdelivr.net/',
            'crossorigin' => 'anonymous',
        ];
        $hints[] = [
            'href'        => 'https://use.fontawesome.com/',
            'crossorigin' => 'anonymous',
        ];
    }
    return $hints;
} 

add_filter( 'wp_resource_hints', 'wp_bootstrap_kreativno_preload', 10, 2 );



function wp_bootstrap_kreativno_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    <div class="d-block mb-3">' . __( "To view this protected post, enter the password below:", "wp-kreativno" ) . '</div>
    <div class="form-group form-inline"><label for="' . $label . '" class="mr-2">' . __( "Password:", "wp-kreativno" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control mr-2" /> <input type="submit" name="Submit" value="' . esc_attr__( "Submit", "wp-kreativno" ) . '" class="btn btn-primary"/></div>
    </form>';
    return $o;
}
add_filter( 'the_password_form', 'wp_bootstrap_kreativno_password_form' );


add_action( 'admin_menu', 'my_remove_menu_pages' );

function my_remove_menu_pages() {
  remove_menu_page( 'edit-comments.php' );          //Comments
};


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
 * Load plugin compatibility file.
 */
require get_template_directory() . '/inc/plugin-compatibility/plugin-compatibility.php';

/**
 * Disable api
 */
require get_template_directory() . '/inc/disable-api.php';

/**
 * Pagination
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Load custom WordPress nav walker.
 */
if ( ! class_exists( 'wp_bootstrap_navwalker' )) {
    require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Posteri',
		'menu_title'	=> 'Posteri',
		'menu_slug' 	=> 'cijene',
		'capability'	=> 'edit_posts',
        'redirect'		=> false,
        'icon_url' => 'dashicons-calculator',
    ));

    acf_add_options_page(array(
		'page_title' 	=> 'Okviri',
		'menu_title'	=> 'Okviri',
		'menu_slug' 	=> 'okviri',
		'capability'	=> 'edit_posts',
        'redirect'		=> false,
        'icon_url' => 'dashicons-calculator',
    ));

    acf_add_options_page(array(
		'page_title' 	=> 'Vrsta okvira',
		'menu_title'	=> 'Vrsta okvira',
		'menu_slug' 	=> 'okviri-color',
		'capability'	=> 'edit_posts',
        'redirect'		=> false,
        'icon_url' => 'dashicons-visibility',
    ));
    
    acf_add_options_page(array(
		'page_title' 	=> 'Poštarina',
		'menu_title'	=> 'Poštarina',
		'menu_slug' 	=> 'postarina',
		'capability'	=> 'edit_posts',
        'redirect'		=> false,
        'icon_url' => 'dashicons-calculator',
    ));
    
    acf_add_options_page(array(
		'page_title' 	=> 'Forma',
		'menu_title'	=> 'Forma',
		'menu_slug' 	=> 'forma',
		'capability'	=> 'edit_posts',
        'redirect'		=> false,
        'icon_url' => 'dashicons-feedback',
	));
}

function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/**
 * Implementation of title search for Poster Filter
 */
add_filter('posts_where', 'title_like_posts_where', 10, 2);
function title_like_posts_where($where, $wp_query)
{
    global $wpdb;
    if ($post_title_like = $wp_query->get('post_title_like')) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql($wpdb->esc_like($post_title_like)) . '%\'';
    }
    return $where;
}