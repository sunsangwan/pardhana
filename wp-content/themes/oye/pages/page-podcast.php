<?php
/*
 * Template Name: Page Podcast
 */

get_header();

global $post;

$video_title = get_post_meta($post->ID, 'oyemetatpl_page_video_title', true);
$video_subtitle = get_post_meta($post->ID, 'oyemetatpl_page_video_subtitle', true);
$vimeo_video_id = get_post_meta($post->ID, 'oyemetatpl_page_vimeo_video_id', true);

$oyemetatpl_course_right_content = get_post_meta($post->ID, 'oyemetatpl_course_right_content', true);
$oyemetatpl_page_download_link = get_post_meta($post->ID, 'oyemetatpl_page_download_link', true);
$oyemetatpl_page_download_link_title = get_post_meta($post->ID, 'oyemetatpl_page_download_link_title', true);
?>

<div class="homeCt podcastCt" id="main">
	<div class="main-inner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="text-center"><?php echo $video_title; ?> </h2>
					<p class="text-center text-uppercase my35"><?php echo $video_subtitle; ?> </p>
					<div class="text-center">
						<iframe src="https://player.vimeo.com/video/<?php echo $vimeo_video_id; ?>" width="100%" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>
				</div>
			</div>

			<article class="bg-lightbrown px15 pt25 pb15 my50">
				<div class="row content-section">
					<div class="col-md-8">
						<?php echo wpautop($post->post_content); ?>

						<div class="sm-mb20 xs-mb20">
							<br/>
							<br/>
							<a class="btn btn-download" href="<?php echo $oyemetatpl_page_download_link; ?>">
								<?php echo $oyemetatpl_page_download_link_title; ?>
							</a>
						</div>
					</div>

					<div class="col-md-4">
						<?php echo $oyemetatpl_course_right_content; ?>
					</div>
				</div>
			</article>
		</div>
	</div>
</div>
<?php get_footer(); ?>
