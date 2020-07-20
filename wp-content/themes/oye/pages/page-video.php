<?php
/*
 * Template Name: Page Video
 */

get_header();


global $post;

$video_title = get_post_meta($post->ID, 'oyemetatpl_video_title', true);
$vimeo_video_id = get_post_meta($post->ID, 'oyemetatpl_vimeo_video_id', true);


$args = array(
	'post_type'   => 'video',
	'posts_per_page'   => '-1',
	'orderby'     => 'date',
	'order' => 'DESC',
	'post_status' => 'publish',
	'suppress_filters' => false,
	'ignore_custom_sort' => true,
);

$posts = get_posts($args);
?>

<div class="videoCt" id="main">
	<div class="main-inner">
		<div class="container pb50 xs-pb30 sm-pb30">
			<div class="row">
				<div class="col-md-12">
					<h2 class="text-center text-uppercase pb30"><?php echo $video_title; ?> </h2>
					<div class="text-center">
						<iframe src="https://player.vimeo.com/video/<?php echo $vimeo_video_id; ?>" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>
				</div>
			</div>

		</div>

		<div class="bg-lightbrown videoall py50 xs-py30 sm-py30">
			<div class="container">
				<div class="row">
					<?php
						foreach ($posts as $post_video):
							$sponsorby_title = get_post_meta($post_video->ID, 'oyemetatpl_sponsorby_title', true);
							$sponsorby_subtitle = get_post_meta($post_video->ID, 'oyemetatpl_sponsorby_subtitle', true);
							$sponsorby_disc = get_post_meta($post_video->ID, 'oyemetatpl_sponsorby_disc', true);
							$sponsorby_content = get_post_meta($post_video->ID, 'oyemetatpl_sponsorby_content', true);
							$vimeo_video_id = get_post_meta($post_video->ID, 'oyemetatpl_vimeo_video_id', true);
							$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post_video->ID) );
						 ?>

					       <div class="col-md-4 py20">
					       	<div class="block-info white">
								<?php 
								 	if ($vimeo_video_id) { ?>						 		
								   		<iframe src="https://player.vimeo.com/video/<?php echo $vimeo_video_id; ?>" width="100%" height="200" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
								<?php 	}
								?>
								<?php 
								 	if ($feat_image) { ?>						 		
								 		<div class="video_featured_img" style="background-image: url('<?php echo $feat_image; ?>')"></div>
								<?php 	}
								?>
					       		<h3><?php echo($post_video->post_title); ?></h3>
					       		<p><?php echo $sponsorby_title; ?></p>
								<div class="description">
					       			<p><strong><?php echo $sponsorby_disc; ?></strong></p>
									<p><?php echo $sponsorby_content; ?></p>
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
</div>
<?php get_footer(); ?>
