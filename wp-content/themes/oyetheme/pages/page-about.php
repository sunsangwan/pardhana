<?php
/*
 Template Name: Page AboutUs
 */

get_header();


global $post;
global $theme_opt;

$page = new \OyeTheme\Transformers\PageTransformer;
$data = $page->transformPageAboutus($post);

// var_dump($data->ourteam_posts);
//exit;
?>

<?php
	$context = Timber::get_context();
	$context['data'] = $data;
	$context['post'] = new TimberPost();
	echo Timber::compile('views/page-about.twig', $context);
?>

<?php get_footer(); ?>
