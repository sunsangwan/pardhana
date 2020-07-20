<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "theme_opt";
    
    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }
$icons = array(
    "fa-adn",
    "fa-android",
    "fa-apple",
    "fa-behance",
    "fa-behance-square",
    "fa-bitbucket",
    "fa-bitbucket-square",
    "fa-bitcoin",
    "fa-btc",
    "fa-codepen",
    "fa-css3",
    "fa-delicious",
    "fa-deviantart",
    "fa-digg",
    "fa-dribbble",
    "fa-dropbox",
    "fa-drupal",
    "fa-empire",
    "fa-facebook",
    "fa-facebook-square",
    "fa-flickr",
    "fa-foursquare",
    "fa-ge",
    "fa-git",
    "fa-git-square",
    "fa-github",
    "fa-github-alt",
    "fa-github-square",
    "fa-gittip",
    "fa-google",
    "fa-google-plus",
    "fa-google-plus-square",
    "fa-hacker-news",
    "fa-html5",
    "fa-instagram",
    "fa-joomla",
    "fa-jsfiddle",
    "fa-linkedin",
    "fa-linkedin-square",
    "fa-linux",
    "fa-maxcdn",
    "fa-openid",
    "fa-pagelines",
    "fa-pied-piper",
    "fa-pied-piper-alt",
    "fa-pied-piper-square",
    "fa-pinterest",
    "fa-pinterest-square",
    "fa-qq",
    "fa-ra",
    "fa-rebel",
    "fa-reddit",
    "fa-reddit-square",
    "fa-renren",
    "fa-share-alt",
    "fa-share-alt-square",
    "fa-skype",
    "fa-slack",
    "fa-soundcloud",
    "fa-spotify",
    "fa-stack-exchange",
    "fa-stack-overflow",
    "fa-steam",
    "fa-steam-square",
    "fa-stumbleupon",
    "fa-stumbleupon-circle",
    "fa-tencent-weibo",
    "fa-trello",
    "fa-tumblr",
    "fa-tumblr-square",
    "fa-twitter",
    "fa-twitter-square",
    "fa-vimeo-square",
    "fa-vine",
    "fa-vk",
    "fa-wechat",
    "fa-weibo",
    "fa-weixin",
    "fa-windows",
    "fa-wordpress",
    "fa-xing",
    "fa-xing-square",
    "fa-yahoo",
    "fa-youtube",
    "fa-youtube-play",
    "fa-youtube-square"
);
preg_match_all("/(fa-.*?):before/", $toParse, $output_array);

