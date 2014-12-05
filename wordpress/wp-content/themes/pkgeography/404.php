<?php

/**
 * 404 error not found template
 */

get_header(); ?>

<!-- contents -->
<div class="gpk-content gpk-not-found">
	<div class="container">
		<div class="col-md-8 gpk-main" role="main">
			<header class="page-header">
				<h1 class="post-title">
					<?php _e( 'Not Found', 'pkgeography' ); ?>
				</h1>
			</header>

			<div class="post-content clearfix">

				<p class="lead gpk-page-description">Unfortunately, the requested page could not be found (error 404).</p>
				<p>Please check and verify the URL/page address for any typo. It is also possible that you may have clicked through an outdated link. Feel free to <a href="/" rel="bookmark">go to home page</a> or <strong>try the search</strong> below to find information you are after.</p>

				<p>
					<div class="form-horizontal gpk-search-form">
						<?php get_search_form(); ?>
					</div>
				</p>


				<h4>What else can be done?</h4>
				<ul>
					<li>You can contact us to inform us about this error using our <a href="/contact/" rel="bookmark">contact form</a>. We will appreciate this very much as it will help us fix the error.</li>
					<li>You can contact us at one of our social media channels (preferrably <a href="https://twitter.com/pkgeography">Twitter</a> for quicker response).</li>
				</ul>

			</div>


		</div>

		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>