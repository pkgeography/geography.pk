<?php

/**
 * Archive template
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
				<h1 class="post-title">
					<?php
						if ( is_day() ) :
							printf( __( 'Archive for %s', 'pkgeography' ), get_the_date() );
						elseif ( is_month() ) :
							printf( __( 'Archive for %s', 'pkgeography' ), get_the_date('F Y') );
						elseif ( is_year() ) :
							printf( __( 'Archive for %s', 'pkgeography' ), get_the_date('Y') );
						else :
							_e( 'Archive', 'pkgeography' );
						endif;
					?>
				</h1>
				<div class="post-metadata">
					<ul class="list-inline">
						<li>
							<?php
								if ( is_day() ) :
									printf( __( 'Daily archive for %s', 'pkgeography' ), get_bloginfo('name') );
								elseif ( is_month() ) :
									printf( __( 'Monthly archive for %s', 'pkgeography' ), get_bloginfo('name') );
								elseif ( is_year() ) :
									printf( __( 'Yearly archive for %s', 'pkgeography' ), get_bloginfo('name') );
								else :
									_e( 'Uncategorized archived articles', 'pkgeography' );
								endif;
							?>
						</li>
					</ul>
				</div>
			</header>

			<p class="lead gpk-page-description">
				Here is list of all articles
				<?php
					if ( is_day() ) :
						printf( __( 'published on %s', 'pkgeography' ), get_the_date() );
					elseif ( is_month() ) :
						printf( __( 'published during month of %s', 'pkgeography' ), get_the_date('F Y') );
					elseif ( is_year() ) :
						printf( __( 'published during year of %s', 'pkgeography' ), get_the_date('Y') );
					endif;
				?>. If you are unable to find your required information then try using the search feature.
			</p>

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