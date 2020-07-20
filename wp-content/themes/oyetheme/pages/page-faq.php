<?php
/*
 Template Name: Page FAQ
 */

get_header();


global $post;
global $theme_opt;

$page = new \OyeTheme\Transformers\PageTransformer;
$data = $page->transformPageFAQ($post);
?>

<?php
	$context = Timber::get_context();
	$context['data'] = $data;
	$context['post'] = new TimberPost();
	echo Timber::compile('views/page-faq.twig', $context);
?>


<?php get_footer(); ?>
