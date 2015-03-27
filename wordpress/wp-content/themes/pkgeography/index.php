<?php

/**
 * Main index template
 */

get_header(); ?>

<!-- contents -->
<div class="gpk-content">
	<div class="container">
		<div class="row">
			<div class="col-md-8 gpk-main">
				<?php
					if ( have_posts() ) :

						/**
						 * Set appropriate loop template
						 */
						while ( have_posts() ) : the_post();
							get_template_part( 'content', get_post_format() );
						endwhile;

						/**
						 * Pagination
						 */
						echo '<div class="gpk-pagination">';
						echo paginate_links( array(
								'type' => 'list',
								'prev_text' => __('&laquo; Latest'),
								'next_text' => __('More &raquo;')
							) );
						echo '</div>';

						/**
						 * Back to top
						 */
						echo '<div class="gpk-back-to-top">';
						echo '<a rel="internal" href="#"><i class="fa fa-arrow-circle-up"></i></a>';
						echo '</div>';
					endif;
				?>
			</div>

			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>