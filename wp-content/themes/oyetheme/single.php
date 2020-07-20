<?php
/*
 Template Name: Page Blog
 */

get_header();


global $post;
global $theme_opt;

$page = new \OyeTheme\Transformers\PageTransformer;
$data = $page->transformPageBlogSingle($post);


?>


<?php
	$context = Timber::get_context();
	$context['data'] = $data;
	$context['post'] = new TimberPost();
	echo Timber::compile('views/single.twig', $context);
?>

<?php get_footer(); ?>
