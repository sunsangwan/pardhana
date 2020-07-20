<?php

function oyetheme_widgets_init() {
	register_sidebar( array(
	'name'          => __( 'Widget Area', 'oyetheme' ),
	'id'            => 'sidebar-1',
	'description'   => __( 'Add widgets here to appear in your sidebar.', 'oyetheme' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>',
	) );
 
	register_sidebar( array(
		'name'          => __( 'Footer Column 1', 'oyetheme' ),
		'id'            => 'footercol-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'oyetheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Column 2', 'oyetheme' ),
		'id'            => 'footercol-2',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'oyetheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Column 3', 'oyetheme' ),
		'id'            => 'footercol-3',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'oyetheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Column 4', 'oyetheme' ),
		'id'            => 'footercol-4',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'oyetheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) ); 
}
add_action( 'widgets_init', 'oyetheme_widgets_init' );

?>