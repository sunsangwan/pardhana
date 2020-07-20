<?php

$oyeprefix = "oyemetatpl_";
global $theme_opt;

// GET CURRENT PAGE TEMPLATE FILE NAME in order to show metabox page wise
$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);

function getBrandOption() {
    $brandtargs = array('post_type' => 'brand', 'order' => 'ASC', 'posts_per_page' => -1);
    $brandposts = get_posts($brandtargs);
    $brandids = array();

    foreach($brandposts as $brandpost){
        $brandids[$brandpost->ID] = $brandpost->post_title;
    }

    return $brandids;
}


$meta_boxes[] = array(
    'id'    => 'header_general_fields',
    'title'   => __('Header Fields', ''),
    'pages'   => array('page', 'post'),
    'context' => 'normal',
    'priority'  => 'high',
    'fields'  => array(
        array(
            'name'    => __('Header Title', ''),
            'id'    => "{$oyeprefix}header_title",
            'type'        => 'text',
            'desc'    => __(''),
        ),
        array(
            'name'    => __('Header Sub Title', ''),
            'id'    => "{$oyeprefix}header_subtitle",
            'type'        => 'text',
            'desc'    => __(''),
        ),
        array(
            'name'    => __('Header Description', ''),
            'id'    => "{$oyeprefix}header_description",
            'type'        => 'WYSIWYG',
            'desc'    => __(''),
        ),
        array(
            'name' => __('Header Background Image', ''),
            'id' => "{$oyeprefix}header_backgroundimage",
            'type' => 'image_advanced',
            'max_file_uploads' => 1,
            'desc' => __(''),
        ),
        array(
            'name' => __('Header Size', ''),
            'id' => "{$oyeprefix}header_size",
            'type'   => 'select',
            'options' => array(
                'normal'        => 'Normal',
                'large'         => 'Large',
            ),
           'desc' => __(''),
        ),

        array(
            'name' => __('Header Align', ''),
            'id' => "{$oyeprefix}header_align",
            'type'   => 'select',
            'options' => array(
                'left'        => 'Left',
                'center'         => 'Center',
            ),
           'desc' => __(''),
        ),
    )
);

$meta_boxes[] = array(
    'id'    => 'about_us_general_fields',
    'title'   => __('About Us General Fields', ''),
    'pages'   => array('our_team'),
    'context' => 'normal',
    'priority'  => 'high',
    'fields'  => array(
        array(
            'name'    => __('Image Description', ''),
            'id'    => "{$oyeprefix}image_description",
            'type'        => 'text',
            'desc'    => __(''),
        ),
        array(
            'name' => __('Image', ''),
            'id' => "{$oyeprefix}slider_image",
            'type' => 'image_advanced',
            'max_file_uploads' => 1,
            'desc' => __(''),
        ),
    )
);

$meta_boxes[] = array(
    'id'    => 'choose_us_general_fields',
    'title'   => __('Choose Us General Fields', ''),
    'pages'   => array('choose_us'),
    'context' => 'normal',
    'priority'  => 'high',
    'fields'  => array(
        array(
            'name' => __('Logo', ''),
            'id' => "{$oyeprefix}logo",
            'type' => 'image_advanced',
            'max_file_uploads' => 1,
            'desc' => __(''),
        ),
    )
);


$meta_boxes[] = array(
    'id'    => 'testimonials_general_fields',
    'title'   => __('Testimonials General Fields', ''),
    'pages'   => array('testimonial'),
    'context' => 'normal',
    'priority'  => 'high',
    'fields'  => array(
        array(
            'name'    => __('Rating ', ''),
            'id'    => "{$oyeprefix}testimonials_rating",
            'desc'    => __(''),
            'type'   => 'select',
                            'options' => array(
                                '1'   => '1',
                                '2'   => '2',
                                '3'   => '3',
                                '4'   => '4',
                                '5'   => '5',
                            ),
        ),
        array(
            'name'    => __('Description', ''),
            'id'    => "{$oyeprefix}testimonials_description",
            'type'        => 'textarea',
            'desc'    => __(''),
        ),
        array(
            'name' => __('Date', ''),
            'id' => "{$oyeprefix}testimonials_date",
            'type' => 'date',
            'desc' => __(''),
        ),
        array(
            'name' => __('Name', ''),
            'id' => "{$oyeprefix}testimonials__name",
            'type' => 'text',
            'desc' => __(''),
        ),
    )
);

