<?php
	global $wp_query;
	$curauth = $wp_query->get_queried_object();
	$queryauthorid = $curauth->data->ID;
	$post->ID = 28;
	include(locate_template('pages/page-blog.php'));
?>