<?php

/**
 * Header template
 */

?>

<!doctype HTML>
<!--[if lt IE 8]><html xmlns:fb="http://ogp.me/ns/fb#" class="no-js ie-legacy"><![endif]-->
<!--[if IE 8]><html xmlns:fb="http://ogp.me/ns/fb#" class="no-js ie8"><![endif]-->
<!--[if IE 9]><html xmlns:fb="http://ogp.me/ns/fb#" class="no-js ie9"><![endif]-->
<!--[if gt IE 9]><html xmlns:fb="http://ogp.me/ns/fb#" class="no-js ie10 ie-modern"><![endif]-->
<!--[if !IE]<!--><html xmlns:fb="http://ogp.me/ns/fb#" class="no-js modern-browser"><!-- <![endif]-->
	<head prefix="og:http://ogp.me/ns# fb:http://ogp.me/ns/fb# pkgeography:http://ogp.me/ns/fb/pkgeography">
		<title><?php wp_title( '&ndash;', true, 'right' ); ?></title>

		<!-- Default encoding -->
		<meta charset="UTF-8">

		<!-- Viewport optimization -->
		<meta name="viewport" content="initial-scale=1.0,width=device-width">

		<!-- Favicon etc. -->
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico">
		<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="75x75" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-touch-icon-75x75.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-touch-icon-152x152.png">
		<meta name="apple-mobile-web-app-title" content="PAK Geography">
		<meta name="application-name" content="Geography of Pakistan">
		<meta name="msapplication-TileColor" content="#009900">
		<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri(); ?>/images/mstile-144x144.png">
		<meta name="msapplication-square70x70logo" content="<?php echo get_stylesheet_directory_uri(); ?>/images/mstile-70x70.png">
		<meta name="msapplication-square150x150logo" content="<?php echo get_stylesheet_directory_uri(); ?>/images/mstile-150x150.png">
		<meta name="msapplication-square310x310logo" content="<?php echo get_stylesheet_directory_uri(); ?>/images/mstile-310x310.png">
		<meta name="msapplication-wide310x150logo" content="<?php echo get_stylesheet_directory_uri(); ?>/images/mstile-310x150.png">
		<meta http-equiv="cleartype" content="on">
		<meta name="mobile-web-app-capable" content="yes">
	    <meta name="theme-color" content="#009900">
		<?php wp_head(); ?>

		<?php
		/**
		 * Google Analytics - Dist environment only
		 */
		if ( !ENV_DEV ) :
		?>
			<!-- Google analytics tracking -->
			<script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			  ga('create', 'UA-9809111-8', 'auto');
			  ga('send', 'pageview');
			</script>
		<?php endif; ?>
	</head>
	<body>

		<!-- header -->
		<div class="gpk-header">
			<div class="container">

				<div class="clearfix">
					<h1 class="gpk-logo">
						<span class="hide print">
							<img width="200" height="124" src="<?php echo get_stylesheet_directory_uri(); ?>/images/pkgeography_logo_2x.png" alt="Geogrphy of Pakistan">
						</span>
						<a class="noprint" rel="home" href="<?php echo site_url(); ?>">Geography of Pakistan</a>
					</h1>

					<!-- Mobile nav -->
					<div class="gpk-primary-nav-mobile">
						<a href="#menu-footer_nav" class="gpk-mobile-nav-btn" role="button" rel="nav">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
					</div>
				</div>

				<?php
					/**
					 * Primary Nav
					 *
					 * Disabled intentionally for UX experiment
					 */
					/*
					if ( has_nav_menu('primary') ) :
						wp_nav_menu( array(
								'theme_location' => 'primary',
								'menu' => 'primary',
								'container' => false,
								'menu_class' => 'list-unstyled gpk-mobile-nav',
								'fallback_cb' => false
							)
						);
					endif; */
				?>


			</div>
		</div>

		<!-- Desktop nav -->
		<div class="gpk-primary-nav">
			<div class="container">
				<?php
					/**
					 * Primary Nav
					 */
					if ( has_nav_menu('primary') ) :
						wp_nav_menu( array(
								'theme_location' => 'primary',
								'menu' => 'primary',
								'container' => false,
								'menu_class' => 'list-inline gpk-desktop-nav',
								'fallback_cb' => false
							)
						);
					endif;
				?>
			</div>
		</div>

