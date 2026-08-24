<?php
/**
 * The child theme version, read from its own style.css so it cannot drift
 * from the version WordPress shows.
 */
if ( ! defined( 'PROMOS_LITE_VERSION' ) ) {
	$promos_lite_theme = wp_get_theme( get_stylesheet() );
	define( 'PROMOS_LITE_VERSION', $promos_lite_theme->get( 'Version' ) );
}

/**
 * Recommended way to include parent theme styles.
 * (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
 *
 */
/**
 * Loads the child theme textdomain.
 */
function promos_lite_load_language() {
	load_child_theme_textdomain( 'promos-lite', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'promos_lite_load_language' );

/**
 * Child theme setup.
 */
function promos_lite_setup() {
	add_theme_support(
		'custom-background',
		apply_filters(
			'promos_lite_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);
}
add_action( 'after_setup_theme', 'promos_lite_setup' );

/**
 * Enqueue Style for child theme.
 */
add_action( 'wp_enqueue_scripts', 'promos_lite_enqueue_scripts');
function promos_lite_enqueue_scripts() {

    $promos_lite_parent_version = wp_get_theme( get_template() )->get( 'Version' );

    /*
     * The child's own faces, under the child's own handle. This used to claim
     * the parent's 'promos-fonts' handle, which discarded the parent's bundled
     * fonts.css and left Lato and Lora - asked for in ten rules of the parent
     * stylesheet - with no @font-face at all.
     */
    require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

    wp_enqueue_style(
        'promos-lite-fonts',
        wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600;1,800&display=swap' ),
        array(),
        PROMOS_LITE_VERSION
    );

    /*
     * Bootstrap is the parent's to enqueue, and it already does, as 'grid-css'.
     * This file used to enqueue the same stylesheet twice over.
     */
    wp_register_style(
        'promos-style',
        get_template_directory_uri() . '/style.css',
        array(),
        $promos_lite_parent_version
    );

    wp_enqueue_style(
        'promos-lite-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'promos-style', 'grid-css' ),
        PROMOS_LITE_VERSION
    );
}

/**
 * Promos Blog Theme Customizer Deafult setting
 *
 * @package Promos
 */

if ( !function_exists('promos_default_theme_options_values') ) :

    function promos_default_theme_options_values() {

        $default_theme_options = array(

            /*Logo Options*/
            'promos_logo_width_option' => '700',

            /*Top Header*/
            'promos_enable_top_header_social'=> 0,

            /*Header Image*/
            'promos_enable_header_image_overlay'=> 0,
            'promos_slider_overlay_color'=> '#000000',
            'promos_slider_overlay_transparent'=> '0.1',
            'promos_header_image_height'=> '100',

            /*Header Options*/
            'promos_enable_search'  => 0,

            /*Menu Options*/
            'promos_mobile_menu_text'  => esc_html__('Menu','promos-lite'),
            'promos_mobile_menu_option'=> 'menu-text',

            /*Colors Options*/
            'promos_primary_color'  => '#ec6a2a',

            /*Slider Options*/
            'promos_enable_slider'      => 0,
            'promos-select-category'    => 0,
    
            /*Boxes Section */
            'promos_enable_promo'       => 0,
            'promos-promo-select-category'=> 0,
            
            /*Blog Page*/
            'promos-sidebar-blog-page' => 'right-sidebar',
            'promos-blog-image-layout' => 'full-image',
            'promos-content-show-from' => 'excerpt',
            'promos-excerpt-length'    => 25,
            'promos-pagination-options'=> 'numeric',
            'promos-read-more-text'    => esc_html__('Read More','promos-lite'),
            'promos-blog-exclude-category'=> '',
            'promos-show-hide-share'   => 0,
            'promos-show-hide-category'=> 1,
            'promos-show-hide-date'=> 1,
            'promos-show-hide-author'=> 1,
            'promos-blog-image-crop-full'=> 'original-image',

            /*Single Page */
            'promos-single-page-featured-image' => 1,
            'promos-single-page-related-posts'  => 1,
            'promos-single-page-related-posts-title' => esc_html__('You may like','promos-lite'),
            'promos-sidebar-single-page'=> 'single-right-sidebar',
            'promos-single-social-share' => 0,
            'promos-single-page-tags-option'=>0,

            /*Sticky Sidebar*/
            'promos-enable-sticky-sidebar' => 0,

            /*Footer Section*/
            'promos-footer-copyright'  => esc_html__('&#169; All Rights Reserved 2022','promos-lite'),

            /*Breadcrumb Options*/
            'promos-extra-breadcrumb' => 1,
            'promos-breadcrumb-selection-option'=> 'theme-breadcrumb',

        );
return apply_filters( 'promos_default_theme_options_values', $default_theme_options );
}
endif;