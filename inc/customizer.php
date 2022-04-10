<?php
/**
 * WP Bootstrap Kreativno Theme Customizer
 *
 * @package WP_Bootstrap_Kreativno
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function themeslug_sanitize_checkbox( $checked ) {
    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function wp_bootstrap_kreativno_customize_register( $wp_customize ) {

    //Style Preset
    $wp_customize->add_section(
        'typography',
        array(
            'title' => __( 'Preset Styles', 'wp-kreativno' ),
            //'description' => __( 'This is a section for the typography', 'wp-kreativno' ),
            'priority' => 20,
        )
    );

    //Theme Option
    $wp_customize->add_setting( 'theme_option_setting', array(
        'default'   => 'default',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'theme_option_setting', array(
        'label' => __( 'Theme Option', 'wp-kreativno' ),
        'section'    => 'typography',
        'settings'   => 'theme_option_setting',
        'type'    => 'select',
        'choices' => array(
            'default' => 'Default',
        )
    ) ) );

    $wp_customize->add_setting( 'preset_style_setting', array(
        'default'   => 'default',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'preset_style_setting', array(
        'label' => __( 'Typography', 'wp-kreativno' ),
        'section'    => 'typography',
        'settings'   => 'preset_style_setting',
        'type'    => 'select',
        'choices' => array(
            'default' => 'Default',
        )
    ) ) );


    /*$wp_customize->add_setting( 'preset_color_scheme_setting', array(
        'default'   => 'default',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'preset_color_scheme_setting', array(
        'label' => __( 'Color Scheme', 'wp-kreativno' ),
        'section'    => 'typography',
        'settings'   => 'preset_color_scheme_setting',
        'type'    => 'select',
        'choices' => array(
            'default' => 'Default',
            'red' => 'Red',
            'green' => 'Green',
            'orange' => 'Orange',
            'pink' => 'Pink',
        )
    ) ) );*/

    //Site Name Text Color
   $wp_customize->add_section(
        'site_name_text_color',
        array(
            'title' => __( 'Other Customizations', 'wp-kreativno' ),
            //'description' => __( 'This is a section for the header banner Image.', 'wp-kreativno' ),
            'priority' => 40,
        )
    );

    // Bootstrap and Fontawesome Option
    $wp_customize->add_setting( 'cdn_assets_setting', array(
        'default' => __( 'no','wp-kreativno' ),
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( 
        'cdn_assets',
        array(
            'label' => __( 'Use CDN for Assets', 'wp-kreativno' ),
            'description' => __( 'All Bootstrap Assets and FontAwesome will be loaded in CDN.', 'wp-kreativno' ),
            'section' => 'site_name_text_color',
            'settings' => 'cdn_assets_setting',
	        'type'    => 'select',
	        'choices' => array(
	            'yes' => __( 'Yes', 'wp-kreativno' ),
	            'no' => __( 'No', 'wp-kreativno' ),
        	)
        )
    );


    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    // Add control for logo uploader
    $wp_customize->add_setting( 'wp_bootstrap_kreativno_logo', array(
        //'default' => __( '', 'wp-kreativno' ),
        'sanitize_callback' => 'esc_url',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wp_bootstrap_kreativno_logo', array(
        'label'    => __( 'Upload Logo (replaces text)', 'wp-kreativno' ),
        'section'  => 'title_tagline',
        'settings' => 'wp_bootstrap_kreativno_logo',
    ) ) );

}
add_action( 'customize_register', 'wp_bootstrap_kreativno_customize_register' );

add_action( 'wp_head', 'wp_bootstrap_kreativno_customizer_css');
function wp_bootstrap_kreativno_customizer_css()
{
    ?>
    
    <?php
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wp_bootstrap_kreativno_customize_preview_js() {
    wp_enqueue_script( 'wp_bootstrap_kreativno_customizer', get_template_directory_uri() . '/inc/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'wp_bootstrap_kreativno_customize_preview_js' );
