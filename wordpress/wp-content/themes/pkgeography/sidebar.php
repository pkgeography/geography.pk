<?php

/**
 * Sidebar template
 */

?>

<div class="row">
	<div id="pkg-sidebar" class="col-md-4 gpk-sidebar noprint">

		<?php
		/**
		 * Display Table of contents for pages with TOC enabled
		 */

			if ( is_page() ) {
				if ( $gpk_toc = get_post_meta($post->ID, '_gpk_page_toc', true) ) {

					if ( $gpk_toc === 'on' ) {

						/**
						 * List all child pages as TOC
						 */
						$sub_pages = wp_list_pages( array(
								'child_of' => $post->post_parent ? $post->post_parent : $post->ID,
								'depth' => '0',
								'echo' => false,
								'post_type' => 'page',
								'post_status' => 'publish',
								'title_li' => ''
							)
						);

						if ( $sub_pages ) : ?>
							<div class="gpk-sidebar-toc gpk-sidebar-section">
								<div class="gpk-sidebar-heading"><i class="fa fa-list"></i> Table of Contents</div>
								<?php printf('<ul class="%s">%s</ul>', 'gpk-toc-list', $sub_pages); ?>
							</div>
						<?php endif;
					}
				}
			}
		?>

		<?php
		/**
		 * List social media channels
		 */
		?>
		<div class="gpk-sidebar-at-social gpk-sidebar-section">
			<div class="gpk-sidebar-heading"><i class="fa fa-share-alt"></i> Follow us on social media</div>
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
					<a class="gpk-icon-github" href="http://github.com/pkgeography" target="_blank"><i class="fa fa-github-square"></i></a>
				</li>
				<li>
					<a class="gpk-icon-rss" href="http://feeds.feedburner.com/GeographyOfPakistan" target="_blank"><i class="fa fa-rss-square"></i></a>
				</li>
			</ul>
		</div>


		<?php
		/**
		 * List categories in blog
		 */
		?>
		<div class="gpk-categories gpk-sidebar-section">
			<div class="gpk-sidebar-heading"><i class="fa fa-files-o"></i> Categories</div>
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


		<?php
		/**
		 * Display ads only in production
		 */

		if ( ! ENV_DEV ) :
		?>
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
		<?php endif; ?>


		<?php
		/**
		 * Display tags (topics) cloud
		 */
		?>
		<div class="gpk-tag-cloud gpk-sidebar-section">
			<div class="gpk-sidebar-heading"><i class="fa fa-pencil-square-o"></i> Topics</div>
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


		<?php
		/**
		 * Display archives
		 */
		?>
		<div class="gpk-archives gpk-sidebar-section">
			<div class="gpk-sidebar-heading"><i class="fa fa-archive"></i> Archives</div>
			<?php
				wp_get_archives('type=monthly');
			?>
		</div>

		<?php
		/**
		 * Display only if not dev environment
		 */

		if ( ! ENV_DEV ) :
		?>
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
		<?php endif; ?>

	</div>
</div>