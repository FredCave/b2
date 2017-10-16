<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<title>
		<?php 
			bloginfo( 'name' );
			wp_title( '–', true, 'left' );
			global $page, $paged;
		?>
		</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="Description" content="<?php bloginfo("description"); ?>" /> 
	   	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	    <meta property="og:url" content="<?php bloginfo('url'); ?>" />
	    <meta property="og:type" content="Website" />
	    <meta property="og:title" content="Bieke Depoorter" />
	    <meta property="og:description" content="<?php bloginfo("description"); ?>" />

	    <!-- TWITTER -->
	    <meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:site" content="<?php bloginfo('url'); ?>">
		<meta name="twitter:description" content="<?php bloginfo("description"); ?>">
		<meta name="twitter:title" content="Bieke Depoorter">

		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/style.css">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/style.min.css">
		<script>
			var ROOT = '<?= get_bloginfo('url'); ?>';
			var TEMPLATE = '<?= get_bloginfo('stylesheet_directory'); ?>';
		</script>
		<?php wp_head(); ?>
	</head>
	
	<body>
		<div id="fb-root"></div>
		<script>
		// (function(d, s, id) {
		//   	var js, fjs = d.getElementsByTagName(s)[0];
		//   	if (d.getElementById(id)) return;
		//   	js = d.createElement(s); js.id = id;
		//   	js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0";
		//   	fjs.parentNode.insertBefore(js, fjs);
		// }(document, 'script', 'facebook-jssdk'));
		</script>		

		<!-- NAV -->
		<?php include("includes/nav.php"); ?>
		