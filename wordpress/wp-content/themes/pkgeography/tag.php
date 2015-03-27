<?php

/**
 * Tag template
 */

get_header(); ?>

<!-- contents -->
<div class="gpk-content gpk-author">
	<div class="container">
		<div class="row">
			<div class="col-md-8 gpk-main" role="main">
				<?php
					if ( have_posts() ) :
				?>

				<header class="page-header">
					<h1 class="post-title">
						<?php printf( __( '%s', 'pkgeography' ), single_tag_title('', false) ); ?>
					</h1>
					<div class="post-metadata">
						<ul class="list-inline">
							<li>
								Articles tagged with <?php printf( __( '"%s"', 'pkgeography' ), single_cat_title('', false) ); ?>
							</li>
						</ul>
					</div>
				</header>

				<p class="lead gpk-page-description">Here are all articles tagged with <?php printf( __( '"%s"', 'pkgeography' ), single_cat_title('', false) ); ?>.</p>

				<?php
						rewind_posts();

						// Set appropriate loop template
						while ( have_posts() ) : the_post();
							get_template_part( 'content', get_post_format() );
						endwhile;

						// Pagination
						echo '<div class="gpk-pagination">';
						echo paginate_links( array(
								'type' => 'list',
								'prev_text' => __('&laquo; Latest'),
								'next_text' => __('More &raquo;')
							) );
						echo '</div>';


						// Back to top
						echo gpk_back_to_top();

					else :
						get_template_part( 'content', 'none' );
					endif;
				?>
			</div>

			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>