$meta_boxes[] = array(
    'id'    => 'contact_info_general_fields',
    'title'   => __('Contact Info General Fields', ''),
    'pages'   => array('contact_info'),
    'context' => 'normal',
    'priority'  => 'high',
    'fields'  => array(
        array(
            'name'    => __('Info ', ''),
            'id'    => "{$oyeprefix}contact_info",
            'type'        => 'textarea',
            'desc'    => __(''),
        ),
    )
);

$meta_boxes[] = array(
    'id'    => 'faq_general_fields',
    'title'   => __('FAQ General Fields', ''),
    'pages'   => array('faq'),
    'context' => 'normal',
    'priority'  => 'high',
    'fields'  => array(
        array(
            'name' => __('Answer', ''),
            'id' => "{$oyeprefix}faq_answer",
            'type' => 'textarea',
            'desc' => __(''),
        ),
    )
);

if (($template_file == "pages/page-service.php")) {
    $meta_boxes[] = array(
        'id' => 'general_fields',
        'title' => __('General Fields', ''),
        'pages' => array('page'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Repair left part image', ''),
                'id' => "{$oyeprefix}repair_left_part_img",
                'type' => 'file_advanced',
                'max_file_uploads' => 1,
                'desc' => __(''),
            ),
            array(
                'name' => __('Repair title', ''),
                'id' => "{$oyeprefix}repair_title",
                'type' => 'text',
                'desc' => __(''),
            ),
            array(
                'name' => __('Repair content', ''),
                'id' => "{$oyeprefix}repair_content",
                'type' => 'wysiwyg',
                'desc' => __(''),
            ),
            array(
                'name' => __('Repair content link text', ''),
                'id' => "{$oyeprefix}repair_content_link_text",
                'type' => 'text',
                'desc' => __(''),
            ),
            array(
                'name' => __('Repair content link', ''),
                'id' => "{$oyeprefix}repair_content_link",
                'type' => 'text',
                'desc' => __(''),
            ),

            array(
                'name' => __('Contact Us link text', ''),
                'id' => "{$oyeprefix}contactus_heading_text",
                'type' => 'text',
                'desc' => __(''),
            ),
            array(
                'name' => __('Contact Us link text', ''),
                'id' => "{$oyeprefix}contactus_button_text",
                'type' => 'text',
                'desc' => __(''),
            ),
            array(
                'name' => __('Contact us link', ''),
                'id' => "{$oyeprefix}contactus_button_link",
                'type' => 'text',
                'desc' => __(''),
            ),
            array(
                'name'    => __('Show/hide brands', ''),
                'id'    => "{$oyeprefix}show_hide_brands",
                'type'        => 'select',
                'options' => array('1' => 'Yes', '0' => 'No'),
                'desc'    => __(''),
            ),
            array(
                'name' => __("Brand",''),
                'type' => 'group',
                'id' => "brand",
                'clone'       => true,
                'sort_clone'  => true,
                'desc' => __(''),
                'fields' => array(
                    array(
                        // 'name' => 'Brand Name', // Optional
                        'id' => 'brand_name',
                        'type' => 'select',
                        'options' => getBrandOption(),
                        'desc'    => __(''),
                    ),
                )
            )
        )
    );
}

$meta_boxes[] = array(
    'id' => 'general_fields',
    'title' => __('General Fields', ''),
    'pages' => array('brand'),
    'context' => 'normal',
    'priority' => 'high',
    'autosave'   => true,
    'fields' => array(
        array(
            'name' => __('Brand Logo', ''),
            'id' => "{$oyeprefix}brand_logo",
            'type' => 'file_advanced',
            'max_file_uploads' => 1,
            'desc' => __(''),
        ),
        array(
            'name' => __('Brand Logo Active', ''),
            'id' => "{$oyeprefix}brand_logo_active",
            'type' => 'file_advanced',
            'max_file_uploads' => 1,
            'desc' => __(''),
        ),
            array(
                'id'     => "brand_model",
                'type'   => 'group',
                'columns' => 6,
                'clone'  => true,
                'sort_clone'  => true,
                'autosave'   => true,
                'fields' => array(
                    array(
                        'name'    => __('Brand Model', ''),
                        'id'    => "{$oyeprefix}brand_model",
                        'type'        => 'text',
                        'desc'    => __(''),
                    ),
                ),
            ),

    )
);

