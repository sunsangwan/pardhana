<?php

/*
 * Template Name: Page Paris Secrets
 */

get_header();

$sliders = rwmb_meta( 'slider' );
$init = 0;
$init1 = 0;

?>

<div class="biocvCt" id="main">
	<div class="main-inner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="slider-wrapper">
						<section class="carousalCt">
							<div id="myCarouselTop" class="carousel slide" data-ride="carousel" data-interval="false">
								<div class="carousel-inner">
									<?php foreach ($sliders as $singleslider ) { ?>
								        <div class="item <?php echo $init==0 ? 'active' : ''; ?>">
									        <div class="upper-block">
									        	<h3><?php echo $singleslider['oyemetatpl_heading']; ?></h3>
									            <div class="img-wrapper" style="background-image: url('<?php echo wp_get_attachment_url($singleslider['oyemetatpl_image'][0]); ?>');"></div>
									        </div>
								          <!--   <p><?php// echo $singleslider['oyemetatpl_desc']; ?></p> -->
											<!-- <div class="description1">
												<?php //echo wpautop($singleslider['oyemetatpl_desc']); ?>
											</div> -->
								        </div>
								    <?php $init++;
								     } ?>
								</div>

								<a class="left carousel-control" href="#myCarouselTop" data-slide="prev">
								  	<span class=""></span>
								</a>
								<a class="right carousel-control" href="#myCarouselTop" data-slide="next">
								  	<span class=""></span>
								</a>
							</div>
							<div class="description1">
								<div id="myCarouselDescription" class="carousel slide carousel-fade" data-interval="false">
									<div class="carousel-inner">
										<?php foreach ($sliders as $singleslider ) { ?>
									        <div class="item <?php echo $init1==0 ? 'active' : ''; ?>">
												<?php echo wpautop($singleslider['oyemetatpl_desc']); ?>
											</div>
									    <?php $init1++;
									     } ?>
								    </div>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
