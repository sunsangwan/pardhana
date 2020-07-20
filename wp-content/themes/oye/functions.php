<?php
require_once (dirname(__FILE__) . '/includes/field_redux_gruntcompile.php');
require_once (dirname(__FILE__) . '/includes/redux-config.php');
require_once (dirname(__FILE__) . '/includes/html-compression.php');
require_once (dirname(__FILE__) . '/includes/post-types.php');
require_once (dirname(__FILE__) . '/includes/sidebars.php');
require_once (dirname(__FILE__) . '/includes/metaboxes.php');
require_once (dirname(__FILE__) . '/includes/shortcodes.php');
require_once (dirname(__FILE__) . '/includes/theme-functions.php');
require_once (dirname(__FILE__) . '/includes/custom-functions.php');
require_once (dirname(__FILE__) . '/includes/helper.php');
require_once (dirname(__FILE__) . '/includes/oyevariables.php');

// DISABLE WPML CSS AND JS
define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
define('ICL_DONT_LOAD_LANGUAGES_JS', true);


// Remove wordpress Embedded script from Frontend
add_action( 'wp_footer', 'my_deregister_scripts' );
function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}

// Disable Contact Form 7 Js ad CSS from all pages
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

if ( class_exists("Redux") ) {
    Redux::init( 'theme_opt' );
    global $theme_opt;
    $disable_emoji = $theme_opt["disable_emoji"];
    // Disable Wordpress Emoji Script
    if ($disable_emoji) {
    	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    }
}

// Allow File Extension Upload Support
add_filter('upload_mimes', 'my_myme_types', 1, 1);
function my_myme_types($mime_types){
   $mime_types['eps']  = 'application/eps';
   return $mime_types;
}

// Function to use for wp_mail as html
function set_html_content_type() {
    return 'text/html';
}

add_action( 'wp_enqueue_scripts', 'oye_scripts' );
function oye_scripts() {
    global $variables;
    $template_directory_url = get_template_directory_uri();
    wp_enqueue_style( 'jquery-ui', $template_directory_url.'/bower_components/jquery-ui/themes/smoothness/jquery-ui.css', array(), '' );
    wp_enqueue_style( 'font-awesome', $template_directory_url.'/bower_components/font-awesome/css/font-awesome.css', array(), '' );
    wp_enqueue_style( 'bootstrap', $template_directory_url.'/assets/css/bootstrap.css', array(), '' );
    // wp_enqueue_style( 'bootstrap', $template_directory_url.'/assets/bootstrap/css/bootstrap.css', array(), '' );
    wp_enqueue_style( 'select2', $template_directory_url.'/bower_components/select2/dist/css/select2.css', array(), '' );
    wp_enqueue_style( 'helper_scss', $template_directory_url.'/css_sass/helper.css', array(), '' );
    wp_enqueue_style( 'app-scss', $template_directory_url.'/css_sass/app.css', array(), '' );
    wp_enqueue_style( 'style', $template_directory_url.'/style.css', array(), '' );

    wp_enqueue_script( "jquery-validate", $template_directory_url."/bower_components/jquery-validation/dist/jquery.validate.js", array('jquery'), '', false );
    wp_enqueue_script( "modernizr", $template_directory_url."/bower_components/modernizr/modernizr.js", array('jquery'), '', false );
    wp_enqueue_script( "jquery-ui", $template_directory_url."/bower_components/jquery-ui/jquery-ui.js", array('jquery'), '', false );
    wp_enqueue_script( "bootstrap", $template_directory_url."/bower_components/bootstrap/dist/js/bootstrap.js", array('jquery'), '', false );
    wp_enqueue_script( "jquery-browser", $template_directory_url."/bower_components/jquery.browser/dist/jquery.browser.js", array('jquery'), '', false );
    wp_enqueue_script( "js-cookie", $template_directory_url."/bower_components/js-cookie/src/js.cookie.js", array('jquery'), '', false );
    wp_enqueue_script( "select2", $template_directory_url."/bower_components/select2/dist/js/select2.js", array('jquery'), '', false );
    wp_enqueue_script( "jquery-popup-overlay", $template_directory_url."/bower_components/jquery-popup-overlay/jquery.popupoverlay.js", array('jquery'), '', false );
    wp_enqueue_script( "js-common", $template_directory_url."/assets/js/common.js", array('jquery'), '', false );
    wp_enqueue_script( "js-custom", $template_directory_url."/assets/js/custom.js", array('jquery'), '', false );
}

OyeVariables::init();
// var_dump($variables);

