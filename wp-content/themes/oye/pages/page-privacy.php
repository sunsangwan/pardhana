<?php
/*
 * Template Name: Page Privacy

 */

get_header();

$metadata = get_post_meta($post->ID);
?>

<div class="privacyCt py40">
	<div class="container">	
		<div class="row">
			<div class="col-md-12">	
				<div><?php echo $post->post_content ?></div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>

