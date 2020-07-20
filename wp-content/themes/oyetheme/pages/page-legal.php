<?php
/*
 Template Name: Page Legal
 */
// include(locate_template('head.php'));
get_header();


global $post;

$page = new \OyeTheme\Transformers\PageTransformer;
$data = $page->transformPageLegal($post);

?>

<?php
	$context = Timber::get_context();
	$context['data'] = $data;
	$context['post'] = new TimberPost();
	echo Timber::compile('views/page-legal.twig', $context);
?>

<?php get_footer(); ?>
