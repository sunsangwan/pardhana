<?php

// add_action( 'init', 'article_post_type' );
// function article_post_type() {
//     register_post_type( 'article_post_type',
//         array(
//             'labels' => array(
//                 'name' => 'Articles',
//             ),
//             'public' => true,
//             'menu_position' => 15,
//             'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
//             'has_archive' => true
//         )
//     );
// }

add_action( 'init', 'event_post_type' );
function event_post_type() {
    register_post_type( 'event',
        array(
            'labels' => array(
                'name' => 'Events',
            ),
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'has_archive' => false
        )
    );
}

add_action( 'init', 'course_post_type' );
function course_post_type() {
    register_post_type( 'course',
        array(
            'labels' => array(
                'name' => 'Courses',
            ),
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'has_archive' => false
        )
    );
}

add_action( 'init', 'lecture_post_type' );
function lecture_post_type() {
    register_post_type( 'lecture',
        array(
            'labels' => array(
                'name' => 'Lectures',
            ),
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'has_archive' => false
        )
    );
}


add_action( 'init', 'video_post_type' );
function video_post_type() {
    register_post_type( 'video',
        array(
            'labels' => array(
                'name' => 'Videos',
            ),
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'comments', 'thumbnail', 'custom-fields' ),
            'has_archive' => false
        )
    );
}

add_action( 'init', 'book_post_type' );
function book_post_type() {
    register_post_type( 'book',
        array(
            'labels' => array(
                'name' => 'Books',
            ),
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'has_archive' => false
        )
    );
}

// add_action( 'init', 'cookie_manager_taxonomy' );
// function cookie_manager_taxonomy() {
//     register_taxonomy(
//         'cookie_manager_cat',
//         'cookie_manager',
//         array(
//             'label' => __( 'Cookies Manager Category' ),
//             'rewrite' => array( 'slug' => 'cookie_manager_cat' ),
//             'hierarchical' => true,
//         )
//     );
// }