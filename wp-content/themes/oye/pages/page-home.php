<?php
/*
 * Template Name: Page Home
 */

get_header();


global $post;
$upcoming_event_title = get_post_meta($post->ID, 'oyemetatpl_upcoming_event_title', true);
$upcoming_event_subtitle = get_post_meta($post->ID, 'oyemetatpl_upcoming_event_subtitle', true);

$video_page_video_id = get_post_meta($post->ID, 'oyemetatpl_video_page_video_id', true);
$featured_video_title = get_post_meta($post->ID, 'oyemetatpl_featured_video_title', true);
$featured_video_subtitle = get_post_meta($post->ID, 'oyemetatpl_featured_video_subtitle', true);
$featured_video_content = get_post_meta($post->ID, 'oyemetatpl_featured_video_content', true);
$video_page_url = get_post_meta($post->ID, 'oyemetatpl_video_page_url', true);
$video_page_disc = get_post_meta($post->ID, 'oyemetatpl_video_page_disc', true);

$lectures_page_video_id = get_post_meta($post->ID, 'oyemetatpl_lectures_page_video_id', true);
$featured_lecture_title = get_post_meta($post->ID, 'oyemetatpl_featured_lecture_title', true);
$featured_lecture_subtitle = get_post_meta($post->ID, 'oyemetatpl_featured_lecture_subtitle', true);
$featured_lecture_content = get_post_meta($post->ID, 'oyemetatpl_featured_lecture_content', true);
$lectures_page_url = get_post_meta($post->ID, 'oyemetatpl_lectures_page_url', true);
$lectures_page_disc = get_post_meta($post->ID, 'oyemetatpl_lectures_page_disc', true);

$podcast_page_video_id = get_post_meta($post->ID, 'oyemetatpl_podcast_page_video_id', true);
$featured_podcast_title = get_post_meta($post->ID, 'oyemetatpl_featured_podcast_title', true);
$featured_podcast_subtitle = get_post_meta($post->ID, 'oyemetatpl_featured_podcast_subtitle', true);
$featured_podcast_content = get_post_meta($post->ID, 'oyemetatpl_featured_podcast_content', true);
$podcast_page_url = get_post_meta($post->ID, 'oyemetatpl_podcast_page_url', true);
$podcast_page_disc = get_post_meta($post->ID, 'oyemetatpl_podcast_page_disc', true);

$videos_section_image = get_post_meta( $post->ID, 'oyemetatpl_videos_section_image',true);
$videos_section_image_url = wp_get_attachment_image_src( $videos_section_image, 'full' );

$lectures_section_image = get_post_meta( $post->ID, 'oyemetatpl_lectures_section_image',true);
$lectures_section_image_url = wp_get_attachment_image_src( $lectures_section_image, 'full' );

$podcast_section_image = get_post_meta( $post->ID, 'oyemetatpl_podcast_section_image',true);
$podcast_section_image_url = wp_get_attachment_image_src( $podcast_section_image, 'full' );


$args_event = array(
	'post_type'   => 'event',
	'posts_per_page'   => '-1',
	'orderby'     => 'date',
	'order' => 'ASC',
	'post_status' => 'publish',
	'suppress_filters' => false,
	'ignore_custom_sort' => true,
);

$posts_event = get_posts($args_event);

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

<div class="homeCt" id="main">
	<div class="main-inner">
		<div class="bg-lightbrown py50 xs-py30 sm-py30">	
			<div class="container">
				<div class="row">
					    <div class="col-md-4 py20">
							<h3 class="ml15"><?php echo $featured_video_title; ?></h3>
					       	<div class="block-info">
								<?php 
								 	if ($videos_section_image_url) { ?>						 		
								 		<div class="featured_home_img" style="background-image: url('<?php echo $videos_section_image_url[0]; ?>')"></div>
								<?php 	} else { ?>
							       		<iframe src="https://player.vimeo.com/video/<?php echo $video_page_video_id; ?>" width="100%" height="200" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
								<?php }
								?>

								<h3><?php echo $featured_video_subtitle; ?></h3>
								<div class="description">
					       			<p><strong><?php echo $video_page_disc; ?></strong></p>
									<p><?php echo $featured_video_content; ?></p>
					       		</div>					       		
					       	</div>
				       		<a class="btn btn-download ml15 mt20" href="<?php echo $video_page_url; ?>">see more</a>
					    </div>

					    <div class="col-md-4 py20">
							<h3 class="ml15"><?php echo $featured_lecture_title; ?></h3>
					       	<div class="block-info">
								<?php 
								 	if ($lectures_section_image_url) { ?>						 		
								 		<div class="featured_home_img" style="background-image: url('<?php echo $lectures_section_image_url[0]; ?>')"></div>
								<?php 	} else { ?> 
							       		<iframe src="https://player.vimeo.com/video/<?php echo $lectures_page_video_id; ?>" width="100%" height="200" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
							    <?php   		
								}
								?>

								<h3><?php echo $featured_lecture_subtitle; ?></h3>
								<div class="description">
					       			<p><strong><?php echo $lectures_page_disc; ?></strong></p>
									<p><?php echo $featured_lecture_content; ?></p>
					       		</div>					       		
					       	</div>
							<a class="btn btn-download ml15 mt20" href="<?php echo $lectures_page_url; ?>">see more</a>					       		
					    </div>
					    <div class="col-md-4 py20">
							<h3 class="ml15"><?php echo $featured_podcast_title; ?></h3>
					     	<div class="block-info">
								<?php 
								 	if ($podcast_section_image_url) { ?>						 		
								 		<div class="featured_home_img" style="background-image: url('<?php echo $podcast_section_image_url[0]; ?>')"></div>
								<?php   } else { ?>
							       		<iframe src="https://player.vimeo.com/video/<?php echo $podcast_page_video_id; ?>" width="100%" height="200" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
								<?php }
								?>

								<h3><?php echo $featured_podcast_subtitle; ?></h3>
								<div class="description">
					       			<p><strong><?php echo $podcast_page_disc; ?></strong></p>
									<p><?php echo $featured_podcast_content; ?></p>
					       		</div>
					       	</div>
				       		<a class="btn btn-download ml15 mt20" href="<?php echo $podcast_page_url; ?>">see more</a>
					    </div>

				</div>
			</div>
		</div>
			
		<div class="container">
			<div class="row">
				<div class="col-md-12">


					<div class="text-center py50">
						<h2><?php echo $upcoming_event_title; ?></h2>
						<h6 class="color-darkgrey"><?php echo $upcoming_event_subtitle; ?></h6>
					</div>

					<div class="event_accordion">
						<?php foreach ($posts_event as $key => $post_event):
							$oyemetatpl_event_date = get_post_meta($post_event->ID, 'oyemetatpl_event_date', true);
							$oyemetatpl_event_location = get_post_meta($post_event->ID, 'oyemetatpl_event_location', true);
							$oyemetatpl_event_time = get_post_meta($post_event->ID, 'oyemetatpl_event_time', true);
						 ?>
							<h2>
								<div class="row">
									<div class="col-md-5">
										<span><?php echo $key+1; ?></span>
										<span><?php echo $post_event->post_title; ?></span>
									</div>

									<div class="col-md-2">
										<?php echo $oyemetatpl_event_location; ?>
									</div>
									<div class="col-md-2">
										<?php echo $oyemetatpl_event_date; ?>
									</div>
									<div class="col-md-2">
										<?php echo $oyemetatpl_event_time; ?>
									</div>
								</div>
							</h2>
							<div>
								<?php echo wpautop($post_event->post_content); ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
		

	</div>
</div>
<?php get_footer(); ?>
