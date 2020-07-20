<?php

$oyeprefix = "oyemetatpl_";

// GET CURRENT PAGE TEMPLATE FILE NAME in order to show metabox page wise
$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);

function submenu() {
  $menus = get_terms('nav_menu');
  $new_array = array();
  foreach($menus as $n){
    $new_array[$n->name] = $n->name;
  }

  return $new_array;
}

$meta_boxes[] = array(
    'id'    => 'oye_general_info',
    'title'   => __('General Information', ''),
    'pages'   => array( 'page' ),
    'context' => 'normal',
    'priority'  => 'high',
    'fields'  => array(
        array(
            'name'    => __('Body Class', ''),
            'id'    => "{$oyeprefix}bodyclass",
            'type'        => 'text',
            'desc'    => __(''),
        ),
    )
);


$meta_boxes[] = array(
    'id'    => 'page_header_section',
    'title'   => __('Header Section', ''),
    'pages'   => array('page'),
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
            'name'    => __('Header subtitle', ''),
            'id'    => "{$oyeprefix}header_subtitle",
            'type'        => 'text',
            'desc'    => __(''),
        ),
        array(
            'name'    => __('Header Image', ''),
            'id'    => "{$oyeprefix}header_image",
            'type'        => 'image_advanced',
            'max_file_uploads'  => 1,
            'desc'    => __(''),
        ),
        array(
            'name'    => __('Header Vimeo Video ID', ''),
            'id'    => "{$oyeprefix}header_video_id",
            'type'        => 'text',
            'desc'    => __(''),
        ),

        array(
            'name' => __('Header Styles', ''),
            'id' => "{$oyeprefix}header_style",
            'type' => 'select',
            // 'std'   => __( 'Default text value', 'your-prefix' ),
            'desc' => __(''),
            'options' => array(
                'default' => 'Default',
                'style1' => 'Style1',
            )
        ),
    )
);

$meta_boxes[] = array(
    'id'    => 'blog_data_section',
    'title'   => __('Data Section', ''),
    'pages'   => array('post'),
    'context' => 'normal',
    'priority'  => 'high',
    'fields'  => array(
        array(
            'name'    => __('PDF File', ''),
            'id'    => "{$oyeprefix}post_pdf_file",
            'type'        => 'file_advanced',
            'max_file_uploads'  => 1,
            'desc'    => __(''),
        ),
    ),
);


if (($template_file == "pages/page-course.php")) {
    $meta_boxes[] = array(
        'id' => 'privacy_fields',
        'title' => __('General Fields', ''),
        'pages' => array('page'),
        'context' => 'normal', // Where the meta box appear: normal (default), advanced, side. Optional.
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Video Title', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}course_video_title",
                'type' => 'text'
            ),
            array(
                'name' => __('Vimeo Video ID', ''),
                'id' => "{$oyeprefix}course_vimeo_video_id",
                'type' => 'text',
                'desc' => __(''),
            ),
            
        )
    );
}

if (($template_file == "pages/page-paris-secrets.php")) {
    $meta_boxes[] = array(
        'id' => 'privacy_fields',
        'title' => __('General Fields', ''),
        'pages' => array('page'),
        'context' => 'normal', // Where the meta box appear: normal (default), advanced, side. Optional.
        'priority' => 'high',
        'clone' => 'true',
        'fields' => array(
            array(
                'name' => __("Slider",''),
                'type' => 'group',
                'id' => "slider",
                'clone'       => true,
                'sort_clone'  => true,
                'desc' => __(''),
                'fields' => array(
                    array(
                        'name' => __('Heading', ''),
                        'id' => "{$oyeprefix}heading",
                        'type' => 'text',
                        'desc' => __(''),
                    ),
                    array(
                        'name'    => __('Image', ''),
                        'id'    => "{$oyeprefix}image",
                        'type'        => 'file_advanced',
                        'max_file_uploads'  => 1,
                        'desc'    => __(''),
                    ),
                    array(
                        'name' => __('Bottom Description', ''),
                        'id' => "{$oyeprefix}desc",
                        'type' => 'wysiwyg',
                        'desc' => __(''),
                    ),
                )
            )
            
        )
    );
}

