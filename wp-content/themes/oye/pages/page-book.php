<?php
/*
 * Template Name: Page Book
 */

get_header();


$args = array(
	'post_type'   => 'book',
	'posts_per_page'   => '-1',
	'orderby'     => 'date',
	'order' => 'DESC',
	'post_status' => 'publish',
	'suppress_filters' => false,
	'ignore_custom_sort' => true,
);

$posts = get_posts($args);

?>

<div class="homeCt" id="main">
	<div class="main-inner">
		<div class="container">
			<div class="row booksall">
				<?php
					foreach ($posts as $post):
						$featured_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
					 ?>

			       	<div class="col-md-4 mb30 xs-mb20 sm-mb20">
				       	<div class="block-info">
				       		<div class="bgimage" style="background-image:url('<?php echo $featured_image; ?>')"></div>
				       		<h3><?php echo $post->post_title; ?></h3>
				       		<div class="description">
				       			<?php echo wpautop($post->post_content); ?>
				       		</div>
				       	</div>
			        </div>
				<?php
				endforeach;
				?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
