<?php

/**
 * Theme function template
 * @author: admin@geography.pk
 */


/**
 * Register sidebar
 */
if ( function_exists('register_sidebar') ) {
	register_sidebar( array(
			'name' => __( 'Sidebar', 'pkgeography' )
		)
	);
}


/**
 * Regster nav menus
 */
add_action( 'after_setup_theme', 'register_pkg_menus' );
function register_pkg_menus() {
	register_nav_menu( 'primary', 'Primary Menu' );
	register_nav_menu( 'footer', 'Footer Menu' );
	register_nav_menu( 'social', 'Social Menu' );
}


/**
 * Add automatic RSS feed links to head
 */
add_theme_support( 'automatic-feed-links' );


/**
 * Post-thumbnails
 */
add_theme_support('post-thumbnails');


/**
 * Sets dimensions
 * @internal: We keep the dashboard defaults for now
 */
//set_post_thumbnail_size(250,200, true);


/**
 * Add post formats
 */
add_theme_support( 'post-formats', array(
	'image', 'video', 'audio', 'gallery',
) );


/**
 * Hide admin bar
 */
add_filter( 'show_admin_bar', '__return_false' );



/**
 * Set custom background
 */
add_theme_support( 'custom-background', apply_filters( 'twentyfourteen_custom_background_args', array(
	'default-color' => 'f5f5f5',
) ) );



/**
 * Setup socialmedia contact methods for users profile
 */
add_filter('user_contactmethods','set_custom_contactmethod',10,1);
function set_custom_contactmethod( $contactmethods ) {
	$contactmethods['twitter'] = 'Twitter';
	$contactmethods['facebook'] = 'Facebook';
	$contactmethods['gplus'] = 'Google Plus';

	unset($contactmethods['yim']);
	unset($contactmethods['jabber']);
	unset($contactmethods['aim']);
	return $contactmethods;
}


/**
 * Trim trailing characters from excerpt
 */
add_filter('excerpt_more', 'gpk_excerpt_more');
function gpk_excerpt_more( $more ) {
	global $post;

	$newMore = '...';
	$newMore .= '<p class="gpk-read-more">';
	$newMore .= '<a class="btn btn-sm btn-success" href="' . get_the_permalink($post->id) . '" rel="bookmark">Read more...</a>';
	$newMore .= '</p>';
	return $newMore;
}


/**
 * Back to top
 */
function gpk_back_to_top() {
	return '<div class="gpk-back-to-top"><a rel="internal" href="#"><i class="fa fa-arrow-circle-up"></i></a></div>';
}


/**
 * Remove <p> tags from category description
 */
remove_filter('term_description', 'wpautop');


/**
 * Add shortcode for Google Adsense
 */
add_shortcode('jr_adsense', 'jr_adsense_ad');
function jr_adsense_ad( $attr ) {
 	$atts = shortcode_atts( array(
 			'id' => 'geography-above-fold-desktop',
 			'client' => 'ca-pub-4297681002419123',
 			'slot' => '9154378147',
 			'type' => 'block',
 			'wrapper' => true
 		), $attr, 'jr_adsense_ad' );

 	$html = '';

 	if ( isset($atts['wrapper']) && $atts['wrapper'] ) {
		$html .= '<div class="gpk-single-adsense ' . $atts['type'] . '">';
 		$html .= '<small>Advertisement</small>';
 	}

 	if ( isset($atts['client']) && $atts['client'] && isset($atts['slot']) && $atts['slot'] ) {

		$html .= '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>';
		$html .= '<!-- ' . $atts['id'] . ' -->';
		$html .= '<ins class="adsbygoogle"
			style="display:block;"
			data-ad-client="' . $atts['client'] . '"
			data-ad-slot="' . $atts['slot'] . '"
			data-ad-format="auto"></ins>';
		$html .= '<script>';
		$html .= '(adsbygoogle = window.adsbygoogle || []).push({});';
		$html .= '</script>';
 	}

 	if ( isset($atts['wrapper']) && $atts['wrapper'] )
 		$html .= '</div>';

 	return $html;
}


/**
 * Author page: Clean social URLs
 */
function gpk_clean_url( $url ) {
	$arr = explode('/', $url);
	return end($arr);
}


/**
 * Register and add site scripts
 */
