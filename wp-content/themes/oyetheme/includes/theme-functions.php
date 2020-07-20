<?php

function oyetheme_setup() {
    // This theme styles the visual editor with editor-style.css to match the theme style.
    add_editor_style();

    // This theme supports a variety of post formats.
    add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menu( 'primary', __( 'Primary Menu', 'oye' ) );

}
add_action( 'after_setup_theme', 'oyetheme_setup' );

// add featured Image
add_theme_support( 'post-thumbnails' );



function es_add_body_class( $new_classes ) {
    // Turn the input into an array we can loop through
    if ( ! is_array( $new_classes ) )
        $new_classes = explode( ' ', $new_classes );

        // Add a filter on the fly
    add_filter( 'body_class', function( $classes ) use( $new_classes ) {
        foreach( $new_classes as $new_class )
        $classes[] = $new_class;

        return $classes;
    });
}

