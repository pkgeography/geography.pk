<?php

/**
 * Attachment template
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
						<?php printf( '%s', __(get_the_title( $post->post_parent )) ); ?>
					</h1>
					<div class="post-metadata">
						<ul class="list-inline">
							<li>
								<i class="fa fa-clock-o"></i>&nbsp;
								<time datetime="<?php echo get_the_date('Y-m-d H:i:s'); ?>">
									<?php echo get_the_date('F jS, Y'); ?>
								</time>
							</li>
							<li>
								<i class="fa fa-book"></i>
								<a rel="bookmark" href="<?php echo get_permalink( $post->post_parent ); ?>">
									Read complete article &raquo;
								</a>
							</li>
						</ul>
					</div>
				</header>

				<article class="gpk-article" id="post-<?php echo the_ID(); ?>">

					<?php

							if ( wp_attachment_is_image() ) {
								$metadata = wp_get_attachment_metadata( $post->ID );
								$attachments = array_values(
									get_children( array(
											'post_parent' => $post->post_parent,
											'post_status' => 'inherit',
											'post_type' => 'attachment',
											'post_mime_type' => 'image',
											'order' => 'ASC',
											'order_by' => 'menu_order ID'
										)
									)
								);

								if ( $attachments ) {
									foreach ( $attachments as $key => $attachment ) {

										/**
										 * Display attachment images
										 */
										echo '<figure class="gpk-attachment-image">';
											echo '<h4>' . get_the_title($attachments[$key]->ID) . '</h4>';
											echo wp_get_attachment_image( $attachments[$key]->ID, array(1024, 768), null, array('class' => 'img-responsive', 'alt' => get_the_title($post->ID)) );

											/**
											 * Show attachment excerpt if available
											 */
											if ( $post->post_excerpt ) {
												echo '<figcaption>';
												echo $post->post_excerpt;
												echo '</figcaption>';
											}

										echo '</figure>';

										//if ( $attachment->ID == $post->ID ) break;
									}
								}
							}


							/**
							 * Comments
							 */
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}

							/**
							 * Back to top
							 */
							echo gpk_back_to_top();

						else :
							get_template_part( 'content', 'none' );
						endif;
					?>
				</article>
			</div>

			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>