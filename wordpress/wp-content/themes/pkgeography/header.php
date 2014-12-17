<?php

/**
 * Header template
 */

?>

<!doctype HTML>
<!--[if lt IE 8]><html xmlns:fb="http://ogp.me/ns/fb#" class="ie-legacy"><![endif]-->
<!--[if IE 8]><html xmlns:fb="http://ogp.me/ns/fb#" class="ie8"><![endif]-->
<!--[if IE 9]><html xmlns:fb="http://ogp.me/ns/fb#" class="ie9"><![endif]-->
<!--[if IE 10]><html xmlns:fb="http://ogp.me/ns/fb#" class="ie10"><![endif]-->
<!--[if gt IE 10]><html xmlns:fb="http://ogp.me/ns/fb#" class="ie-modern"><![endif]-->
<!--[if !IE]><html xmlns:fb="http://ogp.me/ns/fb#"><![endif]-->
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
		<?php

		/**
		 * Add wp_head()
		 */
		wp_head();


		/**
		 * Only make it available for production
		 */
		if ( ! strpos($_SERVER['SERVER_NAME'], 'localhost') && ! $_SERVER['SERVER_NAME'] === 'localhost' ) : ?>
		<!-- Google analytics tracking -->
		<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create', 'UA-9809111-8', 'auto');ga('send', 'pageview');</script>
		<?php endif; ?>
	</head>
	<body>

		<!-- header -->
		<?php

		/**
		 * Featured image
		 */

		if ( gpk_get_latest_featured() && count(gpk_get_latest_featured()) )
			$latestFeatured = gpk_get_latest_featured();
		else
			$latestFeatured = false;


		/**
		 * Verify if available in current date
		 */
		if ( $latestFeatured ) {

			if ( isset($latestFeatured['available_between']) && $latestFeatured['available_between'] ) {
				$availableDates = explode(',', $latestFeatured['available_between']);

				if ( isset($latestFeatured['xy']) && $latestFeatured['xy'] )
					list($featuredBgX, $featuredBgY) = explode(',', $latestFeatured['xy']);

				if ( ! gpk_available_today( $availableDates[0], $availableDates[1] ) )
					$latestFeatured = false;
			}
			else {
				$latestFeatured = false;
			}

		}

		$featuredHTML = '';
		if ( $latestFeatured ) {

			if ( isset($latestFeatured['image']) && $latestFeatured['image']['src'] && $latestFeatured['image']['src'] )
				$featuredHTML .= ' data-f-i-src="' . $latestFeatured['image']['src'] . '"';

			if ( isset($latestFeatured['image']) && $latestFeatured['image']['width'] && $latestFeatured['image']['width'] )
				$featuredHTML .= ' data-f-i-width="' . $latestFeatured['image']['width'] . '"';

			if ( isset($latestFeatured['image']) && $latestFeatured['image']['height'] && $latestFeatured['image']['height'] )
				$featuredHTML .= ' data-f-i-height="' . $latestFeatured['image']['height'] . '"';

			if ( isset($latestFeatured['image']) && $latestFeatured['image']['xy'] && $latestFeatured['image']['xy'] )
				$featuredHTML .= ' data-f-i-xy="' . $latestFeatured['image']['xy'] . '"';
		}

		?>
		<div class="gpk-header<?php echo $latestFeatured ? ' gpk-featured' :''; ?>"<?php echo $featuredHTML; ?>>
			<div class="container">

				<div class="clearfix">
					<h1 class="gpk-logo">
						<a rel="home" href="<?php echo site_url(); ?>">Geography of Pakistan</a>
					</h1>

					<?php if ( $latestFeatured ) : ?>

					<div class="gpk-featured-container">
						<div class="gpk-f-info-btn" role="button">
							<h4><i class="fa fa-info-circle"></i></h4>
						</div>
						<div class="gpk-f-info">
							<?php if (isset($latestFeatured['title'])) echo '<h4 class="gpk-f-heading">' . $latestFeatured['title'] . '</h4>'; ?>
							<?php if (isset($latestFeatured['content'])) echo '<div class="gpk-f-more-info"><p>' . $latestFeatured['content'] . '</p></div>'; ?>

							<ul class="list-inline">
								<?php

									if (isset($latestFeatured['credit']) && $latestFeatured['credit'])
										echo '<li>' . $latestFeatured['credit'] . '</li>';

									if (isset($latestFeatured['latlng']) && $latestFeatured['latlng'] )
										echo '<li><i class="fa fa-map-marker"></i> <a rel="nofollow" href="https://maps.google.com/?q=' . $latestFeatured['latlng'] . '&z=6" target="_blank">Location</a></li>';

									if (isset($latestFeatured['link']) && $latestFeatured['link'])
										echo '<li><small><i class="fa fa-link"></i></small> <a rel="follow" role="button" target="_blank" href="' . $latestFeatured['link'] . '">More &raquo;</a></li>';

								?>
							</ul>
						</div>
					</div>

					<?php endif; ?>

					<!-- Mobile nav -->
					<div class="gpk-primary-nav-mobile">
						<div class="gpk-mobile-nav-btn" role="button" rel="nav">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</div>
					</div>
				</div>

				<?php
					/**
					 * Primary Nav mobile
					 */
					if ( has_nav_menu('primary') ) :
						wp_nav_menu( array(
								'theme_location' => 'primary',
								'menu' => 'primary',
								'container' => false,
								'menu_class' => 'list-unstyled gpk-mobile-nav',
								'menu_id' => 'gpk-mobile-nav',
								'fallback_cb' => false
							)
						);
					endif;
				?>


			</div>
		</div>

		<!-- Desktop nav -->
		<div class="gpk-primary-nav">
			<div class="container">
				<?php
					/**
					 * Primary Nav desktop
					 */
					if ( has_nav_menu('primary') ) :
						wp_nav_menu( array(
								'theme_location' => 'primary',
								'menu' => 'primary',
								'container' => false,
								'menu_class' => 'list-inline gpk-desktop-nav',
								'menu_id' => 'gpk-desktop-nav',
								'fallback_cb' => false
							)
						);
					endif;
				?>
			</div>
		</div>

