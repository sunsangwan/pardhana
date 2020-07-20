<?php
namespace Oye;

class NotificationBar {
    public function __construct () {

        // add_action( 'init', array($this, 'register_cpt'));
        // add_action( 'init', array($this, 'register_meta_boxes'));

        $this->register_cpt();
        $this->register_meta_boxes();
        add_action( 'wp_footer', array($this, 'render_template'));
    	// $this->register();
    }

    public function init() {
     //    $this->_load_page();
    	
    }

    function register_cpt() {
        register_post_type( 'notification_bar',
            array(
                'labels' => array(
                    'name' => 'Notification Bar',
                ),
                'menu_position' => 15,
                'supports' => array( 'title', 'comments', 'thumbnail', 'custom-fields' ),
                'rewrite'   => array( 'slug' => false, 'with_front' => false ), 
                'has_archive' => true,
                'public' => false,  // it's not public, it shouldn't have it's own permalink, and so on
                'publicly_queriable' => true,  // you should be able to query it
                'show_ui' => true,  // you should be able to edit it in wp-admin
            )
        );


    }

    function register_meta_boxes() {
        // Make sure there's no errors when the plugin is deactivated or during upgrade
        if ( !class_exists( '\RW_Meta_Box' ) )
        return;
        $meta_boxes[] = array(
            'id'    => 'notification_data',
            'title'   => __('Notification Section', ''),
            'pages'   => array('notification_bar'),
            'context' => 'normal',
            'priority'  => 'high',
            'fields'  => array(
                array(
                    'name'    => __('Notification Text', ''),
                    'id'    => "notification_bar_text",
                    'type'        => 'textarea',
                    'desc'    => __(''),
                ),            
                array(
                    'name'    => __('Notification Start Date', ''),
                    'id'    => "notification_bar_startdate",
                    'type'        => 'date',
                    'desc'    => __(''),
                ),            
                array(
                    'name'    => __('Notification End Date', ''),
                    'id'    => "notification_bar_enddate",
                    'type'        => 'date',
                    'desc'    => __(''),
                ),            
                array(
                    'name'    => __('Notification Background Color', ''),
                    'id'    => "notification_bar_background",
                    'type'        => 'color',
                    'desc'    => __(''),
                ),            
                array(
                    'name'    => __('Notification Text Color', ''),
                    'id'    => "notification_bar_textcolor",
                    'type'        => 'color',
                    'desc'    => __(''),
                ),            
            ),
        );

        foreach ( $meta_boxes as $meta_box ) {
            new \RW_Meta_Box( $meta_box );
        }
    }


    function render_template() {
        $args = array( 'post_type' => 'notification_bar', 'posts_per_page' => 20,'orderby' => 'menu_order', 'post_status' => 'publish');
        $posts = get_posts($args);

        $twig = new Twig;
        $twig->load_views_default();
        $template = $twig->instance->load('notification-bar.twig');
        foreach ($posts as $key => $post) {
            $meta_data = get_post_meta( $post->ID);
            $template_args = [
                'notification_bar_text' => get_post_meta($post->ID, 'notification_bar_text', true),
                'notification_bar_startdate' => get_post_meta($post->ID, 'notification_bar_startdate', true),
                'notification_bar_enddate' => get_post_meta($post->ID, 'notification_bar_enddate', true),
                'notification_bar_background' => get_post_meta($post->ID, 'notification_bar_background', true),
                'notification_bar_textcolor' => get_post_meta($post->ID, 'notification_bar_textcolor', true),
            ];

            // var_dump($template_args);
            $mydate = date('Y-m-d');
            if ($template_args['notification_bar_text']
                && $template_args['notification_bar_startdate'] 
                && $template_args['notification_bar_enddate'] 
                && $template_args['notification_bar_startdate']  <= $mydate 
                && $mydate <= $template_args['notification_bar_enddate']
                && $template_args['notification_bar_startdate'] <= $template_args['notification_bar_enddate']) {
                echo $template->render($template_args);
            }
        }
    }
    
}


?>