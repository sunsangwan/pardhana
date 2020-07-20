<?php
/*
 Template Name: Page Warranty
 */

get_header();


global $post;
global $theme_opt;

$page = new \OyeTheme\Transformers\PageTransformer;
$data = $page->transformPageWarranty($post);

?>
<?php
	$context = Timber::get_context();
	$context['data'] = $data;
	$context['post'] = new TimberPost();
	echo Timber::compile('views/page-warranty.twig', $context);
?>


<?php get_footer(); ?>
