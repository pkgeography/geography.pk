<?php

/**
 * Author template
 */

get_header(); ?>

<!-- contents -->
<div class="gpk-content gpk-author">
	<div class="container">
		<div class="col-md-8 gpk-main" role="main">
			<?php
				if ( have_posts() ) :

					the_post();
			?>

			<header class="page-header">
				<h1 class="post-title">Meet the Staff</h1>
				<div class="post-metadata">
					<ul class="list-inline">
						<li>
							<?php echo ucwords(get_the_author_meta('roles')[0]); ?> at <?php echo get_bloginfo('name'); ?>
						</li>
					</ul>
				</div>
			</header>

			<div class="post-metadata gpk-author-meta clearfix">
				<div class="media clearfix">
					<div class="pull-left">
						<?php echo get_avatar( get_the_author_meta('ID'), 150 ); ?>
					</div>
					<div class="media-body">
						<h4 class="media heading">
							<?php echo get_the_author(); ?>
						</h4>

						<p><?php echo get_the_author_meta('description'); ?></p>

						<ul class="list-unstyled gpk-author-social">
							<?php if ( get_the_author_meta('facebook') ) : ?>
								<li>
									<i class="fa fa-facebook-square"></i>&nbsp;
									<a href="<?php echo get_the_author_meta('facebook'); ?>" target="_blank">
										/<?php echo gpk_clean_url( get_the_author_meta('facebook') ); ?>
									</a>
								</li>
							<?php endif; ?>
							<?php if ( get_the_author_meta('twitter') ) : ?>
								<li>
									<i class="fa fa-twitter-square"></i>&nbsp;
									<a href="<?php echo get_the_author_meta('twitter'); ?>" target="_blank">
										@<?php echo gpk_clean_url( get_the_author_meta('twitter') ); ?>
									</a>
								</li>
							<?php endif; ?>
							<?php if ( get_the_author_meta('gplus') ) : ?>
								<li>
									<i class="fa fa-google-plus-square"></i>&nbsp;
									<a href="<?php echo get_the_author_meta('gplus'); ?>" target="_blank">
										<?php echo gpk_clean_url( get_the_author_meta('gplus') ); ?>
									</a>
								</li>
							<?php endif; ?>
							<?php if ( get_the_author_meta('user_url') ) : ?>
								<li>
									<i class="fa fa-globe"></i>&nbsp;
									<a href="<?php echo get_the_author_meta('user_url'); ?>" target="_blank">
										<?php echo gpk_clean_url( get_the_author_meta('user_url') ); ?>
									</a>
								</li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>

			<p class="lead gpk-page-description">Here list of all articles by <?php the_author(); ?>.</p>


			<?php
					/**
					 * Rewind posts to show latest at top
					 */
					rewind_posts();

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