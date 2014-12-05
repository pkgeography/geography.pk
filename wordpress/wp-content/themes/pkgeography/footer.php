<?php

/**
 * Footer template
 */

?>
		<!-- footer -->
		<div class="gpk-footer clearfix">
			<div class="container">

				<!-- at social -->
				<div class="col-sm-6">
					<h5>Follow us on our social media channels.</h5>

					<ul class="gpk-social-channels list-inline">
						<li>
							<a class="gpk-icon-facebook" href="http://facebook.com/pkgeography" target="_blank"><i class="fa fa-facebook-square"></i></a>
						</li>
						<li>
							<a class="gpk-icon-twitter" href="http://twitter.com/pkgeography" target="_blank"><i class="fa fa-twitter-square"></i></a>
						</li>
						<li>
							<a class="gpk-icon-gplus" href="http://google.com/+geographypk" target="_blank"><i class="fa fa-google-plus-square"></i></a>
						</li>
						<li>
							<a class="gpk-icon-youtube" href="http://youtube.com/user/pkgeography" target="_blank"><i class="fa fa-youtube-square"></i></a>
						</li>
						<li>
							<a class="gpk-icon-rss" href="http://feeds.feedburner.com/GeographyOfPakistan" target="_blank"><i class="fa fa-rss-square"></i></a>
						</li>
					</ul>

					<?php

					/**
					 * Footer Nav
					 */
					if ( has_nav_menu('footer') ) :
						wp_nav_menu( array(
								'theme_location' => 'footer',
								'menu' => 'footer',
								'container' => false,
								'menu_class' => 'list-inline gpk-directory',
								'fallback_cb' => false
							) 
						);
					endif;
					?>

					<p>We use cookies on this website. By using this site, you agree that we may store and access cookies on your device. <a href="http://www.allaboutcookies.org/" target="_blank">Read more about cookies</a>. <a href="/about/privacy/">Read our privacy policy</a>.</p>
				</div>

				<!-- attribution -->
				<div class="col-sm-4 col-sm-offset-2">
					<p><strong>&copy; 2010 &ndash; <?php echo date('Y'); ?> Geography of Pakistan</strong></p>
					<p>
						Except where otherwise noted, contents on this site are licensed under a <a rel="license" target="_blank" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License</a>. All code and code samples at this site, blog and in projects by Geography of Pakistan are licensed under <a href="http://opensource.org/licenses/MIT" target="_blank">MIT License</a>. The contents still remain property of Geography of Pakistan.
					</p>
					
					<p>
						<strong>Google Maps</strong> and <strong>Google Map Maker</strong> are products of <strong>Google Inc</strong>. This website is <strong>not affiliated with Google</strong>.
					</p>
				</div>
			</div>
		</div>
		
		<?php
			/**
			 * Footer 
			 */
			wp_footer();
		?>

	</body>
</html>