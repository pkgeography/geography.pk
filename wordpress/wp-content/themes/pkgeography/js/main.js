;(function(p,k,g)	{

	p.pkgeography = p.pkgeography || g;

})(window, document, (function($)	{

	var pkg = {};

	pkg.backToTop =  function(e) {
		e.preventDefault();
		var $this = $(this);
		var $window = $(window);
		return $('html, body').animate({
			scrollTop: 0
		}, 600, 'linear').promise().done();
	};

	pkg.init = function() {

		// Back to top
		$('.gpk-back-to-top').on('click', pkg.backToTop);

		// Track click event
		$('a[rel=bookmark], a[rel=author], a[rel=home]').on('click', function(e)	{
			var $this = $(this);
			var annotate = $this.text().toLowerCase();
			annotate = annotate.replace(/[^a-z0-9\s]/gi, '');
			annotate = annotate.replace(/\s/gi, '-');
			annotate = annotate.replace(/([-]{3,})/gi, '-');

			// Track event
			if (typeof ga !== 'undefined')
				ga('send', 'event', 'a--rel-Bookmark-Author', annotate);

		});

		// Toggle mobile navigation menu
		$('.gpk-mobile-nav-btn').on('click', function(e) {
			e.preventDefault();
			$('.gpk-mobile-nav').slideToggle();
		});
	};

	return pkg;

})(jQuery));


jQuery(document).ready(pkgeography.init);