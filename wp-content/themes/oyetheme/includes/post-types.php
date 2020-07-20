<?php

add_action('init', 'our_team');
function our_team() {
    register_post_type('our_team',
        array(
            'labels' => array(
                'name' => 'Our Team',
            ),
            'public' => true,
            'supports' => array( 'title', 'editor', 'custom-fields'),
            'rewrite' => array( 'slug' => 'onderwerp' ),
            'has_archive' => true
        )
    );
}

add_action('init', 'brand');
function brand() {
    register_post_type('brand',
        array(
            'labels' => array(
                'name' => 'Brand',
            ),
            'public' => true,
            'supports' => array( 'title', 'custom-fields'),
            'rewrite' => array( 'slug' => 'brand' ),
            'has_archive' => true
        )
    );
}

add_action('init', 'choose_us');
function choose_us() {
    register_post_type('choose_us',
        array(
            'labels' => array(
                'name' => 'Choose Us',
            ),
            'public' => true,
            'supports' => array( 'title', 'custom-fields'),
            'rewrite' => array( 'slug' => 'onderwerp' ),
            'has_archive' => true
        )
    );
}

add_action('init', 'testimonials');
function testimonials() {
    register_post_type('testimonial',
        array(
            'labels' => array(
                'name' => 'Testimonials',
            ),
            'public' => true,
            'supports' => array( 'title' , 'custom-fields'),
            'rewrite' => array( 'slug' => 'onderwerp' ),
            'has_archive' => true
        )
    );
}

add_action('init', 'register_post_type_equipments');
function register_post_type_equipments() {
    register_post_type('equipment',
        array(
            'labels' => array(
                'name' => 'Equipment',
            ),
            'public' => true,
            'supports' => array( 'title', 'custom-fields'),
            'rewrite' => array( 'slug' => 'onderwerp' ),
            'has_archive' => true
        )
    );
}

add_action('init', 'faq');
function faq() {
    register_post_type('faq',
        array(
            'labels' => array(
                'name' => 'FAQ',
            ),
            'public' => true,
            'supports' => array( 'title', 'custom-fields'),
            'rewrite' => array( 'slug' => 'onderwerp' ),
            'has_archive' => true
        )
    );
}
