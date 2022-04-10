<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package WP_Bootstrap_Kreativno
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses wp_bootstrap_kreativno_header_style()
 */
function wp_bootstrap_kreativno_custom_header_setup() {
	
}
add_action( 'after_setup_theme', 'wp_bootstrap_kreativno_custom_header_setup' );

if ( ! function_exists( 'wp_bootstrap_kreativno_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see wp_bootstrap_kreativno_custom_header_setup().
 */
function wp_bootstrap_kreativno_header_style() {
	
}
endif;
