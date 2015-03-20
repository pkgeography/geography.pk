<?php

/**
 * Single template
 */

get_header(); ?>

<!-- contents -->
<div class="gpk-content gpk-single">
	<div class="container">
		<div class="col-md-8 gpk-main" role="main">
			<?php
				if (have_posts()) :

					// Set appropriate loop template
					while ( have_posts() ) : the_post();
						get_template_part( 'content', get_post_format() );
			?>

			<div class="gpk-static-social text-center noprint">
				Share the story:
				<ul class="list-inline">
					<li>
						<a href="https://facebook.com/sharer.php?url=<?php echo get_permalink(); ?>" data-type="facebook" class="gpk-social-share" target="_blank">
							<i class="fa fa-facebook-square"></i>
						</a>
					</li>
					<li>
						<a href="https://twitter.com/intent/tweet?url=<?php echo get_permalink(); ?>" data-type="twitter" class="gpk-social-share" target="_blank">
							<i class="fa fa-twitter-square"></i>
						</a>
					</li>
					<li>
						<a href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" data-type="gplus" class="gpk-social-share" target="_blank">
							<i class="fa fa-google-plus-square"></i>
						</a>
					</li>
				</ul>
			</div>

			<?php

						/**
						 * Display comments only if not dev environment
						 */
						if ( !ENV_DEV && (comments_open() || get_comments_number()) ) {
							comments_template();
						}

					endwhile;

					// Back to top
					echo '<div class="gpk-back-to-top">';
					echo '<a rel="internal" href="#"><i class="fa fa-arrow-circle-up"></i></a>';
					echo '</div>';
				endif;
			?>
		</div>

		<div class="gpk-floating-social fixed noprint">
			<ul class="list-unstyled">
				<li>
					<a href="https://facebook.com/sharer.php?url=<?php echo get_permalink(); ?>" data-type="facebook" class="gpk-social-share" target="_blank"><i class="fa fa-facebook-square"></i></a>
				</li>
				<li>
					<a href="https://twitter.com/intent/tweet?url=<?php echo get_permalink(); ?>" data-type="twitter" class="gpk-social-share" target="_blank"><i class="fa fa-twitter-square"></i></a>
				</li>
				<li>
					<a href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" data-type="gplus" class="gpk-social-share" target="_blank"><i class="fa fa-google-plus-square"></i></a>
				</li>
			</ul>
		</div>

		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer(); ?>