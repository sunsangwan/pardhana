<?php
/*
 * Template Name: Page Course
 */

get_header();

global $post;

$course_video_title = get_post_meta($post->ID, 'oyemetatpl_course_video_title', true);
$course_vimeo_video_id = get_post_meta($post->ID, 'oyemetatpl_course_vimeo_video_id', true);

$courseargs = array(
	'post_type' => 'course',
	'posts_per_page' => '-1',
	'orderby' => 'date',
	'order' => 'DESC',
	'post_status' => 'publish',
);

$coursesposts = get_posts($courseargs);

?>

<div class="courseCt" id="main">
	<div class="main-inner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="text-center text-uppercase mb35"><?php echo $course_video_title; ?> </h2>
					<div class="text-center">
						<iframe src="https://player.vimeo.com/video/<?php echo $course_vimeo_video_id; ?>" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>
				</div>
			</div>
			<div class="margin-seprator"></div>
			<div class="row">
				<div class="col-md-12">
					<?php foreach ($coursesposts as $coursespost) {
						$featureimage = wp_get_attachment_image_src(get_post_thumbnail_id($coursespost->ID), 'full');
						$righttitle = get_post_meta($coursespost->ID, "oyemetatpl_course_right_content_title", true);
						$rightcontent = get_post_meta($coursespost->ID, "oyemetatpl_course_right_content", true);
						$pdffileid = get_post_meta($coursespost->ID, "oyemetatpl_course_curriculum_file", true);
						$pdfurl =  wp_get_attachment_url($pdffileid);
						$headingcontent = $righttitle ? '<h3>'.$righttitle.'</h3>' : '';
						echo '<div class="courses-wrapper">
						<div class="courses-image" style="background-image: url('.$featureimage[0].');"></div>
						<div class="courses-content">
						<h3>'.$coursespost->post_title.'</h3>
						'.wpautop($coursespost->post_content).'
						<div class="pdf-content">
						<a class="btn btn-download" href="'.$pdfurl.'">Download Curriculum</a>
						</div>
						</div>
						<div class="courses-right">
							'.$headingcontent.'
							'.wpautop($rightcontent).'
						</div>
					</div>';
					} ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
