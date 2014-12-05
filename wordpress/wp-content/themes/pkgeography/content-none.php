<?php

/**
 * Content default template
 */

?>

<article class="gpk-article not-found" id="post-0">
	
	<header class="page-header">
		<h2 class="post-title">
			<?php _e('Are you lost?'); ?>
		</h2>
	</header>

	<div class="post-content">

		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p>
				<?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.' ), admin_url( 'post-new.php' ) ); ?>
			</p>

			<?php elseif ( is_search() ) : ?>

			<p>
				<?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.' ); ?>
			</p>
			<?php get_search_form(); ?>

			<?php else : ?>

			<p>
				<?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching may help in finding desired information.' ); ?>
			</p>
			<?php get_search_form(); ?>

		<?php endif; ?>

	</div>
	
</article>