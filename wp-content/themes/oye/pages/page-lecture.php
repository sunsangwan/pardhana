<?php
/*
 * Template Name: Page Lecture
 */

get_header();

global $post;

$video_title = get_post_meta($post->ID, 'oyemetatpl_page_lecture_video_title', true);
$video_subtitle = get_post_meta($post->ID, 'oyemetatpl_page_lecture_video_subtitle', true);
$vimeo_video_id = get_post_meta($post->ID, 'oyemetatpl_page_lecture_vimeo_video_id', true);

$args_lecture = array(
	'post_type'   => 'lecture',
	'posts_per_page'   => '-1',
	'orderby'     => 'date',
	'order' => 'DESC',
	'post_status' => 'publish',
	'suppress_filters' => false,
	'ignore_custom_sort' => true,
);

$posts_lecture = get_posts($args_lecture);
?>

<div class="lectureCt" id="main">
	<div class="main-inner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="text-center text-uppercase pb20"><?php echo $video_title; ?> </h2>
					<p class="text-center text-uppercase"><?php echo $video_subtitle; ?> </p>
					<div class="text-center py80 xs-py40 sm-py40">
						<iframe src="https://player.vimeo.com/video/<?php echo $vimeo_video_id; ?>" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>

					<div class="lecture_accordion">
						<?php foreach ($posts_lecture as $key => $post_lecture):
						
						 ?>
							<h2>
								<?php echo $post_lecture->post_title; ?>
							</h2>
							<div>
								<?php echo $post_lecture->post_content; ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
