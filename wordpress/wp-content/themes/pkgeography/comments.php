<?php
/**
 * Comments template
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password or current domain is not production domain then
 * we will return early without loading the comments.
 */
if ( post_password_required() || ENV_DEV ) {
	return;
}

?>

<div id="comments" class="col-md-12 entry-content gpk-comments-area">

	<div id="disqus_thread"></div>
	<script type="text/javascript">
	var disqus_shortname = 'pkgeography';

	(function() {
		var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
		dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
		(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
	})();
	</script>
	<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
	<a href="http://disqus.com" class="dsq-brlink">Comments powered by <span class="logo-disqus">Disqus</span></a>

</div><!-- #comments -->