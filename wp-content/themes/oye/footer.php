<?php wp_footer(); ?>

<?php echo $GLOBALS['theme_opt']['code_before_body_closingtag']; ?>

<?php global $theme_opt; ?>

<div class="overlay-menu">
    <a href="#" class="overlay-close">x</a>
    <?php
		wp_nav_menu(array(
			'menu' => 'header_menu',
			'container' => false,
			'menu_class' => 'overlay-menulist'
		));
    ?>
</div>

<footer>
	<div class="footerCt">
		<div class="inner">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-3 col-xs-12">
						<?php
							wp_nav_menu(array(
								'menu' => 'header_menu',
								'container' => false,
								'menu_class' => 'footer-menu'
							));
						?>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<?php echo $theme_opt["address_line1"]; ?>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<?php echo $theme_opt["address_line2"]; ?>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 section-right">

<!-- 						<div class="social-icons">
							<a class="facebook-icon" href="<?php echo $theme_opt["contact_social_fb"]; ?>">
								<img src="<?php echo get_template_directory_uri() ?>/images/icons/facebook.png" />
							</a>
							<a class="twitter-icon" href="<?php echo $theme_opt["contact_social_twitter"]; ?>">
								<img src="<?php echo get_template_directory_uri() ?>/images/icons/twitter.png" />
							</a>
							<a class="linkedin-icon" href="<?php echo $theme_opt["contact_social_in"]; ?>">
								<img src="<?php echo get_template_directory_uri() ?>/images/icons/linkedin.png" />
							</a>
							<a class="gogole-icon" href="<?php echo $theme_opt["contact_social_google"]; ?>">
								<img src="<?php echo get_template_directory_uri() ?>/images/icons/google.png" />
							</a>
							<a class="vimeo-icon" href="<?php echo $theme_opt["contact_social_vimeo"]; ?>">
								<img src="<?php echo get_template_directory_uri() ?>/images/icons/vimeo.png" />
							</a>
						</div> -->
						<img src="<?php echo get_template_directory_uri() ?>/images/icons/footer-logo-barrylewis.png">
						<div class="privacy-term">
							<span>© 2015 Barry Lewis |</span>
							<span><a target="_blank" href="<?php echo site_url(); ?>/privacy-policy/"> Privacy Terms</a></span>
						</div>
						<a target="_blank" href="https://www.needtechinc.com/" class="needtechInc">Needtech Inc</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<!-- <div class="scroll_back_btns">
	<a href="#" class="back-to-top trans-in"><i class="iconc-back-to-top-arrow"></i></a>
</div> -->
</body>
</html>