foreach( $output_array[1] as $icon ) {
    echo $icon;
}
    /*
     *
     * --> Action hook examples
     *
     */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');


    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'redux-framework-demo' ),
        'page_title'           => __( 'Theme Options', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => false,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'system_info'          => false,
        // REMOVE

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'redux-framework-demo' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>To access any of your saved options from within your code you can use global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
    } else {
        
        //$args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
    }

    // Add content after the form.
    //$args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields

    Redux::setSection( $opt_name, array(
        'title' => __( 'Basic Fields', 'redux-framework-demo' ),
        'id'    => 'basic',
        'desc'  => __( '', 'redux-framework-demo' ),
        'icon'  => 'el el-home'
    ) );


    Redux::setSection( $opt_name, array(
        'title'      => __( 'General', 'redux-framework-demo' ),
        'id'         => 'general-fields',
        'subsection' => true,
        'desc'       => "",
        'fields'     => array(
            array(
                'id'            => 'opt-import-export',
                'type'          => 'gruntcompile',
                'title'         => 'Import Export',
                'subtitle'      => 'Save and restore your Redux options',
                'full_width'    => false,
            ),
            array(
                'id'       => 'is_debug',
                'type'     => 'switch',
                'title'    => 'Debug Mode',
                'default'  => '1',
                'private' => 1
            ),
            array(
                'id'       => 'is_pageloader',
                'type'     => 'switch',
                'title'    => 'Show Pageloader',
                'default'  => '0',
            ),
            array(
                'id'       => 'is_compresspage',
                'type'     => 'switch',
                'title'    => 'Compress Pages',
                'default'  => '0',
            ),
            array(
                'id'       => 'disable_emoji',
                'type'     => 'switch',
                'title'    => 'Disable Emoji Script',
                'default'  => '0',
            ),

             array(
                'id'       => 'head_start_customcode',
                'type'     => 'textarea',
                'title'    => 'Code Ater Head Start Tag',
                'default'  => '',
            ),

            array(
                'id'       => 'head_close_customcode',
                'type'     => 'textarea',
                'title'    => 'Code Before Head Closing Tag',
                'default'  => '',
            ),
            array(
                'id'       => 'body_start_customcode',
                'type'     => 'textarea',
                'title'    => 'Code After Body Start Tag',
                'default'  => '',
            ),
            array(
                'id'       => 'body_close_customcode',
                'type'     => 'textarea',
                'title'    => 'Code Before Body Closing Tag',
                'default'  => '',
            ),
            array(
                'id'       => 'homepage_map_image',
                'type'     => 'media',
                'title'    => 'Homepage map image',
                'default'  => '',
            ),
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Header', 'redux-framework-demo' ),
        'id'         => 'header-fields',
        'subsection' => true,
        'desc'       => "",
        'fields'     => array(
            array(
                'id'       => 'header_logo_normal',
                'type'     => 'media',
                'title'    => 'Logo Header',
                'default'  => '',
            ),
        )
    ));


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Common', 'redux-framework-demo' ),
        'id'         => 'common-fields',
        'subsection' => true,
        'desc'       => "",
        'fields'     => array(
            array(
                'id'       => 'testimonial_heading',
                'type'     => 'text',
                'title'    => 'Testimonial Heading',
                'default'  => '',
            ),
            array(
                'id'       => 'testimonial_sub_heading',
                'type'     => 'text',
                'title'    => 'Testimonial Sub Heading',
                'default'  => '',
            ),

            array(
                'id'       => 'our_team_heading',
                'type'     => 'text',
                'title'    => 'Our Team Heading',
                'default'  => '',
            ),
            array(
                'id'       => 'our_team_sub_heading',
                'type'     => 'text',
                'title'    => 'Our Team Sub Heading',
                'default'  => '',
            ),

            array(
                'id'       => 'why_choose_us_heading',
                'type'     => 'text',
                'title'    => 'Why Choose Us Heading',
                'default'  => '',
            ),
            array(
                'id'       => 'why_choose_us_sub_heading',
                'type'     => 'text',
                'title'    => 'Why Choose Us Sub Heading',
                'default'  => '',
            ),


            array(
                'id'       => 'recent_article_heading',
                'type'     => 'text',
                'title'    => 'Recent Article Sub Heading',
                'default'  => '',
            ),
            array(
                'id'       => 'tags_heading',
                'type'     => 'text',
                'title'    => 'Tags Sub Heading',
                'default'  => '',
            ),
            array(
                'id'       => 'estimate_link',
                'type'     => 'text',
                'title'    => 'Estimate Link',
                'default'  => '',
            ),
            array(
                'id'       => 'map_address_link',
                'type'     => 'text',
                'title'    => 'Map address link',
                'default'  => '',
            ),
            array(
                'id'       => 'contact_page_link',
                'type'     => 'text',
                'title'    => 'Contact page link',
                'default'  => '',
            ),
        )
    ));


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Newsletter Form', 'redux-framework-demo' ),
        'id'         => 'newsletter-form-fields',
        'subsection' => true,
        'desc'       => "",
        'fields'     => array(
            array(
                'id'       => 'newsletter_form_heading',
                'type'     => 'text',
                'title'    => 'Newsletter Form Heading',
                'default'  => '',
            ),

            array(
                'id'       => 'signup_button_text',
                'type'     => 'text',
                'title'    => 'Signup Button Heading',
                'default'  => '',
            ),

            array(
                'id'       => 'newsletter_api_key',
                'type'     => 'text',
                'title'    => 'Newsletter API key',
                'default'  => '',
            ),

            array(
                'id'       => 'newsletter_api_list_name',
                'type'     => 'text',
                'title'    => 'Newsletter API List Name',
                'default'  => '',
            ),

            array(
                'id'       => 'newsletter_api_email',
                'type'     => 'text',
                'title'    => 'Newsletter API Email',
                'default'  => '',
            ),

            array(
                'id'       => 'newsletter_success_message',
                'type'     => 'textarea',
                'title'    => 'Newsletter Success Message',
                'default'  => '',
            ),

            array(
                'id'       => 'newsletter_failed_message',
                'type'     => 'textarea',
                'title'    => 'Newsletter Failed Message',
                'default'  => '',
            ),
        )
    ));


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Footer', 'redux-framework-demo' ),
        'id'         => 'footer-fields',
        'subsection' => true,
        'desc'       => "",
        'fields'     => array(            
            array(
                'id'       => 'footer_quick_link_title',
                'type'     => 'text',
                'title'    => 'Footer quick link title',
                'default'  => '',
            ),
            array(
                'id'       => 'footer_repair_service_title',
                'type'     => 'text',
                'title'    => 'Footer repair service title',
                'default'  => '',
            ),
            array(
                'id'       => 'footer_follow_title',
                'type'     => 'text',
                'title'    => 'Footer follow title',
                'default'  => '',
            ),
            array(
                'id'       => 'footer_facebook_link',
                'type'     => 'text',
                'title'    => 'Footer facebook link',
                'default'  => '',
            ),
            array(
                'id'       => 'footer_twitter_link',
                'type'     => 'text',
                'title'    => 'Footer twitter link',
                'default'  => '',
            ),
            array(
                'id'       => 'footer_linkedin_link',
                'type'     => 'text',
                'title'    => 'Footer linkedin link',
                'default'  => '',
            ),
            array(
                'id'       => 'footer_yelp_link',
                'type'     => 'text',
                'title'    => 'Footer yelp link',
                'default'  => '',
            ),
            array(
                'id'       => 'footer_youtube_link',
                'type'     => 'text',
                'title'    => 'Footer youtube link',
                'default'  => '',
            ),
            array(
                'id'       => 'footer_foursquare_link',
                'type'     => 'text',
                'title'    => 'Footer foursquare link',
                'default'  => '',
            ),
            array(
                'id'       => 'footer_chrysler_camera_logo',
                'type'     => 'media',
                'title'    => 'Footer chrysler camera logo',
                'default'  => '',
            ),
            array(
                'id'       => 'footer_chrysler_camera_link',
                'type'     => 'text',
                'title'    => 'Footer chrysler camera link',
                'default'  => '',
            ),
            array(
                'id'       => 'footer_citysearch_logo',
                'type'     => 'media',
                'title'    => 'Footer citysearch logo',
                'default'  => '',
            ),
            array(
                'id'       => 'footer_citysearch_link',
                'type'     => 'text',
                'title'    => 'Footer citysearch link',
                'default'  => '',
            ),
            array(
                'id'       => 'footer_accredited_logo',
                'type'     => 'media',
                'title'    => 'Footer accredited logo',
                'default'  => '',
            ),
            array(
                'id'       => 'footer_accredited_link',
                'type'     => 'text',
                'title'    => 'Footer accredited link',
                'default'  => '',
            ),
            array(
                'id'       => 'footer_repair_logo',
                'type'     => 'media',
                'title'    => 'Footer repair logo',
                'default'  => '',
            ),
            array(
                'id'       => 'footer_repair_link',
                'type'     => 'text',
                'title'    => 'Footer repair link',
                'default'  => '',
            ),
            array(
                'id'       => 'footer_yelp_logo',
                'type'     => 'media',
                'title'    => 'Footer yelp logo',
                'default'  => '',
            ),
            array(
                'id'       => 'footer_copyright',
                'type'     => 'text',
                'title'    => 'Copyright',
                'default'  => '',
                'description' => 'Custom Tags: {year}'
            ),
            array(
                'id'       => 'footer_copyright_logo',
                'type'     => 'media',
                'title'    => 'Footer copyright logo',
                'default'  => '',
            ),
        )
    ));
   



    Redux::setSection( $opt_name, array(
        'title'      => __( 'Contact', 'redux-framework-demo' ),
        'id'         => 'contact-fields',
        'subsection' => true,
        'desc'       => "",
        'fields'     => array(
            array(
                'id'       => 'contact_info_title',
                'type'     => 'text',
                'title'    => 'Contact info title',
                'default'  => '',
            ),
            array(
                'id'       => 'contact_form_title',
                'type'     => 'text',
                'title'    => 'Contact form title',
                'default'  => '',
            ),
            array(
                'id'       => 'contact_address_title',
                'type'     => 'text',
                'title'    => 'Contact address title',
                'default'  => '',
            ),
            array(
                'id'       => 'contact_address',
                'type'     => 'text',
                'title'    => 'Contact address',
                'default'  => '',
            ),
            array(
                'id'       => 'contact_phone_title',
                'type'     => 'text',
                'title'    => 'Contact phone title',
                'default'  => '',
            ),
            array(
                'id'       => 'contact_phone_text',
                'type'     => 'text',
                'title'    => 'Contact phone text',
                'default'  => '',
            ),
            array(
                'id'       => 'contact_email_title',
                'type'     => 'text',
                'title'    => 'Contact email title',
                'default'  => '',
            ),
            array(
                'id'       => 'contact_email_text',
                'type'     => 'text',
                'title'    => 'Contact email text',
                'default'  => '',
            ),
            array(
                'id'       => 'contact_timing',
                'type'     => 'text',
                'title'    => 'Contact timing',
                'default'  => '',
            ),
            array(
                'id'       => 'contact_form_shortcode',
                'type'     => 'text',
                'title'    => 'Contact form shortcode',
                'default'  => '',
            ),
            array(
                'id'       => 'contact_form_note',
                'type'     => 'text',
                'title'    => 'Contact form note',
                'default'  => '',
            ),
            array(
                'id'       => 'contact_form_note_link_text',
                'type'     => 'text',
                'title'    => 'Contact form note link text',
                'default'  => '',
            ),
            array(
                'id'       => 'contact_form_note_link',
                'type'     => 'text',
                'title'    => 'Contact form note link',
                'default'  => '',
            ),
            array(
                'id'       => 'contact_form_address_iframe_url',
                'type'     => 'textarea',
                'title'    => 'Address Iframe Url',
                'default'  => '',
            ),
            array(
                'id'       => 'contact_estimate_form_shortcode',
                'type'     => 'text',
                'title'    => 'Estimate form shortcode',
                'default'  => '',
            ),
        )
    ) );


    if(PAGE_404) {
        Redux::setSection( $opt_name, array(
            'title'      => __( '404', 'redux-framework-demo' ),
            'id'         => 'error-fields',
            'subsection' => true,
            'desc'       => "",
            'fields'     => array(
                array(
                    'id'       => 'pagenotfound_title',
                    'type'     => 'text',
                    'title'    => 'Title',
                    'default'  => 'Helaas. de opgevraagde pagina bestaat niet.',
                ),
                array(
                    'id'       => 'pagenotfound_button_text',
                    'type'     => 'text',
                    'title'    => 'Button Text',
                    'default'  => 'Naar homepage',
                ),
                array(
                    'id'       => 'pagenotfound_button_link',
                    'type'     => 'text',
                    'title'    => 'Button Link',
                    'default'  => '',
                ),
                array(
                    'id'       => 'pagenotfound_page_background_color',
                    'type'     => 'color',
                    'title'    => 'Page Background',
                    'default'  => '#009241',
                ),
                array(
                    'id'       => 'pagenotfound_page_text_color',
                    'type'     => 'color',
                    'title'    => 'Page Text Color',
                    'default'  => '#fff',
                ),
                array(
                    'id'       => 'pagenotfound_button_background_color',
                    'type'     => 'color',
                    'title'    => 'Button Background',
                    'default'  => '#fff',
                ),
                array(
                    'id'       => 'pagenotfound_button_text_color',
                    'type'     => 'color',
                    'title'    => 'Button Text color',
                    'default'  => '#000',
                ),
                array(
                    'id'       => 'pagenotfound_button_hover_background_color',
                    'type'     => 'color',
                    'title'    => 'Button Hover Background',
                    'default'  => '#f5f5f5',
                ),
                array(
                    'id'       => 'pagenotfound_button_hover_text_color',
                    'type'     => 'color',
                    'title'    => 'Button Hover Text Color',
                    'default'  => '#000',
                ),
              

            )
        ));
    }
    
    if(PAGE_OLDBROWSER) {
        Redux::setSection( $opt_name, array(
            'title'      => __( 'Old Browser', 'redux-framework-demo' ),
            'id'         => 'oldbrowser_fields',
            'subsection' => true,
            'desc'       => "",
            'fields'     => array(
                array(
                    'id'       => 'oldbrowser_title',
                    'type'     => 'text',
                    'title'    => 'Title',
                    'default'  => 'Oeps.. uw browser is écht aan vernieuwing toe.',
                ),
                array(
                    'id'       => 'oldbrowser_download_here_title',
                    'type'     => 'text',
                    'title'    => 'Download Here Label',
                    'default'  => 'download hier:',
                ),
                array(
                    'id'       => 'oldbrowser_chrome_image',
                    'type'     => 'media',
                    'title'    => 'Chrome Image',
                    'default'  => '',
                ),
                array(
                    'id'       => 'oldbrowser_chrome_downloadlink',
                    'type'     => 'text',
                    'title'    => 'Chrome Download Link',
                    'default'  => 'https://www.google.nl/chrome/browser/desktop/',
                ),
                array(
                    'id'       => 'oldbrowser_firefox_image',
                    'type'     => 'media',
                    'title'    => 'Firefox Image',
                    'default'  => '',
                ),
                array(
                    'id'       => 'oldbrowser_firefox_downloadlink',
                    'type'     => 'text',
                    'title'    => 'Firefox Download Link',
                    'default'  => 'https://www.mozilla.org/nl/firefox/new/',
                ),
                array(
                    'id'       => 'oldbrowser_ie_image',
                    'type'     => 'media',
                    'title'    => 'IE Image',
                    'default'  => '',
                ),
                array(
                    'id'       => 'oldbrowser_ie_downloadlink',
                    'type'     => 'text',
                    'title'    => 'IE Download Link',
                    'default'  => 'http://windows.microsoft.com/en-IN/internet-explorer/download-ie',
                ),
                array(
                    'id'       => 'oldbrowser_page_background_color',
                    'type'     => 'color',
                    'title'    => 'Page Background',
                    'default'  => '#009241',
                ),
                array(
                    'id'       => 'oldbrowser_page_text_color',
                    'type'     => 'color',
                    'title'    => 'Text Color',
                    'default'  => '#ffffff',
                ),
            )
        ));
        
    }

    if(MODULE_COOKIE) {
        Redux::setSection( $opt_name, array(
            'title'      => __( 'Cookie Message', 'redux-framework-demo' ),
            'id'         => 'cookie_message_fields',
            'subsection' => true,
            'desc'       => "",
            'fields'     => array(
                array(
                    'id'       => 'cookie_message_title',
                    'type'     => 'text',
                    'title'    => 'Title',
                    'default'  => 'onze cookies.',
                    'public' => 1
                ),
                array(
                    'id'       => 'cookie_message_description',
                    'type'     => 'textarea',
                    'title'    => 'Description',
                    'default'  => 'Onze website maakt gebruik van cookies. We doen dit om de prestaties van onze website te optimaliseren en in staat zijn om onze diensten en marketing aan te passen aan onze bezoekers. Accepteert u dat wij plaatsen deze cookies? Bekijk ons %s voor meer informatie over de specifieke cookies plaatsen we.', 'oyetheme_cookiemessage',
                ),
                array(
                    'id'       => 'cookie_message_privacy_policy_title',
                    'type'     => 'text',
                    'title'    => 'Privacy Policy Title',
                    'default'  => 'privacybeleid',
                ),
                array(
                    'id'       => 'cookie_message_privacy_policy_link',
                    'type'     => 'text',
                    'title'    => 'Priacy Policy Link',
                    'default'  => '/privacy-policy',
                ),
                array(
                    'id'       => 'cookie_message_donotshowagain_title',
                    'type'     => 'text',
                    'title'    => 'Do Not Show Again Title',
                    'default'  => 'NIET MEER TONEN',
                ),
                array(
                    'id'       => 'cookie_message_strip_we_accept_title',
                    'type'     => 'text',
                    'title'    => 'Strip We Accept Title',
                    'default'  => 'We gebruiken',
                ),
                array(
                    'id'       => 'cookie_message_strip_cookies_title',
                    'type'     => 'text',
                    'title'    => 'Strip Cookies Tilte',
                    'default'  => 'cookies',
                ),
                array(
                    'id'       => 'cookie_message_strip_iagree_title',
                    'type'     => 'text',
                    'title'    => 'Strip I agree title',
                    'default'  => 'Vind ik goed',
                ),
               
            )
        ));
    }


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Overlay Menu', 'redux-framework-demo' ),
        'id'         => 'overlaymenu_fields',
        'subsection' => true,
        'desc'       => "",
        'fields'     => array(
            array(
                'id'       => 'menu_overlay_background',
                'type'     => 'color',
                'title'    => 'Menu Background',
                'default'  => '#fff',
            ),

            array(
                'id'       => 'menu_overlay_color',
                'type'     => 'color',
                'title'    => 'Menu Text Color',
                'default'  => '#000',
            ),

            array(
                'id'       => 'menu_overlay_name',
                'type'     => 'text',
                'title'    => 'Wordpress Menu name',
                'default'  => 'header_menu',
            ),
        )
    ));


    Redux::setSection( $opt_name, array(
        'title'      => __( 'API', 'redux-framework-demo' ),
        'id'         => 'api-fields',
        'subsection' => true,
        'desc'       => "",
        'fields'     => array(
            array(
                'id'       => 'googlemap_apikey',
                'type'     => 'text',
                'title'    => 'Google Map API Key',
                'default'  => '',
            ),

            array(
                'id'       => 'mailchimp_apikey',
                'type'     => 'text',
                'title'    => 'Mailchimp API Key',
                'default'  => '',
            ),

            array(
                'id'       => 'mailchimp_apifieldkey',
                'type'     => 'text',
                'title'    => 'Mailchimp List Field Key',
                'default'  => '',
            ),
        )
    ));
    


    Redux::setSection( $opt_name, array(
        'title' => __( 'Mail Configuration', 'mail-configuration-menu' ),
        'id'    => 'basic_mail_group',
        'desc'  => __( '', 'mail-configuration-menu' ),
        'icon'  => 'el el-home'
    ));

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Basic Mail Setting', 'mail-configuration-menu' ),
        'id'         => 'basic_mail_configuration',
        'subsection' => true,
        'desc'       => "",
        'fields'     => array(
            array(
                'id'       => 'mailcfg_admin_email',
                'type'     => 'text',
                'title'    => 'Admin Email',
                'default'  => '',
            ),
        )
    ));

    Redux::setSection( $opt_name, array(
        'title' => __( 'Get an Estimate', 'get-an-estimate-menu' ),
        'id'    => 'get-an-estimate-section',
        'desc'  => __( '', 'get-an-estimate-menu' ),
        'icon'  => 'el el-home'
    ));

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Section Get an Estimate', 'get-an-estimate-menu' ),
        'id'         => 'section_get_an_estimate',
        'subsection' => true,
        'desc'       => "",
        'fields'     => array(
            array(
                'id'       => 'estimate_heading',
                'type'     => 'text',
                'title'    => 'Estimate Heading',
                'default'  => '',
            ),
            array(
                'id'       => 'estimate_warranty_work_text',
                'type'     => 'text',
                'title'    => 'Estimate warranty work text',
                'default'  => '',
            ),
            array(
                'id'       => 'estimate_non_warranty_work_text',
                'type'     => 'text',
                'title'    => 'Estimate Non warranty work text',
                'default'  => '',
            ),
            array(
                'id'       => 'estimate_get_an_estimate_btn_text',
                'type'     => 'text',
                'title'    => 'Estimate Get an estimate button text',
                'default'  => '',
            ),
            array(
                'id'       => 'estimate_get_an_estimate_btn_link',
                'type'     => 'text',
                'title'    => 'Estimate Get an estimate button link',
                'default'  => '',
            ),

            array(
                'id'       => 'estimate_shipping_form_btn_text',
                'type'     => 'text',
                'title'    => 'Estimate shipping form button text',
                'default'  => '',
            ),
            array(
                'id'       => 'estimate_shipping_form_btn_link',
                'type'     => 'text',
                'title'    => 'Estimate shipping form button link',
                'default'  => '',
            ),

            array(
                'id'       => 'estimate_process_image_desktop',
                'type'     => 'media',
                'title'    => 'Estimate Process Desktop Image',
                'default'  => '',
            ),
            array(
                'id'       => 'estimate_process_image_mobile',
                'type'     => 'media',
                'title'    => 'Estimate Process Mobile Image',
                'default'  => '',
            ),
        )
    ));

    Redux::setSection( $opt_name, array(
        'title' => __( 'Section Warranty work', 'estimate-section-warranty-work' ),
        'id'    => 'estimate-section-warranty-work-section',
        'desc'  => __( '', 'estimate-section-warranty-work' ),
        'icon'  => 'el el-home'
    ));

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Section warranty work', 'estimate-section-warranty-work' ),
        'id'         => 'estimate-section-warranty-work',
        'subsection' => true,
        'desc'       => "",
        'fields'     => array(
            array(
                'id'       => 'estimate_warranty_work_form_title',
                'type'     => 'editor',
                'title'    => 'Estimate warranty work title',
                'default'  => '',
            ),
            array(
                'id'       => 'estimate_warranty_work_form_image',
                'type'     => 'media',
                'title'    => 'Estimate warranty work image',
                'default'  => '',
            ),
            array(
                'id'       => 'estimate_warranty_work_form_image_hover',
                'type'     => 'media',
                'title'    => 'Estimate warranty work image hover',
                'default'  => '',
            ),

            array(
                'id'       => 'estimate_bring_equipment_title',
                'type'     => 'editor',
                'title'    => 'Estimate bring Equipment title',
                'default'  => '',
            ),
            array(
                'id'       => 'estimate_bring_equipment_image',
                'type'     => 'media',
                'title'    => 'Estimate bring Equipment image',
                'default'  => '',
            ),
            array(
                'id'       => 'estimate_bring_equipment_image_hover',
                'type'     => 'media',
                'title'    => 'Estimate bring Equipment image hover',
                'default'  => '',
            ),

            array(
                'id'       => 'estimate_ticket_assigned_title',
                'type'     => 'editor',
                'title'    => 'Estimate Ticket Assigned title',
                'default'  => '',
            ),
            array(
                'id'       => 'estimate_ticket_assigned_image',
                'type'     => 'media',
                'title'    => 'Estimate Ticket Assigned image',
                'default'  => '',
            ),
            array(
                'id'       => 'estimate_ticket_assigned_image_hover',
                'type'     => 'media',
                'title'    => 'Estimate Ticket Assigned image hover',
                'default'  => '',
            ),

            array(
                'id'       => 'estimate_technician_problem_title',
                'type'     => 'editor',
                'title'    => 'Estimate Technician problem title',
                'default'  => '',
            ),
            array(
                'id'       => 'estimate_technician_problem_image',
                'type'     => 'media',
                'title'    => 'Estimate Technician problem image',
                'default'  => '',
            ),
            array(
                'id'       => 'estimate_technician_problem_image_hover',
                'type'     => 'media',
                'title'    => 'Estimate Technician problem image hover',
                'default'  => '',
            ),

            array(
                'id'       => 'estimate_get_approval_title',
                'type'     => 'editor',
                'title'    => 'Estimate Get approval title',
                'default'  => '',
            ),
            array(
                'id'       => 'estimate_get_approval_image',
                'type'     => 'media',
                'title'    => 'Estimate Get approval image',
                'default'  => '',
            ),
            array(
                'id'       => 'estimate_get_approval_image_hover',
                'type'     => 'media',
                'title'    => 'Estimate Get approval image hover',
                'default'  => '',
            ),

            array(
                'id'       => 'estimate_work_on_camera_title',
                'type'     => 'editor',
                'title'    => 'Estimate Work on Camera title',
                'default'  => '',
            ),
            array(
                'id'       => 'estimate_work_on_camera_image',
                'type'     => 'media',
                'title'    => 'Estimate Work on Camera image',
                'default'  => '',
            ),
            array(
                'id'       => 'estimate_work_on_camera_image_hover',
                'type'     => 'media',
                'title'    => 'Estimate Work on Camera image hover',
                'default'  => '',
            ),

            array(
                'id'       => 'estimate_ship_you_back_title',
                'type'     => 'editor',
                'title'    => 'Estimate Ship you back title',
                'default'  => '',
            ),
            array(
                'id'       => 'estimate_ship_you_back_image',
                'type'     => 'media',
                'title'    => 'Estimate Ship you back image',
                'default'  => '',
            ),
            array(
                'id'       => 'estimate_ship_you_back_image_hover',
                'type'     => 'media',
                'title'    => 'Estimate Ship you back image hover',
                'default'  => '',
            ),


        )
    ));


    // Redux::setSection( $opt_name, array(
    //     'title'      => __( 'General Pages', 'redux-framework-demo' ),
    //     'id'         => 'general-pages-fields',
    //     'subsection' => true,
    //     'desc'       => "",
    //     'fields'     => array(
    //         // array(
    //         //     'id'       => 'gebeurtenissen_overview_page_id',
    //         //     'type'     => 'select',
    //         //     'data'     => 'pages',
    //         //     'title'    => 'Gebeurtenissen Overview Page'
    //         // ),
       
    //     )
    // ));

    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'redux-framework-demo' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content'  => file_get_contents( dirname( __FILE__ ) . '/../README.md' )
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    function compiler_action( $options, $css, $changed_values ) {
        echo '<h1>The compiler hook has run!</h1>';
        echo "<pre>";
        print_r( $changed_values ); // Values that have changed since the last save
        echo "</pre>";
        //print_r($options); //Option values
        //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    function dynamic_section( $sections ) {
        //$sections = array();
        $sections[] = array(
            'title'  => __( 'Section via hook', 'redux-framework-demo' ),
            'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
            'icon'   => 'el el-paper-clip',
            // Leave this as a blank section, no options just some intro text set above.
            'fields' => array()
        );

        return $sections;
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    function change_arguments( $args ) {
        $args['dev_mode'] = false;

        return $args;
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    function change_defaults( $defaults ) {
        $defaults['str_replace'] = 'Testing filter hook!';

        return $defaults;
    }

    // Remove the demo link and the notice of integrated demo from the redux-framework plugin
    function remove_demo() {

        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            remove_filter( 'plugin_row_meta', array(
                ReduxFrameworkPlugin::instance(),
                'plugin_metalinks'
            ), null, 2 );

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
        }
    }
