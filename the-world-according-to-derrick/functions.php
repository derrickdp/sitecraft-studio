<?php
/**
 * Theme functions for The World According to Derrick
 */

if ( ! function_exists( 'twad_setup' ) ) :
function twad_setup() {
    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Post thumbnails.
    add_theme_support( 'post-thumbnails' );

    // HTML5 markup support.
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

    // Register navigation menu.
    register_nav_menus(
        array(
            'primary' => __( 'Primary Menu', 'world-according-to-derrick' ),
        )
    );
}
endif;
add_action( 'after_setup_theme', 'twad_setup' );

/**
 * Enqueue styles.
 */
function twad_scripts() {
    // Google Fonts.
    wp_enqueue_style(
        'twad-google-fonts',
        'https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Playfair+Display:wght@400;700;900&display=swap',
        array(),
        null
    );

    // Main stylesheet.
    wp_enqueue_style(
        'twad-style',
        get_stylesheet_uri(),
        array( 'twad-google-fonts' ),
        wp_get_theme()->get( 'Version' )
    );
}
add_action( 'wp_enqueue_scripts', 'twad_scripts' );

/**
 * Register widget area.
 */
function twad_widgets_init() {
    register_sidebar(
        array(
            'name'          => __( 'Sidebar', 'world-according-to-derrick' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'Add widgets here.', 'world-according-to-derrick' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'twad_widgets_init' );