add_action('wp_enqueue_scripts', 'gpk_theme_scripts');
function gpk_theme_scripts() {

	/**
	 * Add site stylesheets
	 */
	wp_enqueue_style('main-style', get_stylesheet_directory_uri() . '/css/style.min.css', null, 'v2.0.0');

	/**
	 * Add Respond.js
	 */
	wp_enqueue_script('respond-js', get_stylesheet_directory_uri() . '/js/respond.min.js', array(), null, true);

	/**
	 * Disbale default and add custom jQuery
	 */
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery-min', get_stylesheet_directory_uri() . '/js/jquery.min.js', array(), 'v1.11.1', true);

	/**
	 * Add Socialmedia.js
	 */
	if ( is_singular() )
		wp_enqueue_script('socialmedia-js', get_stylesheet_directory_uri() . '/js/socialmedia.min.js', null, 'v1.6.4', true);

	/**
	 * Add main site script
	 */
	wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/js/main.min.js', array('jquery-min'), 'v2.0.0', true);

	/**
	 * Inject LiveReload script
	 */
	if ( strpos($_SERVER['SERVER_NAME'], 'localhost') || $_SERVER['SERVER_NAME'] === 'localhost' )
		wp_enqueue_script('livereload', 'http://localhost:35729/livereload.js', null, 'v2.0.0', true);

}


/**
 * Get all tags as comma separated string
 * for the given $post
 */
function gpk_get_tags($post) {
	$allTags = '';

	if ( $tags = get_the_tags($post->ID, ',') ) {
		$countTags = count($tags);
		foreach ($tags as $tag) {
			$countTags--;
			$allTags .= $tag->name;

			if ($countTags)
				$allTags .= ',';
		}
	}

	return $allTags;
}


/**
 * Get all categories as string
 * for the given $post
 */
function gpk_get_categories($post) {
	$allCategories = '';
	if ( $cats = get_the_category($post->ID) ) {
		$countCats = count($cats);
		foreach ($cates as $cat) {
			$countCats--;
			$allCategories .= $cat->name;

			if ($countCats)
				$allCategories .= ',';
		}
	}

	return $allCategories;
}


/**
 * Get post image or set a default
 */
function gpk_get_featured_image() {
	global $post;

	if ( is_singular() ) {
		if ( has_post_thumbnail($post->ID) ) {
			$thumbnail_id = get_post_thumbnail_id( $post->ID );
			$featured_img = wp_get_attachment_image_src($thumbnail_id, 'large');
			if ( $featured_img[0] )
				return $featured_img[0];
			else
				return get_stylesheet_directory_uri() . '/images/pkgeography_1024x1024.png';
		}
		else {
			return get_stylesheet_directory_uri() . '/images/pkgeography_1024x1024.png';
		}
	}
	else {
		return get_stylesheet_directory_uri() . '/images/pkgeography_1024x1024.png';
	}
}


/**
 * Get post URL or set default
 */
function gpk_get_post_url() {
	global $post;

	if ( ( is_home() && is_front_page() ) || is_search() || is_404() ) {
		return get_bloginfo('url');
	}
	else {
		return get_the_permalink($post->ID);
	}
}


/**
 * Setup title
 */
function gpk_get_title() {
	global $post;

	$site_name = get_bloginfo('name');
	$site_description = get_bloginfo('description');

	$title = $site_name . ( $site_description ? ' &ndash; ' . $site_description : '' );

	if ( is_search() ) {
		$title =  get_the_title($post->ID) . ' &ndash; ' . $site_name;
	}

	if ( is_archive() ) {
		$title =  get_the_title($post->ID) . ' &ndash; ' . $site_name;
	}

	if ( is_404() ) {
		$title =  get_the_title($post->ID) . ' &ndash; ' . $site_name;
	}

	if ( is_singular() ) {
		$title = get_the_title($post->ID) . ' &ndash; ' . $site_name;
	}

	return $title;
}


/**
 * Get post description or set default
 */
