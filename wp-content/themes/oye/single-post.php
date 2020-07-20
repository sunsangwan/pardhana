<?php

get_header();

$postid = $post->ID;

// $authorid = $post->post_author;
// $firstname = get_the_author_meta('first_name' , $authorid);
// $lastname = get_the_author_meta('last_name' , $authorid);
// $authorquote = get_the_author_meta('description' , $authorid);
// $authoravtar = get_avatar_url($authorid);


$metadata = get_post_meta($post->ID);

?>

<div class="singleblogct" id="main">
	<div class="singleblog-inner"></div>
</div>

<?php get_footer(); ?>