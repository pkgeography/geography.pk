<?php

/**
 * Sidebar template
 */

?>

<!-- sidebar -->
<div id="pkg-sidebar" class="col-md-4 gpk-sidebar">

	<div class="gpk-advert gpk-advert-box gpk-sidebar-section">
		<small>Advertisement</small>
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- geography-above-fold-desktop -->
		<ins class="adsbygoogle"
		     style="display:block;"
		     data-ad-client="ca-pub-4297681002419123"
		     data-ad-slot="9154378147"
		     data-ad-format="auto"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>

	<div class="gpk-sidebar-at-social gpk-sidebar-section">
		<h5 class="gpk-sidebar-heading">Follow us on social media</h5>
		<ul class="gpk-social-channels list-inline">
			<li>
				<a class="gpk-icon-facebook" href="http://facebook.com/pkgeography" target="_blank"><i class="fa fa-facebook-square"></i></a>
			</li>
			<li>
				<a class="gpk-icon-twitter" href="http://twitter.com/pkgeography" target="_blank"><i class="fa fa-twitter-square"></i></a>
			</li>
			<li>
				<a class="gpk-icon-gplus" href="http://google.com/+geographypk" target="_blank"><i class="fa fa-google-plus-square"></i></a>
			</li>
			<li>
				<a class="gpk-icon-youtube" href="http://youtube.com/user/pkgeography" target="_blank"><i class="fa fa-youtube-square"></i></a>
			</li>
			<li>
				<a class="gpk-icon-rss" href="http://feeds.feedburner.com/GeographyOfPakistan" target="_blank"><i class="fa fa-rss-square"></i></a>
			</li>
		</ul>
	</div>


	<div class="gpk-categories gpk-sidebar-section">
		<h5 class="gpk-sidebar-heading">Categories</h5>
		<?php
			$categories = wp_list_categories( array(
					'style' => 'list',
					'hide_empty' => true,
					'title_li' => '',
					'taxonomy' => 'category',
					'echo' => false,
					'show_count' => true
				)
			);

			$categories = preg_replace('~\((\d+)\)(?=\s*+<)~', '<span class="gpk-category-count">($1)</span>', $categories);
			echo $categories;
		?>
	</div>

	<div class="gpk-tag-cloud gpk-sidebar-section">
		<h5 class="gpk-sidebar-heading">Topics</h5>
		<?php
			wp_tag_cloud( array(
					'echo' => true,
					'smallest' => 12,
					'largest' => 20,
					'unit' => 'px',
					'number' => 45,
					'separator' => ' <span class="gpk-tag-separator">&bull;</span> ',
					'taxonomy' => 'post_tag'
				)
			);
		?>
	</div>

	<div class="gpk-archives gpk-sidebar-section">
		<h5 class="gpk-sidebar-heading">Archives</h5>
		<?php
			wp_get_archives('type=monthly');
		?>
	</div>

	<div class="gpk-advert gpk-advert-box gpk-sidebar-section">
		<small>Advertisement</small>
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- geography-below-fold-desktop -->
		<ins class="adsbygoogle"
		     style="display:block;"
		     data-ad-client="ca-pub-4297681002419123"
		     data-ad-slot="9154378147"
		     data-ad-format="auto"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>

</div>