function gpk_get_post_description() {
	global $post;

	if ( (is_home() && is_front_page()) || is_search() || is_404() || is_archive() ) {
		return 'Geography of Pakistan is your best comprehensive resource to geographical, geological and general information about Pakistan. Started back in November 2010 as a simple blog, has come a long way, from providing updates on Pakistan geography, maps and satellite imagery to open-data projects and being a leading portal of geographical knowledge.';
	}
	elseif ( is_singular() ) {
		if ( $excerpt = $post->post_excerpt ) {
			return $excerpt;
		}
		else {
			return 'Geography of Pakistan is your best comprehensive resource to geographical, geological and general information about Pakistan. Started back in November 2010 as a simple blog, has come a long way, from providing updates on Pakistan geography, maps and satellite imagery to open-data projects and being a leading portal of geographical knowledge.';
		}
	}
	else {
		return 'Geography of Pakistan is your best comprehensive resource to geographical, geological and general information about Pakistan. Started back in November 2010 as a simple blog, has come a long way, from providing updates on Pakistan geography, maps and satellite imagery to open-data projects and being a leading portal of geographical knowledge.';
	}
}


/**
 * Remove generator information
 */
add_filter('the_generator', '__return_empty_string');


/**
 * Set custom login screen
 */
add_filter('login_head', 'gpk_custom_login_head');
function gpk_custom_login_head() {
	$attr  = '<style>';
		$attr .= 'body { background-color:#ebeddf; }';
		$attr .= '.login #nav a,.login #backtoblog a { color:#090; }';
		$attr .= '.login #backtoblog a { font-weight: bold; }';
		$attr .= '.login #nav a:hover,.login #nav a:active,.login #nav a:focus { color:#c30; }';
		$attr .= '.login #backtoblog a:hover,.login #backtoblog a:active,.login #backtoblog a:focus { color: #060 }';
		$attr .= '[id=login] > h1 > a {';
			$attr .= 'background-image: url(' . get_stylesheet_directory_uri() . '/images/pkgeography_logo.png);';
			$attr .= 'width:200px;height:124px;background-size:100%;';
		$attr .= '}';
	$attr .= '</style>';

	echo $attr;
}


/**
 * Set custom login logo URL
 */
add_filter('login_headerurl', 'gpk_login_headerurl');
function gpk_login_headerurl() {
	return get_bloginfo('url');
}


/**
 * Set custom logo title
 */
add_filter('login_headertitle', 'gpk_login_headertitle');
function gpk_login_headertitle() {
	return wp_title( '&ndash;', false, 'right' );
}


/**
 * Set custom message in login form footer
 */
add_filter('login_footer', 'gpk_login_footer');
function gpk_login_footer() {
	$html = '<p style="max-width:320px;margin:2em auto 0;text-align:center;color:#999;">';
		$html .= '&copy ' . get_bloginfo('name') . ' 2010 &ndash; ' . date('Y');
	$html .= '</p>';

	echo $html;
}


/**
 * Add additional HTTP header for X-UA-Compatible
 */
add_action( 'send_headers', 'gpk_header_xua' );
function gpk_header_xua() {
	header( 'X-UA-Compatible: IE=edge,chrome=1' );
}

/**
 * Setup Custom wp_head
 */
add_action('wp_head', 'gpk_wp_head');

