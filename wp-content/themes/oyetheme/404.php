<?php
get_header();


global $post;
global $theme_opt;

$page = new \OyeTheme\Transformers\PageTransformer;
$data = $page->transformPageDefault($post);


?>
<?php
	$context = Timber::get_context();
	$context['data'] = $data;
	$context['post'] = new TimberPost();
	echo Timber::compile('views/page-404.twig', $context);
?>

<?php get_footer(); ?>
