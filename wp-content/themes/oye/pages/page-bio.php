<?php

/*
 * Template Name: Page Bio CV
 */

get_header();

$featureimage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
$metabox = get_post_meta($post->ID);
$box1icon = $metabox["oyemetatpl_page_block1_image"][0];
$box1icon = wp_get_attachment_image_src($box1icon, 'full');

$box2icon = $metabox["oyemetatpl_page_block2_image"][0];
$box2icon = wp_get_attachment_image_src($box2icon, 'full');

$box3icon = $metabox["oyemetatpl_page_block3_image"][0];
$box3icon = wp_get_attachment_image_src($box3icon, 'full');

$box4icon = $metabox["oyemetatpl_page_block4_image"][0];
$box4icon = wp_get_attachment_image_src($box4icon, 'full');

?>

<div class="biocvCt" id="main">
	<div class="main-inner">
		<div class="container">
			<div class="row">
				<div class="col-md-4 featureimage">
					<img src="<?php echo $featureimage[0]; ?>" />
				</div>
				<div class="col-md-8">
					<?php echo wpautop($post->post_content); ?>
				</div>
			</div>
			<div class="margin-seprator"></div>
			<div class="row">
				<div class="col-md-6">
					<div class="icon-wrapper">
						<div class="icon-box" style="background-image: url('<?php echo $box1icon[0]; ?>');"></div>
						<div class="content-box">
							<h3><?php echo $metabox["oyemetatpl_page_block1_title"][0]; ?></h3>
							<div class="mb10"><?php echo $metabox["oyemetatpl_page_block1_description"][0]; ?></div>
							<a class="btn btn-download" href="<?php echo $metabox["oyemetatpl_page_block1_read_more_link"][0]; ?>">READ MORE</a>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="icon-wrapper">
						<div class="icon-box" style="background-image: url('<?php echo $box2icon[0]; ?>');"></div>
						<div class="content-box">
							<h3><?php echo $metabox["oyemetatpl_page_block2_title"][0]; ?></h3>
							<div class="mb10"><?php echo $metabox["oyemetatpl_page_block2_description"][0]; ?></div>
							<a class="btn btn-download" href="<?php echo $metabox["oyemetatpl_page_block2_read_more_link"][0]; ?>">READ MORE</a>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="icon-wrapper">
						<div class="icon-box" style="background-image: url('<?php echo $box3icon[0]; ?>');"></div>
						<div class="content-box">
							<h3><?php echo $metabox["oyemetatpl_page_block3_title"][0]; ?></h3>
							<div class="mb10"><?php echo $metabox["oyemetatpl_page_block3_description"][0]; ?></div>
							<a class="btn btn-download" href="<?php echo $metabox["oyemetatpl_page_block3_read_more_link"][0]; ?>">READ MORE</a>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="icon-wrapper">
						<div class="icon-box" style="background-image: url('<?php echo $box4icon[0]; ?>');"></div>
						<div class="content-box">
							<h3><?php echo $metabox["oyemetatpl_page_block4_title"][0]; ?></h3>
							<div class="mb10"><?php echo $metabox["oyemetatpl_page_block4_description"][0]; ?></div>
							<a class="btn btn-download" href="<?php echo $metabox["oyemetatpl_page_block4_read_more_link"][0]; ?>">READ MORE</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