function gpk_wp_head() {
	global $post;

	// Get tags
	$allTags = gpk_get_tags( $post );

	$html = '';
	$html .= '<!-- Site metdata -->';
	$html .= '<meta name="description" content="' . gpk_get_post_description() . '">';


	/**
	 * Setup tags as keywords for singular page
	 */
	if ( is_singular() ) {
		if ( $allTags ) {
			$html .= '<meta name="keywords" content="' . $allTags . '">';
		}
		else {
			$html .= '<meta name="keywords" content="Pakistan,geography,geology,google,maps,history,satellite,imagery,cartography,northern areas">';
		}
	}
	else {
		$html .= '<meta name="keywords" content="Pakistan,geography,geology,google,maps,history,satellite,imagery,cartography,northern areas">';
	}


	/**
	 * Setup search engines robots and exclude from search page
	 */
	if ( ! is_search() ) {
		$html .= '<!-- Search engines robots -->';
		$html .= '<meta name="robots" content="noodp, noydp">';
		$html .= '<meta name="googlebot" content="all, index, follow">';
		$html .= '<meta name="robots" content="all, index, follow">';
		$html .= '<meta name="msnbot" content="all, index, follow">';
	}

	$html .= '<!-- URL metadata -->';


	/**
	 * Setup canonical URL for home / front page
	 */
	if ( is_home() && is_front_page() ) {
		$html .= '<link rel="canonical" href="' . get_bloginfo('url') . '">';
	}

	$html .= '<link rel="pingback" href="' . get_bloginfo( 'pingback_url' ) . '">';
	$html .= '<link rel="publisher" href="https://plus.google.com/+GeographyPK">';

	$html .= '<!-- Facebook open graph -->';
	$html .= '<meta property="fb:app_id" content="369832136380065">';
	$html .= '<meta property="fb:admins" content="1019220329">';


	/**
	 * Setup og:type for home / front page
	 */
	if ( is_home() && is_front_page() ) {
		$html .= '<meta property="og:type" content="website">';
	}


	/**
	 * Setup og:type for singular page
	 */
	if ( is_singular() ) {
		$html .= '<meta property="og:type" content="article">';

		/**
		 * Setup singular article author
		 */
		// $html .= '<meta property="article:author" content="' . get_the_author_meta('nicename') . '">';

		/**
		 * Setup og:tag for each tag in article
		 */
		if ( $theTags = get_the_tags($post->ID, ',') ) {
			foreach ($theTags as $theTag) {
				$html .= '<meta property="article:tag" content="' . $theTag->name . '">';
			}
		}

		/**
		 * Setup og:section for each category in article
		 */
		if ( $theCats = get_the_category($post->ID) ) {
			foreach ($theCats as $theCat) {
				$html .= '<meta property="article:section" content="' . $theCat->name . '">';
			}
		}

		/**
		 * Setup article publish and modified time
		 */
		$html .= '<meta property="article:published_time" content="' . get_post_time('Y-m-d\TH:i:sP', true, $post->ID) . '">';
		$html .= '<meta property="article:modified_time" content="' . get_the_modified_time('Y-m-d\TH:i:sP', true, $post->ID) . '">';
	}

	$html .= '<meta property="og:updated_time" content="' . get_the_modified_time('Y-m-d\TH:i:sP', true, $post->ID) . '">';
	$html .= '<meta property="og:locale" content="en_US">';
	$html .= '<meta property="og:title" content="' . gpk_get_title() . '">';
	$html .= '<meta property="og:url" content="' . gpk_get_post_url() . '">';
	$html .= '<meta property="og:description" content="' . gpk_get_post_description() . '">';
	$html .= '<meta property="og:image" content="' . gpk_get_featured_image() . '">';

	$html .= '<!-- Twitter card -->';
	$html .= '<meta name="twitter:card" content="summary_large_image">';
	$html .= '<meta name="twitter:site" content="@pkgeography">';
	$html .= '<meta name="twitter:creator" content="@pkgeography">';
	$html .= '<meta name="twitter:title" content="' . gpk_get_title() . '">';
	$html .= '<meta name="twitter:description" content="' . gpk_get_post_description() . '">';
	$html .= '<meta name="twitter:domain" content="' . gpk_get_post_url() . '">';
	$html .= '<meta name="twitter:image:src" content="' . gpk_get_featured_image() . '">';

	echo $html;
}


/**
 * Get all default and custom categories
 */
function gpk_get_all_categories( $post ) {
	$default = array('category');
	$custom = get_taxonomies( array(
			'public' => true,
			'_builtin' => false
		), 'names', 'and' );

	return array_merge($default, $custom);
}


/**
 * Custom features
 */
require 'inc/gpk-post-type.php';
require 'inc/gpk-featured-image.php';



/**
 * Add custom post types to main query
 */
// add_action('pre_get_posts', 'gpk_add_to_main_query');
// function gpk_add_to_main_query( $query ) {
// 	if ( is_home() && $query->is_main_query() ) {
// 		$query->set( 'post_type', get_post_types( array(
// 					'public' => true
// 				), 'names' ) );
// 	}
// }


/**
 * Get latest featured
 */

function gpk_get_latest_featured() {
	$gpk_featured = new WP_Query( array(
			'post_type' => 'gpk_featured',
			'post_per_page' => 1
		)
	);

	$featured = array();

	if ( $gpk_featured->have_posts() ) {

		while ( $gpk_featured->have_posts() ) {
			$gpk_featured->the_post();

			if ( has_post_thumbnail() ) {
				$thumbnail_id = get_post_thumbnail_id( $post->ID );
				if ( $featured_img = wp_get_attachment_image_src($thumbnail_id, 'large') ) {
					$featured['image']['src'] = $featured_img[0];
					$featured['image']['width'] = $featured_img[1];
					$featured['image']['height'] = $featured_img[2];
				}
			}

			$featured['title'] = get_the_title();
			$featured['excerpt'] = get_the_excerpt();
		}
	}

	return $featured;
}