$meta_boxes[] = array(
    'id' => 'privacy_fields',
    'title' => __('General Fields', ''),
    'pages' => array('course'),
    'context' => 'normal', // Where the meta box appear: normal (default), advanced, side. Optional.
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => __('Right Content Title', ''),
            'desc' => __(''),
            'id' => "{$oyeprefix}course_right_content_title",
            'type' => 'text'
        ),
        array(
            'name' => __('Right Content', ''),
            'id' => "{$oyeprefix}course_right_content",
            'type' => 'wysiwyg',
            'desc' => __(''),
        ),
        array(
            'name'    => __('Curriculum Vitae', ''),
            'id'    => "{$oyeprefix}course_curriculum_file",
            'type'        => 'file_advanced',
            'max_file_uploads'  => 1,
            'desc'    => __(''),
        ),
        
    )
);

if (($template_file == "pages/page-lecture.php")) {
    $meta_boxes[] = array(
        'id' => 'privacy_fields',
        'title' => __('General Fields', ''),
        'pages' => array('page'),
        'context' => 'normal', // Where the meta box appear: normal (default), advanced, side. Optional.
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Content Title', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}page_lecture_video_title",
                'type' => 'text'
            ),
            array(
                'name' => __('Content Sub Title', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}page_lecture_video_subtitle",
                'type' => 'text'
            ),
            array(
                'name' => __('Vimeo Video ID', ''),
                'id' => "{$oyeprefix}page_lecture_vimeo_video_id",
                'type' => 'text',
                'desc' => __(''),
            ),
            
        )
    );
}

if (($template_file == "pages/page-lecture.php")) {
    $meta_boxes[] = array(
        'id' => 'privacy_fields',
        'title' => __('General Fields', ''),
        'pages' => array('page'),
        'context' => 'normal', // Where the meta box appear: normal (default), advanced, side. Optional.
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Content Title', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}page_lecture_video_title",
                'type' => 'text'
            ),
            array(
                'name' => __('Content Sub Title', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}page_lecture_video_subtitle",
                'type' => 'text'
            ),
            array(
                'name' => __('Vimeo Video ID', ''),
                'id' => "{$oyeprefix}page_lecture_vimeo_video_id",
                'type' => 'text',
                'desc' => __(''),
            ),
            
        )
    );
}


if (($template_file == "pages/page-podcast.php")) {
    $meta_boxes[] = array(
        'id' => 'privacy_fields',
        'title' => __('General Fields', ''),
        'pages' => array('page'),
        'context' => 'normal', // Where the meta box appear: normal (default), advanced, side. Optional.
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Content Title', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}page_video_title",
                'type' => 'text'
            ),
            array(
                'name' => __('Content Sub Title', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}page_video_subtitle",
                'type' => 'text'
            ),
            array(
                'name' => __('Vimeo Video ID', ''),
                'id' => "{$oyeprefix}page_vimeo_video_id",
                'type' => 'text',
                'desc' => __(''),
            ),
            array(
                'name'    => __('Download Link', ''),
                'id'    => "{$oyeprefix}page_download_link",
                'type'        => 'text',
                'max_file_uploads'  => 1,
                'desc'    => __(''),
            ),

            array(
                'name'    => __('Download Link Title', ''),
                'id'    => "{$oyeprefix}page_download_link_title",
                'type'        => 'text',
                'desc'    => __(''),
            ),

            array(
                'name' => __('Right Content', ''),
                'id' => "{$oyeprefix}course_right_content",
                'type' => 'wysiwyg',
                'desc' => __(''),
            ),
            
        )
    );
}


