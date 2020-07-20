<?php
global $theme_opt;

//[get_template_directory_uri]
function get_template_directory_uri_func ( $atts ){
  return get_template_directory_uri();
}
add_shortcode( 'get_template_directory_uri', 'get_template_directory_uri_func' );

function price_tab ($atts) {
	$attr = shortcode_atts( array(
		"category" => "",
		"title" => "",
    ), $atts );

    $section_category = $attr["category"];
    $section_title = $attr["title"];
	$default = array(
		'post_type' => 'pricetab',
		'posts_per_page' => '20',
		'order' => 'ASC',
		'pricetab_cat' => $section_category,
		);

		$posts = get_posts($default);


$output = '<div class="eyelashextensions_list">
			<ul>
					<h3 class="title">'.$section_title.'</h3>';  
					foreach ($posts as $post) { 
					$price = get_post_meta( $post->ID, 'oyemetatpl_price');
$output .= '<li>
				<div class="right">
					<h5>'.$post->post_title.'</h5>
					<div>'.$post->post_content.'</div>
				</div>
				<div class="left">
					<span>'.$price[0].'</span>
				</div>
			</li>';
				} ?>		
<?php $output .='</ul></div>';

return $output;
}
add_shortcode( 'price_tab', 'price_tab' );