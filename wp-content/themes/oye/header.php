<?php
    get_template_part( 'head' );
    global $theme_opt;
    global $post;
    $meta_data = get_post_meta($post->ID);
	$header_title = get_post_meta( $post->ID, 'oyemetatpl_header_title',true);
	$header_subtitle = get_post_meta( $post->ID, 'oyemetatpl_header_subtitle',true);
	$header_style = get_post_meta( $post->ID, 'oyemetatpl_header_style',true);
	$header_video_id = get_post_meta( $post->ID, 'oyemetatpl_header_video_id',true);
	$header_bg = get_post_meta( $post->ID, 'oyemetatpl_header_image',true);
    $header_bg_url = wp_get_attachment_image_src( $header_bg, 'full' );
?>

<body <?php body_class(); ?>>
<?php echo $GLOBALS['theme_opt']['code_after_body_starttag']; ?>

<header class="<?php echo $header_style; ?>">
	<nav>
		<div class="container">
			<a class="logo" href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/icons/header-logo.png"></a>

			<div class="contact_info">
				<span>
					<i class="fa fa-phone"></i>
					<a href="tel:+17188490297">+1-718-849-0297</a>
				</span>
				<span>
					<i class="fa fa-phone"></i>
					<a href="tel:+19174886426">+1-917-488-6426</a>
				</span>
				<span>
					<i class="fa fa-envelope-o"></i>
					<a href="mailto:info@barrylewis.org">info@barrylewis.org</a>
				</span>
			</div>

			<div class="menu">
				<?php
					wp_nav_menu(array(
						'menu' => 'header_menu',
						'container' => false,
						'menu_class' => 'header-menu visible-lg visible-md'
					));
				?>
			</div>
			<a href="#" class="strip-call">
				<span></span>
				<span></span>
				<span></span>
			</a>

		</div>
		<div class="site-menu">
		</div>
		<!-- <a href="#" class="hidden-lg hidden-md mobilesearchicon">
			<span><i class="fa fa-search" aria-hidden="true"></i></span>
		</a>
		<a class="menu-strip visible-xs visible-sm" href="#">
			<span class="iconc-hamburger-menu-icon"></span>
			<i class="fa fa-bars" aria-hidden="true"></i>
		</a> -->
	</nav>

	<div class="banner" style="background-image: url('<?php echo $header_bg_url[0]; ?>')">
		<div class="inner">
			<?php if($header_title): ?>
				<h1><?php echo $header_title; ?></h1>
			<?php endif; ?>

			<?php if($header_subtitle): ?>
				<h4><?php echo $header_subtitle; ?></h4>
			<?php endif; ?>

			<?php if($header_video_id): ?>
				<div class="text-center video">
					<iframe src="https://player.vimeo.com/video/<?php echo $header_video_id; ?>" width="100%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				</div>
			<?php endif; ?>
			<div class="top-overlay"></div>
			<div class="bottom-overlay"></div>
		</div>
	</div>
</header>