if (($template_file == "pages/page-video.php")) {
    $meta_boxes[] = array(
        'id' => 'privacy_fields',
        'title' => __('General Fields', ''),
        'pages' => array('page'),
        'context' => 'normal', // Where the meta box appear: normal (default), advanced, side. Optional.
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Video Title', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}video_title",
                'type' => 'text'
            ),

            array(
                'name' => __('Vimeo Video ID', ''),
                'id' => "{$oyeprefix}vimeo_video_id",
                'type' => 'text',
                'desc' => __(''),
            ),
        )
    );
}

    $meta_boxes[] = array(
        'id' => 'privacy_fields',
        'title' => __('General Fields', ''),
        'pages' => array('video'),
        'context' => 'normal', // Where the meta box appear: normal (default), advanced, side. Optional.
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Sponsor by Title', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}sponsorby_title",
                'type' => 'text'
            ),
            array(
                'name' => __('Sponsor by Subtitle', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}sponsorby_subtitle",
                'type' => 'text'
            ),
            array(
                'name' => __('Sponsor by Discription', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}sponsorby_disc",
                'type' => 'WYSIWYG'
            ),
            array(
                'name' => __('Sponsor by Content', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}sponsorby_content",
                'type' => 'WYSIWYG'
            ),
            array(
                'name' => __('Vimeo Video ID', ''),
                'id' => "{$oyeprefix}vimeo_video_id",
                'type' => 'text',
                'desc' => __(''),
            ),
        )
    );


if (($template_file == "pages/page-bio.php")) {
    $meta_boxes[] = array(
        'id' => 'privacy_fields',
        'title' => __('General Fields', ''),
        'pages' => array('page'),
        'context' => 'normal', // Where the meta box appear: normal (default), advanced, side. Optional.
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Block1 Title', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}page_block1_title",
                'type' => 'text'
            ),
            array(
                'name' => __('Block1 Image', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}page_block1_image",
                'type' => 'file_advanced',
                'max_file_uploads' => 1
            ),
            array(
                'name' => __('Block1 Description', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}page_block1_description",
                'type' => 'textarea',
            ),

            array(
                'name' => __('Block1 Read More Link', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}page_block1_read_more_link",
                'type' => 'text',
            ),

            array(
                'name' => __('Block2 Title', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}page_block2_title",
                'type' => 'text'
            ),
            array(
                'name' => __('Block2 Image', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}page_block2_image",
                'type' => 'file_advanced',
                'max_file_uploads' => 1
            ),
            array(
                'name' => __('Block2 Description', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}page_block2_description",
                'type' => 'textarea',
            ),

            array(
                'name' => __('Block2 Read More Link', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}page_block2_read_more_link",
                'type' => 'text',
            ),

            array(
                'name' => __('Block3 Title', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}page_block3_title",
                'type' => 'text'
            ),
            array(
                'name' => __('Block3 Image', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}page_block3_image",
                'type' => 'file_advanced',
                'max_file_uploads' => 1
            ),
            array(
                'name' => __('Block3 Description', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}page_block3_description",
                'type' => 'textarea',
            ),

            array(
                'name' => __('Block3 Read More Link', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}page_block3_read_more_link",
                'type' => 'text',
            ),


            array(
                'name' => __('Block4 Title', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}page_block4_title",
                'type' => 'text'
            ),
            array(
                'name' => __('Block4 Image', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}page_block4_image",
                'type' => 'file_advanced',
                'max_file_uploads' => 1
            ),
            array(
                'name' => __('Block4 Description', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}page_block4_description",
                'type' => 'textarea',
            ),

            array(
                'name' => __('Block4 Read More Link', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}page_block4_read_more_link",
                'type' => 'text',
            ),

        )
    );
}


$meta_boxes[] = array(
        'id' => 'privacy_fields',
        'title' => __('General Fields', ''),
        'pages' => array('event'),
        'context' => 'normal', // Where the meta box appear: normal (default), advanced, side. Optional.
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Event Location', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}event_location",
                'type' => 'text'
            ),

            array(
                'name' => __('Event Date', ''),
                'id' => "{$oyeprefix}event_date",
                'type' => 'date',
                'desc' => __(''),
            ),

            array(
                'name' => __('Event Time', ''),
                'id' => "{$oyeprefix}event_time",
                'type' => 'time',
                'js_options' => array(
                        'timeFormat' => 'hh:mm TT',
                    ),
                'desc' => __(''),
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


$meta_boxes[] = array(
    'id'        => 'cookiesfields',
    'title'     => __('General Fields', ''),
    'pages'     => array('cookie_manager' ),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
        array(
            'name' => __('Geplaatst door', ''),
            'desc' => __('.', ''),
            'id'   => "{$oyeprefix}geplaatst_door",
            'type' => 'text',
        ),
        array(
            'name' => __('Termijn', ''),
            'desc' => __('.', ''),
            'id'   => "{$oyeprefix}termijn",
            'type' => 'text',
        ),
    )
);



