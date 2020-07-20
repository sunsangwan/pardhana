<?php
/*
 Template Name: Page Locations
 */

get_header();


global $post;
global $theme_opt;

$page = new \OyeTheme\Transformers\PageTransformer;
$data = $page->transformPageLocation($post);


?>

<?php
	$context = Timber::get_context();
	$context['data'] = $data;
	$context['post'] = new TimberPost();
	echo Timber::compile('views/page-location.twig', $context);
?>


<?php get_footer(); ?>
