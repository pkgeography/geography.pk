<?php

/**
 * Search page template
 */

get_header(); ?>

<!-- contents -->
<div class="gpk-content gpk-author">
	<div class="container">
		<div class="col-md-8 gpk-main" role="main">
			<?php
				if ( have_posts() ) :
			?>

			<header class="page-header">
				<h1 class="post-title">Search results</h1>
				<div class="post-metadata">
					<ul class="list-inline">
						<li>
							Search results for: <?php echo wp_specialchars($s, 1); ?>
						</li>
					</ul>
				</div>
			</header>

			<p>
				<div class="form-horizontal gpk-search-form">
					<?php get_search_form(); ?>
				</div>
			</p>
			<p class="lead gpk-page-description">Here are all results found for your query.</p>

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

<?php get_footer(); ?>