if (($template_file == "pages/page-home.php")) {
    $meta_boxes[] = array(
        'id' => 'general_fields',
        'title' => __('General Fields', ''),
        'pages' => array('page'),
        'context' => 'normal', // Where the meta box appear: normal (default), advanced, side. Optional.
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Featured Video Title', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}featured_video_title",
                'type' => 'text'
            ),
            array(
                'name' => __('Featured Video Subtitle', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}featured_video_subtitle",
                'type' => 'text'
            ),
            array(
                'name' => __('Featured Video Content', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}featured_video_content",
                'type' => 'WYSIWYG'
            ),
            array(
                'name' => __('Featured Lecture Title', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}featured_lecture_title",
                'type' => 'text'
            ),
            array(
                'name' => __('Featured Lecture Subtitle', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}featured_lecture_subtitle",
                'type' => 'text'
            ),
            array(
                'name' => __('Featured Lecture Content', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}featured_lecture_content",
                'type' => 'WYSIWYG'
            ),
            array(
                'name' => __('Featured Podcast Title', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}featured_podcast_title",
                'type' => 'text'
            ),
            array(
                'name' => __('Featured Podcast Subtitle', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}featured_podcast_subtitle",
                'type' => 'text'
            ),
            array(
                'name' => __('Featured Podcast Content', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}featured_podcast_content",
                'type' => 'WYSIWYG'
            ),

            array(
                'name' => __('Upcoming Event Title', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}upcoming_event_title",
                'type' => 'text'
            ),
            array(
                'name' => __('Upcoming Event Sub Title', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}upcoming_event_subtitle",
                'type' => 'text'
            ),
            array(
                'name' => __('Show Upcoming Events', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}show_upcoming_event",
                'type' => 'select',
                'options' => array('1' => 'Yes', '0' => 'No' )
            ),
            array(
                'name' => __('Videos Section video ID', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}video_page_video_id",
                'type' => 'text'
            ),            
            array(
                'name'    => __('Videos Section Image', ''),
                'id'    => "{$oyeprefix}videos_section_image",
                'type'        => 'image_advanced',
                'max_file_uploads'  => 1,
                'desc'    => __(''),
            ),
            array(
                'name' => __('Videos Section Discription', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}video_page_disc",
                'type' => 'text'
            ),            
            array(
                'name' => __('video Section Url', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}video_page_url",
                'type' => 'text'
            ),            

            array(
                'name' => __('Lectures Section video ID', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}lectures_page_video_id",
                'type' => 'text'
            ),            
            array(
                'name'    => __('Lectures Section Image', ''),
                'id'    => "{$oyeprefix}lectures_section_image",
                'type'        => 'image_advanced',
                'max_file_uploads'  => 1,
                'desc'    => __(''),
            ),
            array(
                'name' => __('Lectures Section Discription', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}lectures_page_disc",
                'type' => 'text'
            ),            
            array(
                'name' => __('Lectures Section Url', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}lectures_page_url",
                'type' => 'text'
            ),            

            array(
                'name' => __('Podcast Section video ID', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}podcast_page_video_id",
                'type' => 'text'
            ),            
            array(
                'name'    => __('Podcast Section Image', ''),
                'id'    => "{$oyeprefix}podcast_section_image",
                'type'        => 'image_advanced',
                'max_file_uploads'  => 1,
                'desc'    => __(''),
            ),
            array(
                'name' => __('Podcast Section Discription', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}podcast_page_disc",
                'type' => 'text'
            ),            
            array(
                'name' => __('Podcast Section Url', ''),
                'desc' => __(''),
                'id' => "{$oyeprefix}podcast_page_url",
                'type' => 'text'
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