<?php
	global $theme_opt;
	$debug = $theme_opt["is_debug"];
	$is_pageloader =  $theme_opt["is_pageloader"];
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php echo $GLOBALS['theme_opt']['head_start_customcode']; ?>
<title>
	<?php
		echo wp_title('', true, 'right');
	?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11" /> 
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
 
<script src="//maps.googleapis.com/maps/api/js?key=<?php echo $theme_opt['googlemap_apikey']; ?>"></script>
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- <link href="//fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet"> -->

<script type="text/javascript">
	var admin_ajax_url = <?php echo json_encode(admin_url('admin-ajax.php')); ?>;
	var base_url = "<?php echo site_url(); ?>";
	var theme_url = "<?php echo get_template_directory_uri() ?>";
</script>

<?php wp_head(); ?>


<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

<?php echo $GLOBALS['theme_opt']['head_close_customcode']; ?>
</head>
<body <?php body_class(); ?>>
<?php echo $GLOBALS['theme_opt']['body_start_customcode']; ?>
