<?php

/**
 * Content default template
 */

?>

<article class="gpk-article <?php if ( is_single() ) echo 'gpk-single-post'; ?>" id="post-<?php echo the_ID(); ?>">

	<header class="page-header">
		<?php
			if ( is_singular() ) :
				the_title( '<h1 class="post-title">', '</h1>' );
			else :
				the_title( '<h2 class="post-title"><a rel="bookmark" href="' . esc_url(get_permalink()) . '">', '</a></h2>' );
			endif;
		?>

		<?php if ( ! is_author() ) : ?>

		<div class="post-metadata">
			<ul class="list-inline">
				<li>
					By <?php the_author_posts_link(); ?>
				</li>
			</ul>
		</div>

		<?php endif; ?>

	</header>

	<div class="post-metadata">
		<ul class="list-inline">
			<li><i class="fa fa-calendar-o"></i>&nbsp;
				<time datetime="<?php echo get_the_date('Y-m-d H:i:s'); ?>">
					<?php echo get_the_date('F jS, Y'); ?>
				</time>
			</li>

			<?php if ( is_single() ) : ?>
				<li>
					<i class="fa fa-folder-open-o"></i>&nbsp;<?php the_category(', ', 'single', $post->ID); ?>
				</li>
			<?php endif; ?>

			<li>
				<i class="fa fa-comments-o"></i>&nbsp;
				<a href="<?php the_permalink($post->ID); ?>#comments" rel="bookmark">
					<?php comments_number('Start Discussion','1 Comment','% Comments'); ?>
				</a>
			</li>
		</ul>

		<?php /*
			if ( is_single() ) :

				/**
				 * Adsense banner
				 *
				 * Disabled temporary
				 * /
				echo do_shortcode( '[jr_adsense id="pkgeography-top-ad" client="ca-pub-4297681002419123" slot="7668179343" type="banner"]' );
			endif; */
		?>

	</div>

	<div class="post-content clearfix">
		<?php
			if ( is_singular() ) {
				the_content();

				/**
				 * If tags are listed then display
				 */
				if ( $tags_list = get_the_tags('', ', ') ) {
					echo '<p class="gpk-post-tags">';
					the_tags('<i class="fa fa-tags"></i> ');
					echo '</p>';
				}

				/**
				 * Adsense banner
				 */
				// echo do_shortcode( '[jr_adsense id="pkgeography-bottom-ad" client="ca-pub-4297681002419123" slot="7668179343" type="banner"]' );

			}
			else {
				the_excerpt();
			}
		?>

	</div>

</article>
