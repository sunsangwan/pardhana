<?php

get_header();

$page = new \OyeTheme\Transformers\PageTransformer;
$data = $page->transformPageBlog(get_post(151));
$tags = get_tags();
?>


<?php
	$context = Timber::get_context();
	$context['data'] = $data;
	$context['tags'] = $tags;
	$context['post'] = new TimberPost();
	$context['pagination'] = Timber::get_pagination();


	echo Timber::compile('views/page-blog.twig', $context);
?>

<?php get_footer(); ?>
