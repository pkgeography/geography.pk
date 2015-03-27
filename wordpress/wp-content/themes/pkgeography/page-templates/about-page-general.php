<?php

/**
 * Template Name: About Page (General)
 */

if ( have_posts() ) the_post();

get_header(); ?>

<!-- contents -->
<div class="gpk-content gpk-page gpk-template">
	<div class="container">
		<div class="row">
			<div class="col-md-12 gpk-main" role="main">
				<div class="page-header">
					<h1 class="post-title"><?php the_title(); ?></h1>
				</div>

				<?php the_content(); ?>

			</div>

			<?php # get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>