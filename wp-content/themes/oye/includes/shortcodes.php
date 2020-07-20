<?php
global $theme_opt;

//[get_template_directory_uri]
function get_template_directory_uri_func ( $atts ){
  return get_template_directory_uri();
}
add_shortcode( 'get_template_directory_uri', 'get_template_directory_uri_func' );
