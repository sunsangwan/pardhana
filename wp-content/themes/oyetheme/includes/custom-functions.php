<?php
use OyeTheme\Helpers\CommonHelper;

use Oye\Helpers;

add_action( 'wp_footer', 'render_items_to_footer' );
function render_items_to_footer(){
    global $theme_opt;  
    $html = do_shortcode($theme_opt['contact_estimate_form_shortcode']);
    echo CommonHelper::wrapContentInPopup("estimate_popup", $html);
}


// add_action( 'wp_ajax_signup_newsletter', 'signup_newsletter' );
add_action( 'wp_ajax_nopriv_signup_newsletter', 'signup_newsletter' );
function signup_newsletter() {
	// include(locate_template('madmimi-php-master/MadMimi.class.php'));
	$email = Helpers::getVar('email');
	$response = CommonHelper::signupNewsletter($email);
	echo json_encode($response);
	die();
}