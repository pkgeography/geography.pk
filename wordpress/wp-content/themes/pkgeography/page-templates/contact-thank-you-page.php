<?php

/**
 * Template Name: Contact Thank You Page
 */


get_header();

if ( have_posts() ) the_post();

?>

<!-- contents -->
<div class="gpk-content gpk-page gpk-template">
	<div class="container">
		<div class="row">
			<div class="col-md-12 gpk-main" role="main">
				<div class="page-header">
					<h1 class="post-title"><?php the_title(); ?></h1>
				</div>

				<?php the_content(); ?>

				<div class="page-header">
					<h4>Recent articles</h4>
				</div>

				<?php
					$recents = wp_get_recent_posts( array(
							'numberposts' => 10
						)
					);

					if ( $recents ) :
						echo '<ul>';
						foreach ($recents as $recent) :
							if ( $recent['post_status'] === 'publish' ) :
							?>
								<li id="<?php echo $recent['ID']; ?>">
									<a href="<?php echo get_permalink($recent['ID']); ?>">
										<?php echo $recent['post_title']; ?>
									</a>
								</li>
							<?php
							endif;
							endforeach;
						echo '</ul>';
					endif;
				?>

				<div class="page-header">
					<h4>Topics</h4>
				</div>
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


					/**
					 * Back to top
					 */
					echo gpk_back_to_top();

				?>

			</div>

			<?php # get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>