$meta_boxes[] = array(
    'id' => 'general_fields',
    'title' => __('General Fields', ''),
    'pages' => array('equipment'),
    'context' => 'normal',
    'priority' => 'high',
    'autosave'   => true,
    'fields' => array(
        array(
            'name' => __('Equipment Logo', ''),
            'id' => "{$oyeprefix}equipment_logo",
            'type' => 'file_advanced',
            'max_file_uploads' => 1,
            'desc' => __(''),
        ),
        array(
            'name' => __('Equipment Logo Active', ''),
            'id' => "{$oyeprefix}equipment_logo_active",
            'type' => 'file_advanced',
            'max_file_uploads' => 1,
            'desc' => __(''),
        ),
        array(
            'name' => __('Page link', ''),
            'desc' => __(''),
            'id' => "{$oyeprefix}page_link",
            'type' => 'text'
        ),
    )
);

if (($template_file == "pages/page-legal.php")) {
    $meta_boxes[] = array(
        'id' => 'privacy_fields',
        'title' => __('General Fields', ''),
        'pages' => array('page'),
        'context' => 'normal', // Where the meta box appear: normal (default), advanced, side. Optional.
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Header Title', ''),
                'desc' => __(''),
                'id' => "privacy_header_title",
                'type' => 'text'
            ),
            array(
                'name' => __('Header Title Image', ''),
                'id' => "header_title_img",
                'type' => 'image_advanced',
                'max_file_uploads' => 1,
                'desc' => __(''),
            ),
            array(
                'name' => __('Pdf', ''),
                'id' => "{$oyeprefix}pdf",
                'type' => 'file_advanced',
                'max_file_uploads' => 1,
                'desc' => __(''),
            ),
            array(
                'name' => __('Pdf Title', ''),
                'id' => "{$oyeprefix}pdf_title",
                'type' => 'text',
                'desc' => __(''),
            ),
            array(
                'name' => __('Pdf Link Title', ''),
                'id' => "{$oyeprefix}pdf_link_title",
                'type' => 'text',
                'desc' => __(''),
            ),
        )
    );
}


if (($template_file == "pages/page-warranty.php")) {
    $meta_boxes[] = array(
        'id' => 'privacy_fields',
        'title' => __('General Fields', ''),
        'pages' => array('page'),
        'context' => 'normal', // Where the meta box appear: normal (default), advanced, side. Optional.
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('How can we help Heading', ''),
                'desc' => __(''),
                'id' => "how_we_can_help_heading",
                'type' => 'text'
            ),
            array(
                'name' => __('How can we help Sub Title', ''),
                'id' => "how_we_can_help_sub_heading",
                'type' => 'text',
                'desc' => __(''),
            ),

            array(
                'name' => __('Get an Estimate Heading', ''),
                'desc' => __(''),
                'id' => "get_an_estimate_heading",
                'type' => 'text'
            ),
            array(
                'name' => __('Get an estimate Link', ''),
                'id' => "get_an_estimate_link",
                'type' => 'text',
                'desc' => __(''),
            ),
            array(
                'id'     => "brand_logo_images",
                'type'   => 'group',
                'columns' => 6,
                'clone'  => true,
                'sort_clone'  => true,
                'autosave'   => true,
                'fields' => array(
                    array(
                        'name'    => __('Brand', ''),
                        'id'    => "{$oyeprefix}brand_logo_images",
                        'type'        => 'image_advanced',
                        'desc'    => __(''),
                    ),
                ),
            ),
           
        )
    );
}







function ct_register_meta_boxes()
{
    // Make sure there's no errors when the plugin is deactivated or during upgrade
    if ( !class_exists( 'RW_Meta_Box' ) )
    return;
    global $meta_boxes;
    foreach ( $meta_boxes as $meta_box ) {
        new RW_Meta_Box( $meta_box );
    }
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'ct_register_meta_boxes' );


/**
 * Adds the meta box stylesheet when appropriate
 */
function oye_admin_styles(){
    wp_enqueue_style( 'oye_meta_box_styles', get_template_directory_uri() . '/assets/css/meta-box-styles.css' );
}
add_action( 'admin_print_styles', 'oye_admin_styles' );


?>